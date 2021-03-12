"use strict";
var sliderTI = document.getElementById("sliderTI");
var inputTI = document.getElementById("inputTI");
var sliderROI = document.getElementById("sliderROI");
var inputROI = document.getElementById("inputROI");
var sliderTenure = document.getElementById("sliderTenure");
var inputTenure = document.getElementById("inputTenure");
var tpMode = document.getElementById("tp_mode");


inputTI.innerHTML = sliderTI.value;
inputROI.innerHTML = sliderROI.value;
inputTenure.innerHTML = sliderTenure.value;

sliderTI.oninput = function () {
  inputTI.innerHTML = this.value;
};
sliderROI.oninput = function () {
  inputROI.innerHTML = this.value;
};
sliderTenure.oninput = function () {
  inputTenure.innerHTML = this.value;
};

function showTotalInvestmentVal(newVal) {
  sliderTI.value = newVal;
  calculateIt();
}

function showExpectedReturnsVal(newVal) {
  sliderROI.value = newVal;
  calculateIt();
}

function showTimePeriodVal(newVal) {
  sliderTenure.value = newVal;
  calculateIt();
}

sliderTI.addEventListener("input", updateValueTotalInvestment);
sliderROI.addEventListener("input", updateValueExpectedReturns);
sliderTenure.addEventListener("input", updateValueTimePeriod);

function updateValueTotalInvestment(e) {
  inputTI.value = e.srcElement.value;
  calculateIt();
}

function updateValueExpectedReturns(e) {
  inputROI.value = e.srcElement.value;
  calculateIt();
}

function updateValueTimePeriod(e) {
  inputTenure.value = e.srcElement.value;
  calculateIt();
}

AttachInputListeners();
var initialLoad = true;
var chart;
getParams();
calculateIt();

function calculateIt() {
  let O_TI = document.getElementById("r1");
  let O_ER = document.getElementById("r2");
  let O_MV = document.getElementById("r3");

  let TI, ER, MV;

  TI = Number(inputTI.value);
  let ROI = Number(inputROI.value);
  let T = Number(inputTenure.value);
  let tp_mode = tpMode.value;

  if (TI >= 1000 && ROI >= 1) {
    if (tp_mode === "YY") {
      MV = Math.round(TI * Math.pow(1 + ROI / 400, 4 * T));
    } else if (tp_mode === "MM") {
      if (T <= 6) {
        T = (T / 12).toFixed(2);
        MV = Math.round(TI + (TI * ROI * T) / 100);
      } else {
        T = (T / 12).toFixed(2);
        MV = Math.round(TI * Math.pow(1 + ROI / 400, 4 * T));
      }
    } else if (tp_mode === "DD") {
      T = (T / 365).toFixed(3);
      MV = Math.round(TI + (TI * ROI * T) / 100);
    }

    ER = Math.round(MV - TI);

    O_TI.innerHTML = "Rs. " + TI.toLocaleString('en-IN');
    O_ER.innerHTML = "Rs. " + ER.toLocaleString('en-IN');
    O_MV.innerHTML = "Rs. " + MV.toLocaleString('en-IN');

    if (!initialLoad) {
      chart.destroy();
    }
    DrawChart(TI, ER);
    initialLoad = false;
  }
}

function DrawChart(TI, ER) {
  var ctx = document.getElementById("myChart").getContext("2d");

  chart = new Chart(ctx, {
    type: "doughnut",
    data: {
      labels: ["Total Investment", "Total Interest"],
      datasets: [
        {
          backgroundColor: ["#5367ff", "#00d09c"],
          data: [TI, ER],
        },
      ],
    },
    options: {
      segmentShowStroke: false,
      responsive: true,
    },
  });
}

function getParams() {
  let urlVal = window.location.href;
  let url = new URL(urlVal);
  let cta = url.searchParams.get("cta");
  let name = url.searchParams.get("name");
  if (cta === "hide") {
    let ctaDiv = document.getElementById("cta");
    ctaDiv.style.display = "none";
  }
  if (name !== null) {
    let heading = document.getElementById("heading");
    heading.innerHTML = name + " FD Calculator";
  }
}

function AttachInputListeners() {
  tpMode.addEventListener("change", (e) => {
    let val = e.target.value;
    if (val === "YY") {
      inputTenure.min = "1";
      inputTenure.max = "10";
      inputTenure.value = "5";
      sliderTenure.min = "1";
      sliderTenure.max = "10";
      sliderTenure.value = "5";
      calculateIt();
    } else if (val === "MM") {
      inputTenure.min = "1";
      inputTenure.max = "11";
      inputTenure.value = "3";
      sliderTenure.min = "1";
      sliderTenure.max = "11";
      sliderTenure.value = "3";
      calculateIt();
    } else if ((val = "DD")) {
      inputTenure.min = "1";
      inputTenure.max = "31";
      inputTenure.value = "7";
      sliderTenure.min = "1";
      sliderTenure.max = "31";
      sliderTenure.value = "7";
      calculateIt();
    }
  });

  inputTI.addEventListener("input", (e) => {
    let val = e.target.value;
    if (val < 0) {
      inputTI.value = 1000;
      calculateIt();
    }
    if (val > 100000000) {
      inputTI.value = 100000000;
      calculateIt();
    }
  });

  inputROI.addEventListener("input", (e) => {
    let val = e.target.value;
    if (val < 0) {
      inputROI.value = 1;
      calculateIt();
    }
    if (val > 15) {
      inputROI.value = 15;
      calculateIt();
    }
  });

  inputTenure.addEventListener("input", (e) => {
    let val = e.target.value;
    let tpModeVal = tpMode.value;
    if (!Number.isInteger(val)) {
      val = Math.ceil(val);
      inputTenure.value = val;
      calculateIt();
    }
    if (val < 1) {
      inputTenure.value = 1;
      calculateIt();
    }
    if (tpModeVal === "YY") {
      if (val > 10) {
        inputTenure.value = 10;
        calculateIt();
      }
    } else if (tpModeVal === "MM") {
      if (val > 11) {
        inputTenure.value = 11;
        calculateIt();
      }
    } else if (tpModeVal === "DD") {
      if (val > 31) {
        inputTenure.value = 31;
        calculateIt();
      }
    }
  });
}