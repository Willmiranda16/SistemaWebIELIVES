<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use App\Models\Persona;
use App\Models\PersonalAcademico;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalAcademicoController extends Controller
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
        $datos_personalAcademico = $request['params']['personalAcademico'];
        $datos_persona = $request['params']['persona'];

        DB::beginTransaction();
        try {
            if(!$datos_persona['per_id']){
                $Persona = Persona::create([
                    'per_dni' => $datos_persona['dni'],
                    'per_nombres' => $datos_persona['nombres'],
                    'per_apellidos' => $datos_persona['apellidos'],
                    'per_email' => $datos_persona['email'],
                    'per_sexo' => $datos_persona['sexo'],
                    'per_fecha_nacimiento' => $datos_persona['fecha_nacimiento'],
                    'per_estado_civil' => $datos_persona['estado_civil'],
                    'per_celular' => $datos_persona['celular'],
                    'per_pais' => $datos_persona['pais'],
                    'per_departamento' => $datos_persona['departamento'],
                    'per_provincia' => $datos_persona['provincia'],
                    'per_distrito' => $datos_persona['distrito'],
                    'per_direccion' => $datos_persona['direccion']
                ]);
                $datos_persona['per_id'] = $Persona->per_id;
            }

            PersonalAcademico::create([
                'per_id' => $datos_persona['per_id'],
                'pa_turno' => $datos_personalAcademico['turno'],
                'pa_condicion_laboral' => $datos_personalAcademico['condicion_laboral'],
                'niv_id' => $datos_personalAcademico['niv_id'],
                'pa_especialidad' => $datos_personalAcademico['especialidad'],
                'rol_id' => $datos_personalAcademico['rol_id'],
                'pa_is_tutor' => $datos_personalAcademico['is_tutor'],
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
        $personal = PersonalAcademico::where('is_deleted','!=',1)->get();
        foreach ($personal as $p) {
            $persona = Persona::where('per_id',$p->per_id)->first();
            $rol = Rol::where('rol_id',$p->rol_id)->first();
            $nivel = Nivel::where('niv_id',$p->niv_id)->first();
            $p->dni = $persona->per_dni;
            $p->nombres = $persona->per_nombres;
            $p->apellidos = $persona->per_apellidos;
            $p->email = $persona->per_email;
            $p->sexo = $persona->per_sexo;
            $p->fecha_nacimiento = $persona->per_fecha_nacimiento;
            $p->estado_civil = $persona->per_estado_civil;
            $p->celular = $persona->per_celular;
            $p->pais = $persona->per_pais;
            $p->departamento = $persona->per_departamento;
            $p->provincia = $persona->per_provincia;
            $p->distrito = $persona->per_distrito;
            $p->direccion = $persona->per_direccion;
            $p->rol = $rol->rol_descripcion;
            $p->nivel = $nivel->niv_descripcion;
        }
        return response()->json($personal);

        /* if ($request->ajax()) {
            return response()->json($personal);
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
        $datos_personal = $request['params']['data'];

        $personal = Persona::find($datos_personal['per_id']);
        $personal->per_dni = $datos_personal['dni'];
        $personal->per_nombres = $datos_personal['nombres'];
        $personal->per_apellidos = $datos_personal['apellidos'];
        $personal->per_email = $datos_personal['email'];
        $personal->per_sexo = $datos_personal['sexo'];
        $personal->per_fecha_nacimiento = $datos_personal['fecha_nacimiento'];
        $personal->per_estado_civil = $datos_personal['estado_civil'];
        $personal->per_celular = $datos_personal['celular'];
        $personal->per_pais = $datos_personal['pais'];
        $personal->per_departamento = $datos_personal['departamento'];
        $personal->per_provincia = $datos_personal['provincia'];
        $personal->per_distrito = $datos_personal['distrito'];
        $personal->per_direccion = $datos_personal['direccion'];
        $personal->save();

        $personal = PersonalAcademico::find($datos_personal['id_personal']);
        $personal->pa_turno = $datos_personal['turno'];
        $personal->pa_condicion_laboral = $datos_personal['condicion_laboral'];
        $personal->niv_id = $datos_personal['niv_id'];
        $personal->pa_especialidad = $datos_personal['especialidad'];
        $personal->rol_id = $datos_personal['rol_id'];
        $personal->pa_is_tutor = $datos_personal['is_tutor'];
        $personal->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $datos_periodo = $request['params']['id_personal'];

        $periodo = PersonalAcademico::find($datos_periodo);
        $periodo->is_deleted = 1;
        $periodo->save();

    }
}
