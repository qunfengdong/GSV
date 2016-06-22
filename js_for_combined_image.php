<script type="text/javascript">

$(function() {
$("#gencombinedimg").click(function() {

$.ajax({
type: "POST",
url: "mergeImages.php",
data: $('#myForm').serialize(),

//data: dataString,
success: function(){
$('.success').fadeIn(200).show();
//alert($('#myForm').serialize());

//alert("The image has been generated.");
}
});

return false;
});
});
 
</script>
