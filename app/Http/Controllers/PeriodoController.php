<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\Periodo;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodoController extends Controller
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
        $datos_periodo = $request['params']['periodo'];

        DB::beginTransaction();
        try {
            Periodo::create([
                'año_id' => $datos_periodo['año_id'],
                'per_inicio_matriculas' => $datos_periodo['inicio_matriculas'],
                'per_final_matricula' => $datos_periodo['final_matricula'],
                'per_limite_cierre' => $datos_periodo['limite_cierre'],
                'per_tp_notas' => $datos_periodo['tp_notas'],
                'per_estado' => $datos_periodo['estado']
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

    public function storeAño(Request $request)
    {
        $datos_anios = $request['params']['anio'];

        DB::beginTransaction();
        try {
            Anio::create([
                'año_descripcion' => $datos_anios['descripcion'],
                'año_fechaInicio' => $datos_anios['fechaInicio'],
                'año_fechaFin' => $datos_anios['fechaFin'],
                'año_duracionHoraAcademica' => $datos_anios['duracionHoraAcademica'],
                'año_duracionHoraLibre' => $datos_anios['duracionHoraLibre'],
                'año_cantidadPersonal' => $datos_anios['cantidadPersonal'],
                'año_tallerSeleccionable' => $datos_anios['tallerSeleccionable'],
                'año_estado' => $datos_anios['estado'],
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
    public function showTipoNotas(Request $request)
    {
        $tipo = Tipo::get();
        return response()->json($tipo);

        /* if ($request->ajax()) {
            return response()->json($tipo);
        }
        return view('Error404'); */
    }

    public function show(Request $request)
    {
        $periodos = Periodo::where('is_deleted','!=',1)->get();
        foreach ($periodos as $p) {
            $tipo = Tipo::where('tp_id',$p->per_tp_notas)->first();
            $año = Anio::where('año_id',$p->año_id)->first();
            $p->periodo = $año->año_descripcion;
            $p->tipoNotas = $tipo->tp_tipo;
        }
        return response()->json($periodos);

        /* if ($request->ajax()) {
            return response()->json($periodos);
        }
        return view('Error404'); */
    }

    public function showAño(Request $request)
    {
        $año = Anio::where('is_deleted','!=',1)->get();
        return response()->json($año);

        /* if ($request->ajax()) {
            return response()->json($año);
        }
        return view('Error404'); */
    }

    public function buscarPeriodo(Request $request)
    {
        $actual = $request['params']['actual'];

        $data_anio = Anio::where('año_descripcion','=',$actual)->where('año_estado',1)->where('is_deleted','!=',1)->first();
        $periodos = Periodo::where('año_id','=',$data_anio->año_id)->where('is_deleted','!=',1)->first();
        $periodos->año_descripcion = $data_anio->año_descripcion;
        return response()->json($periodos);

       /*  if ($request->ajax()) {
            return response()->json($periodos);
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

        $periodo = Periodo::find($datos['per_id']);
        $periodo->año_id = $datos['año_id'];
        $periodo->per_inicio_matriculas = $datos['inicio_matriculas'];
        $periodo->per_final_matricula = $datos['final_matricula'];
        $periodo->per_limite_cierre = $datos['limite_cierre'];
        $periodo->per_tp_notas = $datos['tp_notas'];
        $periodo->per_estado = $datos['estado'];
        $periodo->save();
    }

    public function updateAño(Request $request)
    {
        $datos = $request['params']['anio'];

        $anio = Anio::find($datos['id']);
        $anio->año_descripcion = $datos['descripcion'];
        $anio->año_fechaInicio = $datos['fechaInicio'];
        $anio->año_fechaFin = $datos['fechaFin'];
        $anio->año_duracionHoraAcademica = $datos['duracionHoraAcademica'];
        $anio->año_duracionHoraLibre = $datos['duracionHoraLibre'];
        $anio->año_cantidadPersonal = $datos['cantidadPersonal'];
        $anio->año_tallerSeleccionable = $datos['tallerSeleccionable'];
        $anio->año_estado = $datos['estado'];
        $anio->save();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $datos_periodo = $request['params']['id_periodo'];

        $periodo = Periodo::find($datos_periodo);
        $periodo->is_deleted = 1;
        $periodo->save();

    }

    public function destroyAño(Request $request)
    {
        $datos_anio = $request['params']['id_anio'];

        $anio = Anio::find($datos_anio);
        $anio->is_deleted = 1;
        $anio->save();

    }

    public function activarAño(Request $request)
    {
        $datos_anio = $request['params']['id_anio'];

        $anio = Anio::find($datos_anio);
        $anio->año_estado = 1;
        $anio->save();

    }

    public function desactivarAño(Request $request)
    {
        $datos_anio = $request['params']['id_anio'];

        $anio = Anio::find($datos_anio);
        $anio->año_estado = 0;
        $anio->save();

    }

    public function aperturarPeriodo(Request $request)
    {
        $datos_periodo = $request['params']['id_periodo'];

        $periodo = Periodo::find($datos_periodo);
        $periodo->per_estado = 1;
        $periodo->save();

    }

    public function finalizarPeriodo(Request $request)
    {
        $datos_periodo = $request['params']['id_periodo'];

        $periodo = Periodo::find($datos_periodo);
        $periodo->per_estado = 2;
        $periodo->save();

    }
}
