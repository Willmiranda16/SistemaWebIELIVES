<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Anio;
use App\Models\Apoderado;
use App\Models\Aula;
use App\Models\Grado;
use App\Models\Gsa;
use App\Models\Matricula;
use App\Models\Nivel;
use App\Models\Periodo;
use App\Models\Persona;
use App\Models\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatriculaController extends Controller
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
        $datos_matricula = $request['params']['matricula'];

        DB::beginTransaction();
        try {
            $gsa = Gsa::create([
                'ala_id' => $datos_matricula['ala_id'],
                'niv_id' => $datos_matricula['niv_id'],
                'gra_id' => $datos_matricula['gra_id'],
                'sec_id' => $datos_matricula['sec_id']
            ]);

            Matricula::create([
                'per_id' => $datos_matricula['per_id'],
                'alu_id' => $datos_matricula['alu_id'],
                'ags_id' => $gsa->ags_id,
                'mat_fecha' => $datos_matricula['fecha'],
                'mat_situacion' => $datos_matricula['situacion'],
                'mat_tipo_procedencia' => $datos_matricula['tipo_procedencia'],
                'mat_colegio_procedencia' => $datos_matricula['colegio_procedencia'],
                'mat_observacion' => $datos_matricula['observacion']
            ]);

            Seccion::where('sec_id',$datos_matricula['sec_id'])->decrement('sec_vacantes', 1);

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

    public function buscarAlumno(Request $request)
    {
        $nrodoc = $request['params']['dni'];

        $persona = Persona::where('per_dni',$nrodoc)->first();
        if($persona){
            $alumno = Alumno::where('per_id',$persona->per_id)->first();
            if($alumno){
                $apoderado = Apoderado::where('apo_id',$alumno->apo_id)->first();
                $apo_persona = Persona::where('per_id',$apoderado->per_id)->first();
                if($apo_persona->per_nombres == ""){
                    $persona->apo_nombre_completo = $apo_persona->per_nombre_completo;
                }else{
                    $persona->apo_nombre_completo = $apo_persona->per_apellidos.' '.$apo_persona->per_nombres;
                }
                /* $persona->apo_nombres = $apo_persona->per_nombres;
                $persona->apo_apellidos = $apo_persona->per_apellidos; */
                $persona->apo_parentesco = $apoderado->apo_parentesco;
                $persona->apo_vive_con_estudiante = $apoderado->apo_vive_con_estudiante;
                $persona->alu_id = $alumno->alu_id;
                $persona->alu_estado = $alumno->alu_estado;
                $persona->apo_id = $alumno->apo_id;
                $persona->evaluar = 2;
            }else{
                $persona->evaluar = 1;
            }
        }else{
            $persona->evaluar = 0;
        }
        return response()->json($persona);
        /* if ($request->ajax()) {
            return response()->json($persona);
        } */
    }

    public function show(Request $request)
    {
        $matriculas = Matricula::where('is_deleted','!=',1)->get();
        foreach ($matriculas as $m) {
            $alumno = Alumno::where('alu_id',$m->alu_id)->first();
            $persona = Persona::where('per_id',$alumno->per_id)->first();
            $apoderado = Apoderado::where('apo_id',$alumno->apo_id)->first();
            $apo_persona = Persona::where('per_id',$apoderado->per_id)->first();
            $periodo = Periodo::where('per_id',$m->per_id)->first();
            $anio = Anio::where('año_id',$periodo->año_id)->first();
            $gsa = Gsa::where('ags_id',$m->ags_id)->first();
            $aula = Aula::where('ala_id',$gsa->ala_id)->first();
            $nivel = Nivel::where('niv_id',$gsa->niv_id)->first();
            $grado = Grado::where('gra_id',$gsa->gra_id)->first();
            $seccion = Seccion::where('sec_id',$gsa->sec_id)->first();
            $m->id_persona = $persona->per_id;
            $m->dni = $persona->per_dni;
            $m->alumno = $persona->per_apellidos .' '.$persona->per_nombres;
            if($apo_persona->per_nombres == ""){
                $m->apoderado = $apo_persona->per_nombre_completo;
            }else{
                $m->apoderado = $apo_persona->per_apellidos.' '.$apo_persona->per_nombres;
            }
            $m->parentesco = $apoderado->apo_parentesco;
            $m->periodo = $anio->año_descripcion;
            $m->estadoPeriodo = $periodo->per_estado;
            $m->aula = $aula->ala_descripcion;
            $m->nivel = $nivel->niv_descripcion;
            $m->grado = $grado->gra_descripcion;
            $m->seccion = $seccion->sec_descripcion;
        }
        return response()->json($matriculas);
        /* if ($request->ajax()) {
            return response()->json($matriculas);
        }
        return view('Error404'); */
    }

    public function showNiveles(Request $request)
    {
        $niveles = Nivel::get();
        return response()->json($niveles);
       /*  if ($request->ajax()) {
            return response()->json($niveles);
        } */
        return view('Error404');
    }

    public function showGrados(Request $request)
    {
        $nivel = $request['params']['id'];
        $grados = Grado::where('niv_id',$nivel)->get();
        return response()->json($grados);
       /*  if ($request->ajax()) {
            return response()->json($grados);
        }
        return view('Error404'); */
    }

    public function showSecciones(Request $request)
    {
        $grado = $request['params']['id'];
        $secciones = Seccion::where('gra_id',$grado)->get();
        return response()->json($secciones);
        /* if ($request->ajax()) {
            return response()->json($secciones);
        }
        return view('Error404'); */
    }

    public function infoSecciones(Request $request)
    {
        $data = $request['params']['data'];
        $seccion = Seccion::where('sec_id',$data)->first();
        $aula = Aula::where('ala_id',$seccion->sec_aula)->first();
        $seccion->aula = $aula->ala_descripcion;
        $seccion->ala_id = $aula->ala_id;
        return response()->json($seccion);
        /* if ($request->ajax()) {
            return response()->json($seccion);
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
    public function update(Request $request)
    {
        $datos = $request['params']['data'];
        /* dd($datos); */
        $persona = Matricula::find($datos['id_matricula']);
        $persona->id_alumno = $datos['id_alumno'];
        $persona->id_periodo = $datos['id_periodo'];
        $persona->id_nivel = $datos['id_nivel'];
        $persona->id_grado = $datos['id_grado'];
        $persona->id_seccion = $datos['id_seccion'];
        $persona->fecha_matricula = $datos['fecha_matricula'];
        $persona->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $datos_matricula = $request['params']['id'];
        $alumno = Matricula::find($datos_matricula);
        $alumno->is_deleted = 1;
        $alumno->save();

    }

}
