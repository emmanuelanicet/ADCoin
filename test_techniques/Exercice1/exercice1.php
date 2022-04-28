<?php 

function sum_array( $no1, $no2 ) {

    $array = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];

    $var = 0 ;

    if ( $no1 < 0 || $no2 < 0){
        return -1;
    }
    /* Optionnel  */
    if (!in_array($no1, $array)){
        return "Le premier nombre entré n'est pas dans le tableau. ";
    }

    if( $no1 < $no2 ){
        if (in_array($no1, $array)) {
            foreach ($array as $key => $value) {
                if ($value >= $no1 && $value <= $no2){
                    // echo $key." => ".$value. "\n"; 
                    $var += $value; 
                }            
            }
        }
        else{
            return 0;
        } 
    }
    else{
        return 0;
    }   
    return $var; 
}
echo sum_array(90,120)
?>