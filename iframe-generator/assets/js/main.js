var clipboard = new ClipboardJS('.copytoclipboard');

clipboard.on('success', function(e) {
    alert('Copied!')
    e.clearSelection();
});

function reset_all_iframeGenerateCode(){
    document.getElementById("iframeGeneratedCode").value = '';
}

function select_all_iframeGenerateCode(){
    var selectAll = document.getElementById("iframeGeneratedCode");
    selectAll.select();
}

function generate_iframe_code(){
	var i_name = document.getElementById("i_name");
	var i_width = document.getElementById("i_width");
	var i_height = document.getElementById("i_height");
	var i_dimensions = document.getElementById("i_dimensions");
	var i_scrollbar = document.getElementById("i_scrollbar");
	var i_marginWidth = document.getElementById("i_marginWidth");
	var i_marginHeight = document.getElementById("i_marginHeight");
	var i_border = document.getElementById("i_border");
	var i_borderType = document.getElementById("i_borderType");
	var i_borderSize = document.getElementById("i_borderSize");
	var i_borderColor = document.getElementById("i_borderColor");
	var i_iframeURL = document.getElementById("i_iframeURL");
	var iframe_error = document.getElementById("iframe_error");
	var iframeGeneratedCode = document.getElementById("iframeGeneratedCode");

	var name = '';
	var width = '';
	var height = '';
	var marginwidth = '';
	var marginheight = ''
	var frameborder= '';
	var scrolling = '';
	var style = '';
	var src = '';
	var error = '';

	if(i_name.value != ''){
		name = 'name="'+i_name.value+'" ';
	}

	if(i_width.value != ''){
		width = 'width="'+i_width.value+i_dimensions.value+'" ';
	}

	if(i_height.value != ''){
		height = 'height="'+i_height.value+i_dimensions.value+'" ';
	}

	if(i_scrollbar.value != ''){
		scrolling = 'scrolling="'+i_scrollbar.value+'" ';
	}

	if(i_marginWidth.value != ''){
		marginwidth = 'marginwidth="'+i_marginWidth.value+i_dimensions.value+'" ';
	}

	if(i_marginHeight.value != ''){
		marginheight = 'marginheight="'+i_marginHeight.value+i_dimensions.value+'" ';
	}

	if(i_border.value == 'no'){
		frameborder = 'frameborder="0" ';
	}else{
		frameborder = 'frameborder="1" ';
	}

	if(i_borderType.value != 'none'){
		style = 'style="'+i_borderSize.value +' '+ i_borderType.value +' '+ i_borderColor.value +'" ';
	}

	if(i_iframeURL.value == 'https://'){	
		error = '* iFrame URL is reuired.';
	}else if(i_iframeURL.value != ''){
		src = 'src="'+i_iframeURL.value+'" ';
	}

	if(error != ''){
		iframe_error.innerHTML = error;
	}else{
		iframe_error.innerHTML = '';
		iframeGeneratedCode.value = '<iframe '+src+name+width+height+marginwidth+marginheight+frameborder+scrolling+style+' allowfullscreen></iframe>';
	}

}
