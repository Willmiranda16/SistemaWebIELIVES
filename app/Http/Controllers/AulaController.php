<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AulaController extends Controller
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
        $datos_aulas = $request['params']['aula'];
        $datos = explode(',', $datos_aulas['descripcion']);
        DB::beginTransaction();
        try {
            foreach ($datos as $value) {
                Aula::create([
                    'ala_descripcion' => $value,
                    'ala_tipo' => $datos_aulas['tipo'],
                    'ala_aforo' => $datos_aulas['capacidad'],
                    'ala_ubicacion' => $datos_aulas['ubicacion']
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => 1
            ]);

           /*  if ($request->ajax()) {
                return response()->json([
                    'status' => 1
                ]);
            } */
            return view('Error404');

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
        $aulas = Aula::orderBy('ala_id','asc')->where('ala_is_delete','!=',1)->get();
        /* foreach ($aulas as $value) {
            $grado = Grado::where('gra_id',$value->gra_id)->first();
            $nivel = Nivel::where('niv_id',$grado->niv_id)->first();
            $value->grado = $grado->gra_descripcion;
            $value->nivel = $nivel->niv_descripcion;
        } */
        return response()->json($aulas);

        /* if ($request->ajax()) {
            return response()->json($aulas);
        }
        return view('Error404'); */
    }

    public function showAulas(Request $request)
    {
        $aulas = Aula::orderBy('ala_id','asc')->where('ala_en_uso','!=',1)->where('ala_tipo','!=','Oficina')->where('ala_tipo','!=','Extra')->where('ala_is_delete','!=',1)->get();
        /* foreach ($aulas as $value) {
            $grado = Grado::where('gra_id',$value->gra_id)->first();
            $nivel = Nivel::where('niv_id',$grado->niv_id)->first();
            $value->grado = $grado->gra_descripcion;
            $value->nivel = $nivel->niv_descripcion;
        } */
        return response()->json($aulas);

        /* if ($request->ajax()) {
            return response()->json($aulas);
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
        $datos = $request['params']['aula'];
        $aula = Aula::find($datos['id']);
        $aula->ala_abreviatura = $datos['abreviatura'];
        $aula->ala_aforo = $datos['capacidad'];
        $aula->ala_ubicacion = $datos['ubicacion'];
        $aula->ala_estado = $datos['estado'];
        $aula->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $datos = $request['params']['id_aula'];
        $aula = Aula::find($datos);
        $aula->ala_is_delete = 1;
        $aula->save();
    }
}
