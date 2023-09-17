<?php

namespace App\Console\Commands;

use App\Helpers\JhonHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

class CargandoInfoAlumno extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'go:alumno';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para cargar información de los estudiantes del nivel secundario - CAO';

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
        $rutaArchivo = Storage::path("cao\InformacionPadresFamiliaEstudiantes.xlsx");
        $documento = IOFactory::load($rutaArchivo);

        # numero de hoja trabajar
        $nroHoja = 0;

        # Obtener hoja
        $hojaActual = $documento->getSheet($nroHoja);
        /* $totalDeHojas = $documento->getSheetCount();
        echo $totalDeHojas;return; */
        # obteniendo cantidad de filas de datos
        $rows = $hojaActual->getHighestRow();
       /*  $rows = 13; */

        $numero = 13;

        // Creando el archivo txt
        $filename = "Reporte_Informacion_Estudiantes.txt";
        $exists=Storage::disk('local')->exists($filename);
        if (!$exists) {
            Storage::disk('local')->put($filename, '');
        }else{
            Storage::disk('local')->delete($filename);
            Storage::disk('local')->put($filename, '');
        }

        while($numero <= $rows){
            # Datos del alumno
            $letra = "F";
            $dni = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();

            if($dni){
                JhonHelper::cargandoInformacion($hojaActual,$numero,$filename);
            }

            $numero ++;
        }
        echo 'Exito, Todo funciono correctamente';
    }
}
