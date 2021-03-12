$(document).ready(function () {
    $('#wrapper_1').hide();
    var range = document.getElementById("p_length");
    var rangeCount = document.getElementById("rangeCount");
    var rangeStrength = document.getElementById("rangeStrength");
    rangeStrengthChecker();
    rangeCount.innerHTML = range.value;
    range.addEventListener("change", () => {
  		rangeCount.innerHTML = range.value;
		generate_password();
		rangeStrengthChecker();
	});

	function rangeStrengthChecker(){
		if(range.value < 8){
			rangeStrength.innerHTML = "<span class='badge badge-danger'>Weak</span>";
		}else if(range.value >= 8 && range.value <= 15){
			rangeStrength.innerHTML = "<span class='badge badge-info'>Better</span>";
		}else if(range.value >= 16 && range.value <= 30){
			rangeStrength.innerHTML = "<span class='badge badge-primary'>Good</span>";
		}else{
			rangeStrength.innerHTML = "<span class='badge badge-success'>Excellent</span>";
		}
	}

});

var clipboard = new ClipboardJS('.copytoclipboard');

clipboard.on('success', function(e) {
    alert('Copied!')
    e.clearSelection();
});

function reset_all_pass(){
    document.getElementById("p_i_symbols").checked = false;
	document.getElementById("p_i_numbers").checked = false;
	document.getElementById("p_i_lowercase").checked = false;
	document.getElementById("p_i_uppercase").checked = false;
	document.getElementById("p_length").value = "";
	document.getElementById("passwordGenerated").value = "";
    $('#wrapper_1').hide(1000);
}

function select_all_pass(){
    var selectAll = document.getElementById("passwordGenerated");
    selectAll.select();
}

function generate_password(){
	var symbols = document.getElementById("p_i_symbols");
	var numbers = document.getElementById("p_i_numbers");
	var lowercase = document.getElementById("p_i_lowercase");
	var uppercase = document.getElementById("p_i_uppercase");
	var length = document.getElementById("p_length").value;
	var result = document.getElementById("passwordGenerated");
	var s1 = s2 = s3 = s4 = s5 = "";

	if(length == ''){
		result.value = 'Length must be grater than 5';
	}else{

		if(symbols.checked){
			s1 = "@#/$({[]})\\";
		}

		if(numbers.checked){
			s2 = "0123456789";
		}

		if(lowercase.checked){
			s3 = "abcdefghijklmnopqrstuvwxyz";
		}

		if(uppercase.checked){
			s4 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		}

		s5 = shuffle(repeat(s1) + repeat(s2) + repeat(s3) + repeat(s4));

		result.value = s5.substr(1, length);

	}

	$('#wrapper_1').show(1000);
}

function getRandomInt(n) {
  return Math.floor(Math.random() * n);
}

function repeat(s) {
  for(i=1; i<=3; i++){
  	s += s;
  }
  return s;
}

function shuffle(s) {
  var arr = s.split('');           // Convert String to array
  var n = arr.length;              // Length of the array
  
  for(var i=0 ; i<n-1 ; ++i) {
    var j = getRandomInt(n);       // Get random of [0, n-1]
    
    var temp = arr[i];             // Swap arr[i] and arr[j]
    arr[i] = arr[j];
    arr[j] = temp;
  }
  
  s = arr.join('');                // Convert Array to string
  return s;                        // Return shuffled string
}

