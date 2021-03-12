<?php 
$pagetitle = "JSON MINIFIER";
$result = $u_input = "";

if(isset($_POST['btn_submit'])){
    $u_input = htmlspecialchars($_POST['u_input']);
    include('plugin/json_minifier.php');
    $result = htmlspecialchars(minify_json($_POST['u_input'])); 
}

?>

    <?php include('components/header.php')?>

    <div class="container-fluid" id="webtools">
        <form action="#" method="POST">
            <div class="row no-margins">
                <div class="col-lg-6">
                    <div class="box">
                        <div class="row">
                            <div class="col-lg-6 text-center-lg">
                                <h2 class="mb-0">JSON MINIFIER</h2>
                            </div>
                            <div class="col-lg-6 text-right text-center-lg">
                                <input type="submit" class="btn btn-primary btn-round mb-1" name="btn_submit" value="MINIFY JSON"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="u_input" name="u_input" rows="15" placeholder="Paste JSON here.." required><?=$u_input?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-default mb-1 copytoclipboard"  data-clipboard-target="#u_input">Copy to Clipboard</button>
                        <button type="button" class="btn btn-default mb-1" onclick="select_all_input()">Select All</button>
                        <button type="button" class="btn btn-default mb-1" onclick="reset_all_input()">Clear</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="result-box">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="result" readonly rows="15" placeholder="Result.."><?=$result?></textarea>
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

    <?php include('content/json.php')?>
    <?php include('components/footer.php')?>