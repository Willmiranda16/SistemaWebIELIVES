<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Apoderado;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
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
        $datos_apoderado = $request['params']['apoderado'];
        /* dd($datos_apoderado); */
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
            if(!$datos_apoderado['per_id']){
                $Apo = Persona::create([
                    'per_dni' => $datos_apoderado['dni'],
                    'per_nombres' => $datos_apoderado['nombres'],
                    'per_apellidos' => $datos_apoderado['apellidos'],
                    'per_email' => $datos_apoderado['email'],
                    'per_sexo' => $datos_apoderado['sexo'],
                    'per_fecha_nacimiento' => $datos_apoderado['fecha_nacimiento'],
                    'per_estado_civil' => $datos_apoderado['estado_civil'],
                    'per_celular' => $datos_apoderado['celular'],
                    'per_pais' => $datos_apoderado['pais'],
                    'per_departamento' => $datos_apoderado['departamento'],
                    'per_provincia' => $datos_apoderado['provincia'],
                    'per_distrito' => $datos_apoderado['distrito'],
                    'per_direccion' => $datos_apoderado['direccion']
                ]);
                $datos_apoderado['per_id'] = $Apo->per_id;
            }

            $Apoderado = Apoderado::create([
                'per_id' => $datos_apoderado['per_id'],
                'apo_parentesco' => $datos_apoderado['parentesco'],
                'apo_vive_con_estudiante' => $datos_apoderado['vive_con_estudiante']
            ]);

            Alumno::create([
                'per_id' => $datos_persona['per_id'],
                'apo_id' => $Apoderado->apo_id,
                'alu_estado' => 1
            ]);

            DB::commit();

            if ($request->ajax()) {
                return response()->json([
                    'status' => 1
                ]);
            }
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
        $alumnos = Alumno::where('is_deleted','!=',1)->get();
        foreach ($alumnos as $a) {
            $persona = Persona::where('per_id',$a->per_id)->first();
            $apoderado = Apoderado::where('apo_id',$a->apo_id)->first();
            $apo_persona = Persona::where('per_id',$apoderado->per_id)->first();
            $a->dni = $persona->per_dni;
            $a->nombres = $persona->per_nombres;
            $a->apellidos = $persona->per_apellidos;
            $a->email = $persona->per_email;
            $a->sexo = $persona->per_sexo;
            $a->fecha_nacimiento = $persona->per_fecha_nacimiento;
            $a->estado_civil = $persona->per_estado_civil;
            $a->celular = $persona->per_celular;
            $a->pais = $persona->per_pais;
            $a->departamento = $persona->per_departamento;
            $a->provincia = $persona->per_provincia;
            $a->distrito = $persona->per_distrito;
            $a->direccion = $persona->per_direccion;

            $a->apo_parentesco = $apoderado->apo_parentesco;
            $a->apo_vive_con_estudiante = $apoderado->apo_vive_con_estudiante;
            $a->apo_per_id = $apo_persona->per_id;
            $a->apo_dni = $apo_persona->per_dni;
            if($apo_persona->per_nombres == ""){
                $a->apo_nombre_completo = $apo_persona->per_nombre_completo;
            }else{
                /* $a->apo_nombres = $apo_persona->per_nombres;
                $a->apo_apellidos = $apo_persona->per_apellidos; */
                $a->apo_nombre_completo = $apo_persona->per_apellidos.' '.$apo_persona->per_nombres;
            }
            $a->apo_email = $apo_persona->per_email;
            $a->apo_sexo = $apo_persona->per_sexo;
            $a->apo_fecha_nacimiento = $apo_persona->per_fecha_nacimiento;
            $a->apo_estado_civil = $apo_persona->per_estado_civil;
            $a->apo_celular = $apo_persona->per_celular;
            $a->apo_pais = $apo_persona->per_pais;
            $a->apo_departamento = $apo_persona->per_departamento;
            $a->apo_provincia = $apo_persona->per_provincia;
            $a->apo_distrito = $apo_persona->per_distrito;
            $a->apo_direccion = $apo_persona->per_direccion;
        }
        return response()->json($alumnos);

        /* if ($request->ajax()) {
            return response()->json($alumnos);
        }
        return view('Error404'); */
    }

    public function buscar(Request $request)
    {
        dd($request['params']);
        /* $alumnos = Alumno::where('is_deleted','!=',1)->get();
        foreach ($alumnos as $a) {
            $persona = Persona::where('id_persona',$a->id_persona)->first();
            $apoderado = Apoderado::where('id_apoderado',$a->id_apoderado)->first();
            $a->id_persona = $persona->id_persona;
            $a->dni = $persona->dni;
            $a->nombres = $persona->nombres;
            $a->apellidos = $persona->apellidos;
            $a->sexo = $persona->sexo;
            $a->fecha_nacimiento = $persona->fecha_nacimiento;
            $a->celular = $persona->celular;
            $a->id_apoderado = $apoderado->id_apoderado;
            $a->dni_apoderado = $apoderado->dni;
            $a->nombres_apoderado = $apoderado->nombres;
            $a->apellidos_apoderado = $apoderado->apellidos;
            $a->parantesco_apoderado = $apoderado->parantesco;
            $a->celular_apoderado = $apoderado->celular;
        }
        if ($request->ajax()) {
            return response()->json($alumnos);
        }
        return view('Error404'); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeapoderado(Request $request)
    {
        $datos_apoderado = $request['params']['apoderado'];
        /* dd($datos_persona,$datos_apoderado); */
        DB::beginTransaction();
        try {
            Apoderado::create([
                'dni' => $datos_apoderado['dni'],
                'nombres' => $datos_apoderado['nombres'],
                'apellidos' => $datos_apoderado['apellidos'],
                'celular' => $datos_apoderado['celular'],
                'parantesco' => $datos_apoderado['parentesco']
            ]);

            DB::commit();

            return response()->json([
                'status' => 1
            ]);

           /*  if ($request->ajax()) {
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
    public function showapoderado(Request $request)
    {
        $apoderados = Apoderado::where('is_deleted','!=',1)->get();
        return response()->json($apoderados);
        /* if ($request->ajax()) {
            return response()->json($apoderados);
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
        $datos_alumno = $request['params']['data'];

        $persona = Persona::find($datos_alumno['per_id']);
        $persona->per_dni = $datos_alumno['dni'];
        $persona->per_nombres = $datos_alumno['nombres'];
        $persona->per_apellidos = $datos_alumno['apellidos'];
        $persona->per_email = $datos_alumno['email'];
        $persona->per_sexo = $datos_alumno['sexo'];
        $persona->per_fecha_nacimiento = $datos_alumno['fecha_nacimiento'];
        $persona->per_estado_civil = $datos_alumno['estado_civil'];
        $persona->per_celular = $datos_alumno['celular'];
        $persona->per_pais = $datos_alumno['pais'];
        $persona->per_departamento = $datos_alumno['departamento'];
        $persona->per_provincia = $datos_alumno['provincia'];
        $persona->per_distrito = $datos_alumno['distrito'];
        $persona->per_direccion = $datos_alumno['direccion'];
        $persona->save();

        $per_apo = Persona::find($datos_alumno['apo_per_id']);
        $per_apo->per_dni = $datos_alumno['apo_dni'];
        $per_apo->per_nombres = $datos_alumno['apo_nombres'];
        $per_apo->per_apellidos = $datos_alumno['apo_apellidos'];
        $per_apo->per_email = $datos_alumno['apo_email'];
        $per_apo->per_sexo = $datos_alumno['apo_sexo'];
        $per_apo->per_fecha_nacimiento = $datos_alumno['apo_fecha_nacimiento'];
        $per_apo->per_estado_civil = $datos_alumno['apo_estado_civil'];
        $per_apo->per_celular = $datos_alumno['apo_celular'];
        $per_apo->per_pais = $datos_alumno['apo_pais'];
        $per_apo->per_departamento = $datos_alumno['apo_departamento'];
        $per_apo->per_provincia = $datos_alumno['apo_provincia'];
        $per_apo->per_distrito = $datos_alumno['apo_distrito'];
        $per_apo->per_direccion = $datos_alumno['apo_direccion'];
        $per_apo->save();

        $apoderado = Apoderado::find($datos_alumno['apo_id']);
        $apoderado->apo_parentesco = $datos_alumno['apo_parentesco'];
        $apoderado->apo_vive_con_estudiante = $datos_alumno['apo_vive_con_estudiante'];
        $apoderado->save();

        $alumno = Alumno::find($datos_alumno['alu_id']);
        $alumno->alu_estado = $datos_alumno['alu_estado'];
        $alumno->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $datos_alumno = $request['params']['alu_id'];
        $datos_persona = $request['params']['per_id'];
        $datos_persona = $request['params']['apo_id'];
        $datos_persona = $request['params']['apo_per_id'];

        $alumno = Alumno::find($datos_alumno);
        $alumno->is_deleted = 1;
        $alumno->save();

    }
}
