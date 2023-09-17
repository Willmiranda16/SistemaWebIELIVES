<?php

namespace App\Http\Controllers;

use App\Models\Capacidad;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
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
        $datos_capacidad = $request['params']['capacidad'];
        $datos_curso = $request['params']['curso'];
        DB::beginTransaction();
        try {
            if ($datos_curso['grado'] == "-1") {
                $grados = Grado::where('niv_id',$datos_curso['nivel'])->get();
                foreach ($grados as $g) {
                    $curso = Curso::create([
                        'cur_nombre' => $datos_curso['nombre'],
                        'cur_abreviatura' => $datos_curso['abreviatura'],
                        'cur_horas' => $datos_curso['horas'],
                        'gra_id' => $g->gra_id,
                        'niv_id' => $datos_curso['nivel']
                    ]);

                    foreach ($datos_capacidad as $value) {
                        Capacidad::create([
                            'cap_descripcion' => $value,
                            'cur_id' =>  $curso->cur_id
                        ]);
                    }
                }
            }else{
                $curso = Curso::create([
                    'cur_nombre' => $datos_curso['nombre'],
                    'cur_abreviatura' => $datos_curso['abreviatura'],
                    'cur_horas' => $datos_curso['horas'],
                    'gra_id' => $datos_curso['grado'],
                    'niv_id' => $datos_curso['nivel']
                ]);

                foreach ($datos_capacidad as $value) {
                    Capacidad::create([
                        'cap_descripcion' => $value,
                        'cur_id' =>  $curso->cur_id
                    ]);
                }
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
    public function showCapacidades(Request $request)
    {
        $curso = $request['params']['id'];
        $capacidades = Capacidad::orderBy('cap_id')->where('cur_id',$curso)->where('cap_is_deleted','!=',1)->get();

        return response()->json($capacidades);

        /* if ($request->ajax()) {
            return response()->json($capacidades);
        }
        return view('Error404'); */
    }

    public function showAll(Request $request)
    {
        $grado = $request['params']['grado'];
        $nivel = $request['params']['nivel'];
        $cursos = Curso::where('is_deleted','!=',1)->where('gra_id',$grado)->where('niv_id',$nivel)->get();
        foreach ($cursos as $c) {
            $capacidades = Capacidad::where('cur_id',$c->cur_id)->where('cap_is_deleted','!=',1)->get();
            $nivel = Nivel::where('niv_id',$c->niv_id)->first();
            $grado = Grado::where('gra_id',$c->gra_id)->first();
            $c->capacidades = count($capacidades);
            $c->listCapacidades = $capacidades;
            $c->grado = $grado->gra_descripcion;
            $c->nivel = $nivel->niv_descripcion;
        }
        return response()->json($cursos);

       /*  if ($request->ajax()) {
            return response()->json($cursos);
        }
        return view('Error404'); */
    }

    public function show(Request $request)
    {
        $cursos = Curso::where('is_deleted','!=',1)->get();
        foreach ($cursos as $c) {
            $capacidades = Capacidad::where('cur_id',$c->cur_id)->where('cap_is_deleted','!=',1)->get();
            $nivel = Nivel::where('niv_id',$c->niv_id)->first();
            $grado = Grado::where('gra_id',$c->gra_id)->first();
            $c->capacidades = count($capacidades);
            $c->listCapacidades = $capacidades;
            $c->grado = $grado->gra_descripcion;
            $c->nivel = $nivel->niv_descripcion;
        }
        return response()->json($cursos);

       /*  if ($request->ajax()) {
            return response()->json($cursos);
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
        $datos_curso = $request['params']['data'];
        $datos_capacidad = $request['params']['capacidad'];

        $cap = Capacidad::where('cur_id',$datos_curso['cur_id'])->get();
        foreach ($cap as $v) {
            $c = Capacidad::find($v->cap_id);
            $c->cap_is_deleted = 1;
            $c->save();
        }

        $capacidades = Capacidad::where('cur_id',$datos_curso['cur_id'])->pluck('cap_descripcion')->toArray();
        foreach ($datos_capacidad as $value) {
            if (in_array($value, $capacidades)) {
                $caps = Capacidad::where('cap_descripcion',$value)->where('cur_id',$datos_curso['cur_id'])->first();
                $caps->cap_is_deleted = 0;
                $caps->save();
            } else {
                Capacidad::create([
                    'cap_descripcion' => $value,
                    'cur_id' =>  $datos_curso['cur_id']
                ]);
            }
        }

        $curso = Curso::find($datos_curso['cur_id']);
        $curso->cur_nombre = $datos_curso['nombre'];
        $curso->cur_horas = $datos_curso['horas'];
        $curso->cur_abreviatura = $datos_curso['abreviatura'];
        $curso->niv_id = $datos_curso['nivel'];
        $curso->gra_id = $datos_curso['grado'];
        $curso->cur_estado = $datos_curso['estado'];
        $curso->save();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $datos_curso = $request['params']['id_curso'];

        $curso = Curso::find($datos_curso);
        $curso->is_deleted = 1;
        $curso->save();

        $cap = Capacidad::where('cur_id',$datos_curso)->get();
        foreach ($cap as $v) {
            $c = Capacidad::find($v->cap_id);
            $c->cap_is_deleted = 1;
            $c->save();
        }

    }
}
