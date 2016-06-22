<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
#panelcontrol font.arrow {cursor:pointer;}
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.tablednd_0_5.js" type="text/javascript"></script>
<script src="js/block.js" type="text/javascript"></script>
<script src="js/jtip.js" type="text/javascript"></script>
<script type="text/javascript" src="js/overlib/overlib.js"><!-- overLIB (c) Erik Bosrup --></script>

<script type="text/javascript">



function moreOptions(){
		document.getElementById('moreOption').style.display = 'block';	
	}
	
	/**
		Close the 'More options' div when the user mouseovers 'Close'
	*/
	function closeMoreOption(){
		document.getElementById('moreOption').style.display = 'none';	
	}
	
	function submitForm(myform){
		document[myform].submit();
	}

	
	 /**
                drag and drop tables using jquery
        */


	$(document).ready(function() {
    	// Initialise the table
    	$("#table-1").tableDnD();
	});

	/**
		show and hide upper images function
	*/
	
	function upperdisplayRow(jj){
        var kk = jj;
        var str2 = "upperRow";
	 var str3 = "upperdisplaycolor";
        var row = document.getElementById(str2.concat(jj));
         var font = document.getElementById(str3.concat(jj));
        if (row.style.display == '') {
	 row.style.display = 'none';
	 font.style.color = 'f26122';
	 }
         else {
	 row.style.display = '';
         font.style.color = '008000';
	      }
	}	

	
	 /**
                show and hide lower images function
        */

        function lowerdisplayRow(jj){
        var kk = jj;
        var str2 = "lowerRow";
        var str3 = "lowerdisplaycolor";
        var row = document.getElementById(str2.concat(jj));
         var font = document.getElementById(str3.concat(jj));
	if (row.style.display == '') {
	 row.style.display = 'none';
	 font.style.color = 'f26122';
	 }        
	 else { row.style.display = '';
         	font.style.color = '008000';
	     }
	}

	/*
		Get complete region
	*/
	 function getcompleteview(number1) {
		for(j=0;j<=number1;j++)
                {
	  		
		var imageStart = document.getElementById('finalstart'+j).value;
		var imageEnd = document.getElementById('finalend'+j).value;
                var start = 'startpos'+j;
                var end = 'endpos'+j;
		document.getElementById(start).value = parseInt(imageStart);
		document.getElementById('zoomstart'+j).value = parseInt(imageStart);
		document.getElementById('zoomend'+j).value = parseInt(imageEnd);
		document.getElementById(end).value = parseInt(imageEnd);
		}		
		getcompleterefresh_synteny();
		//getcompleterefresh_upperimage(<?php echo $upper_draw_time; ?>);
		//getcompleterefresh_lowerimage(<?php echo $lower_draw_time; ?>);
		upper_refresh(<?php echo $upper_draw_time; ?>);
                LOWERrefresh(<?php echo $lower_draw_time; ?>);
	
	}

         function getcompleteview_syntenyonly(number1) {
                for(j=0;j<=number1;j++)
                {

                var imageStart = document.getElementById('finalstart'+j).value;
                var imageEnd = document.getElementById('finalend'+j).value;
                var start = 'startpos'+j;
                var end = 'endpos'+j;
                document.getElementById(start).value = parseInt(imageStart);
                document.getElementById('zoomstart'+j).value = parseInt(imageStart);
                document.getElementById('zoomend'+j).value = parseInt(imageEnd);
                document.getElementById(end).value = parseInt(imageEnd);
                }
                getcompleterefresh_synteny();
		
		
	
	}
	

	/*
		create downloadable images
	*/
	function get_download_images() {
                var sss = document.getElementById('filtervalue').value;
                var replacepossign = sss.replace("+", "%2B");
		    var url='savesynimage.php';
                url +=
          '?annid='+document.getElementById('annid').value+
                '&ref='+document.getElementById('ref').value+
                '&query='+document.getElementById('query').value+
                '&zoomrefstart='+document.getElementById('zoomstart0').value+
                '&zoomrefend='+document.getElementById('zoomend0').value+
                '&zoomquerystart='+document.getElementById('zoomstart1').value+
                '&zoomqueryend='+document.getElementById('zoomend1').value+
                '&session_id='+document.getElementById('session_id').value+
                '&polygon='+radio_polygon_value()+
                '&image='+radio_image_width()+
                '&filtersign='+document.getElementById('filtersign').value+
                //'&filtervalue='+document.getElementById('filtervalue').value
                '&filtervalue='+replacepossign

                ;
                document.getElementById('downloadsyntenyimage').src = url;
                alert(url);


	}


		/*	
		download images
		*/
/*	
                function Generate_combined_image(){
                var myradio=document.getElementsByName("gencombinedimg");
                var div=document.getElementById("c").getElementsByTagName("div");
                var namevalue=document.getElementById("combinedimages").value;
                var agevalue=document.getElementById("session_id_gene").value;

                for(i=0;i<div.length;i++){
                if(myradio[i]){
                        div[i].style.display="block";
                        }
                        else{
                        div[i].style.display="none";
                        }
                }
                $.get(mergeImages.php?combinedimages=namevalue&session_id_gene=agevalue");
	        //ajaxget();
		}
 
*/      
		
	
	

	
	
