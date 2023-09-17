<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Persona;
use App\Models\PersonalAcademico;
use App\Models\Provincia;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
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
        $datos_persona = $request['params']['persona'];
        $datos_usuario = $request['params']['usuario'];

        DB::beginTransaction();
        try {
            if(!$datos_persona['per_id']){
                $Persona = Persona::create([
                    'per_dni' => $datos_persona['dni'],
                    'per_nombres' => $datos_persona['nombres'],
                    'per_apellidos' => $datos_persona['apellidos'],
                    'per_email' => $datos_usuario['email'],
                    'per_sexo' => $datos_persona['sexo'],
                    'per_fecha_nacimiento' => $datos_persona['fecha_nacimiento'],
                    'per_estado_civil' => $datos_persona['estado_civil'],
                    'per_pais' => $datos_persona['pais'],
                    'per_departamento' => $datos_persona['departamento'],
                    'per_provincia' => $datos_persona['provincia'],
                    'per_distrito' => $datos_persona['distrito'],
                    'per_direccion' => $datos_persona['direccion']
                ]);
                $datos_persona['per_id'] = $Persona->per_id;
            }

            User::create([
                'per_id' => $datos_persona['per_id'],
                'name' => $datos_usuario['name'],
                'email' => $datos_usuario['email'],
                'password' => Hash::make($datos_usuario['password']),
                'rol_id' => $datos_usuario['id_rol'],
                'estado' => $datos_usuario['estado']
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
        $usuarios = User::where('is_deleted','!=',1)->where('id','!=',1)->get();
        /* $usuarios = User::where('is_deleted','!=',1)->get(); */
        foreach ($usuarios as $u) {
            $persona = Persona::where('per_id',$u->per_id)->first();
            $rol = Rol::where('rol_id',$u->rol_id)->first();
            $u->id_persona = $persona->per_id;
            $u->dni = $persona->per_dni;
            $u->nombres = $persona->per_nombres;
            $u->apellidos = $persona->per_apellidos;
            $u->sexo = $persona->per_sexo;
            $u->fecha_nacimiento = $persona->per_fecha_nacimiento;
            $u->estado_civil = $persona->per_estado_civil;
            $u->celular = $persona->per_celular;
            $u->pais = $persona->per_pais;
            $u->departamento = $persona->per_departamento;
            $u->provincia = $persona->per_provincia;
            $u->distrito = $persona->per_distrito;
            $u->direccion = $persona->per_direccion;
            $u->rol = $rol->rol_descripcion;
        }

        return response()->json($usuarios);

        /* if ($request->ajax()) {
            return response()->json($usuarios);
        }
        return view('Error404'); */
    }

    public function showDni(Request $request)
    {
        $nrodoc = $request['params']['dni'];

        $persona = Persona::where('per_dni',$nrodoc)->first();
        if(!$persona){
            $datos = Http::get('https://dniruc.apisperu.com/api/v1/dni/'.$nrodoc.'?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InNhbXllc2h1YTcyN0BnbWFpbC5jb20ifQ.0z14bKT2JWPsbs2y9j40RWrW_RvG9XaXtwUh2MRGOyQ');
            $nombres = $datos->json('nombres');
            $apellidos = $datos->json('apellidoPaterno').' '.$datos->json('apellidoMaterno');

            $opc = $nombres == null ? '-1' : '0';

            return response()->json([
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'evaluar' => $opc
            ]);

            /* if ($request->ajax()) {
                return response()->json([
                    'nombres' => $nombres,
                    'apellidos' => $apellidos,
                    'evaluar' => $opc
                ]);
            }
            return view('Error404'); */
        }else{
            $personal = PersonalAcademico::where('per_id',$persona->per_id)->first();
            if($personal){
                $persona->id_rol = $personal->rol_id;
            }else{
                $persona->id_rol = '0';
            }
            $persona->evaluar = 1;

            return response()->json($persona);

            /* if ($request->ajax()) {
                return response()->json($persona);
            } */
        }
    }

    public function showDepartamentos(Request $request)
    {
        $departamentos = Departamento::get();
        return response()->json($departamentos);
        /* if ($request->ajax()) {
            return response()->json($departamentos);
        }
        return view('Error404'); */
    }

    public function showProvincias(Request $request)
    {
        $departamento = $request['params']['departamento'];
        $provincias = Provincia::where('idDepa',$departamento)->get();
        return response()->json($provincias);
        /* if ($request->ajax()) {
            return response()->json($provincias);
        }
        return view('Error404'); */
    }

    public function showDistritos(Request $request)
    {
        $provincia = $request['params']['provincia'];
        $distritos = Distrito::where('idProv',$provincia)->get();
        return response()->json($distritos);
        /* if ($request->ajax()) {
            return response()->json($distritos);
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
        $persona = Persona::find($datos['per_id']);
        $persona->per_dni = $datos['dni'];
        $persona->per_nombres = $datos['nombres'];
        $persona->per_apellidos = $datos['apellidos'];
        $persona->per_email = $datos['email'];
        $persona->per_sexo = $datos['sexo'];
        $persona->per_fecha_nacimiento = $datos['fecha_nacimiento'];
        $persona->per_estado_civil = $datos['estado_civil'];
        $persona->per_celular = $datos['celular'];
        $persona->per_pais = $datos['pais'];
        $persona->per_departamento = $datos['departamento'];
        $persona->per_provincia = $datos['provincia'];
        $persona->per_distrito = $datos['distrito'];
        $persona->per_direccion = $datos['direccion'];
        $persona->save();

        $usuario = User::find($datos['id_user']);
        $usuario->name = $datos['name'];
        $usuario->email = $datos['email'];
        $usuario->rol_id = $datos['id_rol'];
        if(isset($datos['password']) == true){
            $usuario->password = Hash::make($datos['password']);
        }
        $usuario->estado = $datos['estado'];
        $usuario->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        /* $datos_persona = $request['params']['id_persona']; */
        $datos_usuario = $request['params']['id_usuario'];

        /* $persona = Persona::find($datos_persona);
        $persona->is_deleted = 1;
        $persona->save(); */

        $usuario = User::find($datos_usuario);
        $usuario->is_deleted = 1;
        $usuario->save();

    }
}
