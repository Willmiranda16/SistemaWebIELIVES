<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Anio;
use App\Models\Apoderado;
use App\Models\AsignarCurso;
use App\Models\Aula;
use App\Models\Capacidad;
use App\Models\Curso;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Grado;
use App\Models\Gsa;
use App\Models\Matricula;
use App\Models\Nivel;
use App\Models\Nota;
use App\Models\NotaCapacidad;
use App\Models\Persona;
use App\Models\PersonalAcademico;
use App\Models\Provincia;
use App\Models\Rol;
use App\Models\Seccion;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function showAlumnosGrados(Request $request)
    {
        $data = $request['params']['data'];
        $año = $data["año"];
        $nivel = $data["nivel"];
        $grado = $data["grado"];
        $seccion = $data["seccion"];

        $grados = [];
        $totales = [];
        $data = Grado::where('niv_id', $nivel)->get();
        foreach ($data as $d) {
            array_push($grados, $d->gra_descripcion);
            $data2 = Gsa::where('niv_id', $nivel)->where('is_deleted', '!=', 1)->where('gra_id', $d->gra_id)->get();
            array_push($totales, count($data2));
        }

        return response()->json([
            'grados' => $grados,
            'totales' => $totales
        ]);

        /* if ($request->ajax()) {
            return response()->json([
                'grados' => $grados,
                'totales' => $totales
            ]);
        }
        return view('Error404'); */
    }

    public function showPersonalCargos(Request $request)
    {
        $data = $request['params']['data'];
        $año = $data["año"];
        $nivel = $data["nivel"];
        $grado = $data["grado"];
        $seccion = $data["seccion"];

        $turno = $nivel == 1 ? 'Mañana' : 'Tarde';

        $cargos = [];
        $totales = [];
        $data = Rol::where('is_deleted', '!=', 1)->whereNotIn('rol_id', [1, 3])->get();
        $total = count($data);
        foreach ($data as $d) {
            array_push($cargos, $d->rol_descripcion);
            $data2 = PersonalAcademico::where('rol_id', $d->rol_id)->get();
            array_push($totales, count($data2));
        }

        return response()->json([
            'cargos' => $cargos,
            'totales' => $totales,
            'total' => $total,
        ]);

        /* if ($request->ajax()) {
            return response()->json([
                'cargos' => $cargos,
                'totales' => $totales,
                'total' => $total,
            ]);
        }
        return view('Error404'); */
    }

    public function showAlumnoSexo(Request $request)
    {
        $data = $request['params']['data'];
        $año = $data["año"];
        $nivel = $data["nivel"];
        $grado = $data["grado"];
        $seccion = $data["seccion"];

        $sexos = ['Masculino', 'Femenino'];
        $totales = [];
        $f = 0;
        $m = 0;
        $dataOrm = Gsa::where('niv_id', $nivel)->where('is_deleted', '!=', 1)->get();
        foreach ($dataOrm as $d) {
            $data2 = Matricula::where('ags_id', $d->ags_id)->first();
            if ($data2 !== null) {
                $data3 = Alumno::where('alu_id', $data2->alu_id)->first();
                $data4 = Persona::where('per_id', $data3->per_id)->first();
                if ($data4->per_sexo == 'M') {
                    $m += 1;
                } else {
                    $f += 1;
                }
            }
        }
        $cantidades = [$m, $f];

        return response()->json([
            'sexos' => $sexos,
            'totales' => $cantidades
        ]);

        /* if ($request->ajax()) {
            return response()->json([
                'sexos' => $sexos,
                'totales' => $cantidades
            ]);
        }
        return view('Error404'); */
    }

    public function showDocenteCurso(Request $request)
    {
        $data = $request['params']['data'];
        $año = $data["año"];
        $nivel = $data["nivel"];
        $grado = $data["grado"];
        $seccion = $data["seccion"];

        $turno = $nivel == 1 ? 'Mañana' : 'Tarde';

        $cursos = [];
        $totales = [];
        $data = Curso::selectRaw('cur_nombre, cur_abreviatura')->where('cur_horas', '>', 0)->where('niv_id', $nivel)->where('is_deleted', '!=', 1)->groupBy('cur_nombre', 'cur_abreviatura')->get();
        $total = count($data);
        foreach ($data as $d) {
            array_push($cursos, $d->cur_nombre);
            $data2 = AsignarCurso::where('curso', $d->cur_nombre)->where('asig_is_deleted', '!=', 1)->get();
            array_push($totales, count($data2));
        }

        return response()->json([
            'cursos' => $cursos,
            'totales' => $totales,
            'total' => $total,
        ]);

        /* if ($request->ajax()) {
            return response()->json([
                'cursos' => $cursos,
                'totales' => $totales,
                'total' => $total,
            ]);
        }
        return view('Error404'); */
    }

    public function showVacantesSeccion(Request $request)
    {
        $data = $request['params']['data'];
        $año = $data["año"];
        $nivel = $data["nivel"];
        $grado = $data["grado"];
        $seccion = $data["seccion"];

        $seccion = [];
        $totales = [];
        $data = Grado::where('niv_id', $nivel)->get();
        $total = count($data);
        foreach ($data as $d) {
            array_push($seccion, $d->gra_descripcion);
            $data2 = Seccion::where('gra_id', $d->gra_id)->where('sec_is_delete', '!=', 1)->sum('sec_vacantes');
            array_push($totales, $data2);
        }

        return response()->json([
            'seccion' => $seccion,
            'totales' => $totales,
            'total' => $total,
        ]);

        /* if ($request->ajax()) {
            return response()->json([
                'seccion' => $seccion,
                'totales' => $totales,
                'total' => $total,
            ]);
        }
        return view('Error404'); */
    }

    public function buscarInfoAlumno(Request $request)
    {
        $buscar = $request['params']['buscar'];

        $persona = Persona::where('per_dni', $buscar)->first();
        if ($persona) {
            $alumno = Alumno::where('per_id', $persona->per_id)->first();
            if ($alumno) {
                $apoderado = Apoderado::where('apo_id', $alumno->apo_id)->first();
                $apo_persona = Persona::where('per_id', $apoderado->per_id)->first();
                $matricula = Matricula::where('alu_id', $alumno->alu_id)->first();
                if ($matricula) {
                    $gsa = Gsa::where('ags_id', $matricula->ags_id)->first();
                    $aula = Aula::where('ala_id', $gsa->ala_id)->first();
                    $nivel = Nivel::where('niv_id', $gsa->niv_id)->first();
                    $grado = Grado::where('gra_id', $gsa->gra_id)->first();
                    $seccion = Seccion::where('sec_id', $gsa->sec_id)->first();

                    if ($apo_persona->per_nombres == "") {
                        $persona->apo_nombre_completo = $apo_persona->per_nombre_completo;
                    } else {
                        $persona->apo_nombre_completo = $apo_persona->per_apellidos . ' ' . $apo_persona->per_nombres;
                    }
                    $persona->apo_nombres = $apo_persona->per_nombres;
                    $persona->apo_apellidos = $apo_persona->per_apellidos;
                    $persona->apo_parentesco = $apoderado->apo_parentesco;
                    $persona->apo_vive_con_estudiante = $apoderado->apo_vive_con_estudiante;
                    $persona->alu_id = $alumno->alu_id;
                    $persona->apo_id = $alumno->apo_id;
                    $persona->aula = $aula->ala_descripcion;
                    $persona->aula_ubicacion = $aula->ala_ubicacion;
                    $persona->idNivel = $nivel->niv_id;
                    $persona->nivel = $nivel->niv_descripcion;
                    $persona->idGrado = $grado->gra_id;
                    $persona->grado = $grado->gra_descripcion;
                    $persona->idSeccion = $seccion->sec_id;
                    $persona->seccion = $seccion->sec_descripcion;
                    $persona->isMatriculado = 1;
                    $persona->libreta_notas = $alumno->name_libreta_notas;
                    $persona->ficha_matricula = $alumno->name_ficha_matricula;
                    $persona->evaluar = 2;
                    $persona->mensaje = "Alumno Encontrado";
                } else {
                    $persona->isMatriculado = 0;
                    $persona->evaluar = 3;
                    $persona->mensaje = "El DNI ingresado no esta matriculado";
                }
            } else {
                $persona->evaluar = 1;
                $persona->mensaje = "El DNI ingresado no esta registrado";
            }
        } else {
            $persona->evaluar = 0;
            $persona->mensaje = "El DNI ingresado no esta registrado";
        }
        return response()->json($persona);

        /* if ($request->ajax()) {
            return response()->json($persona);
        }
        return view('Error404'); */
    }

    public function generarFichaMatricula(Request $request)
    {
        $data = $request['params']['data'];

        $año = Anio::where('año_estado', 1)->first();

        $Persona = Persona::where('per_id', $data["per_id"])->first();
        $departamento = Departamento::where('idDepa', $Persona->per_departamento)->first();
        $provincia = Provincia::where('idProv', $Persona->per_provincia)->first();
        $distrito = Distrito::where('idDist', $Persona->per_distrito)->first();

        $alumno = $data["per_nombres"] . " " . $data["per_apellidos"];

        if (isset($data["per_nombre_completo"]) == false) {
            $alumno = $data["per_nombres"] . " " . $data["per_apellidos"];
        } else {
            $alumno = $data["per_nombre_completo"];
        }
        $idNivel = $data["idNivel"];
        $nivel = $data["nivel"];
        $idGrado = $data["idGrado"];
        $grado = $data["grado"];
        $idSeccion = $data["idSeccion"];
        $seccion = $data["seccion"];

        $apoderado = $data["apo_nombre_completo"];
        $parentesco = $data["apo_parentesco"];
        $vive = $data["apo_vive_con_estudiante"];
        $dni = $data["per_dni"];
        $email = $data["per_email"];
        $estadoCivil = $data["per_estado_civil"];
        $fechaNacimiento = explode("-", $data["per_fecha_nacimiento"]);
        $sexo = $data["per_sexo"];
        $direccion = $data["per_direccion"];
        $celular = $data["per_celular"];
        $pais = $data["per_pais"];
        $departamento = ($Persona->per_departamento == 0 ? 'LA LIBERTAD' : $departamento->departamento);
        $provincia = ($Persona->per_provincia == 0 ? 'CHEPÉN' : $provincia->provincia);
        $distrito = ($Persona->per_distrito == 0 ? 'CHEPÉN' : $distrito->distrito);

        // Obteniendo imagen y convintiendolo a base64
        $imagenPath = 'public/cao/escudoMinedu.png';

        if (!Storage::exists($imagenPath)) {
            // La imagen no existe, carga una imagen predeterminada desde la carpeta public
            $imagenPredeterminadaPath = public_path('escudoMinedu.png');
            // Luego, guarda la imagen predeterminada en el almacenamiento
            Storage::put($imagenPath, file_get_contents($imagenPredeterminadaPath));
        }
        $educacion = Storage::path($imagenPath);
        $contenidoBinario1 = file_get_contents($educacion);
        $imagenEducacion = base64_encode($contenidoBinario1);

        $nombreDocumento = "FICHA DE MATRICULA - " . $alumno . ".pdf";

        // Creando Pdf
        include_once "../vendor/autoload.php";
        $dompdf = new Dompdf();
        $dompdf->setPaper('A3', 'landscape');

        // src="data:image/jpg;base64,'.$imagenEducacion.'"
        // src="data:image/jpg;base64,'.$imagenCAO.'"
        $dompdf->loadHtml('
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>' . $nombreDocumento . '</title>
            </head>
            <style>
                body {
                    font-family: sans-serif;
                    font-size: 0.75rem;
                }
                .logo {
                    width: 6rem;
                    height: 6rem;
                    object-fit: fill;
                }
                .title-minedu {
                    font-family: Times New Roman, Times, serif;
                    margin: 0;
                }
                .table {
                    border-collapse: collapse;
                }
                .table tr th,
                .table tr td {
                    padding: .25rem .125rem;
                    border: 1px solid black;
                }
                .box-1 {
                    height: 0.7rem;
                    width: 1.75rem;
                }
                .p-1 {
                    padding: .25rem;
                }
                .bg-gray {
                    background-color: #d3d3d3;
                    font-weight: 600;
                }
                .rotation {
                    writing-mode: vertical-rl;
                    transform: rotate(180deg);
                    text-align: center;
                }
            </style>
            <body>
                <table style="margin-bottom: 2.5rem;">
                    <tbody>
                        <tr>
                            <td width="20%" align="center">
                                <img src="data:image/jpg;base64,' . $imagenEducacion . '" alt="escudo" class="logo" />
                                <h4 class="title-minedu">Ministerio de Educación</h4>
                            </td>
                            <td width="50%">
                                <h1 align="center">FICHA ÚNICA DE MATRÍCULA</h1>
                            </td>
                            <td width="30%">
                                <table width="100%" class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="14" class="bg-gray">Tipo de Documento de Identidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th colspan="2" align="left" class="bg-gray">D.N.I</th>
                                            <td colspan="2" align="center">X</td>
                                            <th class="bg-gray">C.E</th>
                                            <td colspan="2"></td>
                                            <th colspan="2" class="bg-gray">Otro</th>
                                            <td></td>
                                            <th class="bg-gray" colspan="4">Especificar</th>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="bg-gray" align="left">N°</th>
                                            <td align="center" class="box-1">' . $dni[0] . '</td>
                                            <td align="center" class="box-1">' . $dni[1] . '</td>
                                            <td align="center" class="box-1">' . $dni[2] . '</td>
                                            <td align="center" class="box-1">' . $dni[3] . '</td>
                                            <td align="center" class="box-1">' . $dni[4] . '</td>
                                            <td align="center" class="box-1">' . $dni[5] . '</td>
                                            <td align="center" class="box-1">' . $dni[6] . '</td>
                                            <td align="center" class="box-1">' . $dni[7] . '</td>
                                            <td colspan="4"></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-gray" align="center" colspan="10">Código del Estudiante</th>
                                            <td class="bg-gray" colspan="4"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="p-1">
                                                <div style="height: 70px; text-align: center;">
                                                    Año de ingreso
                                                </div>
                                            </td>
                                            <td class="p-1" colspan="7">
                                                <div style="height: 70px; text-align: center;">
                                                    Código matricular de la Institución Educativa donde ingresó
                                                </div>
                                            </td>
                                            <td class="p-1" colspan="4">
                                                <div style="height: 70px; text-align: center;">
                                                    N° de Matricula generado por la Institución Educativa
                                                </div>
                                            </td>
                                            <td class="p-1">
                                                <div style="height: 70px; text-align: center;">
                                                    Flag
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="box-1"></td>
                                            <td class="box-1"></td>
                                            <td class="box-1"></td>
                                            <td class="box-1"></td>
                                            <td class="box-1"></td>
                                            <td class="box-1"></td>
                                            <td class="box-1"></td>
                                            <td class="box-1"></td>
                                            <td class="box-1"></td>
                                            <td class="box-1"></td>
                                            <td class="box-1"></td>
                                            <td class="box-1"></td>
                                            <td class="box-1"></td>
                                            <td class="box-1"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="14" style="border: none; font-size: 11px;">
                                                (Registrar sólo N° de D.N.I. El código del estudiante se anotará únicamente en caso
                                                de que el estudiante no tenga DNI. Este número será el único que utilizará durante
                                                su permanecia en el Sistema Educativo)
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <b>1. Datos Generales del Estudiante</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <b>1.1 Datos Personales</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%" class="table" style="text-align: center;">
                                    <tbody>
                                        <tr>
                                            <th class="bg-gray">Apellidos y Nombres</th>
                                            <th class="bg-gray" colspan="4">Sexo</th>
                                            <th class="bg-gray">Estado Civil(1)</th>
                                            <th class="bg-gray" colspan="4">Nacimiento Registrado(2)</th>
                                        </tr>
                                        <tr>
                                            <td align="center">' . $alumno . '</td>
                                            <td align="center" class="box-1">H</td>
                                            <td align="center" class="box-1">' . ($sexo == 'M' ? 'X' : '') . '</td>
                                            <td align="center" class="box-1">M</td>
                                            <td align="center" class="box-1">' . ($sexo == 'F' ? 'X' : '') . '</td>
                                            <td>SOLTERO</td>
                                            <td align="center" class="box-1">Sí</td>
                                            <td align="center" class="box-1">X</td>
                                            <td align="center" class="box-1">No</td>
                                            <td align="center" class="box-1"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" style="margin-bottom: 2.5rem;">
                    <tbody>
                        <tr>
                            <td width="50%"></td>
                            <th width="25%">1.1.1 Desarrollo del Estudiante</th>
                            <td width="25%">(Obligatorio para nivel inicial)</td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" class="table" style="text-align: center;">
                                    <tbody>
                                        <tr>
                                            <td rowspan="2" class="bg-gray">Fecha de Nacimiento</td>
                                            <td class="bg-gray">Día</td>
                                            <td class="bg-gray">Mes</td>
                                            <td class="bg-gray">Año</td>
                                            <td rowspan="2" class="bg-gray">Lengua Materna</td>
                                            <td rowspan="2" colspan="12">CASTELLANO</td>
                                        </tr>
                                        <tr>
                                            <td align="center">' . $fechaNacimiento[2] . '</td>
                                            <td align="center">' . $fechaNacimiento[1] . '</td>
                                            <td align="center">' . $fechaNacimiento[0] . '</td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray">Lugar de nacimiento</td>
                                            <td colspan="3">' . $distrito . '</td>
                                            <td class="bg-gray">Segunda lengua</td>
                                            <td colspan="12">NINGUNO</td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray">País</td>
                                            <td colspan="3">' . $pais . '</td>
                                            <td class="bg-gray">Religión</td>
                                            <td colspan="12"></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray">Departamento</td>
                                            <td colspan="3">' . $departamento . '</td>
                                            <td class="bg-gray">Número de hermanos</td>
                                            <td colspan="3"></td>
                                            <td class="bg-gray" colspan="6">Lugar que ocupa</td>
                                            <td colspan="3"></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray">Provincia</td>
                                            <td colspan="3">' . $provincia . '</td>
                                            <td class="bg-gray">Tipo de Discapacidad(3)</td>
                                            <td class="box-1 bg-gray" align="center">DI</td>
                                            <td class="box-1" align="center"></td>
                                            <td class="box-1 bg-gray" align="center">DA</td>
                                            <td class="box-1" align="center"></td>
                                            <td class="box-1 bg-gray" align="center">DV</td>
                                            <td class="box-1" align="center"></td>
                                            <td class="box-1 bg-gray" align="center">DM</td>
                                            <td class="box-1" align="center"></td>
                                            <td class="box-1 bg-gray" align="center">SC</td>
                                            <td class="box-1" align="center"></td>
                                            <td class="box-1 bg-gray" align="center">OT</td>
                                            <td class="box-1" align="center"></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray">Distrito</td>
                                            <td colspan="3">' . $distrito . '</td>
                                            <td class="bg-gray">Certif. de discapacidad *</td>
                                            <td class="bg-gray" colspan="4">Tiene:</td>
                                            <td colspan="2" align="center"></td>
                                            <td class="bg-gray" colspan="4">No tiene:</td>
                                            <td colspan="2" align="center">X</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 2.125rem;" colspan="17"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table width="100%" class="table" style="text-align: center;">
                                    <tbody>
                                        <tr>
                                            <td class="bg-gray" colspan="4" align="center">Nacimiento</td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray" align="center">Normal</td>
                                            <td class="box-1"></td>
                                            <td class="bg-gray" align="center">Cesárea</td>
                                            <td class="box-1"></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray" colspan="3" align="center">Con complicaciones</td>
                                            <td class="box-1"></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray" colspan="4" align="center">Observaciones</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="height: 6.125rem;">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table width="100%" class="table" style="text-align: center;">
                                    <tbody>
                                        <tr>
                                            <td class="bg-gray" align="center">Apecto</td>
                                            <td class="bg-gray" align="center">Actividad</td>
                                            <td class="bg-gray" align="center">Edad</td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray" rowspan="6" align="center">Psicomotriz</td>
                                            <td class="bg-gray">Levantó la cabeza</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray">Se sentó</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray">Gateó</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray">Se paró</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray">Caminó</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray">Controló sus esfínteres</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray" rowspan="2" align="center">Lenguaje</td>
                                            <td class="bg-gray">Habló las primeras palabras</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray">Habló con fluidez</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" style="margin-bottom: 5.5rem;">
                    <tbody>
                        <tr>
                            <td width="55%"><b>1.1.2 Controles de Salud del Estudiante</b></td>
                            <td width="45%"><b>1.1.3 Estado de salud del Estudiante</b></td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" class="table" style="text-align: center;">
                                    <tbody>
                                        <tr>
                                            <td colspan="8" class="bg-gray">Control de Peso - Talla</td>
                                            <td colspan="8" class="bg-gray">Otros Controles</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="bg-gray">Fecha</td>
                                            <td rowspan="2" class="bg-gray">Peso</td>
                                            <td rowspan="2" class="bg-gray">Talla</td>
                                            <td rowspan="2" colspan="3" class="bg-gray">Observaciones</td>

                                            <td colspan="3" class="bg-gray">Fecha</td>
                                            <td rowspan="2" class="bg-gray">Tipo de Control</td>
                                            <td rowspan="2" colspan="4" class="bg-gray">Resultado</td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray">Día</td>
                                            <td class="bg-gray">Mes</td>
                                            <td class="bg-gray">Año</td>
                                            <td class="bg-gray">Día</td>
                                            <td class="bg-gray">Mes</td>
                                            <td class="bg-gray">Año</td>
                                        </tr>
                                        <tr>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;" colspan="3"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;" colspan="4"></td>
                                        </tr>
                                        <tr>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;" colspan="3"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;" colspan="4"></td>
                                        </tr>
                                        <tr>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;" colspan="3"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;" colspan="4"></td>
                                        </tr>
                                        <tr>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;" colspan="3"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;" colspan="4"></td>
                                        </tr>
                                        <tr>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;" colspan="3"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;" colspan="4"></td>
                                        </tr>
                                        <tr>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;" colspan="3"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;" colspan="4"></td>
                                        </tr>
                                        <tr>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;" colspan="3"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;" colspan="4"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 1.125rem;" colspan="16"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table width="100%" class="table" style="text-align: center;">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Enfermedades sufridas</td>
                                            <td colspan="2" class="bg-gray">Vacunas</td>
                                            <td colspan="4" class="bg-gray">Alergias</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" class="bg-gray">Edad aprox.</td>
                                            <td colspan="1" class="bg-gray">Enfermedad</td>
                                            <td colspan="1" class="bg-gray">Edad aprox.</td>
                                            <td colspan="1" class="bg-gray">Enfermedad</td>
                                            <td rowspan="3" colspan="4"></td>
                                        </tr>
                                        <tr>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                            <td colspan="4" class="bg-gray">Eperiencias Traumáticas</td>
                                        </tr>
                                        <tr>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                            <td rowspan="3" colspan="4"></td>
                                        </tr>
                                        <tr>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                            <td style="height: 0.7rem;"></td>
                                            <td rowspan="2" colspan="2" class="bg-gray">Tipo de Sangre</td>
                                            <td rowspan="2" colspan="2" style="width: 5rem;"></td>
                                        </tr>
                                        <tr>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                            <td  style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 1.125rem;" colspan="8"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" style="margin-bottom: 2.5rem;">
                    <tbody>
                        <tr>
                            <td width="60%"><b>1.1.4 Datos del domicilio del Estudiante</b></td>
                            <td width="40%"><b>1.1.4 Datos de los padres</b></td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" class="table" style="text-align: center;">
                                    <tbody>
                                        <tr>
                                            <td colspan="1" class="bg-gray">Año</td>
                                            <td colspan="3" class="bg-gray">Direcciòn</td>
                                            <td colspan="2" class="bg-gray">Lugar</td>
                                            <td colspan="3" class="bg-gray">Departamento</td>
                                            <td colspan="2" class="bg-gray">Provincia</td>
                                            <td colspan="2" class="bg-gray">Distrito</td>
                                            <td colspan="2" class="bg-gray">Teléfono</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;">' . $año->año_descripcion . '</td>
                                            <td colspan="3" style="height: 0.7rem;">' . $direccion . '</td>
                                            <td colspan="2" style="height: 0.7rem;">' . $distrito . '</td>
                                            <td colspan="3" style="height: 0.7rem;">' . $departamento . '</td>
                                            <td colspan="2" style="height: 0.7rem;">' . $provincia . '</td>
                                            <td colspan="2" style="height: 0.7rem;">' . $distrito . '</td>
                                            <td colspan="2" style="height: 0.7rem;">' . $celular . '</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="3" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 1.125rem;" colspan="15"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table width="100%" class="table" style="text-align: center;">
                                    <tbody>
                                        <tr>
                                            <td colspan="1" class="bg-gray">Datos</td>
                                            <td colspan="4" class="bg-gray">Padre</td>
                                            <td colspan="4" class="bg-gray">Madre</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" class="bg-gray">Apellidos y nombres</td>
                                            <td colspan="4"></td>
                                            <td colspan="4">' . $apoderado . '</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" class="bg-gray">Vive</td>
                                            <td colspan="1" class="bg-gray">Si</td>
                                            <td colspan="1" class="box-1">' . ($parentesco == 'PADRE' ? ($vive == 1 ? 'X' : '') : '') . '</td>
                                            <td colspan="1" class="bg-gray">No</td>
                                            <td colspan="1" class="box-1">' . ($parentesco == 'PADRE' ? ($vive == 0 ? 'X' : '') : '') . '</td>
                                            <td colspan="1" class="bg-gray">Si</td>
                                            <td colspan="1" class="box-1">' . ($parentesco == 'MADRE' ? ($vive == 1 ? 'X' : '') : '') . '</td>
                                            <td colspan="1" class="bg-gray">No</td>
                                            <td colspan="1" class="box-1">' . ($parentesco == 'MADRE' ? ($vive == 0 ? 'X' : '') : '') . '</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" colspan="1" class="bg-gray">Fecha de Nacimiento</td>
                                            <td colspan="1" class="bg-gray">Dia</td>
                                            <td colspan="1" class="bg-gray">Mes</td>
                                            <td colspan="2" class="bg-gray">Año</td>
                                            <td colspan="1" class="bg-gray">Dia</td>
                                            <td colspan="1" class="bg-gray">Mes</td>
                                            <td colspan="2" class="bg-gray">Año</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" class="bg-gray">Ocupación</td>
                                            <td colspan="4"></td>
                                            <td colspan="4"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" class="bg-gray">Vive con el Estudiante</td>
                                            <td colspan="1" class="bg-gray">Si</td>
                                            <td colspan="1" class="box-1">' . ($parentesco == 'PADRE' ? ($vive == 1 ? 'X' : '') : '') . '</td>
                                            <td colspan="1" class="bg-gray">No</td>
                                            <td colspan="1" class="box-1">' . ($parentesco == 'PADRE' ? ($vive == 0 ? 'X' : '') : '') . '</td>
                                            <td colspan="1" class="bg-gray">Si</td>
                                            <td colspan="1" class="box-1">' . ($parentesco == 'MADRE' ? ($vive == 1 ? 'X' : '') : '') . '</td>
                                            <td colspan="1" class="bg-gray">No</td>
                                            <td colspan="1" class="box-1">' . ($parentesco == 'MADRE' ? ($vive == 0 ? 'X' : '') : '') . '</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" class="bg-gray">Religión</td>
                                            <td colspan="4">' . ($parentesco == 'PADRE' ? 'Católica' : '') . '</td>
                                            <td colspan="4">' . ($parentesco == 'MADRE' ? 'Católica' : '') . '</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 1.125rem;" colspan="9"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" style="margin-bottom: 20.5rem;">
                    <tbody>
                        <tr>
                            <td width="50%"><b>1.1.5 Datos de la situación laboral de los estudiantes que trabajen</b></td>
                            <td width="50%"></td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" class="table" style="text-align: center;">
                                    <tbody>
                                        <tr>
                                            <td rowspan="2" colspan="1" class="bg-gray">Año</td>
                                            <td rowspan="2" colspan="1" class="bg-gray">Edad</td>
                                            <td colspan="8" class="bg-gray">Descripcion de la actividad laboral(4)</td>
                                            <td rowspan="2" colspan="2" class="bg-gray">Horas Semanales de trabajo</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" class="box-1 bg-gray">OB</td>
                                            <td colspan="1" class="box-1 bg-gray">EM</td>
                                            <td colspan="1" class="box-1 bg-gray">TI</td>
                                            <td colspan="1" class="box-1 bg-gray">E/O</td>
                                            <td colspan="1" class="box-1 bg-gray">TF</td>
                                            <td colspan="1" class="box-1 bg-gray">TH</td>
                                            <td colspan="2" class="box-1 bg-gray">Especificar</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 0.125rem;" colspan="12"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="12" style="border: none; font-size: 10px;text-align: left;">
                                                <b>(1)</b> S: Soltero, C: Casado, V: Viudo, D: Divorciado, Cv: Conviviente
                                                <br>
                                                <b>(2)</b> (Si) si cuenta con partida de nacimiento; (No) no ha sido inscrito en el registro civil
                                                <br>
                                                <b>(4)</b> (OB) Obrero, (EM) Empleado, (TI) Trabajo Independiente, (E/O) Empleador, (TF) Trabaj. Fam. No Remunerado, (TH) Trabaj. Del Hogar
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 1.125rem;" colspan="12"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table width="100%" class="table" style="text-align: center;">
                                    <tbody>
                                        <tr>
                                            <td rowspan="2" colspan="1" class="bg-gray">Año</td>
                                            <td rowspan="2" colspan="1" class="bg-gray">Edad</td>
                                            <td colspan="8" class="bg-gray">Descripcion de la actividad laboral(4)</td>
                                            <td rowspan="2" colspan="2" class="bg-gray">Horas Semanales de trabajo</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" class="box-1 bg-gray">OB</td>
                                            <td colspan="1" class="box-1 bg-gray">EM</td>
                                            <td colspan="1" class="box-1 bg-gray">TI</td>
                                            <td colspan="1" class="box-1 bg-gray">E/O</td>
                                            <td colspan="1" class="box-1 bg-gray">TF</td>
                                            <td colspan="1" class="box-1 bg-gray">TH</td>
                                            <td colspan="2" class="box-1 bg-gray">Especificar</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="1" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                            <td colspan="2" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 0.125rem;" colspan="12"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="12" style="border: none; font-size: 10px;text-align: left;">
                                                <b>(1)</b> S: Soltero, C: Casado, V: Viudo, D: Divorciado, Cv: Conviviente
                                                <br>
                                                <b>(2)</b> (Si) si cuenta con partida de nacimiento; (No) no ha sido inscrito en el registro civil
                                                <br>
                                                <b>(4)</b> (OB) Obrero, (EM) Empleado, (TI) Trabajo Independiente, (E/O) Empleador, (TF) Trabaj. Fam. No Remunerado, (TH) Trabaj. Del Hogar
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 1.125rem;" colspan="12"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" style="margin-bottom: 2.5rem;">
                    <tbody>
                        <tr>
                            <td colspan="3">
                                <b>2. Datos de la Escolaridad del Estudiante</b>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%"><b>2.1 Matricula</b></td>
                            <td width="85%"></td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" class="table" style="text-align: left; font-size: 10px;">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="bg-gray"><b>Datos / Años</b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Nombre de la IE</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Código Modular</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Departamento</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Provincia</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Distrito</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Instancia de Gestion Educativa</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Nivel</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Modalidad(1)</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Programa(Sólo EBA)(2)</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Ciclo(Sólo EBA)(3)</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Forma(4)</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Grado</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Sección</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Turno(5)</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Situación final(6)</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Año Lectivo</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Recuperación Pedagógica</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 1.125rem;" colspan="2"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table width="100%" class="table" style="text-align: center;font-size: 10px;">
                                    <tbody>
                                        <tr>
                                            <td colspan="5" class="bg-gray">' . (intval($año->año_descripcion) + 0) . '</td>
                                            <td colspan="5" class="bg-gray">' . (intval($año->año_descripcion) + 1) . '</td>
                                            <td colspan="5" class="bg-gray">' . (intval($año->año_descripcion) + 2) . '</td>
                                            <td colspan="5" class="bg-gray">' . (intval($año->año_descripcion) + 3) . '</td>
                                            <td colspan="5" class="bg-gray">' . (intval($año->año_descripcion) + 4) . '</td>
                                            <td colspan="5" class="bg-gray">' . (intval($año->año_descripcion) + 5) . '</td>
                                            <td colspan="5" class="bg-gray">' . (intval($año->año_descripcion) + 6) . '</td>
                                            <td colspan="5" class="bg-gray">' . (intval($año->año_descripcion) + 7) . '</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="height: 0.7rem;">I.E.P 82857 LIVES</td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="height: 0.7rem;">' . ($departamento) . '</td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="height: 0.7rem;">' . ($provincia) . '</td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="height: 0.7rem;">' . ($distrito) . '</td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="height: 0.7rem;">UGEL SAN MIGUEL</td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="height: 0.7rem;">' . ($nivel) . '</td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="height: 0.7rem;">EBR</td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="height: 0.7rem;">ESCOLARIZADO</td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="height: 0.7rem;">' . ($grado) . '</td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="height: 0.7rem;">' . ($seccion) . '</td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="height: 0.7rem;">MAÑANA</td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                            <td colspan="5" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" class="box-1">A</td>
                                            <td colspan="1" class="box-1">RR</td>
                                            <td colspan="1" class="box-1">D</td>
                                            <td colspan="1" class="box-1">R</td>
                                            <td colspan="1" class="box-1">P</td>
                                            <td colspan="1" class="box-1">A</td>
                                            <td colspan="1" class="box-1">RR</td>
                                            <td colspan="1" class="box-1">D</td>
                                            <td colspan="1" class="box-1">R</td>
                                            <td colspan="1" class="box-1">P</td>
                                            <td colspan="1" class="box-1">A</td>
                                            <td colspan="1" class="box-1">RR</td>
                                            <td colspan="1" class="box-1">D</td>
                                            <td colspan="1" class="box-1">R</td>
                                            <td colspan="1" class="box-1">P</td>
                                            <td colspan="1" class="box-1">A</td>
                                            <td colspan="1" class="box-1">RR</td>
                                            <td colspan="1" class="box-1">D</td>
                                            <td colspan="1" class="box-1">R</td>
                                            <td colspan="1" class="box-1">P</td>
                                            <td colspan="1" class="box-1">A</td>
                                            <td colspan="1" class="box-1">RR</td>
                                            <td colspan="1" class="box-1">D</td>
                                            <td colspan="1" class="box-1">R</td>
                                            <td colspan="1" class="box-1">P</td>
                                            <td colspan="1" class="box-1">A</td>
                                            <td colspan="1" class="box-1">RR</td>
                                            <td colspan="1" class="box-1">D</td>
                                            <td colspan="1" class="box-1">R</td>
                                            <td colspan="1" class="box-1">P</td>
                                            <td colspan="1" class="box-1">A</td>
                                            <td colspan="1" class="box-1">RR</td>
                                            <td colspan="1" class="box-1">D</td>
                                            <td colspan="1" class="box-1">R</td>
                                            <td colspan="1" class="box-1">P</td>
                                            <td colspan="1" class="box-1">A</td>
                                            <td colspan="1" class="box-1">RR</td>
                                            <td colspan="1" class="box-1">D</td>
                                            <td colspan="1" class="box-1">R</td>
                                            <td colspan="1" class="box-1">P</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                            <td colspan="1" class="box-1"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 1.125rem;" colspan="40"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" style="margin-bottom: 2.5rem;">
                    <tbody>
                        <tr>
                            <td width="100%"><b>2.2 Traslados</b></td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" class="table" style="text-align: center;">
                                    <tbody>
                                        <tr>
                                            <td colspan="3" class="bg-gray">Fecha</td>
                                            <td colspan="5" class="bg-gray">Motivo de translado</td>
                                            <td colspan="14" class="bg-gray">Institución Educativa de Destino</td>
                                            <td colspan="2" class="bg-gray">V° B° de Traslados</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" class="bg-gray">Día</td>
                                            <td colspan="1" class="bg-gray">Mes</td>
                                            <td colspan="1" class="bg-gray">Año</td>
                                            <td colspan="5" class="bg-gray">Descripción</td>
                                            <td colspan="7" class="bg-gray">Código Modular</td>
                                            <td colspan="7" class="bg-gray">Nombre</td>
                                            <td colspan="2" class="bg-gray">Firma y Post firma del Director de la I.E que autoriza el traslado</td>
                                        </tr>
                                        <tr>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td colspan="5"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td colspan="7"></td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td colspan="5"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td colspan="7"></td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td colspan="5"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td colspan="7"></td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td colspan="5"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td colspan="7"></td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td colspan="5"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td colspan="7"></td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td colspan="5"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td colspan="7"></td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td colspan="5"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td class="box-1" colspan="1"></td>
                                            <td colspan="7"></td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 1.125rem;" colspan="24"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" style="margin-bottom: 5.5rem;">
                    <tbody>
                        <tr>
                            <td colspan="3">
                                <b>3. Responsable de la Matricula en la Institcuión Educativa y Fecha </b>
                            </td>
                        </tr>
                        <tr>
                            <td width="10%"></td>
                            <td width="90%"></td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" class="table" style="text-align: left; font-size: 10px;">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="bg-gray"><b>Datos / Años</b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray" style="height: 2.125rem;">Fecha</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Apellidos y Nonbres</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Cargo</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 1.125rem;" colspan="2"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table width="100%" class="table" style="text-align: center;font-size: 10px;">
                                    <tbody>
                                        <tr>
                                            <td colspan="6" class="bg-gray">' . (intval($año->año_descripcion) + 0) . '</td>
                                            <td colspan="6" class="bg-gray">' . (intval($año->año_descripcion) + 1) . '</td>
                                            <td colspan="6" class="bg-gray">' . (intval($año->año_descripcion) + 2) . '</td>
                                            <td colspan="6" class="bg-gray">' . (intval($año->año_descripcion) + 3) . '</td>
                                            <td colspan="6" class="bg-gray">' . (intval($año->año_descripcion) + 4) . '</td>
                                            <td colspan="6" class="bg-gray">' . (intval($año->año_descripcion) + 5) . '</td>
                                            <td colspan="6" class="bg-gray">' . (intval($año->año_descripcion) + 6) . '</td>
                                            <td colspan="6" class="bg-gray">' . (intval($año->año_descripcion) + 7) . '</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="box-1 bg-gray">Dia</td>
                                            <td colspan="2" class="box-1 bg-gray">Mes</td>
                                            <td colspan="2" class="box-1 bg-gray">Año</td>
                                            <td colspan="2" class="box-1 bg-gray">Dia</td>
                                            <td colspan="2" class="box-1 bg-gray">Mes</td>
                                            <td colspan="2" class="box-1 bg-gray">Año</td>
                                            <td colspan="2" class="box-1 bg-gray">Dia</td>
                                            <td colspan="2" class="box-1 bg-gray">Mes</td>
                                            <td colspan="2" class="box-1 bg-gray">Año</td>
                                            <td colspan="2" class="box-1 bg-gray">Dia</td>
                                            <td colspan="2" class="box-1 bg-gray">Mes</td>
                                            <td colspan="2" class="box-1 bg-gray">Año</td>
                                            <td colspan="2" class="box-1 bg-gray">Dia</td>
                                            <td colspan="2" class="box-1 bg-gray">Mes</td>
                                            <td colspan="2" class="box-1 bg-gray">Año</td>
                                            <td colspan="2" class="box-1 bg-gray">Dia</td>
                                            <td colspan="2" class="box-1 bg-gray">Mes</td>
                                            <td colspan="2" class="box-1 bg-gray">Año</td>
                                            <td colspan="2" class="box-1 bg-gray">Dia</td>
                                            <td colspan="2" class="box-1 bg-gray">Mes</td>
                                            <td colspan="2" class="box-1 bg-gray">Año</td>
                                            <td colspan="2" class="box-1 bg-gray">Dia</td>
                                            <td colspan="2" class="box-1 bg-gray">Mes</td>
                                            <td colspan="2" class="box-1 bg-gray">Año</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 1.125rem;" colspan="48"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" style="margin-bottom: 2.5rem;">
                    <tbody>
                        <tr>
                            <td colspan="3">
                                <b>4. Datos del Representante Legal </b>
                            </td>
                        </tr>
                        <tr>
                            <td width="10%"></td>
                            <td width="90%"></td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" class="table" style="text-align: left; font-size: 10px;">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="bg-gray"><b>Datos / Años</b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Apellidos Paterno</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Apellidos Materno</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Nombres</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Parentesco</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray" style="height: 2.125rem;">Fecha de nacimiento</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Grado de Instrucc.</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Ocupación</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Domicilio</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Teléfono</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 1.125rem;" colspan="2"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table width="100%" class="table" style="text-align: center;font-size: 10px">
                                    <tbody>
                                        <tr>
                                            <td colspan="6" class="bg-gray">' . (intval($año->año_descripcion) + 0) . '</td>
                                            <td colspan="6" class="bg-gray">' . (intval($año->año_descripcion) + 1) . '</td>
                                            <td colspan="6" class="bg-gray">' . (intval($año->año_descripcion) + 2) . '</td>
                                            <td colspan="6" class="bg-gray">' . (intval($año->año_descripcion) + 3) . '</td>
                                            <td colspan="6" class="bg-gray">' . (intval($año->año_descripcion) + 4) . '</td>
                                            <td colspan="6" class="bg-gray">' . (intval($año->año_descripcion) + 5) . '</td>
                                            <td colspan="6" class="bg-gray">' . (intval($año->año_descripcion) + 6) . '</td>
                                            <td colspan="6" class="bg-gray">' . (intval($año->año_descripcion) + 7) . '</td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="box-1 bg-gray">Dia</td>
                                            <td colspan="2" class="box-1 bg-gray">Mes</td>
                                            <td colspan="2" class="box-1 bg-gray">Año</td>
                                            <td colspan="2" class="box-1 bg-gray">Dia</td>
                                            <td colspan="2" class="box-1 bg-gray">Mes</td>
                                            <td colspan="2" class="box-1 bg-gray">Año</td>
                                            <td colspan="2" class="box-1 bg-gray">Dia</td>
                                            <td colspan="2" class="box-1 bg-gray">Mes</td>
                                            <td colspan="2" class="box-1 bg-gray">Año</td>
                                            <td colspan="2" class="box-1 bg-gray">Dia</td>
                                            <td colspan="2" class="box-1 bg-gray">Mes</td>
                                            <td colspan="2" class="box-1 bg-gray">Año</td>
                                            <td colspan="2" class="box-1 bg-gray">Dia</td>
                                            <td colspan="2" class="box-1 bg-gray">Mes</td>
                                            <td colspan="2" class="box-1 bg-gray">Año</td>
                                            <td colspan="2" class="box-1 bg-gray">Dia</td>
                                            <td colspan="2" class="box-1 bg-gray">Mes</td>
                                            <td colspan="2" class="box-1 bg-gray">Año</td>
                                            <td colspan="2" class="box-1 bg-gray">Dia</td>
                                            <td colspan="2" class="box-1 bg-gray">Mes</td>
                                            <td colspan="2" class="box-1 bg-gray">Año</td>
                                            <td colspan="2" class="box-1 bg-gray">Dia</td>
                                            <td colspan="2" class="box-1 bg-gray">Mes</td>
                                            <td colspan="2" class="box-1 bg-gray">Año</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                            <td colspan="2" class="box-1"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                            <td colspan="6" style="height: 0.7rem;"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 1.125rem;" colspan="48"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" style="margin-bottom: 2.5rem;">
                    <tbody>
                        <tr>
                            <td colspan="3">
                                <b>5. Supervivencia de los Padres</b>
                            </td>
                        </tr>
                        <tr>
                            <td width="10%"></td>
                            <td width="90%"></td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" class="table" style="text-align: left; font-size: 10px;">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="bg-gray"><b>Vive</b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Padre</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="bg-gray">Madre</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 0.125rem;" colspan="2"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table width="100%" class="table" style="text-align: center;font-size: 10px">
                                    <tbody>
                                        <tr>
                                            <td colspan="8" class="bg-gray">' . (intval($año->año_descripcion) + 0) . '</td>
                                            <td colspan="8" class="bg-gray">' . (intval($año->año_descripcion) + 1) . '</td>
                                            <td colspan="8" class="bg-gray">' . (intval($año->año_descripcion) + 2) . '</td>
                                            <td colspan="8" class="bg-gray">' . (intval($año->año_descripcion) + 3) . '</td>
                                            <td colspan="8" class="bg-gray">' . (intval($año->año_descripcion) + 4) . '</td>
                                            <td colspan="8" class="bg-gray">' . (intval($año->año_descripcion) + 5) . '</td>
                                            <td colspan="8" class="bg-gray">' . (intval($año->año_descripcion) + 6) . '</td>
                                            <td colspan="8" class="bg-gray">' . (intval($año->año_descripcion) + 7) . '</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="box-1 bg-gray">Si</td>
                                            <td colspan="2" class="box-1 ">' . ($parentesco == 'PADRE' ? ($vive == 1 ? 'X' : '') : '') . '</td>
                                            <td colspan="2" class="box-1 bg-gray">No</td>
                                            <td colspan="2" class="box-1 ">' . ($parentesco == 'PADRE' ? ($vive == 0 ? 'X' : '') : '') . '</td>
                                            <td colspan="2" class="box-1 bg-gray">Si</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">No</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">Si</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">No</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">Si</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">No</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">Si</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">No</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">Si</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">No</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">Si</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">No</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">Si</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">No</td>
                                            <td colspan="2" class="box-1 "></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="box-1 bg-gray">Si</td>
                                            <td colspan="2" class="box-1 ">' . ($parentesco == 'MADRE' ? ($vive == 1 ? 'X' : '') : '') . '</td>
                                            <td colspan="2" class="box-1 bg-gray">No</td>
                                            <td colspan="2" class="box-1 ">' . ($parentesco == 'MADRE' ? ($vive == 0 ? 'X' : '') : '') . '</td>
                                            <td colspan="2" class="box-1 bg-gray">Si</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">No</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">Si</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">No</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">Si</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">No</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">Si</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">No</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">Si</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">No</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">Si</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">No</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">Si</td>
                                            <td colspan="2" class="box-1 "></td>
                                            <td colspan="2" class="box-1 bg-gray">No</td>
                                            <td colspan="2" class="box-1 "></td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; height: 0.125rem;" colspan="64"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12" style="border: none; font-size: 10px;text-align: left;">
                                <b>(1) Modalidad:</b> (EBR) Edu. Básica Regular, (EBR-AD) Edu. Básica Regular a Distancia, (EBA) Edu. Básica Alternativa, (EBE) Edu. Básica Especial
                                <br>
                                <b>(2) Programa:</b> (PA) Programa de Alfabetización, (PBJ) Prog. de Educ. Bás. Alter. de Jóvenes y Adultos
                                <br>
                                <b>(3) Ciclo:</b> Para el caso de EBA: (IN) Inicial, (INT) Intermedio, (AV) Avanzado
                                <br>
                                <b>(4) Forma:</b> (Esc) Escolarizado, (NoEsc) No Escolarizado; Para el caso de EBA: (P) Presencial, (SP) Semi Presencial, (AD) A distancia
                                <br>
                                <b>(5) Turno:</b> (M) Mañana, (T) Tarde, (N) Noche
                                <br>
                                <b>(6) Situación Final:</b> (Marcar "X" donde corresponda) (A) Aprobado, (RR) Requiere Recuperación, (D) Desaprobado, (R) Retirado; Para el caso de EBA: (RR) Requiere Recuperación, (P) Promovido
                            </td>
                        </tr>
                    </tbody>
                </table>
            </body>
            </html>
        ');

        $dompdf->render();

        $contenido = $dompdf->output();

        $exists = Storage::disk('FichaMatricula')->exists($nombreDocumento);
        if (!$exists) {
            Storage::disk('FichaMatricula')->put($nombreDocumento, $contenido);
            /* Storage::disk('reportes')->delete($nombreDocumento); */
        } else {
            Storage::disk('FichaMatricula')->delete($nombreDocumento);
            Storage::disk('FichaMatricula')->put($nombreDocumento, $contenido);
        }
        $alumno = Alumno::find($data["alu_id"]);
        $alumno->name_ficha_matricula = $nombreDocumento;
        $alumno->save();

        return response()->json([
            "rpta" => 1,
            "documento" => $nombreDocumento
        ]);

        /*if ($request->ajax()) {
            return response()->json([
                "rpta" => 1,
                "documento" => $nombreDocumento
            ]);
        }
        return view('Error404'); */
    }

    public function generarLibretaNotas(Request $request)
    {
        $data = $request['params']['data'];

        $alumno = $data["per_nombres"] . " " . $data["per_apellidos"];
        $idNivel = $data["idNivel"];
        $nivel = $data["nivel"];
        $idAlumno = $data["alu_id"];
        $idGrado = $data["idGrado"];
        $grado = $data["grado"];
        $idSeccion = $data["idSeccion"];
        $seccion = $data["seccion"];

        $cursosWithCapacities = Curso::with(['capacidades' => function ($query) {
            $query->where('cap_is_deleted', 0);
        }])
            ->where('gra_id', $idGrado)
            ->where('niv_id', $idNivel)
            ->get();

        foreach ($cursosWithCapacities as $curso) {
            $cursoId = $curso['cur_id'];
            $notasArray = [];
            // Verifica si $cursoId está en el array de IDs.
            // if (in_array($cursoId, $cursoIdsWithNotes)) {
            $notasTrimestrales = Nota::where('alu_id', $idAlumno)->where('curso_id', $cursoId)->get();

            $nroCapacities = count($curso['capacidades']);
            $ntrimestres = $notasTrimestrales->pluck('nt_bimestre')->toArray();
            for ($i = 0; $i < 3; $i++) {
                if (in_array($i + 1, $ntrimestres)) {
                    $notasCapacidad = NotaCapacidad::where('nt_id', $notasTrimestrales[$i]["nt_id"])->pluck('nc_nota')->toArray();

                    $notasArray['trimestre' . $notasTrimestrales[$i]["nt_bimestre"]] = array_pad($notasCapacidad, $nroCapacities, 0);
                } else {
                    $notasArray['trimestre' . $i + 1] = array_fill(0, $nroCapacities, 0);
                }
            }

            $promedios = array(); // Crear un array para almacenar los promedios
            // Iterar a través de los trimestres y calcular los promedios
            foreach ($notasArray as $trimestre => $notas) {
                if ($trimestre !== 'notaFinalTrimestre' && $trimestre !== 'notaFinal') {
                    $promedio = array_sum($notas) / count($notas);
                    $promedios[] = round($promedio, 0); // Redondear a 1 decimal
                }
            }

            // Calcular el promedio final de los promedios calculados
            $promedioFinal = round(array_sum($promedios) / count($promedios), 1);

            $notasArray['notaFinalTrimestre'] =  $promedios;
            $notasArray['notaFinal'] = $promedioFinal;
            // }

            $curso['notas'] = $notasArray;
        }

        // Obteniendo imagen y convintiendolo a base64
        $imagenPath1 = 'public/cao/insig.png';
        $imagenPath2 = 'public/cao/escudoMinedu.png';
        $imagenPath3 = 'public/cao/sello.png';

        if (!Storage::exists($imagenPath1)) {
            $imagenPredeterminadaPath1 = public_path('insig.png');
            Storage::put($imagenPath1, file_get_contents($imagenPredeterminadaPath1));
        }
        if (!Storage::exists($imagenPath2)) {
            $imagenPredeterminadaPath2 = public_path('escudoMinedu.png');
            Storage::put($imagenPath2, file_get_contents($imagenPredeterminadaPath2));
        }
        if (!Storage::exists($imagenPath3)) {
            $imagenPredeterminadaPath3 = public_path('sello.png');
            Storage::put($imagenPath3, file_get_contents($imagenPredeterminadaPath3));
        }
        $cao = Storage::path($imagenPath1);
        $educacion = Storage::path($imagenPath2);
        $sello = Storage::path($imagenPath3);
        $contenidoBinario1 = file_get_contents($educacion);
        $contenidoBinario2 = file_get_contents($cao);
        $contenidoBinario3 = file_get_contents($sello);
        $imagenEducacion = base64_encode($contenidoBinario1);
        $imagenCAO = base64_encode($contenidoBinario2);
        $imagenSello = base64_encode($contenidoBinario3);

        $nombreDocumento = "LIBRETA DE NOTAS - " . $alumno . ".pdf";

        // Creando Pdf
        include_once "../vendor/autoload.php";
        $dompdf = new Dompdf();

        // src="data:image/jpg;base64,'.$imagenEducacion.'"
        // src="data:image/jpg;base64,'.$imagenCAO.'"
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>' . $nombreDocumento . '</title>
        </head>
        <style>
            body {
                font-family: sans-serif;
                font-size: 0.875rem;
            }

            .logo {
                width: 5rem;
                height: 7rem;
                object-fit: contain;
            }

            .sello {
                width: 10rem;
                object-fit: contain;
            }

            .table {
                border-collapse: collapse;
            }

            .title {
                font-weight: 600;
                font-weight: bold;
            }

            .bg-gray {
                background-color: #C0C0C0;
                font-weight: 600;
            }

            .table tr th,
            .table tr td {
                padding: 2px;
                border: 1px solid black;
            }

            table {
                font-size: 12px;
            }
        </style>
        <body>
            <table width="100%" style="margin-bottom: 1.5rem;">
                <tbody>
                    <tr>
                        <td align="center" colspan="3" class="title">INFORME DE PROGRESO DEL APRENDIZAJE DEL ESTUDIANTE - ' . Carbon::now()->year . '
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="100%" style="margin-bottom: 1.5rem;">
                <tbody>
                    <tr>
                        <td align="center">
                            <img src="data:image/jpg;base64,' . $imagenEducacion . '" alt="escudo" class="logo" />
                        </td>
                        <td>
                            <table width="100%" border="1" class="table">
                                <tr>
                                    <td class="bg-gray">DRE:</td>
                                    <td>DRE SAN MIGUEL</td>
                                    <td class="bg-gray">UGEL:</td>
                                    <td>UGEL SAN MIGUEL</td>
                                </tr>
                                <tr>
                                    <td class="bg-gray">Nivel:</td>
                                    <td>PRIMARIA</td>
                                    <td class="bg-gray">Código Modular:</td>
                                    <td>0444240-0</td>
                                </tr>
                                <tr>
                                    <td class="bg-gray">Institución Educativa:</td>
                                    <td colspan="3">82857 Lives</td>
                                </tr>
                                <tr>
                                    <td class="bg-gray">Grado:</td>
                                    <td>' . $grado . '</td>
                                    <td class="bg-gray">Sección:</td>
                                    <td>' . $seccion . '</td>
                                </tr>
                                <tr>
                                    <td class="bg-gray">Apellidos y nombres del estudiante:</td>
                                    <td colspan="3">' . $alumno . '</td>
                                </tr>
                                <tr style="display:none">
                                    <td class="bg-gray">Código del estudiante:</td>
                                    <td>-</td>
                                    <td class="bg-gray">DNI:</td>
                                    <td>-</td>
                                </tr>
                            </table>
                        </td>
                        <td align="center">
                            <img src="data:image/jpg;base64,' . $imagenCAO . '" alt="cao" class="logo" />
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="100%" border="1" class="table" style="margin-bottom: 2rem;">
                <thead>
                    <tr>
                        <th rowspan="2" class="bg-gray">Área Curricular</th>
                        <th rowspan="2" class="bg-gray">Competencias</th>
                        <th colspan="3" class="bg-gray">Calificativo por periodo</th>
                        <th rowspan="2" class="bg-gray">Calif. final del área</th>
                    </tr>
                    <tr>
                        <th class="bg-gray">1</th>
                        <th class="bg-gray">2</th>
                        <th class="bg-gray">3</th>
                    </tr>
                </thead>
                <tbody>';
        // Iterar a través de los elementos del array
        foreach ($cursosWithCapacities as $indexCurso => $curso) {

            if ($indexCurso === 5) {
                // $html .= '<br/>';
            }
            // Acceder a las capacidades
            $countCapacities = count($curso['capacidades']) + 1;
            foreach ($curso['capacidades'] as $index => $capacidad) {
                $html .= '<tr style="margin-bottom: 50px;">';

                if ($index === 0) {
                    $html .= '<td rowspan="' . $countCapacities . '">' . $curso['cur_nombre'] . '</td>';
                }

                $html .= '<td>' . $capacidad['cap_descripcion'] . '</td>';

                // Acceder a las notas
                foreach ($curso['notas'] as $trimestre => $notas) {
                    if ($trimestre !== 'notaFinalTrimestre' && $trimestre !== 'notaFinal') {
                        $html .= '<td align="center" style="color: ' . (($notas[$index] < 10 && $notas[$index] > 0) ? 'red' : 'black') . ';">' . $notas[$index] . '</td>';
                    }
                }

                if ($index === 0) {
                    $html .= '<td rowspan="' . $countCapacities . '" align="center" style="color: ' . (($curso['notas']['notaFinal'] < 10 && $curso['notas']['notaFinal'] > 0) ? 'red' : 'black') . ';">' . $curso['notas']['notaFinal'] . '</td>';
                }

                $html .= '</tr>';
            }

            $html .= '<tr>
            <td>CALIFICATIVO DE AREA</td>';

            // Acceder a la notaFinalTrimestre
            foreach ($curso['notas']['notaFinalTrimestre'] as $index => $nota) {
                $html .= '<td align="center" style="color: ' . (($nota < 10 && $nota > 0) ? 'red' : 'black') . ';">' . $nota . '</td>';
            }

            $html .= '</tr>';
        }

        $html .= '</tbody>
            </table>
            <table width="100%" style="margin-bottom: 1rem;display: none;">
                <tbody>
                    <tr>
                        <td align="center" colspan="3" class="title">Resumen de asistencia del estudiante
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="100%" border="1" class="table" style="margin-bottom: 1rem;display: none;">
                <thead>
                    <tr>
                        <th rowspan="2" class="bg-gray">Periodo</th>
                        <th colspan="2" class="bg-gray">Inasistencias</th>
                        <th colspan="2" class="bg-gray">Tardanzas</th>
                    </tr>
                    <tr>
                        <th class="bg-gray">Justificadas</th>
                        <th class="bg-gray">Injustificadas</th>
                        <th class="bg-gray">Injustificadas</th>
                        <th class="bg-gray">Injustificadas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="center">1</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
                    <tr>
                        <td align="center">2</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
                    <tr>
                        <td align="center">3</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
                    <tr>
                        <td align="center">4</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
                </tbody>
            </table>
            <table width="100%" border="1" class="table" style="margin-bottom: 1rem;">
                <thead>
                    <tr>
                        <th colspan="3" class="bg-gray">Situación final del estudiante al término del periodo lectivo</th>
                    </tr>
                    <tr>
                        <th><b>Promovido de grado</b></th>
                        <th><b>Requiere recuperación pedagógica</b></th>
                        <th><b>Permanece en el grado</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="center" style="color: #fff;">X</td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                </tbody>
            </table>
            <table width="100%" border="1" class="table" style="margin-bottom: 5rem;">
                <thead>
                    <tr>
                        <th colspan="3" class="bg-gray">Área(a) y/o taller(es) que pasan a recuperación pedagógica</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3"align="center" style="color: #fff;">-</td>
                    </tr>
                </tbody>
            </table>
            <table width="100%">
                <tbody>
                    <tr>
                        <td align="center">
                            <img src="data:image/jpg;base64,' . $imagenSello . '" alt="sello" class="sello" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </body>
        </html>';

        // Cargar el contenido HTML en DomPDF
        $dompdf->loadHtml($html);
        $dompdf->render();

        $contenido = $dompdf->output();

        $exists = Storage::disk('LibretasNotas')->exists($nombreDocumento);
        if (!$exists) {
            Storage::disk('LibretasNotas')->put($nombreDocumento, $contenido);
            /* Storage::disk('reportes')->delete($nombreDocumento); */
        } else {
            Storage::disk('LibretasNotas')->delete($nombreDocumento);
            Storage::disk('LibretasNotas')->put($nombreDocumento, $contenido);
        }
        $alumno = Alumno::find($data["alu_id"]);
        $alumno->name_libreta_notas = $nombreDocumento;
        $alumno->save();

        return response()->json([
            "rpta" => 1,
            "documento" => $nombreDocumento
        ]);
        /*if ($request->ajax()) {
            return response()->json([
                "rpta" => 1,
                "documento" => $nombreDocumento
            ]);
        }
        return view('Error404'); */
    }

    public function getReportCourseList(Request $request)
    {
        $año = $request->input('año');
        $nivel = $request->input('nivel');
        $grado = $request->input('grado');
        $seccion = $request->input('seccion');

        $result = DB::select('CALL sp_coursesWithAvgsAndNotes(?, ?, ?, ?)', [$año, $nivel, $grado, $seccion]);

        return response()->json([
            'list' => $result,
        ]);
    }

    public function getReportCoursePDF(Request $request)
    {
        $año = $request->input('año');
        $nivel = $request->input('nivel');
        $grado = $request->input('grado');
        $seccion = $request->input('seccion');

        $cursosList = DB::select('CALL sp_coursesWithAvgsAndNotes(?, ?, ?, ?)', [$año, $nivel, $grado, $seccion]);

        $nivel= Nivel::where('niv_id', $nivel)->select('niv_descripcion')->first();
        $grado = Grado::where('gra_id', $grado)->select('gra_descripcion')->first();
        $seccion = Seccion::where('sec_id', $seccion)->select('sec_descripcion')->first();

        $headers = [
            'nivel' => $nivel->niv_descripcion,
            'grado' => $grado->gra_descripcion,
            'seccion' =>$seccion-> sec_descripcion,
        ];
        $pdf = PDF::loadView('reportes.promediosCursos', compact('cursosList', 'headers'));
        return $pdf->stream();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
