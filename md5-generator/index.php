<?php 
$pagetitle = "MD5 GENERATOR";
$result = $u_input = "";

if(isset($_POST['btn_convert'])){
    $u_input = htmlspecialchars($_POST['u_input']);
    $result = md5($u_input);
}

?>

    <?php include('components/header.php')?>

    <div class="container-fluid" id="webtools">
        <form action="#" method="POST">
            <div class="row no-margins">
                <div class="col-lg-6">
                    <div class="box text-right text-center-lg mb-0">
                            <input type="submit" class="btn btn-primary btn-round" name="btn_convert" value="CONVERT"/>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="u_input" name="u_input" rows="5" placeholder="Paste your MD5 Code here.." required><?=$u_input?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-default mb-1 copytoclipboard"  data-clipboard-target="#u_input">Copy to Clipboard</button>
                        <button type="button" class="btn btn-default mb-1" onclick="select_all_input()">Select All</button>
                        <button type="button" class="btn btn-default mb-1" onclick="reset_all_input()">Clear</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box text-center-lg mb-0">
                    <h3 class="mb-1 mt-1">MD5 GENERATOR</h3>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="result" readonly rows="5" placeholder="Result.."><?=$result?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-default mb-1 copytoclipboard"  data-clipboard-target="#result">Copy to Clipboard</button>
                        <button type="button" class="btn btn-default mb-1" onclick="select_all_result()">Select All</button>
                        <button type="button" class="btn btn-default mb-1" onclick="reset_all_result()">Clear</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php include('content/md5.php')?>
    <?php include('components/footer.php')?>