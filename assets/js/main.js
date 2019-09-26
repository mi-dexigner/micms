$( function() {
    $( "#formedate" ).datepicker();

 $("#add").click(function(){
        addnewrow();

      });

 function addnewrow(){
    var n = 1;
    var tr = //'<input type="button" name="" id="remove" value="x" class="btn btn-danger">'+
    		'<div clas="row" id="add'+ n+'">'+
     	 ' <div class="form-group col-md-4"><label for="containerno"> Container Number <span>*</span>:</label><input type="text" class="form-control containerno" name="containerno[]" value=""></div>'+
        '<div class="form-group col-md-4"><label for="sealnumber"> Seal Number<span>*</span>:</label><input type="text" class="form-control sealnumber" name="sealnumber[]"  value=""></div>'+
        '<div class="form-group col-md-4"><label for="noofpackages"> No. Of Packages<span>*</span>:</label><input type="text" class="form-control noofpackages" name="noofpackages[]"  value=""></div>'+
    	'</div>';
    $("#tab_containers").append(tr);
    n++;
  }

 	/*var i=1;
 	var html = '';
     $("#add_row").click(function(){
   	html += '<div class="row-add" id="addr'+(i+1)+'">';
  	html += '<div class="form-group col-md-4">';
	html += '<label for="commodity"> Commodity<span>*</span>:</label>';
	html += '<input type="text" class="form-control" name="commodity'+(i+1)+'" id="commodity'+(i+1)+'" value="">';
	html += '</div>';
	html += '<div class="form-group col-md-4">';
	html += '<label for="commodity"> Commodity<span>*</span>:</label>';
	html += '<input type="text" class="form-control" name="commodity'+(i+1)+'" id="commodity'+(i+1)+'" value="">';
	html += '</div>';
	html += '<div class="form-group col-md-4">';
	html += '<label for="commodity"> Commodity<span>*</span>:</label>';
	html += '<input type="text" class="form-control" name="commodity'+(i+1)+'" id="commodity'+(i+1)+'" value="">';
	html += '</div>';
	html += '</div>';

		//$('#addr'+i).html(html);
      $('#tab_containers').append('<div class="row"><div id="addr'+(i+1)+'">'+html+'</div></div>');
      i++; 
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });*/




  } );