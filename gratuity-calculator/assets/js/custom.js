function calculateGratuity(){
  var income = document.getElementById('monthlyIncome');
  var period = document.getElementById('period');

  if(period.value < 5){
    alert("Period should be more than or equal to 5");
  }else{
    var g = income.value * period.value * 15 / 26;
    var gn = income.value * period.value * 15 / 30;
    document.getElementById('r1').innerHTML = "Rs. " + g.toFixed(0);
    document.getElementById('r2').innerHTML = "Rs. " + gn.toFixed(0);
  }
}