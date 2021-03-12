var clipboard = new ClipboardJS('.copytoclipboard');

clipboard.on('success', function(e) {
    alert('Copied!')
    e.clearSelection();
});

function select_all_result(){
    var selectAll = document.getElementById("span1");
    selectAll.select();
}

function reset_all_result(){
    document.getElementById("loanAmount").value = '';
    document.getElementById("interestRate").value = '';
    document.getElementById("months").value = '';
    document.getElementById("left_months").value = '';
    document.getElementById("span1").value = '';
    $('#wrapper_1').hide(1000)
}

  var firstAnswer;
  var loanAmount;
  var interestRate;
  var years;
  var months;
  $(document).ready(function () {

    $('#wrapper_1').hide()

    $('#calculate').on('click', function (e) {
      loanAmount = $('#loanAmount').val()
      interestRate = $('#interestRate').val()
      months = $('#months').val()
      left_months = $('#left_months').val()
      if(left_months == ''){
          left_months = 0;
      }
      if (
        loanAmount == '' ||
        interestRate == '' ||
        months == ''
      ) {
        alert('All fields with * are required!')
        return
      }
      firstAnswer = loanMonthlyPayment(
        +loanAmount,
        +interestRate,
        +months,
        +left_months
      )
      $('#span1').text("Your Monthly Payment is: "+firstAnswer.monthlyPayment.toFixed(2)+"\nTotal Months Remaining: "+firstAnswer.remainingMohths+"\nTotal Interest Payable:"+firstAnswer.totalInterest.toFixed(2))
      $('#wrapper_1').show(1000)
      e.preventDefault()
    })
  })
  const loanMonthlyPayment = (loan_amt, r, months, rm) => {
    r = r / 12 / 100;
    n = months;
    if(rm == 0){
        rmn = months;    
    }else{
        rmn = months - rm;
    }

    const paymentMonthly =
      (loan_amt * r * Math.pow(1 + r, n)) / (Math.pow(1 + r, n) - 1)
    const totalInterest = paymentMonthly * n - loan_amt
    y =
      (Math.log(paymentMonthly / loan_amt) -
        Math.log(paymentMonthly / loan_amt - r)) /
      Math.log(1 + r)
    return {
      monthlyPayment: paymentMonthly,
      remainingMohths: rmn,
      totalInterest: totalInterest,
    }
  }