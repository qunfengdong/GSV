<?php
if($ans[6] == '') {
    $ans[6] == "purple";
}

if($annotationid1 == "1") {

if(($geneStartPos > $compare1) && ($geneStartPos > $compare2)) {

if($ans[2] == '+' || $ans[2] == ".") {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos,$arrowpos-$geneid_y_position-3,$colors[$ans[6]],$encoding,$string_ann);
}
arrow($img,$geneStartPos,$arrowpos-8,$geneEndPos,$arrowpos-8,$alength, $awidth, $colors[$ans[6]]);

}
else {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos+7,$arrowpos-$geneid_y_position-1,$colors[$ans[6]],$encoding,$string_ann);
}
arrow($img,$geneEndPos,$arrowpos-8,$geneStartPos,$arrowpos-8,$alength, $awidth, $colors[$ans[6]]);

}


}

elseif ($geneStartPos <= $compare2) {
if($pp!=1) {
if($ans[2] == '+' || $ans[2] == ".") {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos,$arrowpos-$geneid_y_position+21,$colors[$ans[6]],$encoding,$string_ann);
}
arrow($img,$geneStartPos,$arrowpos+15,$geneEndPos,$arrowpos+15,  $alength, $awidth, $colors[$ans[6]]);
$pp++;
}
else {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos+7,$arrowpos-$geneid_y_position+21,$colors[$ans[6]],$encoding,$string_ann);
}
arrow($img,$geneEndPos,$arrowpos+16,$geneStartPos,$arrowpos+16,  $alength, $awidth, $colors[$ans[6]]);
$pp++;
}
}
else {
if($ans[2] == '+' || $ans[2] == ".") {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos,$arrowpos-$geneid_y_position+11,$colors[$ans[6]],$encoding,$string_ann);
}
arrow($img,$geneStartPos,$arrowpos+5,$geneEndPos,$arrowpos+5,$alength, $awidth, $colors[$ans[6]]);
$pp=0;
}
else {
if($ans[3] != ".") {
$string_ann = substr("$ans[3]",0,$dist/5);
imagettftext($img,6,0,$geneStartPos+7,$arrowpos-$geneid_y_position+11,$colors[$ans[6]],$encoding,$string_ann);
}
arrow($img,$geneEndPos,$arrowpos+5,$geneStartPos,$arrowpos+5,$alength, $awidth, $colors[$ans[6]]);
$pp=0;
}


}

}





$compare1 = $geneStartPos;
$compare2 = $geneEndPos;

}
?>
