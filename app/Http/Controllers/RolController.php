<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
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
        $datos_roles = $request['params']['rol'];

        DB::beginTransaction();
        try {
            Rol::create([
                'rol_descripcion' => $datos_roles['descripcion'],
                'rol_estado' => $datos_roles['estado']
            ]);

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
        /* $roles = Rol::where('id_rol','!=', 1)->where('estado', 1)->get(); */
        $roles = Rol::where('rol_id','!=', 1)->where('rol_estado', 1)->where('is_deleted','!=',1)->get();
        return response()->json($roles);
        /*  if ($request->ajax()) {
            return response()->json($roles);
        }
        return view('Error404'); */
    }

    public function showRoles(Request $request)
    {
        /* $roles = Rol::where('id_rol','!=', 1)->where('estado', 1)->get(); */
        $roles = Rol::where('is_deleted','!=',1)->get();
        return response()->json($roles);
        /* if ($request->ajax()) {
            return response()->json($roles);
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
        $roles = Rol::find($datos['id']);

        $roles->rol_descripcion = $datos['descripcion'];
        $roles->rol_estado = $datos['estado'];
        $roles->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $datos_rol= $request['params']['id_rol'];

        $roles = Rol::find($datos_rol);
        $roles->is_deleted = 1;
        $roles->save();
    }
}
