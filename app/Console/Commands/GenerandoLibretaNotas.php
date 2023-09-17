<?php

namespace App\Console\Commands;

use App\Helpers\JhonHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

class GenerandoLibretaNotas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'libreta:go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para generar libretas de notas de los estudiantes del nivel secundario - CAO';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        # obteniendo ruta del archivo
        $rutaArchivo = Storage::path("cao\Notas-2022.xlsx");
        $documento = IOFactory::load($rutaArchivo);

        # numero de hoja trabajar
        # 0: 1° A / 1: 1° B / 2: 1° C / 3: 1° D / 4: 1° E
        # 5: 2° A / 6: 2° B / 7: 2° C / 8: 2° D
        # 9: 3° A / 10: 3° B / 11: 3° C / 12: 3° D / 13: 3° E
        # 14: 4° A / 15: 4° B / 16: 4° C / 17: 4° D / 18: 4° E / 19: 4° F
        # 20: 5° A / 21: 5° B / 22: 5° C / 23: 5° D / 24: 5° E
        $nroHoja = 24;
        # Grado y seccion a trabajar
        $grado = "5";
        $seccion = "E";

        # Obtener hoja
        $hojaActual = $documento->getSheet($nroHoja);
        /* $totalDeHojas = $documento->getSheetCount();
        echo $totalDeHojas;return; */
        # obteniendo cantidad de filas de datos
        $rows = $hojaActual->getHighestRow();

        /* $rows = 34; */
        $numero = 4;

        // Creando el archivo txt
        $filename = "Reporte_Libreta_Notas_".$grado."° ".$seccion.".txt";
        $exists=Storage::disk('local')->exists($filename);
        if (!$exists) {
            Storage::disk('local')->put($filename, '');
        }else{
            Storage::disk('local')->delete($filename);
            Storage::disk('local')->put($filename, '');
        }

        while($numero <= $rows){
            # Datos del alumno
            $letra = "B";
            $alumno = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
            /* echo is_string($alumno);return; */

            if(is_string($alumno) == 1){
                JhonHelper::creandoArrayDatos($hojaActual,$numero,$grado,$seccion,$filename);
            }

            $numero ++;
        }
        echo 'Exito, Todo funciono correctamente';
    }
}
