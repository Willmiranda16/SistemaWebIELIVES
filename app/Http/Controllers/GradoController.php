<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Grado;
use App\Models\Nivel;
use App\Models\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradoController extends Controller
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
        $datos_grado = $request['params']['grado'];
        $datos = explode(',', $datos_grado['descripcion']);
        DB::beginTransaction();
        try {
            foreach ($datos as $value) {
                Grado::create([
                    'gra_descripcion' => $value,
                    'niv_id' => $datos_grado['niv_id']
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
    public function show(Request $request)
    {
        $grados = Grado::orderBy('niv_id')->where('gra_is_delete','!=',1)->get();
        foreach ($grados as $g) {
            $nivel = Nivel::where('niv_id',$g->niv_id)->first();
            $seccion = Seccion::where('gra_id',$g->gra_id)->get();
            $cursos = Curso::where('niv_id',$g->niv_id)->where('gra_id',$g->gra_id)->where('is_deleted','!=',1)->get();
            $g->cursos = count($cursos);
            $g->nivel = $nivel->niv_descripcion;
            $g->secciones = count($seccion);
        }
        return response()->json($grados);

        /* if ($request->ajax()) {
            return response()->json($grados);
        } */
        return view('Error404');
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
        $datos = $request['params']['grado'];
        $grado = Grado::find($datos['id']);
        $grado->gra_descripcion = $datos['descripcion'];
        $grado->niv_id = $datos['niv_id'];
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
        $datos = $request['params']['id_grado'];
        $grado = Grado::find($datos);
        $grado->gra_is_delete = 1;
        $grado->save();
    }
}
