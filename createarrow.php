<?php
function arrow($im, $x1, $y1, $x2, $y2, $alength, $awidth, $color) { 

    $distance = sqrt(pow($x1 - $x2, 2) + pow($y1 - $y2, 2)); 

    $dx = $x2 + ($x1 - $x2) * $alength / $distance; 
    $dy = $y2 + ($y1 - $y2) * $alength / $distance; 

    $k = $awidth / $alength; 

    $x2o = $x2 - $dx; 
    $y2o = $dy - $y2; 

    $x3 = $y2o * $k + $dx; 
    $y3 = $x2o * $k + $dy; 

    $x4 = $dx - $y2o * $k; 
    $y4 = $dy - $x2o * $k; 


    $ddx = ($x1 < $x2)? 1 : -1; 
    $ddy = ($y1 < $y2)? 1 : -1; 
     
    imageline($im, $x1, $y1, $dx, $dy, $color); 
    imageline($im, $x3, $y3, $x4, $y4, $color); 
    imageline($im, $x3, $y3, $x2, $y2, $color); 
    imageline($im, $x2, $y2, $x4, $y4, $color); 
    imagefill($im, $dx+$ddx, $dy+$ddy, $color); 

} 
?>
