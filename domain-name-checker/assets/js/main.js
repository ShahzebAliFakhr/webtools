$(document).ready(function(){
	$('#result_box').hide();
})

function checkDomainUsingAjax(){
	$('#result_box').show();
	$('#result').html('<div class="w-100 text-center"><img src="assets/img/loading.gif"/ height="30px" width="30px;"></div>');
	var domain = $('#domain').val();
	var display = $('#display').val();
	$.ajax({
		url: "functions.php",
		dataType: 'json',
		method: 'POST',
		data: {domain:domain, display:display},  
		success: function(data) {
			$('#result_box').show();
			$('#result').html(data.message);
			$('#display').val(data.display);
			$('#domainprevious').val(data.domain);
			$('#suggestion_box').html(data.suggestion);
		}
	});
}

function loadmoreBtn(){
	var domain_p = $('#domainprevious').val();
	var display = $('#display').val();
	$('#loadmore').text('Loading...');
	$.ajax({
		url: "functions.php",
		dataType: 'json',
		method: 'POST',
		data: {domain_p:domain_p, display:display}, 
		success: function(data) {
			$('#display').val(data.display);
			$('#suggestion_box').append(data.suggestion);
			$('#loadmore').text('Load More');
		}
	});
}