function getValue1(todo, number){
if(number != 2) {
		var imageStart = document.getElementById('zoomstart'+number).value;
		var finalimageStart = document.getElementById('finalstart'+number).value;
		var imageEnd = document.getElementById('zoomend'+number).value;
		var finalimageEnd = document.getElementById('finalend'+number).value;
		var turn = Math.floor(( parseInt(imageEnd) - parseInt(imageStart))*1/3);

		var start = 'startpos'+number;
		var end = 'endpos'+number;
		var track;
		//**
		// If user wants to move to the right
		//**
		if (todo.match('right')){
			   if((parseInt(imageEnd) + turn) >  parseInt(finalimageEnd)){
	                        imageStart = parseInt(imageStart) + turn;
	                        imageEnd = parseInt(finalimageEnd);
	                        alert("You can not move right any further!");
                                return;
			}
			
			imageStart = parseInt(imageStart) + turn;
			imageEnd = parseInt(imageEnd) + turn;
		
							
		}
		

		//**
		// If user wants to move to left
		//**
		if (todo.match('left')){
			if((parseInt(imageStart) - turn) < 0){
			imageStart = 1;
                        imageEnd = parseInt(imageEnd) - turn;
                        alert("You can not move left any further!");
				return;
			}
			
			imageStart = parseInt(imageStart) - turn;
			imageEnd = parseInt(imageEnd) - turn;			
		
					    
					
			
			}

		//**
		// If user wants to zoom in
		//**
		if (todo.match('zoomin')){
			imageStart = parseInt(imageStart) + turn;
			imageEnd = parseInt(imageEnd) - turn;					
		}
	
		//**
		// If user wants to zoom out
		//**
		if (todo.match('zoomout')){
			 if((parseInt(imageStart) == parseInt(finalimageStart)) && (parseInt(imageEnd) == parseInt(finalimageEnd)))
                        {

                                alert("You can not zoom out any further!");

                                return;
                                exit();
                        }
			if((turn*3) > parseInt(imageStart)){
				imageStart = parseInt(imageStart) - (turn * 3);
				imageEnd = parseInt(imageEnd) + ((turn * 3) - parseInt(imageStart));
			} else {
				imageStart = parseInt(imageStart) - (turn * 3);
				imageEnd = parseInt(imageEnd) + (turn * 3);				
			}
		}
	/*	
		if (parseInt(imageStart) <= 0){
			document.getElementById(start).value = 1;
		} else {
			document.getElementById(start).value = parseInt(imageStart);
		}
		document.getElementById('start'+number).value = parseInt(imageStart);
		if( parseInt(imageEnd) >= parseInt(finalimageEnd)) {
		document.getElementById('end'+number).value = parseInt(finalimageEnd);		
		document.getElementById(end).value = parseInt(finalimageEnd);	
		}
		else {
		document.getElementById('end'+number).value = parseInt(imageEnd);		
		document.getElementById(end).value = parseInt(imageEnd);	
		}
	*/


		if (parseInt(imageStart) <= 0){
                        document.getElementById(start).value = 1;
                        document.getElementById('zoomstart'+number).value = parseInt(finalimageStart);
                        } else {
                        document.getElementById(start).value = parseInt(imageStart);

                        document.getElementById('zoomstart'+number).value = parseInt(imageStart);
                }
                if( parseInt(imageEnd) >= parseInt(finalimageEnd)) {
                        document.getElementById('zoomend'+number).value = parseInt(finalimageEnd);
                        document.getElementById(end).value = parseInt(finalimageEnd);
                }
                else {
                        document.getElementById('zoomend'+number).value = parseInt(imageEnd);
                        document.getElementById(end).value = parseInt(imageEnd);
                }

		//**
		//Now refresh the image with the parameters provided
		//**

		refresh();
		upper_refresh(<?php echo $upper_draw_time; ?>);
		LOWERrefresh(<?php echo $lower_draw_time; ?>);
		}
		else {
    var imageStart0 = document.getElementById('zoomstart0').value;
		var finalimageStart0 = document.getElementById('finalstart0').value;
		var imageEnd0 = document.getElementById('zoomend0').value;
		var finalimageEnd0 = document.getElementById('finalend0').value;
	  var imageStart1 = document.getElementById('zoomstart1').value;
		var finalimageStart1 = document.getElementById('finalstart1').value;
		var imageEnd1 = document.getElementById('zoomend1').value;
		var finalimageEnd1 = document.getElementById('finalend1').value;
		var turn0 = Math.floor(( parseInt(imageEnd0) - parseInt(imageStart0))*1/3);
    var turn1 = Math.floor(( parseInt(imageEnd0) - parseInt(imageStart0))*1/3);
		var start0 = 'startpos0';
		var end0 = 'endpos0';
			var start1 = 'startpos1';
		var end1 = 'endpos1';
      		if (todo.match('right')){
			   if((parseInt(imageEnd0) + turn0) >  parseInt(finalimageEnd0) || (parseInt(imageEnd1) + turn1) >  parseInt(finalimageEnd1)){
	                        imageStart0 = parseInt(imageStart0) + turn0;
	                        imageEnd0 = parseInt(finalimageEnd0);
	                        imageStart1 = parseInt(imageStart1) + turn1;
	                        imageEnd1 = parseInt(finalimageEnd1);
	                        alert("You can not move right any further!");
                                return;
			}
			
			imageStart0 = parseInt(imageStart0) + turn0;
			imageEnd0 = parseInt(imageEnd0) + turn0;
			imageStart1 = parseInt(imageStart1) + turn1;
			imageEnd1 = parseInt(imageEnd1) + turn1;
		
							
		}
    
          if (todo.match('left')){
                        if((parseInt(imageStart0) - turn0) < 0 || (parseInt(imageStart1) - turn1) < 0){
                        imageStart0 = 1;
                        imageEnd0 = parseInt(imageEnd0) - turn0;
                        imageStart1 = 1;
                        imageEnd1 = parseInt(imageEnd1) - turn1;
                        alert("You can not move left any further!");
                                return;
                        }

                        imageStart0 = parseInt(imageStart0) - turn0;
                        imageEnd0 = parseInt(imageEnd0) - turn0;
                        imageStart1 = parseInt(imageStart1) - turn1;
                        imageEnd1 = parseInt(imageEnd1) - turn1;




          }
                        
     	if (todo.match('zoomin')){
			imageStart0 = parseInt(imageStart0) + turn0;
			imageEnd0 = parseInt(imageEnd0) - turn0;		
      imageStart1 = parseInt(imageStart1) + turn1;
			imageEnd1 = parseInt(imageEnd1) - turn1;			
		}
		
		  if (todo.match('zoomout')){
			 if(((parseInt(imageStart0) == parseInt(finalimageStart0)) && (parseInt(imageEnd0) == parseInt(finalimageEnd0))) || ((parseInt(imageStart1) == parseInt(finalimageStart1)) && (parseInt(imageEnd1) == parseInt(finalimageEnd1))))
                        {

                                alert("You can not zoom out any further!");

                                return;
                                exit();
                        }
			if((turn0*3) > parseInt(imageStart0)){
				imageStart0 = parseInt(imageStart0) - (turn0 * 3);
				imageEnd0 = parseInt(imageEnd0) + ((turn0 * 3) - parseInt(imageStart0));
			} else {
				imageStart0 = parseInt(imageStart0) - (turn0 * 3);
				imageEnd0 = parseInt(imageEnd0) + (turn0 * 3);				
			}
						if((turn1*3) > parseInt(imageStart1)){
				imageStart1 = parseInt(imageStart1) - (turn1 * 3);
				imageEnd1 = parseInt(imageEnd1) + ((turn1 * 3) - parseInt(imageStart1));
			} else {
				imageStart1 = parseInt(imageStart1) - (turn1 * 3);
				imageEnd1 = parseInt(imageEnd1) + (turn1 * 3);				
			}
			
		}
		
				if (parseInt(imageStart0) <= 0){
                        document.getElementById(start0).value = 1;
                        document.getElementById('zoomstart0').value = parseInt(finalimageStart0);
                        } else {
                        document.getElementById(start0).value = parseInt(imageStart0);

                        document.getElementById('zoomstart0').value = parseInt(imageStart0);
                }
                if( parseInt(imageEnd0) >= parseInt(finalimageEnd0)) {
                        document.getElementById('zoomend0').value = parseInt(finalimageEnd0);
                        document.getElementById(end0).value = parseInt(finalimageEnd0);
                }
                else {
                        document.getElementById('zoomend0').value = parseInt(imageEnd0);
                        document.getElementById(end0).value = parseInt(imageEnd0);
                }
    
      		if (parseInt(imageStart1) <= 0){
                        document.getElementById(start1).value = 1;
                        document.getElementById('zoomstart1').value = parseInt(finalimageStart1);
                        } else {
                        document.getElementById(start1).value = parseInt(imageStart1);

                        document.getElementById('zoomstart1').value = parseInt(imageStart1);
                }
                if( parseInt(imageEnd1) >= parseInt(finalimageEnd1)) {
                        document.getElementById('zoomend1').value = parseInt(finalimageEnd1);
                        document.getElementById(end1).value = parseInt(finalimageEnd1);
                }
                else {
                        document.getElementById('zoomend1').value = parseInt(imageEnd1);
                        document.getElementById(end1).value = parseInt(imageEnd1);
                }
                
            refresh();
		        upper_refresh(<?php echo $upper_draw_time; ?>);
		        LOWERrefresh(<?php echo $lower_draw_time; ?>);
    
    }
	}


	function getValue(todo, number){
		var imageStart = document.getElementById('zoomstart'+number).value;
		var finalimageStart = document.getElementById('finalstart'+number).value;
		var imageEnd = document.getElementById('zoomend'+number).value;
		var finalimageEnd = document.getElementById('finalend'+number).value;
		var turn = Math.floor(( parseInt(imageEnd) - parseInt(imageStart))*1/3);

		var start = 'startpos'+number;
		var end = 'endpos'+number;
		var track;
		//**
		// If user wants to move to the right
		//**
		if (todo.match('right')){
			   if((parseInt(imageEnd) + turn) >  parseInt(finalimageEnd)){
	                        imageStart = parseInt(imageStart) + turn;
	                        imageEnd = parseInt(finalimageEnd);
	                        alert("You can not move right any further!");
                                return;
			}
			
			imageStart = parseInt(imageStart) + turn;
			imageEnd = parseInt(imageEnd) + turn;
		
							
		}
		

		//**
		// If user wants to move to left
		//**
		if (todo.match('left')){
			if((parseInt(imageStart) - turn) < 0){
			imageStart = 1;
                        imageEnd = parseInt(imageEnd) - turn;
                        alert("You can not move left any further!");
				return;
			}
			
			imageStart = parseInt(imageStart) - turn;
			imageEnd = parseInt(imageEnd) - turn;			
		
					    
					
			
			}

		//**
		// If user wants to zoom in
		//**
		if (todo.match('zoomin')){
			imageStart = parseInt(imageStart) + turn;
			imageEnd = parseInt(imageEnd) - turn;					
		}
	
		//**
		// If user wants to zoom out
		//**
		if (todo.match('zoomout')){
			 if((parseInt(imageStart) == parseInt(finalimageStart)) && (parseInt(imageEnd) == parseInt(finalimageEnd)))
                        {

                                alert("You can not zoom out any further!");

                                return;
                                exit();
                        }
			if((turn*3) > parseInt(imageStart)){
				imageStart = parseInt(imageStart) - (turn * 3);
				imageEnd = parseInt(imageEnd) + ((turn * 3) - parseInt(imageStart));
			} else {
				imageStart = parseInt(imageStart) - (turn * 3);
				imageEnd = parseInt(imageEnd) + (turn * 3);				
			}
		}



		if (parseInt(imageStart) <= 0){
                        document.getElementById(start).value = 1;
                        document.getElementById('zoomstart'+number).value = parseInt(finalimageStart);
                        } else {
                        document.getElementById(start).value = parseInt(imageStart);

                        document.getElementById('zoomstart'+number).value = parseInt(imageStart);
                }
                if( parseInt(imageEnd) >= parseInt(finalimageEnd)) {
                        document.getElementById('zoomend'+number).value = parseInt(finalimageEnd);
                        document.getElementById(end).value = parseInt(finalimageEnd);
                }
                else {
                        document.getElementById('zoomend'+number).value = parseInt(imageEnd);
                        document.getElementById(end).value = parseInt(imageEnd);
                }

		//**
		//Now refresh the image with the parameters provided
		//**

		refresh();
		
	}  


	/**
		Checking the values for changeboth
	*/

	function checkingNumbers(oform, suffix)
	{
		// set references to fields
		var finalimageEnd = document.getElementById('finalend'+suffix).value;
		//var Startpt = document.getElementById('start'+prefix).value;
		//var Endpt = document.getElementById('end'+prefix).value;

		var startpospt1 = oform["startpos" + suffix].value;
		var startpospt = oform["startpos" + suffix];
		var endpospt1 = oform["endpos" + suffix].value;
		var endpospt = oform["endpos" + suffix];
		//document.getElementById('start1').value = document.getElementById(startpospt).value;
		//document.getElementById('end1').value = document.getElementById(endpospt).value;

		// only bother if the field has contents
		if (startpospt == "")return;
		if (endpospt == "")return;

		// if the with is not a number (NaN)
		// or is zero or less
		// notice user only allow numbers 
		if(isNaN(startpospt.value) || (startpospt.value <= 0))
		   {
			   startpospt.value = document.getElementById("start"+suffix).value;
			  alert("only allow numbers!"); 
                   }
  
		if(isNaN(endpospt.value) || (endpospt.value <= 0))
   		   {
			   endpospt.value = document.getElementById("end"+suffix).value;
			  alert("only allow numbers!"); 

                   }

		if(parseInt(endpospt.value) <= parseInt(startpospt.value))
		  {
			startpospt.value = document.getElementById("start"+suffix).value;
			endpospt.value = document.getElementById("end"+suffix).value;
			alert("Start value can not be greater than End value!");
		  }
		if(parseInt(endpospt.value) > parseInt(finalimageEnd))
		  {
			endpospt.value = document.getElementById("finalend"+suffix).value;
			alert("The new End value can not be greater than original End value!");
		  }
	}

	 /**
               filter synteny regions 
        */
		function isNumeric(elem, helperMsg){
	        var numericExpression = /^(\s*|[-+]?[0-9]*\.?[0-9]+(?:[eE][-+]?[0-9]+)?)$/;
        	if(elem.value.match(numericExpression)){
	//	 refresh();
	        }else{
                alert(helperMsg);
                elem.value = "";
		elem.focus();
                return false;
        	}
		}
		
		function updates_syn_data() {
			 refresh();
		}





	/**
		Main control of all the button associated with the image
	*/
	function changebothsynonly(){
		//alert('inside postion');
		var refStart = 'startpos0';
		var refEnd = 'endpos0';
		var queryStart = 'startpos1';
		var queryEnd = 'endpos1';

		//alert('start-'+document.getElementById(start).value+' end-'+document.getElementById(end).value);
		document.getElementById('zoomstart0').value = document.getElementById(refStart).value;
		document.getElementById('zoomend0').value = document.getElementById(refEnd).value;
		document.getElementById('zoomstart1').value = document.getElementById(queryStart).value;
		document.getElementById('zoomend1').value = document.getElementById(queryEnd).value;
		
		//t*
		//Now refresh the image with the parameters provided
		//**
		refresh();
	}

	function submit_new_orgsyn_only(){
		//alert('inside postion');
                var refName = 'Org1_ref';
                var queryName = 'Org2_query';

                //alert('start-'+document.getElementById(start).value+' end-'+document.getElementById(end).value);
                document.getElementById('ref').value = document.getElementById(refName).value;
                document.getElementById('query').value = document.getElementById(queryName).value;
		alert(document.getElementById(refName).value);
		alert(document.getElementById(queryName).value);
                //t*
                //Now refresh the image with the parameters provided
                //**
                refresh();
        }





	        function changeboth(){
                //alert('inside postion');
                //var refStart = 'startpos0';
                //var refEnd = 'endpos0';
                //var queryStart = 'startpos1';
                //var queryEnd = 'endpos1';

                //alert('start-'+document.getElementById(start).value+' end-'+document.getElementById(end).value);
                //document.getElementById('start0').value = document.getElementById(refStart).value;
                //document.getElementById('end0').value = document.getElementById(refEnd).value;
                //document.getElementById('start1').value = document.getElementById(queryStart).value;
                //document.getElementById('end1').value = document.getElementById(queryEnd).value;
                //t*
                //Now refresh the image with the parameters provided
                //**
		
		 //         refresh();
			
               //alert('inside postion');
                var refStart = 'startpos0';
                var refEnd = 'endpos0';
                var queryStart = 'startpos1';
                var queryEnd = 'endpos1';

                //alert('start-'+document.getElementById(start).value+' end-'+document.getElementById(end).value);
                document.getElementById('zoomstart0').value = document.getElementById(refStart).value;
                document.getElementById('zoomend0').value = document.getElementById(refEnd).value;
                document.getElementById('zoomstart1').value = document.getElementById(queryStart).value;
                document.getElementById('zoomend1').value = document.getElementById(queryEnd).value;

                //t*
                //Now refresh the image with the parameters provided
                //**
                refresh();
       	     	upper_refresh(<?php echo $upper_draw_time; ?>);
                LOWERrefresh(<?php echo $lower_draw_time; ?>);

	
	
	}
	
	/**
		User wants to see syntany as blocks
	*/
	function setpolygon(){
		refresh();
	}


	/**
		Refresh function to redraw the image
	*/

        function refresh(){
		var sss = document.getElementById('filtervalue').value;
		//var replacepossign = sss.replace("+", "%2B");
		var replacepossign;
		if((sss.length==0) || (sss==length)) {
		replacepossign = 1;

		}
		else {
		replacepossign = sss.replace("+", "%2B");
		}


    var url='drawsynimage.php';
		url +=
	  '?annid='+document.getElementById('annid').value+
		'&ref='+document.getElementById('ref').value+
		'&query='+document.getElementById('query').value+
		'&zoomrefstart='+document.getElementById('zoomstart0').value+
		'&zoomrefend='+document.getElementById('zoomend0').value+
		'&zoomquerystart='+document.getElementById('zoomstart1').value+
		'&zoomqueryend='+document.getElementById('zoomend1').value+
		'&session_id='+document.getElementById('session_id').value+
		'&finalrefend='+document.getElementById('finalend0').value+
		'&finalqueryend='+document.getElementById('finalend1').value+
		'&polygon='+radio_polygon_value()+
		'&image='+radio_image_width()+
		'&filtersign='+document.getElementById('filtersign').value+
		'&filtertypes='+document.getElementById('filtertypes').value+
		//'&filtervalue='+document.getElementById('filtervalue').value+
		'&filtervalue='+replacepossign

		;
		document.getElementById('image').src = url;
   		//alert(url);
	}


		/**
			Refresh function to get complete view
		*/
		function getcompleterefresh_synteny() {
			    var sss = document.getElementById('filtervalue').value;
				//alert(sss);
			var replacepossign;
                	
			if ((sss.length==0) || (sss==null)) {
			      //return true;
				replacepossign =1;
				//alert(sss);
				   }
			   else {
				 //return false; 
			replacepossign = sss.replace("+", "%2B");
				   }
			
			//replacepossign = sss.replace("+", "%2B");
    var url='drawsynimage.php';
                url +=
          '?annid='+document.getElementById('annid').value+
                '&ref='+document.getElementById('ref').value+
                '&query='+document.getElementById('query').value+
                '&zoomrefstart='+document.getElementById('finalstart0').value+
                '&zoomrefend='+document.getElementById('finalend0').value+
                '&zoomquerystart='+document.getElementById('finalstart1').value+
                '&zoomqueryend='+document.getElementById('finalend1').value+
                '&session_id='+document.getElementById('session_id').value+
                '&finalrefend='+document.getElementById('finalend0').value+
                '&finalqueryend='+document.getElementById('finalend1').value+
                '&polygon='+radio_polygon_value()+
                '&image='+radio_image_width()+
                '&filtersign='+document.getElementById('filtersign').value+
                '&filtertypes='+document.getElementById('filtertypes').value+
                '&filtervalue='+replacepossign

                ;
                document.getElementById('image').src = url;
                //alert(url);

		}
		
		function getcompleterefresh_upperimage(arrows_time,track_name) {
	        var myArray = ['aliceblue','snow'];
                var jjj = 0;
                var jj=0;
                var str1 = "image";
                var str2 = "upper_track";
                var str3 = "color";
                for(jj=0;jj<arrows_time;jj++)
                {
                var url='upperimage.php';
                url +=
          '?annid='+document.getElementById('annid').value+
                '&ref='+document.getElementById('ref').value+
                '&query='+document.getElementById('query').value+
                '&zoomrefstart='+document.getElementById('finalstart0').value+
                '&zoomrefend='+document.getElementById('finalend0').value+
                '&zoomquerystart='+document.getElementById('finalstart1').value+
                '&zoomqueryend='+document.getElementById('finalend1').value+
                '&session_id_gene='+document.getElementById('session_id_gene').value+
                '&image='+radio_image_width()+
                '&imagebgc='+myArray[jjj]+
                '&trackname='+document.getElementById(str2.concat(jj)).value+
                '&trackcolor='+document.getElementById(str3.concat(jj)).value+
                '&finalrefvalue='+document.getElementById('finalend0').value
                ;
                document.getElementById(str1.concat(jj)).src = url;
             // alert(url);
                   jjj++;
                if(jjj > 1) {
                jjj = 0;
                }

                }
		}


		function getcompleterefresh_lowerimage(times_arrow) {
			var myArray = ['aliceblue','snow'];
       	                var jjj = 0;
		        var kk=0;
		        var str1 = "lower_track";
		        var str2 = "Images";
		        var str3 = "LOWCOLOR";
		        for(kk=0;kk<times_arrow;kk++)
		        {
		            var url='Loimage.php';
                		url +=
		                '?annid='+document.getElementById('annid').value+
                		'&ref='+document.getElementById('ref').value+
		                '&query='+document.getElementById('query').value+
		                '&zoomrefstart='+document.getElementById('finalstart0').value+
		                '&zoomrefend='+document.getElementById('finalend0').value+
		                '&zoomquerystart='+document.getElementById('finalstart1').value+
		                '&zoomqueryend='+document.getElementById('finalend1').value+
		                '&session_id_gene='+document.getElementById('session_id_gene').value+
		                '&image='+radio_image_width()+
		                '&imagebgc='+myArray[jjj]+
		                '&trackname='+document.getElementById(str1.concat(kk)).value+
		                '&trackcolor='+document.getElementById(str3.concat(kk)).value+
		                '&finalqueryvalue='+document.getElementById('finalend1').value
		                ;
		                document.getElementById(str2.concat(kk)).src = url;
		               //alert(url);
		                jjj++;
		                if(jjj > 1) {
		                jjj = 0;
                		}

        		}
			}

		
		

		/**
		Refresh function to redraw the upper_image
		*/

	function upper_refresh(arrows_time,track_name){
		var myArray = ['aliceblue','snow'];
		var jjj = 0;
		var jj=0;
		var str1 = "image";
		var str2 = "upper_track";
		var str3 = "color";
		var str4 = "uppertrackshape";
		for(jj=0;jj<arrows_time;jj++)
		{
    		var url='upperimage.php';
                url +=
          '?annid='+document.getElementById('annid').value+
                '&ref='+document.getElementById('ref').value+
                '&query='+document.getElementById('query').value+
                '&zoomrefstart='+document.getElementById('zoomstart0').value+
                '&zoomrefend='+document.getElementById('zoomend0').value+
                '&zoomquerystart='+document.getElementById('zoomstart1').value+
                '&zoomqueryend='+document.getElementById('zoomend1').value+
                '&session_id_gene='+document.getElementById('session_id_gene').value+
                '&image='+radio_image_width()+
                '&imagebgc='+myArray[jjj]+
		'&trackname='+document.getElementById(str2.concat(jj)).value+
		'&trackcolor='+document.getElementById(str3.concat(jj)).value+
		'&trackshape='+document.getElementById(str4.concat(jj)).value+
		'&imageid='+jj+
		'&finalrefvalue='+document.getElementById('finalend0').value
                ;
                document.getElementById(str1.concat(jj)).src = url;
             // alert(url);
	       	   jjj++;
	        if(jjj > 1) {
        	jjj = 0;
	        }
	
		}
	}

	/**
	zoom into neigbornood upper_image
	*/	

	        function upper_refresh_for_neigbornood(arrows_time,new_start_point0,new_start_point1,new_end_point0,new_end_point1){
                var myArray = ['aliceblue','snow'];
                var jjj = 0;
                var jj=0;
                var str1 = "image";
                var str2 = "upper_track";
                var str3 = "color";
                var str4 = "uppertrackshape";
                for(jj=0;jj<arrows_time;jj++)
                {
                var url='upperimage.php';
                url +=
          '?annid='+document.getElementById('annid').value+
                '&ref='+document.getElementById('ref').value+
                '&query='+document.getElementById('query').value+
                '&zoomrefstart='+new_start_point0+
                '&zoomrefend='+new_end_point0+
                '&zoomquerystart='+new_start_point1+
                '&zoomqueryend='+new_end_point1+
                '&session_id_gene='+document.getElementById('session_id_gene').value+
                '&image='+radio_image_width()+
                '&imagebgc='+myArray[jjj]+
                '&trackname='+document.getElementById(str2.concat(jj)).value+
                '&trackcolor='+document.getElementById(str3.concat(jj)).value+
                '&trackshape='+document.getElementById(str4.concat(jj)).value+
                '&imageid='+jj+
                '&finalrefvalue='+document.getElementById('finalend0').value
                ;
                document.getElementById(str1.concat(jj)).src = url;
              //alert(url);
                   jjj++;
                if(jjj > 1) {
                jjj = 0;
                }

                }
        }






		/**
		Refresh function to redraw the lower_image
		*/

	function LOWERrefresh(times_arrow){
	var myArray = ['aliceblue','snow'];
                var jjj = 0;
	var kk=0;
	var str1 = "lower_track";
	var str2 = "Images";
	var str3 = "LOWCOLOR";
	var str4 = "lowertrackshape";
	for(kk=0;kk<times_arrow;kk++)
	{
	    var url='Loimage.php';
                url +=
		'?annid='+document.getElementById('annid').value+
                '&ref='+document.getElementById('ref').value+
                '&query='+document.getElementById('query').value+
                '&zoomrefstart='+document.getElementById('zoomstart0').value+
                '&zoomrefend='+document.getElementById('zoomend0').value+
                '&zoomquerystart='+document.getElementById('zoomstart1').value+
                '&zoomqueryend='+document.getElementById('zoomend1').value+
                '&session_id_gene='+document.getElementById('session_id_gene').value+
                '&image='+radio_image_width()+
		'&imagebgc='+myArray[jjj]+
		'&trackname='+document.getElementById(str1.concat(kk)).value+
		'&trackcolor='+document.getElementById(str3.concat(kk)).value+
                '&trackshape='+document.getElementById(str4.concat(kk)).value+
                '&imageid='+kk+
		'&finalqueryvalue='+document.getElementById('finalend1').value
		;
                document.getElementById(str2.concat(kk)).src = url;
              //alert(url);
		    jjj++;
                if(jjj > 1) {
                jjj = 0;
                }

        }
	}

	/**
	Zoom into neigbornood lower_image	
	*/

	function LOWERrefresh_for_neigbornood(times_arrow,new_start_point0,new_start_point1,new_end_point0,new_end_point1){
        var myArray = ['aliceblue','snow'];
                var jjj = 0;
        var kk=0;
        var str1 = "lower_track";
        var str2 = "Images";
        var str3 = "LOWCOLOR";
        var str4 = "lowertrackshape";
        for(kk=0;kk<times_arrow;kk++)
        {
            var url='Loimage.php';
                url +=
                '?annid='+document.getElementById('annid').value+
                '&ref='+document.getElementById('ref').value+
                '&query='+document.getElementById('query').value+
                '&zoomrefstart='+new_start_point0+
                '&zoomrefend='+new_end_point0+
                '&zoomquerystart='+new_start_point1+
                '&zoomqueryend='+new_end_point1+
                '&session_id_gene='+document.getElementById('session_id_gene').value+
                '&image='+radio_image_width()+
                '&imagebgc='+myArray[jjj]+
                '&trackname='+document.getElementById(str1.concat(kk)).value+
                '&trackcolor='+document.getElementById(str3.concat(kk)).value+
                '&trackshape='+document.getElementById(str4.concat(kk)).value+
                '&imageid='+kk+
                '&finalqueryvalue='+document.getElementById('finalend1').value
                ;
                document.getElementById(str2.concat(kk)).src = url;
              //alert(url);
                    jjj++;
                if(jjj > 1) {
                jjj = 0;
                }

        }
        }


	function radio_polygon_value(){
		for(var i=0; i < document['myForm'].polygon.length; i++){
			if(document['myForm'].polygon[i].checked){
				return document['myForm'].polygon[i].value;
			}
		}
	}
	function radio_image_width(){
		for(var i=0; i < document['myForm'].imageWidth.length; i++){
			if(document['myForm'].imageWidth[i].checked){
				return document['myForm'].imageWidth[i].value;
			}
		}
	}
	
	                function change_upper_image_colors() {
               upper_refresh(<?php echo $upper_draw_time; ?>); 
		}
	
		          function change_lower_image_track_shapes() {
               LOWERrefresh(<?php echo $lower_draw_time; ?>);
                }

		         function change_upper_image_track_shapes() {
               upper_refresh(<?php echo $upper_draw_time; ?>);
                }

	                function change_lower_image_colors() {
                LOWERrefresh(<?php echo $lower_draw_time; ?>);
		}
		function change_syn_image() {
		refresh();
		}	
	
	
	function setImage(){
		          refresh();
             	upper_refresh(<?php echo $upper_draw_time; ?>);
		          LOWERrefresh(<?php echo $lower_draw_time; ?>);
		}
	function setImagesynonly(){
		refresh();
		}


