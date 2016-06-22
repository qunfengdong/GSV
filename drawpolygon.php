<?php
if($ans[6] == '') {
    $ans[6] == "purple";
}
if($annotationid1 == "1") {
if(($geneStartPos > $compare1) && ($geneStartPos > $compare2)) {

if($ans[2] == '+' || $ans[2] == ".") {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos,$arrowpos+15,$colors[$ans[6]],$encoding,$string_ann);
}
$newvlaues = ($geneEndPos-$geneStartPos)/2;
    $polygon = array($geneStartPos  ,$arrowpos+18,
                     $geneEndPos-$newvlaues ,$arrowpos+18,
                     $geneEndPos,$arrowpos+19.5,
                     $geneEndPos-$newvlaues ,$arrowpos+21,
                     $geneStartPos  ,$arrowpos+21);
    ImageFilledPolygon($img, $polygon, 5, $colors[$ans[6]]);
}
else {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos,$arrowpos+15,$colors[$ans[6]],$encoding,$string_ann);
}
$newvlaues = ($geneEndPos-$geneStartPos)/2;
    $polygon = array($geneEndPos  ,$arrowpos+18,
                     $geneStartPos+$newvlaues ,$arrowpos+18,
                     $geneStartPos,$arrowpos+19.5,
                     $geneStartPos+$newvlaues ,$arrowpos+21,
                     $geneEndPos  ,$arrowpos+21);
    ImageFilledPolygon($img, $polygon, 5, $colors[$ans[6]]);
}


}
elseif ($geneStartPos <= $compare2) {
if($pp!=1) {
if($ans[2] == '+' || $ans[2] == ".") {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos,$arrowpos-12,$colors[$ans[6]],$encoding,$string_ann);
}
$newvlaues = ($geneEndPos-$geneStartPos)/2;
    $polygon = array($geneStartPos  ,$arrowpos-6,
                     $geneEndPos-$newvalues ,$arrowpos-6,
                     $geneEndPos,$arrowpos-8.5,
                     $geneEndPos-$newvlaues ,$arrowpos-10,
                     $geneStartPos  ,$arrowpos-10);
    ImageFilledPolygon($img, $polygon, 5, $colors[$ans[6]]);

$pp++;
}
else {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos,$arrowpos-12,$colors[$ans[6]],$encoding,$string_ann);
}
$newvlaues = ($geneEndPos-$geneStartPos)/2;

    $polygon = array($geneEndPos  ,$arrowpos-6,
                     $geneStartPos+$newvlaues ,$arrowpos-6,
                     $geneStartPos,$arrowpos-8.5,
                     $geneStartPos+$newvlaues ,$arrowpos-10,
                     $geneEndPos  ,$arrowpos-10);
    ImageFilledPolygon($img, $polygon, 5, $colors[$ans[6]]);
$pp++;
}
}
else {
if($ans[2] == '+' || $ans[2] == ".") {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos,$arrowpos+2,$colors[$ans[6]],$encoding,$string_ann);
}
$newvlaues = ($geneEndPos-$geneStartPos)/2;
    $polygon = array($geneStartPos  ,$arrowpos+4,
                     $geneEndPos-$newvalues ,$arrowpos+4,
                     $geneEndPos,$arrowpos+5.5,
                     $geneEndPos-$newvlaues ,$arrowpos+7,
                     $geneStartPos  ,$arrowpos+7);
    ImageFilledPolygon($img, $polygon, 5, $colors[$ans[6]]);
$pp=0;
}
else {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos,$arrowpos+2,$colors[$ans[6]],$encoding,$string_ann);
}
$newvlaues = ($geneEndPos-$geneStartPos)/2;

    $polygon = array($geneEndPos  ,$arrowpos,
                     $geneStartPos+$newvlaues ,$arrowpos+4,
                     $geneStartPos,$arrowpos+5.5,
                     $geneStartPos+$newvlaues ,$arrowpos+7,
                     $geneEndPos  ,$arrowpos+7);
    ImageFilledPolygon($img, $polygon, 5, $colors[$ans[6]]);
$pp=0;
}






}
}



$compare1 = $geneStartPos;
$compare2 = $geneEndPos;


}
?>
