<?php
if($ans[6] == '') {
    $ans[6] == "purple";
}
if($annotationid1 == "1") {
if(($geneStartPos > $compare1) && ($geneStartPos > $compare2)) {

if($ans[2] == '+' || $ans[2] == ".") {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos+2,$arrowpos+11,$colors[$ans[6]],$encoding,$string_ann);
}
imagefilledrectangle($img,$geneStartPos,$arrowpos+13,$geneEndPos,$arrowpos+17, $colors[$ans[6]]);

}
else {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos+2,$arrowpos+11,$colors[$ans[6]],$encoding,$string_ann);
}
imagefilledrectangle($img,$geneStartPos,$arrowpos+13,$geneEndPos,$arrowpos+17, $colors[$ans[6]]);
}



}
elseif (($geneStartPos >= $compare1) && ($geneStartPos <= $compare2)) {

if($pp!=1) {
if($ans[2] == '+' || $ans[2] == ".") {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos,$arrowpos-2,$colors[$ans[6]],$encoding,$string_ann);
}
imagefilledrectangle($img,$geneStartPos,$arrowpos,$geneEndPos,$arrowpos+4, $colors[$ans[6]]);
$pp++;
}
else {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos,$arrowpos-2,$colors[$ans[6]],$encoding,$string_ann);
}
imagefilledrectangle($img,$geneStartPos,$arrowpos,$geneEndPos,$arrowpos+4, $colors[$ans[6]]);
$pp++;
}
}
else {
if($ans[2] == '+' || $ans[2] == ".") {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos,$arrowpos-13,$colors[$ans[6]],$encoding,$string_ann);
}
imagefilledrectangle($img,$geneStartPos,$arrowpos-9,$geneEndPos,$arrowpos-12, $colors[$ans[6]]);
$pp=0;
}
else {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos,$arrowpos-13,$colors[$ans[6]],$encoding,$string_ann);
}
imagefilledrectangle($img,$geneStartPos,$arrowpos-9,$geneEndPos,$arrowpos-12, $colors[$ans[6]]);
$pp=0;
}


}

}


$compare1 = $geneStartPos;
$compare2 = $geneEndPos;


}
?>
