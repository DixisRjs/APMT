<?php
function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens 
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
    include('conexion.php');
    $start = microtime(true);
    if( $file = fopen("20082009.csv", "r") ){
        while(!feof($file) ) {
            $f = fgets($file);  
            $x = explode(",", $f);
                $anio = intval(clean($x[0]));
                $ent  = intval(str_replace('"','',$x[2]));
            $max = ($x[6]+$x[7]+$x[8]+$x[9]+$x[10]+$x[11]+$x[12]+$x[13]+$x[14]+$x[15]+$x[16]+$x[17])/12;
            $min = $x[18]+$x[19]+$x[20]+$x[21]+$x[22]+$x[23]+$x[24]+$x[25]+$x[26]+$x[27]+$x[28]+$x[29])/12;
            $med = $x[30]+$x[31]+$x[32]+$x[33]+$x[34]+$x[35]+$x[36]+$x[37]+$x[38]+$x[39]+$x[40]+$x[41])/12;
            $pre = $x[42]+$x[43]+$x[44]+$x[45]+$x[46]+$x[47]+$x[48]+$x[49]+$x[50]+$x[51]+$x[52]+
           intval($x[53]);
            $qq = " ($ent,$anio,
            $x[6],$x[7],$x[8],$x[9],$x[10],$x[11],$x[12],$x[13],$x[14],$x[15],$x[16],$x[17],
            $x[18],$x[19],$x[20],$x[21],$x[22],$x[23],$x[24],$x[25],$x[26],$x[27],$x[28],$x[29],
            $x[30],$x[31],$x[32],$x[33],$x[34],$x[35],$x[36],$x[37],$x[38],$x[39],$x[40],$x[41],
            $x[42],$x[43],$x[44],$x[45],$x[46],$x[47],$x[48],$x[49],$x[50],$x[51],$x[52],$x[53],
            $max,$min,$med,$pre
            ) ";
            $q = "INSERT INTO historico(lug_id,csa_anio,
            tmax01,tmax02,tmax03,tmax04,tmax05,tmax06,tmax07,tmax08,tmax09,tmax10,tmax11,tmax12,
            tmin01,tmin02,tmin03,tmin04,tmin05,tmin06,tmin07,tmin08,tmin09,tmin10,tmin11,tmin12,
            tmed01,tmed02,tmed03,tmed04,tmed05,tmed06,tmed07,tmed08,tmed09,tmed10,tmed11,tmed12,
            pre01,pre02,pre03,pre04,pre05,pre06,pre07,pre08,pre09,pre10,pre11,pre12,
            tmax_anual,tmin_anual,tmed_anual,pre_anual)
            VALUES ".$qq;
            $res = false;
            while(!$res){
                try {
                    $res = pg_query($q) or die('Error: ' . pg_last_error());
                } Catch (Exception $e) {
                    echo "\nerror";
                    Echo $e->getMessage();
                }   
            }
            echo "\nEXITOSO y:".$anio." lug_id:".$ent;
        }
        $end = microtime(true);
        $time = $end-$start;
        echo "\n\n time: ".$time;
    }
    fclose($file);
?>

