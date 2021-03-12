<?php 
   $pagetitle = "LOAN CALCULATOR";
   ?>
<?php include('components/header.php')?>
<div class="container-fluid iframe_tools" id="webtools">
   <div class="row no-margins">
      <div class="col-lg-8">
         <div class="form">
            <div class="form-group has-success">
               <div class="input-group mb-3">
                  <div class="input-group-prepend has-success">
                     <span class="input-group-text icon-color">$</span>
                  </div>
                  <input type="number" class="form-control has-success" placeholder="Enter Loan Amount *" id="loanAmount"
                     required />
               </div>
            </div>
            <div class="form-group has-success">
               <div class="input-group mb-3">
                  <div class="input-group-prepend has-success">
                     <span class="input-group-text icon-color">%</span>
                  </div>
                  <input type="number" class="form-control has-success" placeholder="Enter Interest Rate per Annum * "
                     id="interestRate" required />
               </div>
            </div>
            <div class="form-group has-success">
               <div class="input-group mb-3">
                  <div class="input-group-prepend has-success">
                     <span class="input-group-text"><i class="fa fa-calendar icon-color" aria-hidden="true"></i></span>
                  </div>
                  <input type="number" min="0" step="1" class="form-control has-success" placeholder="Loan Term Months *" id="months"
                     required />
               </div>
            </div>
            <div class="form-group has-success">
               <div class="input-group mb-3">
                  <div class="input-group-prepend has-success">
                     <span class="input-group-text"><i class="fa fa-calendar icon-color" aria-hidden="true"></i></span>
                  </div>
                  <input type="number" min="0" step="1" class="form-control has-success" placeholder="How Many Months I Already Paid (Optional)" id="left_months"/>
               </div>
            </div>
            <button id="calculate" type="submit" class="btn btn-block btn-default mb-3">
            Calculate
            </button>
            <!-- SECTION-1 LOAN CALCULATOR ENDS-->
            <!-- SECTION-2 LOAN CALCULATOR INFO.-->
            <div id="wrapper_1">
               <div class="card border-primary-colors mb-3">
                  <div class="card-header">Calculated Results</div>
                  <div class="card-body text-center">
                     <textarea id="span1" rows="5" readonly class="form-control">${xxx}</textarea>
                     <div class="form-group mt-3 text-right text-center-lg">
                        <button type="button" class="btn btn-default mb-1 copytoclipboard"  data-clipboard-target="#span1">Copy to Clipboard</button>
                        <button type="button" class="btn btn-default mb-1" onclick="select_all_result()">Select All</button>
                        <button type="button" class="btn btn-default mb-1" onclick="reset_all_result()">Clear</button>
                     </div>
                  </div>
               </div>
               <!-- SECTION-1 LOAN CALCULATOR ENDS-->
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="mb-3">
            <a href="#" class="btn btn-default mb-1">LINK 1</a>
            <a href="#" class="btn btn-default mb-1">LINK 2</a>
            <a href="#" class="btn btn-default mb-1">LINK 3</a>
            <a href="#" class="btn btn-default mb-1">LINK 4</a>
            <a href="#" class="btn btn-default mb-1">LINK 5</a>
         </div>
         <div class="card mb-3">
            <?php include('ads/square-ad.php');?>
         </div>
      </div>
   </div>
</div>
<?php include('content/loan-calculator.php')?>
<?php include('components/footer.php')?>