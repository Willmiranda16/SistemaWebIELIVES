<?php

namespace App\Helpers;

use App\Models\Alumno;
use App\Models\Apoderado;
use App\Models\Aula;
use App\Models\Grado;
use App\Models\Gsa;
use App\Models\Matricula;
use App\Models\Persona;
use App\Models\Seccion;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JhonHelper{
    public static function creandoArrayDatos($hojaActual,$numero,$grado,$seccion,$nameLibreta){
        try{
            # Datos del alumno
            $letra = "B";
            $alumno = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();

            # Obteniendo notas de los cursos
            if ($grado == '5') {
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # DPCC
                # Bimestre 1
                $letra = "C";
                $c1_dpcc_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "D";
                $c2_dpcc_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "E";
                $dpcc_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_dpcc_b1 = ["c1" => $c1_dpcc_b1,"c2"=> $c2_dpcc_b1, "pb" => $dpcc_b1];
                # Bimestre 2
                $letra = "AO";
                $c1_dpcc_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AP";
                $c2_dpcc_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AQ";
                $dpcc_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_dpcc_b2 = ["c1" => $c1_dpcc_b2,"c2"=> $c2_dpcc_b2, "pb" => $dpcc_b2];
                # Bimestre 3
                $letra = "CA";
                $c1_dpcc_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CB";
                $c2_dpcc_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CC";
                $dpcc_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_dpcc_b3 = ["c1" => $c1_dpcc_b3,"c2"=> $c2_dpcc_b3, "pb" => $dpcc_b3];
                # Bimestre 4
                $letra = "DM";
                $c1_dpcc_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DN";
                $c2_dpcc_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DO";
                $dpcc_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "FC";
                $dpcc_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_dpcc_b4 = ["c1" => $c1_dpcc_b4,"c2"=> $c2_dpcc_b4, "pb" => $dpcc_b4, "nf" => $dpcc_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # CIENCIAS SOCIALES
                # Bimestre 1
                $letra = "F";
                $c1_ccss_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "G";
                $c2_ccss_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "H";
                $c3_ccss_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "I";
                $ccss_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ccss_b1 = ["c1" => $c1_ccss_b1,"c2"=> $c2_ccss_b1,"c3"=> $c3_ccss_b1, "pb" => $ccss_b1];
                # Bimestre 2
                $letra = "AR";
                $c1_ccss_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AS";
                $c2_ccss_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AT";
                $c3_ccss_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AU";
                $ccss_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ccss_b2 = ["c1" => $c1_ccss_b2,"c2"=> $c2_ccss_b2,"c3"=> $c3_ccss_b2, "pb" => $ccss_b2];
                # Bimestre 3
                $letra = "CD";
                $c1_ccss_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CE";
                $c2_ccss_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CF";
                $c3_ccss_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CG";
                $ccss_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ccss_b3 = ["c1" => $c1_ccss_b3,"c2"=> $c2_ccss_b3,"c3"=> $c3_ccss_b3, "pb" => $ccss_b3];
                # Bimestre 4
                $letra = "DP";
                $c1_ccss_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DQ";
                $c2_ccss_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DR";
                $c3_ccss_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DS";
                $ccss_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "FD";
                $ccss_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ccss_b4 = ["c1" => $c1_ccss_b4,"c2"=> $c2_ccss_b4,"c3"=> $c3_ccss_b4, "pb" => $ccss_b4, "nf" => $ccss_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # EPT
                # Bimestre 1
                $letra = "J";
                $c1_ept_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "K";
                $ept_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ept_b1 = ["c1" => $c1_ept_b1,"pb" => $ept_b1];
                # Bimestre 2
                $letra = "AV";
                $c1_ept_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AW";
                $ept_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ept_b2 = ["c1" => $c1_ept_b2,"pb" => $ept_b2];
                # Bimestre 3
                $letra = "CH";
                $c1_ept_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CI";
                $ept_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ept_b3 = ["c1" => $c1_ept_b3,"pb" => $ept_b3];
                # Bimestre 4
                $letra = "DT";
                $c1_ept_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DU";
                $ept_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "FE";
                $ept_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ept_b4 = ["c1" => $c1_ept_b4,"pb" => $ept_b4, "nf" => $ept_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # EDUC. FÍSICA
                # Bimestre 1
                $letra = "L";
                $c1_ef_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "M";
                $c2_ef_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "N";
                $c3_ef_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "O";
                $ef_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ef_b1 = ["c1" => $c1_ef_b1,"c2"=> $c2_ef_b1,"c3"=> $c3_ef_b1, "pb" => $ef_b1];
                # Bimestre 2
                $letra = "AX";
                $c1_ef_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AY";
                $c2_ef_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AZ";
                $c3_ef_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BA";
                $ef_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ef_b2 = ["c1" => $c1_ef_b2,"c2"=> $c2_ef_b2,"c3"=> $c3_ef_b2, "pb" => $ef_b2];
                # Bimestre 3
                $letra = "CJ";
                $c1_ef_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CK";
                $c2_ef_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CL";
                $c3_ef_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CM";
                $ef_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ef_b3 = ["c1" => $c1_ef_b3,"c2"=> $c2_ef_b3,"c3"=> $c3_ef_b3, "pb" => $ef_b3];
                # Bimestre 4
                $letra = "DV";
                $c1_ef_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DW";
                $c2_ef_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DX";
                $c3_ef_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DY";
                $ef_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "FF";
                $ef_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ef_b4 = ["c1" => $c1_ef_b4,"c2"=> $c2_ef_b4,"c3"=> $c3_ef_b4, "pb" => $ef_b4, "nf" => $ef_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # COMUNICACIÓN
                # Bimestre 1
                $letra = "P";
                $c1_com_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "Q";
                $c2_com_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "R";
                $c3_com_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "S";
                $com_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_com_b1 = ["c1" => $c1_com_b1,"c2"=> $c2_com_b1,"c3"=> $c3_com_b1, "pb" => $com_b1];
                # Bimestre 2
                $letra = "BB";
                $c1_com_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BC";
                $c2_com_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BD";
                $c3_com_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BE";
                $com_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_com_b2 = ["c1" => $c1_com_b2,"c2"=> $c2_com_b2,"c3"=> $c3_com_b2, "pb" => $com_b2];
                # Bimestre 3
                $letra = "CN";
                $c1_com_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CO";
                $c2_com_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CP";
                $c3_com_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CQ";
                $com_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_com_b3 = ["c1" => $c1_com_b3,"c2"=> $c2_com_b3,"c3"=> $c3_com_b3, "pb" => $com_b3];
                # Bimestre 4
                $letra = "DZ";
                $c1_com_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EA";
                $c2_com_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EB";
                $c3_com_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EC";
                $com_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "FG";
                $com_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_com_b4 = ["c1" => $c1_com_b4,"c2"=> $c2_com_b4,"c3"=> $c3_com_b4, "pb" => $com_b4, "nf" => $com_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # ARTE Y CULT
                # Bimestre 1
                $letra = "T";
                $c1_arte_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "U";
                $c2_arte_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "V";
                $arte_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_arte_b1 = ["c1" => $c1_arte_b1,"c2"=> $c2_arte_b1, "pb" => $arte_b1];
                # Bimestre 2
                $letra = "BF";
                $c1_arte_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BG";
                $c2_arte_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BH";
                $arte_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_arte_b2 = ["c1" => $c1_arte_b2,"c2"=> $c2_arte_b2, "pb" => $arte_b2];
                # Bimestre 3
                $letra = "CR";
                $c1_arte_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CS";
                $c2_arte_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CT";
                $arte_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_arte_b3 = ["c1" => $c1_arte_b3,"c2"=> $c2_arte_b3, "pb" => $arte_b3];
                # Bimestre 4
                $letra = "ED";
                $c1_arte_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EE";
                $c2_arte_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EF";
                $arte_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "FH";
                $arte_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_arte_b4 = ["c1" => $c1_arte_b4,"c2"=> $c2_arte_b4, "pb" => $arte_b4, "nf" => $arte_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # INGLÉS
                # Bimestre 1
                $letra = "W";
                $c1_ing_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "X";
                $c2_ing_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "Y";
                $c3_ing_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "Z";
                $ing_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ing_b1 = ["c1" => $c1_ing_b1,"c2"=> $c2_ing_b1,"c3"=> $c3_ing_b1, "pb" => $ing_b1];
                # Bimestre 2
                $letra = "BI";
                $c1_ing_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BK";
                $c2_ing_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BK";
                $c3_ing_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BL";
                $ing_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ing_b2 = ["c1" => $c1_ing_b2,"c2"=> $c2_ing_b2,"c3"=> $c3_ing_b2, "pb" => $ing_b2];
                # Bimestre 3
                $letra = "CU";
                $c1_ing_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CV";
                $c2_ing_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CW";
                $c3_ing_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CX";
                $ing_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ing_b3 = ["c1" => $c1_ing_b3,"c2"=> $c2_ing_b3,"c3"=> $c3_ing_b3, "pb" => $ing_b3];
                # Bimestre 4
                $letra = "EG";
                $c1_ing_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EH";
                $c2_ing_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EI";
                $c3_ing_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EJ";
                $ing_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "FI";
                $ing_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ing_b4 = ["c1" => $c1_ing_b4,"c2"=> $c2_ing_b4,"c3"=> $c3_ing_b4, "pb" => $ing_b4, "nf" => $ing_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # MATEMÁTICA
                # Bimestre 1
                $letra = "AA";
                $c1_mat_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AB";
                $c2_mat_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AC";
                $c3_mat_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AD";
                $c4_mat_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AE";
                $mat_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_mat_b1 = ["c1" => $c1_mat_b1,"c2"=> $c2_mat_b1,"c3"=> $c3_mat_b1,"c4"=> $c4_mat_b1, "pb" => $mat_b1];
                # Bimestre 2
                $letra = "BM";
                $c1_mat_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BN";
                $c2_mat_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BO";
                $c3_mat_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BP";
                $c4_mat_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BQ";
                $mat_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_mat_b2 = ["c1" => $c1_mat_b2,"c2"=> $c2_mat_b2,"c3"=> $c3_mat_b2,"c4"=> $c4_mat_b2, "pb" => $mat_b2];
                # Bimestre 3
                $letra = "CY";
                $c1_mat_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CZ";
                $c2_mat_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DA";
                $c3_mat_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DB";
                $c4_mat_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DC";
                $mat_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_mat_b3 = ["c1" => $c1_mat_b3,"c2"=> $c2_mat_b3,"c3"=> $c3_mat_b3,"c4"=> $c4_mat_b3, "pb" => $mat_b3];
                # Bimestre 4
                $letra = "EO";
                $c1_mat_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EP";
                $c2_mat_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EQ";
                $c3_mat_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "ER";
                $c4_mat_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "ES";
                $mat_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "FJ";
                $mat_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_mat_b4 = ["c1" => $c1_mat_b4,"c2"=> $c2_mat_b4,"c3"=> $c3_mat_b4,"c4"=> $c4_mat_b4, "pb" => $mat_b4, "nf" => $mat_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # CIENCIA Y TECNOL
                # Bimestre 1
                $letra = "AF";
                $c1_cyt_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AG";
                $c2_cyt_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AH";
                $c3_cyt_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AI";
                $cyt_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_cyt_b1 = ["c1" => $c1_cyt_b1,"c2"=> $c2_cyt_b1,"c3"=> $c3_cyt_b1, "pb" => $cyt_b1];
                # Bimestre 2
                $letra = "BR";
                $c1_cyt_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BS";
                $c2_cyt_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BT";
                $c3_cyt_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BU";
                $cyt_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_cyt_b2 = ["c1" => $c1_cyt_b2,"c2"=> $c2_cyt_b2,"c3"=> $c3_cyt_b2, "pb" => $cyt_b2];
                # Bimestre 3
                $letra = "DD";
                $c1_cyt_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DE";
                $c2_cyt_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DF";
                $c3_cyt_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DG";
                $cyt_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_cyt_b3 = ["c1" => $c1_cyt_b3,"c2"=> $c2_cyt_b3,"c3"=> $c3_cyt_b3, "pb" => $cyt_b3];
                # Bimestre 4
                $letra = "ET";
                $c1_cyt_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EU";
                $c2_cyt_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EV";
                $c3_cyt_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EW";
                $cyt_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "FK";
                $cyt_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_cyt_b4 = ["c1" => $c1_cyt_b4,"c2"=> $c2_cyt_b4,"c3"=> $c3_cyt_b4, "pb" => $cyt_b4, "nf" => $cyt_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # ED. RELIGIOSA
                # Bimestre 1
                $letra = "AJ";
                $c1_rel_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AK";
                $c2_rel_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AL";
                $rel_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_rel_b1 = ["c1" => $c1_rel_b1,"c2"=> $c2_rel_b1, "pb" => $rel_b1];
                # Bimestre 2
                $letra = "BV";
                $c1_rel_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BW";
                $c2_rel_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BX";
                $rel_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_rel_b2 = ["c1" => $c1_rel_b2,"c2"=> $c2_rel_b2, "pb" => $rel_b2];
                # Bimestre 3
                $letra = "DH";
                $c1_rel_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DI";
                $c2_rel_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DJ";
                $rel_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_rel_b3 = ["c1" => $c1_rel_b3,"c2"=> $c2_rel_b3, "pb" => $rel_b3];
                # Bimestre 4
                $letra = "EX";
                $c1_rel_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EY";
                $c2_rel_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EZ";
                $rel_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "FL";
                $rel_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_rel_b4 = ["c1" => $c1_rel_b4,"c2"=> $c2_rel_b4, "pb" => $rel_b4, "nf" => $rel_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # C. TRANS
                # Bimestre 1
                $letra = "AM";
                $c1_trans_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AN";
                $c2_trans_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $datos_trans_b1 = ["c1" => $c1_trans_b1,"c2"=> $c2_trans_b1];
                # Bimestre 2
                $letra = "BY";
                $c1_trans_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BZ";
                $c2_trans_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $datos_trans_b2 = ["c1" => $c1_trans_b2,"c2"=> $c2_trans_b2];
                # Bimestre 3
                $letra = "DK";
                $c1_trans_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DL";
                $c2_trans_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $datos_trans_b3 = ["c1" => $c1_trans_b3,"c2"=> $c2_trans_b3];
                # Bimestre 4
                $letra = "FA";
                $c1_trans_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "FB";
                $c2_trans_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $datos_trans_b4 = ["c1" => $c1_trans_b4,"c2"=> $c2_trans_b4];
            }else{
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # DPCC
                # Bimestre 1
                $letra = "C";
                $c1_dpcc_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "D";
                $c2_dpcc_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "E";
                $dpcc_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_dpcc_b1 = ["c1" => $c1_dpcc_b1,"c2"=> $c2_dpcc_b1, "pb" => $dpcc_b1];
                # Bimestre 2
                $letra = "BW";
                $c1_dpcc_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BX";
                $c2_dpcc_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BY";
                $dpcc_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_dpcc_b2 = ["c1" => $c1_dpcc_b2,"c2"=> $c2_dpcc_b2, "pb" => $dpcc_b2];
                # Bimestre 3
                $letra = "EQ";
                $c1_dpcc_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "ER";
                $c2_dpcc_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "ES";
                $dpcc_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_dpcc_b3 = ["c1" => $c1_dpcc_b3,"c2"=> $c2_dpcc_b3, "pb" => $dpcc_b3];
                # Bimestre 4
                $letra = "HK";
                $c1_dpcc_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "HL";
                $c2_dpcc_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "HM";
                $dpcc_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "KE";
                $dpcc_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_dpcc_b4 = ["c1" => $c1_dpcc_b4,"c2"=> $c2_dpcc_b4, "pb" => $dpcc_b4, "nf" => $dpcc_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # CIENCIAS SOCIALES
                # Bimestre 1
                $letra = "I";
                $c1_ccss_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "J";
                $c2_ccss_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "K";
                $c3_ccss_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "L";
                $ccss_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ccss_b1 = ["c1" => $c1_ccss_b1,"c2"=> $c2_ccss_b1,"c3"=> $c3_ccss_b1, "pb" => $ccss_b1];
                # Bimestre 2
                $letra = "CC";
                $c1_ccss_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CD";
                $c2_ccss_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CE";
                $c3_ccss_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CF";
                $ccss_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ccss_b2 = ["c1" => $c1_ccss_b2,"c2"=> $c2_ccss_b2,"c3"=> $c3_ccss_b2, "pb" => $ccss_b2];
                # Bimestre 3
                $letra = "EW";
                $c1_ccss_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EX";
                $c2_ccss_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EY";
                $c3_ccss_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EZ";
                $ccss_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ccss_b3 = ["c1" => $c1_ccss_b3,"c2"=> $c2_ccss_b3,"c3"=> $c3_ccss_b3, "pb" => $ccss_b3];
                # Bimestre 4
                $letra = "HQ";
                $c1_ccss_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "HR";
                $c2_ccss_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "HS";
                $c3_ccss_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "HT";
                $ccss_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "KK";
                $ccss_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ccss_b4 = ["c1" => $c1_ccss_b4,"c2"=> $c2_ccss_b4,"c3"=> $c3_ccss_b4, "pb" => $ccss_b4, "nf" => $ccss_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # EPT
                # Bimestre 1
                $letra = "Q";
                $c1_ept_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "R";
                $ept_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ept_b1 = ["c1" => $c1_ept_b1,"pb" => $ept_b1];
                # Bimestre 2
                $letra = "CK";
                $c1_ept_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CL";
                $ept_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ept_b2 = ["c1" => $c1_ept_b2,"pb" => $ept_b2];
                # Bimestre 3
                $letra = "FE";
                $c1_ept_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "FF";
                $ept_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ept_b3 = ["c1" => $c1_ept_b3,"pb" => $ept_b3];
                # Bimestre 4
                $letra = "HY";
                $c1_ept_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "HZ";
                $ept_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "KQ";
                $ept_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ept_b4 = ["c1" => $c1_ept_b4,"pb" => $ept_b4, "nf" => $ept_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # EDUC. FÍSICA
                # Bimestre 1
                $letra = "S";
                $c1_ef_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "T";
                $c2_ef_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "U";
                $c3_ef_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "V";
                $ef_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ef_b1 = ["c1" => $c1_ef_b1,"c2"=> $c2_ef_b1,"c3"=> $c3_ef_b1, "pb" => $ef_b1];
                # Bimestre 2
                $letra = "CM";
                $c1_ef_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CN";
                $c2_ef_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CO";
                $c3_ef_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CP";
                $ef_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ef_b2 = ["c1" => $c1_ef_b2,"c2"=> $c2_ef_b2,"c3"=> $c3_ef_b2, "pb" => $ef_b2];
                # Bimestre 3
                $letra = "FG";
                $c1_ef_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "FH";
                $c2_ef_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "FI";
                $c3_ef_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "FJ";
                $ef_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ef_b3 = ["c1" => $c1_ef_b3,"c2"=> $c2_ef_b3,"c3"=> $c3_ef_b3, "pb" => $ef_b3];
                # Bimestre 4
                $letra = "IA";
                $c1_ef_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "IB";
                $c2_ef_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "IC";
                $c3_ef_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "ID";
                $ef_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "KW";
                $ef_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ef_b4 = ["c1" => $c1_ef_b4,"c2"=> $c2_ef_b4,"c3"=> $c3_ef_b4, "pb" => $ef_b4, "nf" => $ef_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # COMUNICACIÓN
                # Bimestre 1
                $letra = "AA";
                $c1_com_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AB";
                $c2_com_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AC";
                $c3_com_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AD";
                $com_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_com_b1 = ["c1" => $c1_com_b1,"c2"=> $c2_com_b1,"c3"=> $c3_com_b1, "pb" => $com_b1];
                # Bimestre 2
                $letra = "CU";
                $c1_com_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CV";
                $c2_com_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CW";
                $c3_com_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "CX";
                $com_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_com_b2 = ["c1" => $c1_com_b2,"c2"=> $c2_com_b2,"c3"=> $c3_com_b2, "pb" => $com_b2];
                # Bimestre 3
                $letra = "FO";
                $c1_com_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "FP";
                $c2_com_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "FQ";
                $c3_com_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "FR";
                $com_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_com_b3 = ["c1" => $c1_com_b3,"c2"=> $c2_com_b3,"c3"=> $c3_com_b3, "pb" => $com_b3];
                # Bimestre 4
                $letra = "II";
                $c1_com_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "IJ";
                $c2_com_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "IK";
                $c3_com_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "IL";
                $com_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "LC";
                $com_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_com_b4 = ["c1" => $c1_com_b4,"c2"=> $c2_com_b4,"c3"=> $c3_com_b4, "pb" => $com_b4, "nf" => $com_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # ARTE Y CULT
                # Bimestre 1
                $letra = "AI";
                $c1_arte_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AJ";
                $c2_arte_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AK";
                $arte_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_arte_b1 = ["c1" => $c1_arte_b1,"c2"=> $c2_arte_b1, "pb" => $arte_b1];
                # Bimestre 2
                $letra = "DC";
                $c1_arte_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DD";
                $c2_arte_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DE";
                $arte_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_arte_b2 = ["c1" => $c1_arte_b2,"c2"=> $c2_arte_b2, "pb" => $arte_b2];
                # Bimestre 3
                $letra = "FW";
                $c1_arte_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "FX";
                $c2_arte_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "FY";
                $arte_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_arte_b3 = ["c1" => $c1_arte_b3,"c2"=> $c2_arte_b3, "pb" => $arte_b3];
                # Bimestre 4
                $letra = "IQ";
                $c1_arte_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "IR";
                $c2_arte_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "IS";
                $arte_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "LI";
                $arte_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_arte_b4 = ["c1" => $c1_arte_b4,"c2"=> $c2_arte_b4, "pb" => $arte_b4, "nf" => $arte_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # INGLÉS
                # Bimestre 1
                $letra = "AO";
                $c1_ing_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AP";
                $c2_ing_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AQ";
                $c3_ing_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AR";
                $ing_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ing_b1 = ["c1" => $c1_ing_b1,"c2"=> $c2_ing_b1,"c3"=> $c3_ing_b1, "pb" => $ing_b1];
                # Bimestre 2
                $letra = "DI";
                $c1_ing_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DJ";
                $c2_ing_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DK";
                $c3_ing_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DL";
                $ing_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ing_b2 = ["c1" => $c1_ing_b2,"c2"=> $c2_ing_b2,"c3"=> $c3_ing_b2, "pb" => $ing_b2];
                # Bimestre 3
                $letra = "GC";
                $c1_ing_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "GD";
                $c2_ing_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "GE";
                $c3_ing_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "GF";
                $ing_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ing_b3 = ["c1" => $c1_ing_b3,"c2"=> $c2_ing_b3,"c3"=> $c3_ing_b3, "pb" => $ing_b3];
                # Bimestre 4
                $letra = "IW";
                $c1_ing_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "IX";
                $c2_ing_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "IY";
                $c3_ing_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "IZ";
                $ing_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "LO";
                $ing_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_ing_b4 = ["c1" => $c1_ing_b4,"c2"=> $c2_ing_b4,"c3"=> $c3_ing_b4, "pb" => $ing_b4, "nf" => $ing_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # MATEMÁTICA
                # Bimestre 1
                $letra = "AW";
                $c1_mat_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AX";
                $c2_mat_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AY";
                $c3_mat_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "AZ";
                $c4_mat_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BA";
                $mat_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_mat_b1 = ["c1" => $c1_mat_b1,"c2"=> $c2_mat_b1,"c3"=> $c3_mat_b1,"c4"=> $c4_mat_b1, "pb" => $mat_b1];
                # Bimestre 2
                $letra = "DQ";
                $c1_mat_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DR";
                $c2_mat_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DS";
                $c3_mat_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DT";
                $c4_mat_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "DU";
                $mat_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_mat_b2 = ["c1" => $c1_mat_b2,"c2"=> $c2_mat_b2,"c3"=> $c3_mat_b2,"c4"=> $c4_mat_b2, "pb" => $mat_b2];
                # Bimestre 3
                $letra = "GK";
                $c1_mat_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "GL";
                $c2_mat_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "GM";
                $c3_mat_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "GN";
                $c4_mat_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "GO";
                $mat_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_mat_b3 = ["c1" => $c1_mat_b3,"c2"=> $c2_mat_b3,"c3"=> $c3_mat_b3,"c4"=> $c4_mat_b3, "pb" => $mat_b3];
                # Bimestre 4
                $letra = "JE";
                $c1_mat_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "JF";
                $c2_mat_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "JG";
                $c3_mat_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "JH";
                $c4_mat_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "JI";
                $mat_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "LU";
                $mat_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_mat_b4 = ["c1" => $c1_mat_b4,"c2"=> $c2_mat_b4,"c3"=> $c3_mat_b4,"c4"=> $c4_mat_b4, "pb" => $mat_b4, "nf" => $mat_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # CIENCIA Y TECNOL
                # Bimestre 1
                $letra = "BG";
                $c1_cyt_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BH";
                $c2_cyt_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BI";
                $c3_cyt_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BJ";
                $cyt_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_cyt_b1 = ["c1" => $c1_cyt_b1,"c2"=> $c2_cyt_b1,"c3"=> $c3_cyt_b1, "pb" => $cyt_b1];
                # Bimestre 2
                $letra = "EA";
                $c1_cyt_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EB";
                $c2_cyt_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EC";
                $c3_cyt_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "ED";
                $cyt_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_cyt_b2 = ["c1" => $c1_cyt_b2,"c2"=> $c2_cyt_b2,"c3"=> $c3_cyt_b2, "pb" => $cyt_b2];
                # Bimestre 3
                $letra = "GU";
                $c1_cyt_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "GV";
                $c2_cyt_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "GW";
                $c3_cyt_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "GX";
                $cyt_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_cyt_b3 = ["c1" => $c1_cyt_b3,"c2"=> $c2_cyt_b3,"c3"=> $c3_cyt_b3, "pb" => $cyt_b3];
                # Bimestre 4
                $letra = "JO";
                $c1_cyt_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "JP";
                $c2_cyt_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "JQ";
                $c3_cyt_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "JR";
                $cyt_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "MA";
                $cyt_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_cyt_b4 = ["c1" => $c1_cyt_b4,"c2"=> $c2_cyt_b4,"c3"=> $c3_cyt_b4, "pb" => $cyt_b4, "nf" => $cyt_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # ED. RELIGIOSA
                # Bimestre 1
                $letra = "BO";
                $c1_rel_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BP";
                $c2_rel_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BQ";
                $rel_b1 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_rel_b1 = ["c1" => $c1_rel_b1,"c2"=> $c2_rel_b1, "pb" => $rel_b1];
                # Bimestre 2
                $letra = "EI";
                $c1_rel_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EJ";
                $c2_rel_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EK";
                $rel_b2 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_rel_b2 = ["c1" => $c1_rel_b2,"c2"=> $c2_rel_b2, "pb" => $rel_b2];
                # Bimestre 3
                $letra = "HC";
                $c1_rel_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "HD";
                $c2_rel_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "HE";
                $rel_b3 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_rel_b3 = ["c1" => $c1_rel_b3,"c2"=> $c2_rel_b3, "pb" => $rel_b3];
                # Bimestre 4
                $letra = "JW";
                $c1_rel_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "JX";
                $c2_rel_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "JY";
                $rel_b4 = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                # Nota final
                $letra = "MG";
                $rel_nf = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();
                $datos_rel_b4 = ["c1" => $c1_rel_b4,"c2"=> $c2_rel_b4, "pb" => $rel_b4, "nf" => $rel_nf];
                # ------------------------------------------------------------------------------------
                # ------------------------------------------------------------------------------------
                # C. TRANS
                # Bimestre 1
                $letra = "BU";
                $c1_trans_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "BV";
                $c2_trans_b1 = ($hojaActual->getCell($letra.$numero))->getValue();
                $datos_trans_b1 = ["c1" => $c1_trans_b1,"c2"=> $c2_trans_b1];
                # Bimestre 2
                $letra = "EO";
                $c1_trans_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "EP";
                $c2_trans_b2 = ($hojaActual->getCell($letra.$numero))->getValue();
                $datos_trans_b2 = ["c1" => $c1_trans_b2,"c2"=> $c2_trans_b2];
                # Bimestre 3
                $letra = "HI";
                $c1_trans_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "HJ";
                $c2_trans_b3 = ($hojaActual->getCell($letra.$numero))->getValue();
                $datos_trans_b3 = ["c1" => $c1_trans_b3,"c2"=> $c2_trans_b3];
                # Bimestre 4
                $letra = "KC";
                $c1_trans_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $letra = "KD";
                $c2_trans_b4 = ($hojaActual->getCell($letra.$numero))->getValue();
                $datos_trans_b4 = ["c1" => $c1_trans_b4,"c2"=> $c2_trans_b4];
            }

            # Transformando grados
            switch ($grado) {
                case '1':
                    $grado = 'PRIMERO';
                    break;
                case '2':
                    $grado = 'SEGUNDO';
                    break;
                case '3':
                    $grado = 'TERCERO';
                    break;
                case '4':
                    $grado = 'CUARTO';
                    break;
                case '5':
                    $grado = 'QUINTO';
                    break;
                case '6':
                    $grado = 'SEXTO';
                    break;
            }

            JhonHelper::generandoLibreta($alumno,$grado,$seccion,$datos_dpcc_b1,$datos_dpcc_b2,$datos_dpcc_b3,$datos_dpcc_b4,$datos_ccss_b1,$datos_ccss_b2,$datos_ccss_b3,$datos_ccss_b4,$datos_ept_b1,$datos_ept_b2,$datos_ept_b3,$datos_ept_b4,$datos_ef_b1,$datos_ef_b2,$datos_ef_b3,$datos_ef_b4,$datos_com_b1,$datos_com_b2,$datos_com_b3,$datos_com_b4,$datos_arte_b1,$datos_arte_b2,$datos_arte_b3,$datos_arte_b4,$datos_ing_b1,$datos_ing_b2,$datos_ing_b3,$datos_ing_b4,$datos_mat_b1,$datos_mat_b2,$datos_mat_b3,$datos_mat_b4,$datos_cyt_b1,$datos_cyt_b2,$datos_cyt_b3,$datos_cyt_b4,$datos_rel_b1,$datos_rel_b2,$datos_rel_b3,$datos_rel_b4,$datos_trans_b1,$datos_trans_b2,$datos_trans_b3,$datos_trans_b4,$nameLibreta);

        } catch (\Exception $e) {
            DB::rollback();
            echo $e->getMessage();
        }
    }

    public static function generandoLibreta($alumno,$grado,$seccion,$datos_dpcc_b1,$datos_dpcc_b2,$datos_dpcc_b3,$datos_dpcc_b4,$datos_ccss_b1,$datos_ccss_b2,$datos_ccss_b3,$datos_ccss_b4,$datos_ept_b1,$datos_ept_b2,$datos_ept_b3,$datos_ept_b4,$datos_ef_b1,$datos_ef_b2,$datos_ef_b3,$datos_ef_b4,$datos_com_b1,$datos_com_b2,$datos_com_b3,$datos_com_b4,$datos_arte_b1,$datos_arte_b2,$datos_arte_b3,$datos_arte_b4,$datos_ing_b1,$datos_ing_b2,$datos_ing_b3,$datos_ing_b4,$datos_mat_b1,$datos_mat_b2,$datos_mat_b3,$datos_mat_b4,$datos_cyt_b1,$datos_cyt_b2,$datos_cyt_b3,$datos_cyt_b4,$datos_rel_b1,$datos_rel_b2,$datos_rel_b3,$datos_rel_b4,$datos_trans_b1,$datos_trans_b2,$datos_trans_b3,$datos_trans_b4,$nameLibreta){
        try{
            // Obteniendo imagen y convintiendolo a base64
            $cao =Storage::path('cao\cao.png');
            $educacion =Storage::path('cao\escudo.png');
            $sello =Storage::path('cao\sello.png');
            $contenidoBinario1 = file_get_contents($educacion);
            $contenidoBinario2 = file_get_contents($cao);
            $contenidoBinario3 = file_get_contents($sello);
            $imagenEducacion = base64_encode($contenidoBinario1);
            $imagenCAO = base64_encode($contenidoBinario2);
            $imagenSello = base64_encode($contenidoBinario3);

            $nombreDocumento = "LIBRETA DE NOTAS - ".$alumno.".pdf";

            // Creando Pdf
            include_once "./vendor/autoload.php";
            $dompdf = new Dompdf();

            /* $dompdf->loadHtml('
                <!doctype html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
                    <title>CONSTANCIA DE MATRÍCULA</title>
                </head>
                <body>
                    <div class="container" style="max-width:600px;width:100%;margin:0 auto;padding:0">
                        <div style="text-align: center"><br>
                            <img src="data:image/jpg;base64,'.$imagenComoBase64.'" alt="Logo de la IES">
                        </div>
                        <div style="text-align: center">
                            <h2 style="margin: 2rem 1rem 1rem 1rem;">INFORME DE PROGRESO DEL APRENDIZAJE DEL ESTUDIANTE - 2019</h2>
                        </div>
                        <div style="text-align: center">
                            <p style="text-align: justify;padding: 1rem 1rem 1rem 1rem;">...</p>
                        </div>
                        <div style="text-align: center">
                            <p style="text-align: justify;padding: 1rem 1rem 1rem 1rem;"><b>HACE CONSTAR:</b></p>
                        </div>
                        <div style="text-align: center">
                            <p style="text-align: justify;padding: 0 1rem 1rem 1rem;">Que, Identificado con DNI , viene realizando estudios en esta universidad/instituto XXXXXXX en la carrera de  y registra matrícula en el CICLO, correspondiente al semestre/año académico: 20212.</p>
                        </div>
                        <div style="text-align: center">
                            <p style="text-align: justify;padding: 0 1rem;">Régimen de estudios:  </p>
                            <p style="text-align: justify;padding: 0 1rem;">Duración total de estudios:  años</p>
                        </div>
                        <div style="text-align: center">
                            <p style="text-align: justify;padding: 1rem 1rem">Se expide la presente a solicitud del interesado y para los fines que estime convenientes.</p>
                        </div>
                        <div style="text-align: center">
                            <p style="padding: 3rem 1rem;text-align: right;">Trujillo, '.date("d").' de marzo del 2022</p>
                        </div>
                        <div style="text-align: center">
                            <p style="padding: 3rem 1rem;text-align: center;">(FIRMA Y SELLO DEL REPRESENTANTE O FIRMA DIGITAL)</p>
                        </div>
                    </div>
                </body>
                </html>
            '); */

            // src="data:image/jpg;base64,'.$imagenEducacion.'"
            // src="data:image/jpg;base64,'.$imagenCAO.'"
            $dompdf->loadHtml('
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>LIBRETA DE NOTAS</title>
                </head>
                <style>
                    body {
                        font-family: sans-serif;
                        font-size: 0.875rem;
                    }

                    .logo {
                        width: 5rem;
                        height: 7rem;
                        object-fit: contain;
                    }

                    .sello {
                        width: 10rem;
                        object-fit: contain;
                    }

                    .table {
                        border-collapse: collapse;
                    }

                    .title {
                        font-weight: 600;
                        font-weight: bold;
                    }

                    .bg-gray {
                        background-color: #C0C0C0;
                        font-weight: 600;
                    }

                    .table tr th,
                    .table tr td {
                        padding: 2px;
                        border: 1px solid black;
                    }

                    table {
                        font-size: 12px;
                    }
                </style>
                <body>
                    <table width="100%" style="margin-bottom: 1.5rem;">
                        <tbody>
                            <tr>
                                <td align="center" colspan="3" class="title">INFORME DE PROGRESO DEL APRENDIZAJE DEL ESTUDIANTE - 2022
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" style="margin-bottom: 1.5rem;">
                        <tbody>
                            <tr>
                                <td align="center">
                                    <img src="data:image/jpg;base64,'.$imagenEducacion.'" alt="escudo" class="logo" />
                                </td>
                                <td>
                                    <table width="100%" border="1" class="table">
                                        <tr>
                                            <td class="bg-gray">DRE:</td>
                                            <td>DRE LA LIBERTAD</td>
                                            <td class="bg-gray">UGEL:</td>
                                            <td>UGEL CHEPÉN</td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray">Nivel:</td>
                                            <td>SECUNDARIA</td>
                                            <td class="bg-gray">Código Modular:</td>
                                            <td>1156207-0</td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray">Institución Educativa:</td>
                                            <td colspan="3">80382 CARLOS A. OLIVARES</td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray">Grado:</td>
                                            <td>'.$grado.'</td>
                                            <td class="bg-gray">Sección:</td>
                                            <td>'.$seccion.'</td>
                                        </tr>
                                        <tr>
                                            <td class="bg-gray">Apellidos y nombres del estudiante:</td>
                                            <td colspan="3">'.$alumno.'</td>
                                        </tr>
                                        <tr style="display:none">
                                            <td class="bg-gray">Código del estudiante:</td>
                                            <td>-</td>
                                            <td class="bg-gray">DNI:</td>
                                            <td>-</td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="center">
                                    <img src="data:image/jpg;base64,'.$imagenCAO.'" alt="cao" class="logo" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="1" class="table" style="margin-bottom: 2rem;">
                        <thead>
                            <tr>
                                <th rowspan="2" class="bg-gray">Área Curricular</th>
                                <th rowspan="2" class="bg-gray">Competencias</th>
                                <th colspan="4" class="bg-gray">Calificativo por periodo</th>
                                <th rowspan="2" class="bg-gray">Calif. final del área</th>
                            </tr>
                            <tr>
                                <th class="bg-gray">1</th>
                                <th class="bg-gray">2</th>
                                <th class="bg-gray">3</th>
                                <th class="bg-gray">4</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="3">Desarrollo personal, ciudadanía y cívica</td>
                                <td>Construye su identidad</td>
                                <td align="center">'.$datos_dpcc_b1['c1'].'</td>
                                <td align="center">'.$datos_dpcc_b2['c1'].'</td>
                                <td align="center">'.$datos_dpcc_b3['c1'].'</td>
                                <td align="center">'.$datos_dpcc_b4['c1'].'</td>
                                <td rowspan="3" align="center">'.$datos_dpcc_b4['nf'].'</td>
                            </tr>
                            <tr>
                                <td>Convive y participa democráticamente en la búsqueda del bien común</td>
                                <td align="center">'.$datos_dpcc_b1['c2'].'</td>
                                <td align="center">'.$datos_dpcc_b2['c2'].'</td>
                                <td align="center">'.$datos_dpcc_b3['c2'].'</td>
                                <td align="center">'.$datos_dpcc_b4['c2'].'</td>
                            </tr>
                            <tr>
                                <td>CALIFICATIVO DE AREA</td>
                                <td align="center">'.$datos_dpcc_b1['pb'].'</td>
                                <td align="center">'.$datos_dpcc_b2['pb'].'</td>
                                <td align="center">'.$datos_dpcc_b3['pb'].'</td>
                                <td align="center">'.$datos_dpcc_b4['pb'].'</td>
                            </tr>
                            <tr>
                                <td rowspan="4">Ciencias sociales
                                </td>
                                <td>Construye interpretaciones históricas</td>
                                <td align="center">'.$datos_ccss_b1['c1'].'</td>
                                <td align="center">'.$datos_ccss_b2['c1'].'</td>
                                <td align="center">'.$datos_ccss_b3['c1'].'</td>
                                <td align="center">'.$datos_ccss_b4['c1'].'</td>
                                <td rowspan="4" align="center">'.$datos_ccss_b4['nf'].'</td>
                            </tr>
                            <tr>
                                <td>Gestiona responsablemente el espacio y el ambiente </td>
                                <td align="center">'.$datos_ccss_b1['c2'].'</td>
                                <td align="center">'.$datos_ccss_b2['c2'].'</td>
                                <td align="center">'.$datos_ccss_b3['c2'].'</td>
                                <td align="center">'.$datos_ccss_b4['c2'].'</td>
                            </tr>
                            <tr>
                                <td>Gestiona responsablemente los recursos económicos</td>
                                <td align="center">'.$datos_ccss_b1['c3'].'</td>
                                <td align="center">'.$datos_ccss_b2['c3'].'</td>
                                <td align="center">'.$datos_ccss_b3['c3'].'</td>
                                <td align="center">'.$datos_ccss_b4['c3'].'</td>
                            </tr>
                            <tr>
                                <td>CALIFICATIVO DE AREA</td>
                                <td align="center">'.$datos_ccss_b1['pb'].'</td>
                                <td align="center">'.$datos_ccss_b2['pb'].'</td>
                                <td align="center">'.$datos_ccss_b3['pb'].'</td>
                                <td align="center">'.$datos_ccss_b4['pb'].'</td>
                            </tr>
                            <tr>
                                <td rowspan="2">Educación para el trabajo</td>
                                <td>Gestiona proyectos de emprendimiento económico o social</td>
                                <td align="center">'.$datos_ept_b1['c1'].'</td>
                                <td align="center">'.$datos_ept_b2['c1'].'</td>
                                <td align="center">'.$datos_ept_b3['c1'].'</td>
                                <td align="center">'.$datos_ept_b4['c1'].'</td>
                                <td rowspan="2" align="center">'.$datos_ept_b4['nf'].'</td>
                            </tr>
                            <tr>
                                <td>CALIFICATIVO DE AREA</td>
                                <td align="center">'.$datos_ept_b1['pb'].'</td>
                                <td align="center">'.$datos_ept_b2['pb'].'</td>
                                <td align="center">'.$datos_ept_b3['pb'].'</td>
                                <td align="center">'.$datos_ept_b4['pb'].'</td>
                            </tr>
                            <tr>
                                <td rowspan="4">Educación física</td>
                                <td>Se desenvuelve de manera autónoma a través de su motricidad</td>
                                <td align="center">'.$datos_ef_b1['c1'].'</td>
                                <td align="center">'.$datos_ef_b2['c1'].'</td>
                                <td align="center">'.$datos_ef_b3['c1'].'</td>
                                <td align="center">'.$datos_ef_b4['c1'].'</td>
                                <td rowspan="4" align="center">'.$datos_ef_b4['nf'].'</td>
                            </tr>
                            <tr>
                                <td>Asume una vida saludable</td>
                                <td align="center">'.$datos_ef_b1['c2'].'</td>
                                <td align="center">'.$datos_ef_b2['c2'].'</td>
                                <td align="center">'.$datos_ef_b3['c2'].'</td>
                                <td align="center">'.$datos_ef_b4['c2'].'</td>
                            </tr>
                            <tr>
                                <td>Interactúa a través de sus habilidades sociomotrices</td>
                                <td align="center">'.$datos_ef_b1['c3'].'</td>
                                <td align="center">'.$datos_ef_b2['c3'].'</td>
                                <td align="center">'.$datos_ef_b3['c3'].'</td>
                                <td align="center">'.$datos_ef_b4['c3'].'</td>
                            </tr>
                            <tr>
                                <td>CALIFICATIVO DE AREA</td>
                                <td align="center">'.$datos_ef_b1['pb'].'</td>
                                <td align="center">'.$datos_ef_b2['pb'].'</td>
                                <td align="center">'.$datos_ef_b3['pb'].'</td>
                                <td align="center">'.$datos_ef_b4['pb'].'</td>
                            </tr>
                            <tr>
                                <td rowspan="4">Comunicación</td>
                                <td>Se comunica oralmente en su lengua materna </td>
                                <td align="center">'.$datos_com_b1['c1'].'</td>
                                <td align="center">'.$datos_com_b2['c1'].'</td>
                                <td align="center">'.$datos_com_b3['c1'].'</td>
                                <td align="center">'.$datos_com_b4['c1'].'</td>
                                <td rowspan="4" align="center">'.$datos_com_b4['nf'].'</td>
                            </tr>
                            <tr>
                                <td>Lee diversos tipos de textos escritos en su lengua materna</td>
                                <td align="center">'.$datos_com_b1['c2'].'</td>
                                <td align="center">'.$datos_com_b2['c2'].'</td>
                                <td align="center">'.$datos_com_b3['c2'].'</td>
                                <td align="center">'.$datos_com_b4['c2'].'</td>
                            </tr>
                            <tr>
                                <td>Escribe diversos tipos de textos en su lengua materna</td>
                                <td align="center">'.$datos_com_b1['c3'].'</td>
                                <td align="center">'.$datos_com_b2['c3'].'</td>
                                <td align="center">'.$datos_com_b3['c3'].'</td>
                                <td align="center">'.$datos_com_b4['c3'].'</td>
                            </tr>
                            <tr>
                                <td>CALIFICATIVO DE AREA</td>
                                <td align="center">'.$datos_com_b1['pb'].'</td>
                                <td align="center">'.$datos_com_b2['pb'].'</td>
                                <td align="center">'.$datos_com_b3['pb'].'</td>
                                <td align="center">'.$datos_com_b4['pb'].'</td>
                            </tr>
                            <tr>
                                <td rowspan="3">Arte y cultura</td>
                                <td>Aprecia de manera crítica manifestaciones artísticoculturales</td>
                                <td align="center">'.$datos_arte_b1['c1'].'</td>
                                <td align="center">'.$datos_arte_b2['c1'].'</td>
                                <td align="center">'.$datos_arte_b3['c1'].'</td>
                                <td align="center">'.$datos_arte_b4['c1'].'</td>
                                <td rowspan="3" align="center">'.$datos_arte_b4['nf'].'</td>
                            </tr>
                            <tr>
                                <td>Crea proyectos desde los lenguajes artísticos </td>
                                <td align="center">'.$datos_arte_b1['c2'].'</td>
                                <td align="center">'.$datos_arte_b2['c2'].'</td>
                                <td align="center">'.$datos_arte_b3['c2'].'</td>
                                <td align="center">'.$datos_arte_b4['c2'].'</td>
                            </tr>
                            <tr>
                                <td>CALIFICATIVO DE AREA</td>
                                <td align="center">'.$datos_arte_b1['pb'].'</td>
                                <td align="center">'.$datos_arte_b2['pb'].'</td>
                                <td align="center">'.$datos_arte_b3['pb'].'</td>
                                <td align="center">'.$datos_arte_b4['pb'].'</td>
                            </tr>
                            <tr>
                                <td rowspan="4">Inglés</td>
                                <td>Se comunica oralmente en inglés como lengua extranjera</td>
                                <td align="center">'.$datos_ing_b1['c1'].'</td>
                                <td align="center">'.$datos_ing_b2['c1'].'</td>
                                <td align="center">'.$datos_ing_b3['c1'].'</td>
                                <td align="center">'.$datos_ing_b4['c1'].'</td>
                                <td rowspan="4" align="center">'.$datos_ing_b4['nf'].'</td>
                            </tr>
                            <tr>
                                <td>Lee diversos tipos de textos escritos en inglés como lengua extranjera</td>
                                <td align="center">'.$datos_ing_b1['c2'].'</td>
                                <td align="center">'.$datos_ing_b2['c2'].'</td>
                                <td align="center">'.$datos_ing_b3['c2'].'</td>
                                <td align="center">'.$datos_ing_b4['c2'].'</td>
                            </tr>
                            <tr>
                                <td>Escribe diversos tipos de textos en inglés como lengua extranjera</td>
                                <td align="center">'.$datos_ing_b1['c3'].'</td>
                                <td align="center">'.$datos_ing_b2['c3'].'</td>
                                <td align="center">'.$datos_ing_b3['c3'].'</td>
                                <td align="center">'.$datos_ing_b4['c3'].'</td>
                            </tr>
                            <tr>
                                <td>CALIFICATIVO DE AREA</td>
                                <td align="center">'.$datos_ing_b1['pb'].'</td>
                                <td align="center">'.$datos_ing_b2['pb'].'</td>
                                <td align="center">'.$datos_ing_b3['pb'].'</td>
                                <td align="center">'.$datos_ing_b4['pb'].'</td>
                            </tr>
                            <tr>
                                <td rowspan="5">Matemática</td>
                                <td>Resuelve problemas de cantidad</td>
                                <td align="center">'.$datos_mat_b1['c1'].'</td>
                                <td align="center">'.$datos_mat_b2['c1'].'</td>
                                <td align="center">'.$datos_mat_b3['c1'].'</td>
                                <td align="center">'.$datos_mat_b4['c1'].'</td>
                                <td rowspan="5" align="center">'.$datos_mat_b4['nf'].'</td>
                            </tr>
                            <tr>
                                <td>Resuelve problemas de regularidad, equivalencia y cambio</td>
                                <td align="center">'.$datos_mat_b1['c2'].'</td>
                                <td align="center">'.$datos_mat_b2['c2'].'</td>
                                <td align="center">'.$datos_mat_b3['c2'].'</td>
                                <td align="center">'.$datos_mat_b4['c2'].'</td>
                            </tr>
                            <tr>
                                <td>Resuelve problemas de forma, movimiento y localización</td>
                                <td align="center">'.$datos_mat_b1['c3'].'</td>
                                <td align="center">'.$datos_mat_b2['c3'].'</td>
                                <td align="center">'.$datos_mat_b3['c3'].'</td>
                                <td align="center">'.$datos_mat_b4['c3'].'</td>
                            </tr>
                            <tr>
                                <td>Resuelve problemas de gestión de datos e incertidumbre</td>
                                <td align="center">'.$datos_mat_b1['c4'].'</td>
                                <td align="center">'.$datos_mat_b2['c4'].'</td>
                                <td align="center">'.$datos_mat_b3['c4'].'</td>
                                <td align="center">'.$datos_mat_b4['c4'].'</td>
                            </tr>
                            <tr>
                                <td>CALIFICATIVO DE AREA</td>
                                <td align="center">'.$datos_mat_b1['pb'].'</td>
                                <td align="center">'.$datos_mat_b2['pb'].'</td>
                                <td align="center">'.$datos_mat_b3['pb'].'</td>
                                <td align="center">'.$datos_mat_b4['pb'].'</td>
                            </tr>
                            <tr>
                                <td rowspan="4">Ciencia y tecnología</td>
                                <td>Indaga mediante métodos científicos para construir sus conocimientos</td>
                                <td align="center">'.$datos_cyt_b1['c1'].'</td>
                                <td align="center">'.$datos_cyt_b2['c1'].'</td>
                                <td align="center">'.$datos_cyt_b3['c1'].'</td>
                                <td align="center">'.$datos_cyt_b4['c1'].'</td>
                                <td rowspan="4" align="center">'.$datos_cyt_b4['nf'].'</td>
                            </tr>
                            <tr>
                                <td>Explica el mundo físico basándose en conocimientos sobre los seres vivos, materia y energía, biodiversidad, Tierra y universo</td>
                                <td align="center">'.$datos_cyt_b1['c2'].'</td>
                                <td align="center">'.$datos_cyt_b2['c2'].'</td>
                                <td align="center">'.$datos_cyt_b3['c2'].'</td>
                                <td align="center">'.$datos_cyt_b4['c2'].'</td>
                            </tr>
                            <tr>
                                <td>Diseña y construye soluciones tecnológicas para resolver problemas de su entorno</td>
                                <td align="center">'.$datos_cyt_b1['c3'].'</td>
                                <td align="center">'.$datos_cyt_b2['c3'].'</td>
                                <td align="center">'.$datos_cyt_b3['c3'].'</td>
                                <td align="center">'.$datos_cyt_b4['c3'].'</td>
                            </tr>
                            <tr>
                                <td>CALIFICATIVO DE AREA</td>
                                <td align="center">'.$datos_cyt_b1['pb'].'</td>
                                <td align="center">'.$datos_cyt_b2['pb'].'</td>
                                <td align="center">'.$datos_cyt_b3['pb'].'</td>
                                <td align="center">'.$datos_cyt_b4['pb'].'</td>
                            </tr>
                            <tr>
                                <td rowspan="3">Educación religiosa</td>
                                <td>Construye su identidad como persona humana, amada por Dios, digna, libre y trascendente, comprendiendo la doctrina de su propia religión, abierto al diálogo con las que le son cercanas.</td>
                                <td align="center">'.$datos_rel_b1['c1'].'</td>
                                <td align="center">'.$datos_rel_b2['c1'].'</td>
                                <td align="center">'.$datos_rel_b3['c1'].'</td>
                                <td align="center">'.$datos_rel_b4['c1'].'</td>
                                <td rowspan="3" align="center">'.$datos_rel_b4['nf'].'</td>
                            </tr>
                            <tr>
                                <td>Asume la experiencia del encuentro personal y comunitario con Dios en su proyecto de vida en coherencia con su creencia religiosa.</td>
                                <td align="center">'.$datos_rel_b1['c2'].'</td>
                                <td align="center">'.$datos_rel_b2['c2'].'</td>
                                <td align="center">'.$datos_rel_b3['c2'].'</td>
                                <td align="center">'.$datos_rel_b4['c2'].'</td>
                            </tr>
                            <tr>
                                <td>CALIFICATIVO DE AREA</td>
                                <td align="center">'.$datos_rel_b1['pb'].'</td>
                                <td align="center">'.$datos_rel_b2['pb'].'</td>
                                <td align="center">'.$datos_rel_b3['pb'].'</td>
                                <td align="center">'.$datos_rel_b4['pb'].'</td>
                            </tr>
                            <tr>
                                <td>Competencia transversal 1</td>
                                <td>Se desenvuelve en entornos virtuales generados por las TIC</td>
                                <td align="center">'.$datos_trans_b1['c1'].'</td>
                                <td align="center">'.$datos_trans_b2['c1'].'</td>
                                <td align="center">'.$datos_trans_b3['c1'].'</td>
                                <td align="center">'.$datos_trans_b4['c1'].'</td>
                                <td align="center"></td>
                            </tr>
                            <tr>
                                <td >Competencia transversal 2</td>
                                <td>Gestiona su Aprendizaje de manera autónoma</td>
                                <td align="center">'.$datos_trans_b1['c2'].'</td>
                                <td align="center">'.$datos_trans_b2['c2'].'</td>
                                <td align="center">'.$datos_trans_b3['c2'].'</td>
                                <td align="center">'.$datos_trans_b4['c2'].'</td>
                                <td align="center"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" style="margin-bottom: 1rem;display: none;">
                        <tbody>
                            <tr>
                                <td align="center" colspan="3" class="title">Resumen de asistencia del estudiante
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="1" class="table" style="margin-bottom: 1rem;display: none;">
                        <thead>
                            <tr>
                                <th rowspan="2" class="bg-gray">Periodo</th>
                                <th colspan="2" class="bg-gray">Inasistencias</th>
                                <th colspan="2" class="bg-gray">Tardanzas</th>
                            </tr>
                            <tr>
                                <th class="bg-gray">Justificadas</th>
                                <th class="bg-gray">Injustificadas</th>
                                <th class="bg-gray">Injustificadas</th>
                                <th class="bg-gray">Injustificadas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td align="center">1</td>
                                <td align="center">0</td>
                                <td align="center">0</td>
                                <td align="center">0</td>
                                <td align="center">0</td>
                            </tr>
                            <tr>
                                <td align="center">2</td>
                                <td align="center">0</td>
                                <td align="center">0</td>
                                <td align="center">0</td>
                                <td align="center">0</td>
                            </tr>
                            <tr>
                                <td align="center">3</td>
                                <td align="center">0</td>
                                <td align="center">0</td>
                                <td align="center">0</td>
                                <td align="center">0</td>
                            </tr>
                            <tr>
                                <td align="center">4</td>
                                <td align="center">0</td>
                                <td align="center">0</td>
                                <td align="center">0</td>
                                <td align="center">0</td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="1" class="table" style="margin-bottom: 1rem;">
                        <thead>
                            <tr>
                                <th colspan="3" class="bg-gray">Situación final del estudiante al término del periodo lectivo</th>
                            </tr>
                            <tr>
                                <th><b>Promovido de grado</b></th>
                                <th><b>Requiere recuperación pedagógica</b></th>
                                <th><b>Permanece en el grado</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td align="center" style="color: #fff;">X</td>
                                <td align="center"></td>
                                <td align="center"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="1" class="table" style="margin-bottom: 5rem;">
                        <thead>
                            <tr>
                                <th colspan="3" class="bg-gray">Área(a) y/o taller(es) que pasan a recuperación pedagógica</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3"align="center" style="color: #fff;">-</td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td align="center">
                                    <img src="data:image/jpg;base64,'.$imagenSello.'" alt="sello" class="sello" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </body>
                </html>
            ');

            $dompdf->render();
            $contenido = $dompdf->output();

            $exists=Storage::disk('local')->exists($nombreDocumento);
            if ($exists) {
                Storage::disk('local')->delete($nombreDocumento);
            }
            Storage::disk('local')->put($nombreDocumento, $contenido);

            /* $rutapdf =Storage::path($nombreDocumento); */

            echo "Estudiante: ".$alumno." -> Se le genero su libreta de notas. \n";
            $mensaje = "Estudiante: $alumno => Se genero su libreta de notas. \n ";
            $contents=Storage::get($nameLibreta);
            $contents .= $mensaje;
            Storage::disk('local')->put($nameLibreta, $contents);
        } catch (\Exception $e) {
            DB::rollback();
            echo $e->getMessage();
        }
    }

    public static function cargandoInformacion($hojaActual,$numero,$filename){
        try{
            # Datos del alumno
            $letra = "F";
            $dni = ($hojaActual->getCell($letra.$numero))->getValue();
            $letra = "I";
            $ap = ($hojaActual->getCell($letra.$numero))->getValue();
            $letra = "J";
            $am = ($hojaActual->getCell($letra.$numero))->getValue();
            $apellidos = $ap.' '.$am;
            $letra = "K";
            $nombres = ($hojaActual->getCell($letra.$numero))->getValue();
            $letra = "L";
            $sexo = ($hojaActual->getCell($letra.$numero))->getValue();
            switch($sexo){
                case 'Hombre':
                    $sexo = 'M';
                    break;
                case 'Mujer':
                    $sexo = 'F';
                    break;
            }
            $letra = "N";
            $fecha_nacimiento = ($hojaActual->getCell($letra.$numero))->getCalculatedValue();

            $data_array = explode("/",$fecha_nacimiento);
            $valor = [];
            for ($i=count($data_array)-1; $i >= 0 ; $i--) {
                array_push($valor,$data_array[$i]);
            }
            $fecha_nacimiento = implode("-",$valor);
            # Datos del apoderado
            $letra = "AW";
            $dniAp = ($hojaActual->getCell($letra.$numero))->getValue();
            if(!$dniAp){
                $dniAp = str_pad($numero, 8, "0", STR_PAD_LEFT);
            }
            $letra = "AS";
            $nombre_completo = ($hojaActual->getCell($letra.$numero))->getValue();
            $letra = "AT";
            $sexoAp = ($hojaActual->getCell($letra.$numero))->getValue();
            switch($sexoAp){
                case 'Hombre':
                    $sexo = 'M';
                    break;
                case 'Mujer':
                    $sexo = 'F';
                    break;
            }
            $letra = "AY";
            $emailAp = ($hojaActual->getCell($letra.$numero))->getValue();
            $letra = "AZ";
            $celularAp = ($hojaActual->getCell($letra.$numero))->getValue();
            $letra = "AU";
            $parentesco = ($hojaActual->getCell($letra.$numero))->getValue();

            # Insertando datos alumno
            $resDataAlumno = Persona::where('per_dni', $dni)
            ->where('is_deleted', '!=',1)
            ->get();
            $countRowData = count($resDataAlumno);
            if ($countRowData == 0) {
                $Persona = Persona::create([
                    'per_dni' => $dni,
                    'per_nombres' => $nombres,
                    'per_apellidos' => $apellidos,
                    'per_sexo' => $sexo,
                    'per_fecha_nacimiento' => $fecha_nacimiento,
                    'per_pais' => "PERÚ",
                    'per_departamento' => 0,
                    'per_provincia' => 0,
                    'per_distrito' => 0
                ]);
                $id_persona = $Persona->per_id;
            }else{
                $id_persona = $resDataAlumno[0]->per_id;
            }

            # Insertando datos apoderado
            $resDataApoderado = Persona::where('per_dni', $dniAp)
            ->where('is_deleted', '!=',1)
            ->get();
            $countRowData = count($resDataApoderado);
            if ($countRowData == 0) {
                $Per_Ap = Persona::create([
                    'per_dni' => $dniAp,
                    'per_nombre_completo' => $nombre_completo,
                    'per_email' => $emailAp,
                    'per_sexo' => $sexoAp,
                    'per_celular' => $celularAp,
                    'per_pais' => "PERÚ",
                    'per_departamento' => 0,
                    'per_provincia' => 0,
                    'per_distrito' => 0
                ]);
                $id_apoderado = $Per_Ap->per_id;
            }else{
                $id_apoderado = $resDataApoderado[0]->per_id;
            }

            # Insertando datos tabla apoderado
            $resData = Apoderado::where('per_id', $id_apoderado)
            ->where('is_deleted', '!=',1)
            ->get();
            $countData = count($resData);
            if ($countData == 0) {
                $Apoderado = Apoderado::create([
                    'per_id' => $id_apoderado,
                    'apo_parentesco' => $parentesco
                ]);
                $data_id = $Apoderado->apo_id;
            }else{
                $data_id = $resData[0]->apo_id;
            }

            # Insertando datos tabla alumno
            $resDataTablaAlumno = Alumno::where('per_id', $id_persona)
            ->where('apo_id', $data_id)
            ->where('is_deleted', '!=',1)
            ->get();
            $countDataTablaAlumno = count($resDataTablaAlumno);
            $alumno = $nombres .' '.$apellidos;
            if ($countDataTablaAlumno == 0) {
                $creado = Alumno::create([
                    'per_id' => $id_persona,
                    'apo_id' => $data_id,
                    'alu_estado' => 1
                ]);
                echo "Estudiante: ".$alumno." -> Registro creado en la base de datos. \n";
                $mensaje = "Estudiante: $alumno => Registro creado: Id_Per_Alumno: $id_persona, Id_Per_Apoderado: $id_apoderado, Id_Apoderado: $data_id, Id_Aalumno: $creado->alu_id  \n ";
                $contents=Storage::get($filename);
                $contents .= $mensaje;
                Storage::disk('local')->put($filename, $contents);
            }else{
                $creado= $resDataTablaAlumno[0]->alu_id;
                echo "Estudiante: ".$alumno." -> Registro existente en la base de datos. \n";
                $mensaje = "Estudiante: $alumno => Registro existente: Id_Per_Alumno: $id_persona, Id_Per_Apoderado: $id_apoderado, Id_Apoderado: $data_id, Id_Aalumno: $creado  \n ";
                $contents=Storage::get($filename);
                $contents .= $mensaje;
                Storage::disk('local')->put($filename, $contents);
            }

        } catch (\Exception $e) {
            DB::rollback();
            echo $e->getMessage();
        }
    }

    public static function maticularAlumnos($hojaActual,$numero,$filename){
        try{
            $letra = "F";
            $dni = ($hojaActual->getCell($letra.$numero))->getValue();

            $letra = "C";
            $grado = ($hojaActual->getCell($letra.$numero))->getValue();
            $grado = strtolower($grado);
            $grado = ucfirst($grado);

            $letra = "D";
            $seccion = ($hojaActual->getCell($letra.$numero))->getValue();

            # Datos del alumno
            $periodo = 2;
            $fecha = '2022-12-19';
            $situacion = 'Promovido';
            $procedencia = 'Misma IE';

            $nivel = 2;

            # Evaluando y obteniendo datos a partir del dni
            $resDataPersona = Persona::where('per_dni', $dni)
            ->where('is_deleted', '!=',1)
            ->get();

            $countRowDataPersona = count($resDataPersona);
            if ($countRowDataPersona == 1) {
                $id_persona = $resDataPersona[0]->per_id;
                $alumno = $resDataPersona[0]->per_nombres.' '.$resDataPersona[0]->per_apellidos;

                $resDataAlumo = Alumno::where('per_id', $id_persona)
                ->where('is_deleted', '!=',1)
                ->get();

                $countRowDataAlumno = count($resDataAlumo);
                if ($countRowDataAlumno == 1) {
                    $id_alumno = $resDataAlumo[0]->alu_id;

                    $resDataMatricula = Matricula::where('alu_id', $id_alumno)
                    ->where('is_deleted', '!=',1)
                    ->get();

                    $countRowDataMatricula = count($resDataMatricula);
                    if ($countRowDataMatricula == 0) {
                        $resDataGrado = Grado::where('niv_id', $nivel)
                        ->where('gra_descripcion', $grado)
                        ->where('gra_is_delete', '!=',1)
                        ->first();
                        $grado = $resDataGrado->gra_id;

                        $resDataSeccion = Seccion::where('sec_descripcion', $seccion)
                        ->where('gra_id', $grado)
                        ->where('sec_is_delete', '!=',1)
                        ->first();
                        $seccion = $resDataSeccion->sec_id;
                        $aula = $resDataSeccion->sec_aula;

                        $gsa = Gsa::create([
                            'ala_id' => $aula,
                            'niv_id' => $nivel,
                            'gra_id' => $grado,
                            'sec_id' => $seccion
                        ]);

                        $creado = Matricula::create([
                            'per_id' => $periodo,
                            'alu_id' => $id_alumno,
                            'ags_id' => $gsa->ags_id,
                            'mat_fecha' => $fecha,
                            'mat_situacion' => $situacion,
                            'mat_tipo_procedencia' => $procedencia
                        ]);

                        Seccion::where('sec_id',$seccion)->decrement('sec_vacantes', 1);

                        echo "Estudiante: ".$alumno." -> Registro creado en la base de datos. \n";
                        $mensaje = "Estudiante: $alumno => Registro creado: Id_Matricula: $creado->mat_id, Id_ags: $gsa->ags_id  \n ";
                        $contents=Storage::get($filename);
                        $contents .= $mensaje;
                        Storage::disk('local')->put($filename, $contents);
                    }else{
                        $creado= $resDataMatricula[0]->mat_id;
                        $ags_id= $resDataMatricula[0]->ags_id;
                        echo "Estudiante: ".$alumno." -> Registro existente en la base de datos. \n";
                        $mensaje = "Estudiante: $alumno => Registro existente: Id_Matricula: $creado, Id_ags: $ags_id  \n ";
                        $contents=Storage::get($filename);
                        $contents .= $mensaje;
                        Storage::disk('local')->put($filename, $contents);
                    }
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            echo $e->getMessage();
        }
    }
}
