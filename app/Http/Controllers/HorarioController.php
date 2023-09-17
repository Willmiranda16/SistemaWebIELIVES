<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Gsa;
use App\Models\Horario;
use App\Models\Periodo;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HorarioController extends Controller
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
        $datos_horario = $request['params']['horario'];

        $periodo = Periodo::where('año_id',$datos_horario['año'])->first();
        $ags = Gsa::where('niv_id',$datos_horario['nivel'])->where('gra_id',$datos_horario['grado'])->where('sec_id',$datos_horario['seccion'])->first();

        DB::beginTransaction();
        try {
            Horario::create([
                'per_id' => $periodo->per_id,
                'ags_id' => $ags->ags_id,
                'cur_id' => $datos_horario['curso'],
                'fecha' => $datos_horario['fecha'],
                'hora_inicio' => $datos_horario['hora_inicio'],
                'hora_fin' => $datos_horario['hora_fin'],
                'color' => $datos_horario['color'],
                'editable' => $datos_horario['editable']
            ]);

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
        $datos_horario = $request['params']['horario'];

        $periodo = Periodo::where('año_id',$datos_horario['año'])->first();
        $ags = Gsa::where('niv_id',$datos_horario['nivel'])->where('gra_id',$datos_horario['grado'])->where('sec_id',$datos_horario['seccion'])->first();

        $horarios = Horario::where('per_id',$periodo->per_id)->where('ags_id',$ags->ags_id)->where('is_deleted','!=',1)->get();
        foreach ($horarios as $value) {
            $curso = Curso::where('cur_id',$value->cur_id)->where('is_deleted','!=',1)->first();
            if (!$curso) {
                $value->curso = 'Recreo';
                $value->hora_inicio = $value->fecha.' '.substr($value->hora_inicio, 0, 5);
                $value->hora_fin = date("Y-m-d",strtotime($value->fecha."+ 4 day")).' '.substr($value->hora_fin, 0, 5);
            }else{
                $value->curso = $curso->cur_abreviatura;
                $value->hora_inicio = $value->fecha.' '.substr($value->hora_inicio, 0, 5);
                $value->hora_fin = $value->fecha.' '.substr($value->hora_fin, 0, 5);
            }
        }

        $cursos = Curso::where('cur_horas','>',0)->where('niv_id', $datos_horario['nivel'])->where('gra_id', $datos_horario['grado'])->where('is_deleted','!=',1)->get();

        return response()->json([
            'horarios' => $horarios,
            'cursos' => $cursos
        ]);

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
        $datos = $request['params']['horario'];


        $fecha = explode("/",$datos['start']);
        $fecha = $fecha[2] ."-". $fecha[1] ."-". $fecha[0];
        $inicio = substr($datos['time_start'], 0, 5);
        $final = substr($datos['time_end'], 0, 5);

        $horario = Horario::find($datos['id']);
        $horario->fecha = $fecha;
        $horario->hora_inicio = $inicio;
        $horario->hora_fin = $final;
        $horario->save();
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
