<?php
function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens 
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
class Mod
{
    public $modelo;
    public $anio;
    public $rcp;
}
 
$miroc1 = new Mod();
$miroc1->path = "miroc/miroc452020.csv";;
$miroc1->modelo = 'MIROC';
$miroc1->anio = '2020';
$miroc1->rcp = 4.5;
    $miroc2 = new Mod();
    $miroc2->path = "miroc/miroc452050.csv";
    $miroc2->modelo = 'MIROC';
    $miroc2->anio = '2050';
    $miroc2->rcp = 4.5;
$miroc3 = new Mod();
$miroc3->path = "miroc/miroc452080.csv";
$miroc3->modelo = 'MIROC';
$miroc3->anio = '2080';
$miroc3->rcp = 4.5;
    $miroc4 = new Mod();
    $miroc4->path = "miroc/miroc852020.csv";
    $miroc4->modelo = 'MIROC';
    $miroc4->anio = '2020';
    $miroc4->rcp = 8.5;
$miroc5 = new Mod();
$miroc5->path = "miroc/miroc852050.csv";
$miroc5->modelo = 'MIROC';
$miroc5->anio = '2050';
$miroc5->rcp = 8.5;
    $miroc6 = new Mod();
    $miroc6->path = "miroc/miroc852080.csv";
    $miroc6->modelo = 'MIROC';
    $miroc6->anio = '2080';
    $miroc6->rcp = 8.5;
 
    $mpi1 = new Mod();
    $mpi1->path = "mpi/mpi452020.csv";
    $mpi1->modelo = 'MPI';
    $mpi1->anio = '2020';
    $mpi1->rcp = 4.5;
        $mpi2 = new Mod();
        $mpi2->path = "mpi/mpi452050.csv";
        $mpi2->modelo = 'MPI';
        $mpi2->anio = '2050';
        $mpi2->rcp = 4.5;
    $mpi3 = new Mod();
    $mpi3->path = "mpi/mpi452080.csv";
    $mpi3->modelo = 'MPI';
    $mpi3->anio = '2080';
    $mpi3->rcp = 4.5;
        $mpi4 = new Mod();
        $mpi4->path = "mpi/mpi852020.csv";
        $mpi4->modelo = 'MPI';
        $mpi4->anio = '2020';
        $mpi4->rcp = 8.5;
    $mpi5 = new Mod();
    $mpi5->path = "mpi/mpi852050.csv";
    $mpi5->modelo = 'MPI';
    $mpi5->anio = '2050';
    $mpi5->rcp = 8.5;
        $mpi6 = new Mod();
        $mpi6->path = "mpi/mpi852080.csv";
        $mpi6->modelo = 'MPI';
        $mpi6->anio = '2080';
        $mpi6->rcp = 8.5;
 
$en1 = new Mod();
$en1->path = "en/en452020.csv";
$en1->modelo = 'EN';
$en1->anio = '2020';
$en1->rcp = 4.5;
    $en2 = new Mod();
    $en2->path = "en/en452050.csv";
    $en2->modelo = 'EN';
    $en2->anio = '2050';
    $en2->rcp = 4.5;
$en3 = new Mod();
$en3->path = "en/en452080.csv";
$en3->modelo = 'EN';
$en3->anio = '2080';
$en3->rcp = 4.5;
    $en4 = new Mod();
    $en4->path = "en/en852020.csv";
    $en4->modelo = 'EN';
    $en4->anio = '2020';
    $en4->rcp = 8.5;
$en5 = new Mod();
$en5->path = "en/en852050.csv";
$en5->modelo = 'EN';
$en5->anio = '2050';
$en5->rcp = 8.5;
    $en6 = new Mod();
    $en6->path = "en/en852080.csv";
    $en6->modelo = 'EN';
    $en6->anio = '2080';
    $en6->rcp = 8.5;
 
