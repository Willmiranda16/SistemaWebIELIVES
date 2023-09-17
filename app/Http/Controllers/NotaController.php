<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Anio;
use App\Models\AsignarCurso;
use App\Models\AsignarGrado;
use App\Models\Capacidad;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\Gsa;
use App\Models\Matricula;
use App\Models\Nota;
use App\Models\NotaCapacidad;
use App\Models\Periodo;
use App\Models\Persona;
use App\Models\PersonalAcademico;
use App\Models\Seccion;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class NotaController extends Controller
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
        $datos_nota = $request['params']['notas'];

        $periodo = Periodo::where('año_id',$datos_nota['año_id'])->first();
        DB::beginTransaction();
        try {
            $nota = Nota::create([
                'per_id' => $periodo->per_id,
                'alu_id' => $datos_nota['idAlumno'],
                'pa_id' => $datos_nota['idDocente'],
                'ags_id' => $datos_nota['ags_id'],
                'nt_bimestre' => $datos_nota['bimestre'],
                'nt_nota' => $datos_nota['promedio']
            ]);

            foreach ($datos_nota['nota_capacidad'] as $key => $value) {
                $capacidad = 'C'.$key+1;
                NotaCapacidad::create([
                    'nc_descripcion' => $capacidad,
                    'nc_nota' =>  $value,
                    'nt_id' =>  $nota->nt_id
                ]);
            }


            DB::commit();

            return response()->json([
                'status' => 1
            ]);
            /* if ($request->ajax()) {
                return response()->json([
                    'status' => 1
                ]);
            }
            return view('Error404'); */

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return response()->json([
                'status' => 0
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function buscar(Request $request)
    {
        $nivel = $request['params']['nivel'];

        $docentes = PersonalAcademico::whereIn('rol_id',[5,7])->where('niv_id',$nivel)->where('is_deleted','!=',1)->get();
        foreach ($docentes as $d) {
            $persona = Persona::where('per_id',$d->per_id)->first();
            /* $asignaciones = AsignarCurso::where('pa_id',$d->pa_id)->where('asig_is_deleted','!=',1)->first();
            $array = [];
            foreach ($asignaciones as $value) {
                array_push($array,$value->curso);
            }
            if($asignaciones){
                $d->checked = $asignaciones->curso;
            }else{
                $d->checked = '';
            } */

            $d->dni = $persona->per_dni;
            $d->nombres = $persona->per_nombres;
            $d->apellidos = $persona->per_apellidos;
        }

        /* $cursos = Curso::selectRaw('cur_nombre, cur_abreviatura')->where('cur_horas','>',0)->where('niv_id',$nivel)->where('is_deleted','!=',1)->groupBy('cur_nombre','cur_abreviatura')->get(); */

        return response()->json([
            'docente' => $docentes,
            /* 'cursos' => $cursos, */
        ]);

       /*  if ($request->ajax()) {
            return response()->json([
                'docente' => $docentes,
            ]);
        }
        return view('Error404'); */
    }

    public function buscarGrados(Request $request)
    {
        $docente = $request['params']['docente'];

        $docentes = PersonalAcademico::where('pa_id',$docente)->where('is_deleted','!=',1)->first();
        $asignacionesCursos = AsignarCurso::where('pa_id',$docentes->pa_id)->where('asig_is_deleted','!=',1)->first();
        $asignacionesGrados = AsignarGrado::where('pa_id',$docentes->pa_id)->where('asig_is_deleted','!=',1)->get();
        $array = [];
        foreach ($asignacionesGrados as $value) {
            if (in_array($value->gra_id, $array) == false) {
                array_push($array,$value->gra_id);
            }
        }
        $grados = Grado::whereIn('gra_id',$array)->where('gra_is_delete','!=',1)->get();
        $docentes->curso = $asignacionesCursos->curso;
        $docentes->grados = $array;

        return response()->json([
            'docente' => $docentes,
            'grados' => $grados,
        ]);

       /*  if ($request->ajax()) {
            return response()->json([
                'docente' => $docentes,
                'grados' => $grados,
            ]);
        }
        return view('Error404'); */
    }

    public function buscarSeccion(Request $request)
    {
        $docente = $request['params']['docente'];
        $grado = $request['params']['grado'];

        $asignacionesGrados = AsignarGrado::where('pa_id',$docente)->where('gra_id',$grado)->where('asig_is_deleted','!=',1)->get();
        $array = [];
        foreach ($asignacionesGrados as $value) {
            if (in_array($value->gra_id, $array) == false) {
                array_push($array,$value->seccion);
            }
        }
        $secciones = Seccion::whereIn('sec_descripcion',$array)->where('gra_id',$grado)->where('sec_is_delete','!=',1)->get();

        return response()->json([
            'secciones' => $secciones
        ]);

        /* if ($request->ajax()) {
            return response()->json([
                'secciones' => $secciones
            ]);
        }
        return view('Error404'); */
    }

    public function buscarInfoNotas(Request $request)
    {
        $data = $request['params']['data'];

        $asignacionesCursos = AsignarCurso::where('pa_id',$data['docente'])->where('asig_is_deleted','!=',1)->first();
        $curso = Curso::where('cur_nombre',$asignacionesCursos->curso)->where('gra_id',$data['grado'])->where('niv_id',$data['nivel'])->where('is_deleted','!=',1)->first();
        $capacidades = Capacidad::where('cur_id',$curso->cur_id)->where('cap_is_deleted','!=',1)->get();
        $asignacionesCursos->capacidades = count($capacidades);

        $estado = 1;
        $año = Anio::where('año_estado',$estado)->where('is_deleted','!=',1)->first();
        $periodo = Periodo::where('año_id',$año->año_id)->where('per_estado',$estado)->where('is_deleted','!=',1)->first();
        $tipoPeriodo = Tipo::where('tp_id',$periodo->per_tp_notas)->first();
        switch ($tipoPeriodo->tp_tipo) {
            case 'Registro de Notas Anuales':
                $tipoPeriodo->cantidad = 1;
                $tipoPeriodo->name = 'Anual';
                break;
            case 'Registro de Notas Bimestrales':
                $tipoPeriodo->cantidad = 4;
                $tipoPeriodo->name = 'Bimestre';
                break;
            case 'Registro de Notas Trimestrales':
                $tipoPeriodo->cantidad = 3;
                $tipoPeriodo->name = 'Trimestre';
                break;
            case 'Registro de Notas Semestrales':
                $tipoPeriodo->cantidad = 2;
                $tipoPeriodo->name = 'Semestre';
                break;
        }

        $Gsas = Gsa::where('niv_id',$data['nivel'])->where('gra_id',$data['grado'])->where('sec_id',$data['seccion'])->where('is_deleted','!=',1)->get();

        foreach ($Gsas as $g) {
            $matricula = Matricula::where('ags_id',$g->ags_id)->where('is_deleted','!=',1)->first();
            $alumno = Alumno::where('alu_id',$matricula->alu_id)->where('is_deleted','!=',1)->first();
            $persona = Persona::where('per_id',$alumno->per_id)->where('is_deleted','!=',1)->first();
            $g->alumno = $persona->per_apellidos.' '.$persona->per_nombres;
            $g->dni = $persona->per_dni;
            $g->idAlumno = $alumno->alu_id;

            $notas = Nota::where('alu_id',$alumno->alu_id)->where('pa_id',$data['docente'])->get();
            $suma = 0;
            $total = $tipoPeriodo->cantidad;
            foreach ($notas as $v) {
                $capacidades = NotaCapacidad::where('nt_id',$v->nt_id)->get();
                $v->notasCapacidades = $capacidades;
                $suma += $v->nt_nota;
            }
            $g->notas = $notas;
            $g->promedio = $suma/$total;
        }

        return response()->json([
            'info' => $asignacionesCursos,
            'alumnos' => $Gsas,
            'periodo' => $tipoPeriodo,
        ]);

        /* if ($request->ajax()) {
            return response()->json([
                'info' => $asignacionesCursos,
                'alumnos' => $Gsas,
                'periodo' => $tipoPeriodo,
            ]);
        }
        return view('Error404'); */
    }

    public function show($id)
    {
        //
    }

    public function showAño(Request $request)
    {
        $año = Anio::where('is_deleted','!=',1)->where('año_estado',1)->get();
        return response()->json($año);
        /* if ($request->ajax()) {
            return response()->json($año);
        }
        return view('Error404'); */
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
