<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Aula;
use App\Models\Matricula;
use App\Models\Periodo;
use App\Models\PersonalAcademico;
use App\Models\User;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $periodo = Periodo::where('is_deleted','!=', 1)->count();
        $usuarios = User::where('is_deleted','!=', 1)->where('id','!=', 1)->count();
        $aulas = Aula::where('ala_is_delete','!=', 1)->count();
        $docentes = PersonalAcademico::whereIn('rol_id',[5,7])->where('is_deleted','!=',1)->count();
        $alumnos = Alumno::where('is_deleted','!=', 1)->count();
        $matriculas = Matricula::where('is_deleted','!=', 1)->count();
        return response()->json(
            [
                'periodo'=>$periodo,
                'usuarios'=>$usuarios,
                'aulas'=>$aulas,
                'docentes'=>$docentes,
                'alumnos'=>$alumnos,
                'matriculas'=>$matriculas
            ]);

        /* if ($request->ajax()) {
            return response()->json(
                [
                    'periodo'=>$periodo,
                    'usuarios'=>$usuarios,
                    'aulas'=>$aulas,
                    'docentes'=>$docentes,
                    'alumnos'=>$alumnos,
                    'matriculas'=>$matriculas
                ]);
        }
        return view('Error404'); */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