function ajaxmysql() {

if(window.XMLHttpRequest)
{
   // For modern browsers
   ajax = new XMLHttpRequest();
}
else
{
   // For IE6 and IE5 browsers
   ajax = new ActiveXObject('Microsoft.XMLHTTP');
}
// Sends request to PHP file
// You can pass query string name/value pairs here if you want
        var org1 = document.getElementById('Org1_ref').value;
        var org2 = document.getElementById('Org2_query').value;
        var session_id = document.getElementById('session_id').value;
ajax.open('GET', 'checkorg.php?org1=org1&org2=org2&session_id=session_id', true);
ajax.send(null);

// Runs function when state of our request variable changes
ajax.onreadystatechange = function()
{
   // 4 means done; the data has been retrieved from data.php
   if(ajax.readyState == 4)
   {
      // Put that data into the DIV element
     if(ajax.responseText == 0) {
                alert('error');
        }
        else {
                refresh();  
        	upper_refresh(<?php echo $upper_draw_time; ?>);
                LOWERrefresh(<?php echo $lower_draw_time; ?>);

	  }
   }
}
}


	 $(document).ready(function() {
                                   $('#right0').click(function() {
                                        $.blockUI({ css: {
                                            border: 'none',
                                            padding: '15px',
                                            backgroundColor: '#000',
                                            '-webkit-border-radius': '10px',
                                            '-moz-border-radius': '10px',
                                            opacity: .5,
                                            color: '#fff'
                                                                } });

                                                setTimeout($.unblockUI, 2000);
                                            });
                                        });

                                        $(document).ready(function() {
                                         $('#right1').click(function() {
                                                $.blockUI({ css: {
                                                    border: 'none',
                                                    padding: '15px',
                                                    backgroundColor: '#000',
                                                    '-webkit-border-radius': '10px',
                                                    '-moz-border-radius': '10px',
                                                    opacity: .5,
                                                    color: '#fff'
                                                } });

                                                setTimeout($.unblockUI, 2000);
                                                    });
                                                        });
		
		     $(document).ready(function() {
                            $('#left0').click(function() {
                            $.blockUI({ css: {
                            border: 'none',
                            padding: '15px',
                            backgroundColor: '#000',
                            '-webkit-border-radius': '10px',
                            '-moz-border-radius': '10px',
                            opacity: .5,
                            color: '#fff'
                                                } });

                            setTimeout($.unblockUI, 2000);
                            });
                            });

                                  $(document).ready(function() {
                                    $('#left1').click(function() {
                                        $.blockUI({ css: {
                                            border: 'none',
                                            padding: '15px',
                                            backgroundColor: '#000',
                                            '-webkit-border-radius': '10px',
                                            '-moz-border-radius': '10px',
                                            opacity: .5,
                                            color: '#fff'
                                                } });

                                        setTimeout($.unblockUI, 2000);
                                            });
                                                });



	        $(document).ready(function() {
    $('#zoominpos0').click(function() {
        $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        } });

        setTimeout($.unblockUI, 4000);
    });
});

	        $(document).ready(function() {
    $('#changebothpos0').click(function() {
        $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        } });

        setTimeout($.unblockUI, 4000);
    });
});



	
	        $(document).ready(function() {
    $('#zoomoutpos1').click(function() {
        $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        } });

        setTimeout($.unblockUI, 4000);
    });
});

	        $(document).ready(function() {
    $('#zoominpos1').click(function() {
        $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        } });

        setTimeout($.unblockUI, 4000);
    });
});

	        $(document).ready(function() {
    $('#changebothpos1').click(function() {
        $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        } });

        setTimeout($.unblockUI, 4000);
    });
});

	                $(document).ready(function() {
    $('#imageWidth0').click(function() {
        $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        } });

        setTimeout($.unblockUI, 4000);
    });
});

    $(document).ready(function() {
    $('#imageWidth1').click(function() {
        $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        } });

        setTimeout($.unblockUI, 4000);
    });
});

	    $(document).ready(function() {
    $('#imageWidth2').click(function() {
        $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        } });

        setTimeout($.unblockUI, 4000);
    });
});

    $(document).ready(function() {
    $('#polygon0').click(function() {
        $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        } });

        setTimeout($.unblockUI, 4000);
    });
});

	    $(document).ready(function() {
    $('#polygon1').click(function() {
        $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        } });

        setTimeout($.unblockUI, 4000);
    });
});

   $(document).ready(function() {
    $('#pbutton0').click(function() {
        $.blockUI({ css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        } });

        setTimeout($.unblockUI, 7000);
    });
});

   $(document).ready(function() {
  $('#zoomoutpos0').click(function() {
   $.blockUI({ css: {
   border: 'none',
   padding: '15px',
   backgroundColor: '#000',
  '-webkit-border-radius': '10px',
  '-moz-border-radius': '10px',
  opacity: .5,
  color: '#fff'
  } });
  setTimeout($.unblockUI, 4000);
  });
  });
	
   $(document).ready(function() {
  $('#valuefilter').click(function() {
   $.blockUI({ css: {
   border: 'none',
   padding: '15px',
   backgroundColor: '#000',
  '-webkit-border-radius': '10px',
  '-moz-border-radius': '10px',
  opacity: .5,
  color: '#fff'
  } });
  setTimeout($.unblockUI, 3000);
  });
  });

     $(document).ready(function() {
  $('#getview').click(function() {
   $.blockUI({ css: {
   border: 'none',
   padding: '15px',
   backgroundColor: '#000',
  '-webkit-border-radius': '10px',
  '-moz-border-radius': '10px',
  opacity: .5,
  color: '#fff'
  } });
  setTimeout($.unblockUI, 5000);
  });
  });

   $(document).ready(function() {
  $('#zoomoutpos2').click(function() {
   $.blockUI({ css: {
   border: 'none',
   padding: '15px',
   backgroundColor: '#000',
  '-webkit-border-radius': '10px',
  '-moz-border-radius': '10px',
  opacity: .5,
  color: '#fff'
  } });
  setTimeout($.unblockUI, 4000);
  });
  });

   $(document).ready(function() {
  $('#zoominpos2').click(function() {
   $.blockUI({ css: {
   border: 'none',
   padding: '15px',
   backgroundColor: '#000',
  '-webkit-border-radius': '10px',
  '-moz-border-radius': '10px',
  opacity: .5,
  color: '#fff'
  } });
  setTimeout($.unblockUI, 4000);
  });
  });

   $(document).ready(function() {
  $('#left2').click(function() {
   $.blockUI({ css: {
   border: 'none',
   padding: '15px',
   backgroundColor: '#000',
  '-webkit-border-radius': '10px',
  '-moz-border-radius': '10px',
  opacity: .5,
  color: '#fff'
  } });
  setTimeout($.unblockUI, 4000);
  });
  });

   $(document).ready(function() {
  $('#right2').click(function() {
   $.blockUI({ css: {
   border: 'none',
   padding: '15px',
   backgroundColor: '#000',
  '-webkit-border-radius': '10px',
  '-moz-border-radius': '10px',
  opacity: .5,
  color: '#fff'
  } });
  setTimeout($.unblockUI, 4000);
  });
  });



