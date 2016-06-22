<?php

 function countLines($filepath)
 {
    /*** open the file for reading ***/
    $handle = fopen( $filepath, "r" );
    /*** set a counter ***/
    $count = 0;
    /*** loop over the file ***/
    while( fgets($handle) )
    {
        /*** increment the counter ***/
        $count++;
    }
    /*** close the file ***/
    fclose($handle);
    /*** show the total ***/
    return $count;
 }
?>
