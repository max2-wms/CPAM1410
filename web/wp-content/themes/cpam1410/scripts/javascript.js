function change_larger_image(thumb_image){
	document.getElementById('large_image').src = thumb_image.src;
}

function openLiveRadioWindow(){
	window.open('/ecoutez-en-direct/', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550');
}