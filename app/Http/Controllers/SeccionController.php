<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\Aula;
use App\Models\Grado;
use App\Models\Nivel;
use App\Models\Periodo;
use App\Models\Persona;
use App\Models\PersonalAcademico;
use App\Models\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeccionController extends Controller
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
        $datos_seccion = $request['params']['seccion'];
        $datos = explode(',', $datos_seccion['descripcion']);
        DB::beginTransaction();
        try {
            foreach ($datos as $value) {
                Seccion::create([
                    'sec_descripcion' => $value,
                    'sec_tutor' => $datos_seccion['tutor'],
                    'sec_aula' => $datos_seccion['aula'],
                    'gra_id' => $datos_seccion['gra_id'],
                    'sec_periodo' => $datos_seccion['periodo'],
                    'sec_vacantes' => $datos_seccion['vacantes']
                ]);

                $aula = Aula::find($datos_seccion['aula']);
                $aula->ala_en_uso = 1;
                $aula->save();
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
    public function show(Request $request)
    {
        $grado = $request['params']['grado'];
        $secciones = Seccion::orderBy('sec_id')->where('gra_id',$grado)->where('sec_is_delete','!=',1)->get();
        foreach ($secciones as $value) {
            $periodo = Periodo::where('per_id',$value->sec_periodo)->first();
            $anio = Anio::where('año_id',$periodo->año_id)->first();
            $tutor = Persona::where('per_id',$value->sec_tutor)->first();
            $aula = Aula::where('ala_id',$value->sec_aula)->first();
            $grado = Grado::where('gra_id',$value->gra_id)->first();
            $nivel = Nivel::where('niv_id',$grado->niv_id)->first();
            if(!$tutor){
                $value->tutor = 'Sin asignar';
            }else{
                $value->tutor = $tutor->per_nombres +' '+ $tutor->per_apellidos;
            }
            $value->aula = $aula->ala_descripcion;
            $value->ubicacion = $aula->ala_ubicacion;
            $value->periodo = $anio->año_descripcion;
            $value->grado = $grado->gra_descripcion;
            $value->nivel = $nivel->niv_descripcion;
        }

        return response()->json($secciones);

        /* if ($request->ajax()) {
            return response()->json($secciones);
        }
        return view('Error404'); */
    }

    public function showTutores(Request $request)
    {
        $tutores = PersonalAcademico::where('pa_is_tutor',1)->where('is_deleted','!=',1)->get();
        foreach ($tutores as $value) {
            $persona = Persona::where('per_id',$value->per_id)->first();
            $value->nombres = $persona->per_nombres;
            $value->apellidos = $persona->per_apellidos;
        }
        return response()->json($tutores);

        /* if ($request->ajax()) {
            return response()->json($tutores);
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
        $datos = $request['params']['seccion'];
        $grado = Seccion::find($datos['id']);
        $grado->sec_descripcion = $datos['descripcion'];
        $grado->sec_vancantes = $datos['vacantes'];
        $grado->sec_tutor = $datos['tutor'];
        $grado->gra_id = $datos['gra_id'];
        $grado->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $datos = $request['params']['id_seccion'];
        $seccion = Seccion::find($datos);
        $seccion->sec_is_delete = 1;
        $seccion->save();
    }
}