/*
	function getWhatever()
	{
	 var strUrl = "mergeImages.php?combinedimages=$merge_all_images&session_id_gene=$session_id_gene"; //whatever URL you need to call
	 var strReturn = "";
	
	 jQuery.ajax({
	  url:strUrl, success:function(html){strReturn = html;}, async:false
	 });

	 return strReturn;
	}

*/

// JavaScript Document
function getCoords(gsv){
	ELEMENT = gsv;
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null) {
		alert ("Your browser does not support AJAX!");
		return;
	} 
	var url="updateMap.php?";
	url += "input="+ELEMENT;
	//url += "&dir="+dir;
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function GetXmlHttpObject() {
	var xmlHttp=null;
	try {
		// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	}
	catch (e) {
		// Internet Explorer
		try {
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e) {
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}

function stateChanged() {
	if (xmlHttp.readyState==4) {
		EL = "syntenymap";
		document.getElementById(EL).innerHTML=xmlHttp.responseText;
		//ELEMENT = "syntenymap";
	}
}


function ajaxRequest(){
 var activexmodes=["Msxml2.XMLHTTP", "Microsoft.XMLHTTP"] //activeX versions to check for in IE
 if (window.ActiveXObject){ //Test for support for ActiveXObject in IE first (as XMLHttpRequest in IE7 is broken)
  for (var i=0; i<activexmodes.length; i++){
   try{
    return new ActiveXObject(activexmodes[i])
   }
   catch(e){
    //suppress error
   }
  }
 }
 else if (window.XMLHttpRequest) // if Mozilla, Safari etc
  return new XMLHttpRequest()
 else
  return false
}

     function ajaxGet1() {
var mygetrequest=new ajaxRequest()
mygetrequest.onreadystatechange=function(){
 if (mygetrequest.readyState==4){
  if (mygetrequest.status==200 || window.location.href.indexOf("http")==-1){
   document.getElementById("syntenyonlymap1").innerHTML=mygetrequest.responseText
  }
  else{
   alert("An error has occured making the request")
  }
 }
}
var namevalue=encodeURIComponent(document.getElementById("imageMap_path1").value)
mygetrequest.open("GET", "updateMap.php?input="+namevalue, true)
mygetrequest.send(null)
}





function ajaxGet() {
var mygetrequest=new ajaxRequest()
mygetrequest.onreadystatechange=function(){
 if (mygetrequest.readyState==4){
  if (mygetrequest.status==200 || window.location.href.indexOf("http")==-1){
   document.getElementById("syntenymap").innerHTML=mygetrequest.responseText
  }
  else{
   alert("An error has occured making the request")
  }
 }
}
var namevalue=encodeURIComponent(document.getElementById("imageMap_path").value)
mygetrequest.open("GET", "updateMap.php?input="+namevalue, true)
mygetrequest.send(null)

/*
second ajax get

var mygetrequest1=new ajaxRequest()
mygetrequest1.onreadystatechange=function(){
 if (mygetrequest1.readyState==4){
  if (mygetrequest1.status==200 || window.location.href.indexOf("http")==-1){
   document.getElementById("BlocksLines").innerHTML=mygetrequest1.responseText
  }
  else{
   alert("An error has occured making the request")
  }
 }
}
var namevalue1=encodeURIComponent(document.getElementById("BlcoksLines_path").value)
mygetrequest1.open("GET", "updateBlocksLines.php?input="+namevalue1, true)
mygetrequest1.send(null)
*/
/*
Third ajax get

var mygetrequest2=new ajaxRequest()
mygetrequest2.onreadystatechange=function(){
 if (mygetrequest2.readyState==4){
  if (mygetrequest2.status==200 || window.location.href.indexOf("http")==-1){
   document.getElementById("TotalBlocksLines").innerHTML=mygetrequest2.responseText
  }
  else{
   alert("An error has occured making the request")
  }
 }
}
var namevalue2=encodeURIComponent(document.getElementById("totalnumblockslines_path").value)
mygetrequest2.open("GET", "updatetotalnumBlocksLines.php?input="+namevalue2, true)
mygetrequest2.send(null)
*/

}


function zoomsynget(ref_start_cords,ref_end_cords,query_start_cords,query_end_cords,numbers) {
		/*
                var imageStart0 = document.getElementById('zoomstart0').value;
                var imageStart1 = document.getElementById('zoomstart1').value;
                var imageEnd0 = document.getElementById('zoomend0').value;
                var imageEnd1 = document.getElementById('zoomend1').value;
                */
		var imageStart0 = ref_start_cords;
                var imageStart1 = query_start_cords;
                var imageEnd0 = ref_end_cords;
                var imageEnd1 = query_end_cords;
		var imageFinalEnd0 = document.getElementById('finalend0').value;
                var imageFinalEnd1 = document.getElementById('finalend1').value;
		var GODHELPME = numbers;
                var turn0 = Math.floor(( parseInt(imageEnd0) - parseInt(imageStart0))*2);
                var endturn0 = Math.floor(( parseInt(imageEnd0) - parseInt(imageStart0))*2);
                var turn1 = Math.floor(( parseInt(imageEnd1) - parseInt(imageStart1))*2);
                var endturn1 = Math.floor(( parseInt(imageEnd1) - parseInt(imageStart1))*2);

                var start0 = 'startpos0';
                var start1 = 'startpos1';
                var end0 = 'endpos0';
                var end1 = 'endpos1';
		var tempstart0;
		var tempstart1;
		var tempend0;
		var tempend1;
			
			
	                if(parseInt(imageStart0) > parseInt(imageEnd0))
                        {
                                tempstart0 = parseInt(imageEnd0);
                                tempstart1 = parseInt(imageStart0);
				imageStart0 = parseInt(tempstart0);
				imageEnd1 = parseInt(tempstart1);
                        }
                        if(parseInt(imageStart1) > parseInt(imageEnd1))
                        {
				
                                tempend0 = parseInt(imageEnd1);
                                tempend1 = parseInt(imageStart1);
				imageStart1 = parseInt(tempend1);
				imageEnd0 = parseInt(tempend0);
                        }
			



	         	imageStart0 = parseInt(imageStart0) - turn0;
                        imageStart1 = parseInt(imageStart1) - turn1;
                        imageEnd0 = parseInt(imageEnd0) + endturn0;
                        imageEnd1 = parseInt(imageEnd1) + endturn1;
			
                        



			if(parseInt(imageStart0) < 1 ||  parseInt(imageStart1) < 1)
			{
				imageStart0 = 1;
	                        imageStart1 = 1;
			}
			
			  if(parseInt(imageEnd0) > parseInt(imageFinalEnd0) ||  parseInt(imageEnd1) > parseInt(imageFinalEnd1))
                        {
                                imageEnd0 = parseInt(imageFinalEnd0);
                                imageEnd1 = parseInt(imageFinalEnd1);
                        }
		
/*
                if (parseInt(imageStart0)  >= ref_start_cords && parseInt(imageEnd0)  <= ref_end_cords && parseInt(imageStart1)  >= query__start_cords && parseInt(imageEnd1)  <= query_end_cords){
 


			document.getElementById('zoomstart0').value = parseInt(imageStart0);
                        document.getElementById('zoomend0').value = parseInt(imageEnd0);
                        document.getElementById('zoomstart1').value = parseInt(imageStart1);
                        document.getElementById('zoomend1').value = parseInt(imageEnd1);
 
                        document.getElementById(start0).value = parseInt(imageStart0);
                        document.getElementById(start1).value = parseInt(imageStart1);
                        document.getElementById(end0).value = parseInt(imageEnd0);
                        document.getElementById(end1).value = parseInt(imageEnd1);
 */   
//                        alert('OK');
   //                         } else {
                  /*
                        imageStart0 = parseInt(imageStart0) + turn0;
                        imageStart1 = parseInt(imageStart1) + turn1;
                        imageEnd0 = parseInt(imageEnd0) - endturn0;
                        imageEnd1 = parseInt(imageEnd1) - endturn1;
		  
			imageStart0 = ref_start_cords + turn0;
                        imageStart1 = query_start_cords + turn1;
                        imageEnd0 = ref_end_cords - turn0;
                        imageEnd1 = query_end_cords - turn1;			
		  */
			  if(parseInt(imageStart1) > parseInt(imageEnd1))
                        {
				document.getElementById('zoomstart0').value = parseInt(imageStart0);
	                        document.getElementById('zoomend0').value = parseInt(imageEnd0);
        	                document.getElementById('zoomstart1').value = parseInt(imageEnd1);
                	        document.getElementById('zoomend1').value = parseInt(imageStart1);
                        	document.getElementById(start0).value = parseInt(imageStart0);
	                        document.getElementById(start1).value = parseInt(imageEnd1);
        	                document.getElementById(end0).value = parseInt(imageEnd0);
                	        document.getElementById(end1).value = parseInt(imageStart1);
				var new_start_point0 = parseInt(imageStart0);
	                        var new_start_point1 = parseInt(imageStart1);
        	                var new_end_point0 = parseInt(imageEnd0);
                	        var new_end_point1 = parseInt(imageEnd1);

			}
			else if(parseInt(imageStart0) > parseInt(imageEnd0))
			{
				if(parseInt(imageEnd0) < 1) {
				imageEnd0 = 1;
				}	
				document.getElementById('zoomstart0').value = parseInt(imageEnd0);
	                        document.getElementById('zoomend0').value = parseInt(imageStart0);
        	                document.getElementById('zoomstart1').value = parseInt(imageStart1);
	                        document.getElementById('zoomend1').value = parseInt(imageEnd1);
                        	document.getElementById(start0).value = parseInt(imageEnd0);
                	        document.getElementById(start1).value = parseInt(imageStart1);
        	                document.getElementById(end0).value = parseInt(imageStart0);
	                        document.getElementById(end1).value = parseInt(imageEnd1);

                        	var new_start_point0 = parseInt(imageStart0);
                	        var new_start_point1 = parseInt(imageStart1);
        	                var new_end_point0 = parseInt(imageEnd0);
	                        var new_end_point1 = parseInt(imageEnd1);


			}
			else {
                        document.getElementById('zoomstart0').value = parseInt(imageStart0);
                        document.getElementById('zoomend0').value = parseInt(imageEnd0);
                        document.getElementById('zoomstart1').value = parseInt(imageStart1);
                        document.getElementById('zoomend1').value = parseInt(imageEnd1);
                        document.getElementById(start0).value = parseInt(imageStart0);
                        document.getElementById(start1).value = parseInt(imageStart1);
                        document.getElementById(end0).value = parseInt(imageEnd0);
                        document.getElementById(end1).value = parseInt(imageEnd1);
			
			var new_start_point0 = parseInt(imageStart0);
			var new_start_point1 = parseInt(imageStart1);
			var new_end_point0 = parseInt(imageEnd0);
			var new_end_point1 = parseInt(imageEnd1);
        		}

			
			if(GODHELPME != 0) {
			//var Upperimages =document.getElementById(upper_NumofTracks).value; 
			//var Lowerimages = document.getElementById(lower_NumofTracks).value;
			//refresh();
	 		upper_refresh_for_neigbornood(<?php if (is_numeric($upper_draw_time)) {echo $upper_draw_time;} else { echo "0";} ?>,new_start_point0,new_start_point1,new_end_point0,new_end_point1);       
			LOWERrefresh_for_neigbornood(<?php if (is_numeric($lower_draw_time)) {echo $lower_draw_time;} else { echo "0";} ?>,new_start_point0,new_start_point1,new_end_point0,new_end_point1);
	 		//upper_refresh_for_neigbornood(Upperimages,new_start_point0,new_start_point1,new_end_point0,new_end_point1);       
			//LOWERrefresh_for_neigbornood(Lowerimages,new_start_point1,new_end_point0,new_end_point1);
                      	//alert(GODHELPME);
			//alert(Upperimages);
			//alert(Lowerimages);
			refresh();
			}
			else {
                      	refresh();
			//alert(GODHELPME);
                      	//refresh();

			}
                //        alert('No');

                      //refresh();
     //           }

}









function touchme() {
	var ss = document.getElementById('totalnumberforblockslines').value;
	alert(ss);
	//alert('OK');
	var str = "blockslines";
	var str1 = "&blockslines";
	var j;
	var str2 = "";
	for(j=0;j<ss;j++) {
 	var ee = document.getElementById(str.concat(j)).value;
	var rr = "document['myForm']."+str.concat(j)+".length";
	//alert(rr);
	//var rr = "blockslines0";
	var cg = eval('str.concat(j);')+0;
	//alert(cg);
	  for(var i=0; i < document['myForm'].blockslines0.length; i++){
                        if(document['myForm'].blockslines0[i].checked){
                                alert(document['myForm'].blockslines0[i].value);
                        }
                }

//	str2 = str2+str1.concat(j)+"="+ee;
//	alert(str2);
	}
	//alert(str2);
/*
	      for(var i=0; i < document['myForm'].ee.length; i++){
                        if(document['myForm'].ee[i].checked){
                                return document['myForm'].ee[i].value;
                        }
                }

*/
/*
	var sss = document.getElementById('filtervalue').value;
                var replacepossign = sss.replace("+", "%2B");
    var url='drawsynimage.php';
                url +=
          '?annid='+document.getElementById('annid').value+
                '&ref='+document.getElementById('ref').value+
                '&query='+document.getElementById('query').value+
                '&zoomrefstart='+document.getElementById('zoomstart0').value+
                '&zoomrefend='+document.getElementById('zoomend0').value+
                '&zoomquerystart='+document.getElementById('zoomstart1').value+
                '&zoomqueryend='+document.getElementById('zoomend1').value+
                '&session_id='+document.getElementById('session_id').value+
                '&polygon='+radio_polygon_value()+
                '&image='+radio_image_width()+
                '&filtersign='+document.getElementById('filtersign').value+
                //'&filtervalue='+document.getElementById('filtervalue').value
                '&filtervalue='+replacepossign+
		 str2
		'&totalnumberforblockslines='+ss
                ;
                document.getElementById('image').src = url;
                alert(url);

*/


}

</script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/tabcontent.css">
<link rel="stylesheet" type="text/css" href="css/annimg.css">
<link rel="shortcut icon" href="css/img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/fonts/fonts-min.css" />
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/container/assets/skins/sam/container.css" />
<title>View</title>
</head>