$mri1 = new Mod();
$mri1->path = "mri/mri452020.csv";
$mri1->modelo = 'MRI';
$mri1->anio = '2020';
$mri1->rcp = 4.5;
    $mri2 = new Mod();
    $mri2->path = "mri/mri452050.csv";
    $mri2->modelo = 'MRI';
    $mri2->anio = '2050';
    $mri2->rcp = 4.5;
$mri3 = new Mod();
$mri3->path = "mri/mri452080.csv";
$mri3->modelo = 'MRI';
$mri3->anio = '2080';
$mri3->rcp = 4.5;
    $mri4 = new Mod();
    $mri4->path = "mri/mri852020.csv";
    $mri4->modelo = 'MRI';
    $mri4->anio = '2020';
    $mri4->rcp = 8.5;
$mri5 = new Mod();
$mri5->path = "mri/mri852050.csv";
$mri5->modelo = 'MRI';
$mri5->anio = '2050';
$mri5->rcp = 8.5;
    $mri6 = new Mod();
    $mri6->path = "mri/mri852080.csv";
    $mri6->modelo = 'MRI';
    $mri6->anio = '2080';
    $mri6->rcp = 8.5;
 
 
$Mods = array(
    $miroc1, $miroc2,$miroc3,$miroc4,$miroc5,$miroc6,
    $mpi1, $mpi2,$mpi3,$mpi4,$mpi5,$mpi6,
    $en1, $en2,$en3,$en4,$en5,
    $mri2,$mri3,$mri4,$mri5,$mri6,
    
);
 
include('conexion.php');
foreach ($Mods as $mod) {
    echo 'This mod is a ' . $mod->modelo . ' ' . $mod->anio . ' ' . $mod->rcp . "\n";    
    $start = microtime(true);
    $mod = $mod->modelo;
    $anio = $mod->anio;
    $rcp = $mod->rcp;
    
    if( $file = fopen($mod->path, "r") ){
        
        
        while(!feof($file) ) {
            $f = fgets($file);  
            $x = explode(",", $f);
    
            $ent  = intval(str_replace('"','',$x[1]));
            $max = ($x[5]+$x[6]+$x[7]+$x[8]+$x[9]+$x[10]+$x[11]+$x[12]+$x[13]+$x[14]+$x[15]+$x[16])/12;
            $min = $x[17]+$x[18]+$x[19]+$x[20]+$x[21]+$x[22]+$x[23]+$x[24]+$x[25]+$x[26]+$x[27]+$x[28])/12;
            $med = $x[29]+$x[30]+$x[31]+$x[32]+$x[33]+$x[34]+$x[35]+$x[36]+$x[37]+$x[38]+$x[39]+$x[40])/12;
            $pre =  $x[41]+$x[42]+$x[43]+$x[44]+$x[45]+$x[46]+$x[47]+$x[48]+$x[49]+$x[50]+$x[51]
                +intval($x[52]);
            $qq = " ($ent,$anio,$rcp,'$mod',
                $x[5],$x[6],$x[7],$x[8],$x[9],$x[10],$x[11],$x[12],$x[13],$x[14],$x[15],$x[16],
                $x[17],$x[18],$x[19],$x[20],$x[21],$x[22],$x[23],$x[24],$x[25],$x[26],$x[27],$x[28],
                $x[29],$x[30],$x[31],$x[32],$x[33],$x[34],$x[35],$x[36],$x[37],$x[38],$x[39],$x[40],
                $x[41],$x[42],$x[43],$x[44],$x[45],$x[46],$x[47],$x[48],$x[49],$x[50],$x[51],$x[52],
                $max,$min,$med,$pre
            ) ";
            $q = "INSERT INTO futuro(lug_id,fut_anio,fut_rcp,fut_mod,
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
            echo "\nSUCCESS m:".$mod."y:".$anio."r:".$rcp." lug_id:".$ent;
        }
 
        $end = microtime(true);
        $time = $end-$start;
        echo "\n\n time: ".$time;
    }
    fclose($file);
}
?>


