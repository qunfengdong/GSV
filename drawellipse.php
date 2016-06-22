<?php
if($ans[6] == '') {
    $ans[6] == "purple";
}
if($annotationid1 == "1") {
if(($geneStartPos > $compare1) && ($geneStartPos > $compare2)) {
if($ans[2] == '+' || $ans[2] == ".") {
$newvalue = ($geneEndPos - $geneStartPos)/2;
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos+$newvalue,$arrowpos+18,$colors[$ans[6]],$encoding,$string_ann);
}

$newwidth = $geneEndPos - $geneStartPos;
imagefilledellipse($img,$geneStartPos+$newvalue,$arrowpos+21,$newwidth,5,$colors[$ans[6]]);
}
else {
$newvalue = ($geneEndPos - $geneStartPos)/2;
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos+$newvalue,$arrowpos+18,$colors[$ans[6]],$encoding,$string_ann);
}

$newwidth = $geneEndPos - $geneStartPos;
imagefilledellipse($img,$geneStartPos+$newvalue,$arrowpos+21,$newwidth,5,$colors[$ans[6]]);
}

}
elseif ($geneStartPos <= $compare2) {
if($pp!=1) {
if($ans[2] == '+' || $ans[2] == ".") {
$newvalue = ($geneEndPos - $geneStartPos)/2;
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos+$newvalue,$arrowpos-12,$colors[$ans[6]],$encoding,$string_ann);
}
$newwidth = $geneEndPos - $geneStartPos;
imagefilledellipse($img,$geneStartPos+$newvalue,$arrowpos-9,$newwidth,5,$colors[$ans[6]]);
$pp++;
}

else {
$newvalue = ($geneEndPos - $geneStartPos)/2;
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos+$newvalue,$arrowpos-12,$colors[$ans[6]],$encoding,$string_ann);
}

$newwidth = $geneEndPos - $geneStartPos;
imagefilledellipse($img,$geneStartPos+$newvalue,$arrowpos-9,$newwidth,5,$colors[$ans[6]]);
$pp++;
}
}
else {
if($ans[2] == '+' || $ans[2] == ".") {
$newvalue = ($geneEndPos - $geneStartPos)/2;
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos+$newvalue,$arrowpos+3,$colors[$ans[6]],$encoding,$string_ann);
}
$newwidth = $geneEndPos - $geneStartPos;
imagefilledellipse($img,$geneStartPos+$newvalue,$arrowpos+6,$newwidth,5,$colors[$ans[6]]);
$pp=0;
}
else {
$newvalue = ($geneEndPos - $geneStartPos)/2;
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos+$newvalue,$arrowpos+3,$colors[$ans[6]],$encoding,$string_ann);
}

$newwidth = $geneEndPos - $geneStartPos;
imagefilledellipse($img,$geneStartPos+$newvalue,$arrowpos+6,$newwidth,5,$colors[$ans[6]]);
$pp=0;
}


}
}

$compare1 = $geneStartPos;
$compare2 = $geneEndPos;


}
?>
