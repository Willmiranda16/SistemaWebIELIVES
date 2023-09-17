<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use App\Models\Persona;
use App\Models\PersonalAcademico;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstitucionEducativaController extends Controller
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
        $datos_ie = $request['params']['ie'];

        DB::beginTransaction();
        try {
            if($datos_ie['ie_id'] == null){
                Institucion::create([
                    'ie_codigo_modular'=> $datos_ie['ie_codigo_modular'],
                    'ie_anexo' => $datos_ie['ie_anexo'],
                    'ie_nivel' => $datos_ie['ie_nivel'],
                    'ie_nombre' => $datos_ie['ie_nombre'],
                    'ie_gestion' => $datos_ie['ie_gestion'],
                    'ie_departamento' => $datos_ie['ie_departamento'],
                    'ie_provincia' => $datos_ie['ie_provincia'],
                    'ie_distrito' => $datos_ie['ie_distrito'],
                    'ie_direccion' => $datos_ie['ie_direccion'],
                    'ie_dre' => $datos_ie['ie_dre'],
                    'ie_ugel' => $datos_ie['ie_ugel'],
                    'ie_turno' => $datos_ie['ie_turno'],
                    'ie_dias_laborales' => $datos_ie['ie_dias_laborales'],
                    'ie_director' => $datos_ie['ie_director'],
                    'ie_telefono' => $datos_ie['ie_telefono'],
                    'ie_email' => $datos_ie['ie_email'],
                    'ie_web' => $datos_ie['ie_web']
                ]);

                $opc = 1;
            }else{
                $ie = Institucion::find($datos_ie['ie_id']);
                $ie->ie_codigo_modular = $datos_ie['ie_codigo_modular'];
                $ie->ie_anexo = $datos_ie['ie_anexo'];
                $ie->ie_nivel = $datos_ie['ie_nivel'];
                $ie->ie_nombre = $datos_ie['ie_nombre'];
                $ie->ie_gestion = $datos_ie['ie_gestion'];
                $ie->ie_departamento = $datos_ie['ie_departamento'];
                $ie->ie_provincia = $datos_ie['ie_provincia'];
                $ie->ie_distrito = $datos_ie['ie_distrito'];
                $ie->ie_direccion = $datos_ie['ie_direccion'];
                $ie->ie_dre = $datos_ie['ie_dre'];
                $ie->ie_ugel = $datos_ie['ie_ugel'];
                $ie->ie_genero = $datos_ie['ie_genero'];
                $ie->ie_turno = $datos_ie['ie_turno'];
                $ie->ie_dias_laborales = $datos_ie['ie_dias_laborales'];
                $ie->ie_director = $datos_ie['ie_director'];
                $ie->ie_telefono = $datos_ie['ie_telefono'];
                $ie->ie_email = $datos_ie['ie_email'];
                $ie->ie_web = $datos_ie['ie_web'];
                $ie->save();

                $opc = 2;
            }


            DB::commit();

            return response()->json([
                'status' => $opc
            ]);

           /*  if ($request->ajax()) {
                return response()->json([
                    'status' => $opc
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
        $ie = Institucion::first();
        return response()->json($ie);

       /*  if ($request->ajax()) {
            return response()->json($ie);
        }
        return view('Error404'); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDirector(Request $request)
    {
        $rol = Rol::where('rol_descripcion','Director')->first();
        $academico = PersonalAcademico::where('rol_id',$rol->rol_id)->first();
        $persona = Persona::where('per_id',$academico->per_id)->first();

        return response()->json($persona);

        /* if ($request->ajax()) {
            return response()->json($persona);
        }
        return view('Error404'); */
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
