<?php 
$pagetitle = "DOMAIN NAME CHECKER";
?>
    <?php include('components/header.php')?>

    <div class="container-fluid" id="webtools">
        <div class="container">
            <div class="form-group">
                <h2>DOMAIN NAME CHECKER</h2>
                <div class="input-group">
                    <input type="search" id="domain" class="form-control" placeholder="Enter Any Domain Name..">
                    <div class="input-group-append">
                      <input type="button" id="btn_submit" class="btn btn-success" value="SEARCH" onclick="checkDomainUsingAjax();">
                    </div>
                </div>
            </div>
            <div id="result_box">
                <div class="row no-margins">
                    <div class="col-lg-12 p-0">
                        <div class="card p-3 mb-3">
                            <span id="result"></span>
                        </div>
                    </div>        
                    <div id="suggestion_box"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12 text-center">
                        <input type="hidden" class="form-control" value="0" id="display">
                        <input type="hidden" class="form-control" value="" id="domainprevious">
                        <button class="btn btn-success" id="loadmore" onclick="loadmoreBtn()">LOAD MORE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('content/domain-name-checker.php')?>
    <?php include('components/footer.php')?>