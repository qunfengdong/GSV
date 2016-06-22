 <script type="text/javascript">
   // we will add our javascript code here          
 
$(document).ready(function(){
$("#gencombinedimg").click(function(){
 
// 'this' refers to the current submitted form
var str = $(this).serialize();
 
   $.ajax({
   type: "POST",
   url: "mergeImages.php",
   data: str,
    success:function(data){$('#c').html(data);} 
 });
 
return false;
 
});
 
});
 
 </script>  
