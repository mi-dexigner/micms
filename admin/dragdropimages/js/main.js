var uploader = new plupload.Uploader({
	runtimes : 'html5,flash',
	container: 'plupload',
	browse_button: 'browse',
	drop_element: 'droparea',
	dragdrop: true,
	url : 'upload.php',
	flash_swf_url: 'js/plupload/plupload.flash.swf',
	multipart : true,
	urlstream_upload:true,
	max_file_size: '2mb',
	chunk_size : '2mb',
	file_data_name: "file",
	file_data_name: "file",
    unique_names : true,
	multipart_params:{directory:'test'},
	resize : {
            width : 800,
            height : 600,
            quality : 90,
            crop: true // crop to exact dimensions
        },
	filters : [
		{title : "Image", extensions : "jpg,gif,png"}
	],


 });



uploader.bind('UploadProgress', function(up, file) {
	$('#'+file.id).find('.progress').css('width',file.percent+'%');

});

uploader.init();



uploader.bind('FilesAdded',function(up,files){
	var filelist = $('#filelist');
	console.log(files);

for (var i in files) {
	var file = files[i];

	filelist.prepend('<div id="'+file.id+'" class="file">'+ file.name +' (' +plupload.formatSize(file.size)+ ')' +'<div class="progressbar"><div class="progress"></div></div></div>');
}
$('#droparea').removeClass('hover');
uploader.start();
uploader.refresh();

});


uploader.bind('Error',function(up, err){
alert(err.message);
$('#droparea').removeClass('hover');
uploader.refresh();
});

uploader.bind('FileUploaded',function(up, file, response){
data = $.parseJSON(response.response);
if(data.error){
	alert(data.message);
	$('#'+file.id).remove();
}else{
	$('#'+file.id).replaceWith(data.html);
}

});

jQuery(function($) {
	$('#droparea').bind({
		dragover : function(e){
			$(this).addClass('hover');
		},
		dragleave : function(e){
			$(this).removeClass('hover');
		}
	});


	$(".del").live("click", function(e){
   		e.preventDefault();
   		var elem = $(this);
		if(confirm('Do you really want to delete this image ?')){
			$.get('upload.php',{'action':'delete',file:elem.attr('href')});
			elem.parent().parent().slideUp();
		}
});
})