<?php

namespace App\Http\Controllers;

use App\Models\AsignarCurso;
use App\Models\AsignarGrado;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\Persona;
use App\Models\PersonalAcademico;
use App\Models\Rol;
use App\Models\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignarCursoController extends Controller
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
    public function store2(Request $request)
    {
        $datos_asignar = $request['params']['asignar'];
        DB::beginTransaction();
        try {
            foreach ($datos_asignar['grado'] as $value) {
                $array = explode(">",$value);
                /* dd($array[0]); */
                $data = AsignarGrado::where('pa_id',$datos_asignar['persona_id'])
                    ->where('niv_id',$datos_asignar['nivel'])
                    ->where('gra_id',$array[0])
                    ->where('seccion',$array[1])
                    ->where('asig_is_deleted','!=',1)
                    ->get();

                if(count($data) == 0){
                    AsignarGrado::create([
                        'pa_id' => $datos_asignar['persona_id'],
                        'niv_id' => $datos_asignar['nivel'],
                        'gra_id' => $array[0],
                        'seccion' => $array[1]
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

    public function store(Request $request)
    {
        $datos_asignar = $request['params']['asignar'];

        DB::beginTransaction();
        try {
            foreach ($datos_asignar['curso'] as $value) {
                $data = AsignarCurso::where('curso',$value)->where('pa_id',$datos_asignar['persona_id'])->where('asig_is_deleted','!=',1)->get();

                if(count($data) == 0){
                    AsignarCurso::create([
                        'pa_id' => $datos_asignar['persona_id'],
                        'niv_id' => $datos_asignar['nivel'],
                        'curso' => $value
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
    public function buscar(Request $request)
    {
        $nivel = $request['params']['nivel'];
        /* $rol = $request['params']['rol'];
        $cargo = Rol::where('rol_descripcion',$rol)->first(); */

        $docentes = PersonalAcademico::whereIn('rol_id',[5,7])->where('niv_id',$nivel)->where('is_deleted','!=',1)->get();
        foreach ($docentes as $d) {
            $persona = Persona::where('per_id',$d->per_id)->first();
            $asignaciones = AsignarCurso::where('pa_id',$d->pa_id)->where('asig_is_deleted','!=',1)->first();
            /* $array = [];
            foreach ($asignaciones as $value) {
                array_push($array,$value->curso);
            } */
            if($asignaciones){
                $d->checked = $asignaciones->curso;
            }else{
                $d->checked = '';
            }

            $d->dni = $persona->per_dni;
            $d->nombres = $persona->per_nombres;
            $d->apellidos = $persona->per_apellidos;
        }

        $cursos = Curso::selectRaw('cur_nombre, cur_abreviatura')->where('cur_horas','>',0)->where('niv_id',$nivel)->where('is_deleted','!=',1)->groupBy('cur_nombre','cur_abreviatura')->get();

        return response()->json([
            'docente' => $docentes,
            'cursos' => $cursos,
        ]);

        /* if ($request->ajax()) {
            return response()->json([
                'docente' => $docentes,
                'cursos' => $cursos,
            ]);
        }
        return view('Error404'); */
    }

    public function buscar2(Request $request)
    {
        $nivel = $request['params']['nivel'];
        $curso = $request['params']['curso'];

        if($curso == "-1"){
            $asignacion_curso = AsignarCurso::where('niv_id',$nivel)->where('asig_is_deleted','!=',1)->get();
        }else{
            $asignacion_curso = AsignarCurso::where('curso',$curso)->where('niv_id',$nivel)->where('asig_is_deleted','!=',1)->get();
        }
        foreach ($asignacion_curso as $d) {
            $docentes = PersonalAcademico::where('pa_id',$d->pa_id)->where('is_deleted','!=',1)->first();
            $persona = Persona::where('per_id',$docentes->per_id)->first();
            $asignaciones = AsignarGrado::where('pa_id',$d->pa_id)->where('asig_is_deleted','!=',1)->get();
            $array2 = [];
            foreach ($asignaciones as $value) {
                array_push($array2,$value->gra_id.'>'.$value->seccion);
            }
            $d->totalAsignaciones = count($array2);
            $d->asignaciones = $array2;
            $d->dni = $persona->per_dni;
            $d->nombres = $persona->per_nombres;
            $d->apellidos = $persona->per_apellidos;
        }

        $new_grados = [];
        $new_secciones = [];

        $data_grados = Grado::where('niv_id',$nivel)->where('gra_is_delete','!=',1)->get();
        foreach ($data_grados as $g) {
            $secciones = Seccion::where('gra_id',$g->gra_id)->where('sec_is_delete','!=',1)->get();
            $seccion = [];
            $grado = [];
            foreach ($secciones as $s) {
                $value = $g->gra_id.'>'.$s->sec_descripcion;
                array_push($grado,$value);
                array_push($seccion,$s->sec_descripcion);
            }
            array_push($new_grados,$grado);
            array_push($new_secciones,$seccion);
        }
        foreach ($asignacion_curso as $d) {
            $resultado = [];
            $d->secciones = $new_secciones;
            $d->grados = $new_grados;
            if ($d->totalAsignaciones > 0) {
                foreach ($d->asignaciones as $value) {
                    $grados =  $d->grados;
                    foreach ($grados as $ke => $va) {
                        foreach ($va as $k => $v) {
                            if ($v == $value) {
                                $valor = $ke.'-'.$k;
                                array_push($resultado,$valor);
                            }
                        }
                    }
                    foreach ($resultado as $re) {
                        $valor = explode("-",$re);
                        $i1 = $valor[0];
                        $i2 = $valor[1];
                        $grados[$i1][$i2] = 1;
                    }
                }
                $d->grados = $grados;
            }
        }
        return response()->json([
            'asignacion' => $asignacion_curso,
            'grados' => $data_grados
        ]);

        /* if ($request->ajax()) {
            return response()->json([
                'asignacion' => $asignacion_curso,
                'grados' => $data_grados
            ]);
        }
        return view('Error404'); */
    }

    public function showCursos(Request $request)
    {
        $nivel = $request['params']['nivel'];

        $cursos = Curso::selectRaw('cur_nombre, cur_abreviatura')->where('cur_horas','>',0)->where('niv_id',$nivel)->where('is_deleted','!=',1)->groupBy('cur_nombre','cur_abreviatura')->get();

        return response()->json([
            'cursos' => $cursos,
        ]);

        /* if ($request->ajax()) {
            return response()->json([
                'cursos' => $cursos,
            ]);
        }
        return view('Error404'); */
    }

    public function showAulas(Request $request)
    {
        /* $aulas = Aula::orderBy('ala_id','asc')->where('ala_en_uso','!=',1)->where('ala_tipo','!=','Oficina')->where('ala_tipo','!=','Extra')->where('ala_is_delete','!=',1)->get();
        foreach ($aulas as $value) {
            $grado = Grado::where('gra_id',$value->gra_id)->first();
            $nivel = Nivel::where('niv_id',$grado->niv_id)->first();
            $value->grado = $grado->gra_descripcion;
            $value->nivel = $nivel->niv_descripcion;
        }
        if ($request->ajax()) {
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
        /* $datos = $request['params']['aula'];
        $aula = Aula::find($datos['id']);
        $aula->ala_abreviatura = $datos['abreviatura'];
        $aula->ala_aforo = $datos['capacidad'];
        $aula->ala_ubicacion = $datos['ubicacion'];
        $aula->ala_estado = $datos['estado'];
        $aula->save(); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $docente = $request['params']['asignar'];

        $data = AsignarCurso::where('pa_id',$docente)->get();
        foreach ($data as $a) {
            $aa = AsignarCurso::find($a->asig_id);
            $aa->asig_is_deleted = 1;
            $aa->save();
        }
    }

    public function destroy2(Request $request)
    {
        $docente = $request['params']['asignar'];

        $data = AsignarGrado::where('pa_id',$docente)->get();
        foreach ($data as $a) {
            $aa = AsignarGrado::find($a->asig_id);
            $aa->asig_is_deleted = 1;
            $aa->save();
        }
    }
}
