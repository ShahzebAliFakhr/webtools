<?php 
$pagetitle = "RGB TO HEX";
$result = $u_input = "";

function rgb2hex($colour) {
    $sCSSString = $colour;
    $sRegex     = '/rgba?\(\s?([0-9]{1,3}),\s?([0-9]{1,3}),\s?([0-9]{1,3})/i';

    preg_match($sRegex, $sCSSString, $matches);

    if(count($matches) != 4){
        die('The color count does not match.');
    }

    $iRed   = (int) $matches[1];
    $iGreen = (int) $matches[2]; 
    $iBlue  = (int) $matches[3];

    if($iRed > 255 || $iGreen > 255 || $iBlue > 255){
        return 'One of the color values is above 255.';
    }

    $sHexValue = dechex($iRed) . dechex($iGreen) . dechex($iBlue);

    return '#' . $sHexValue;

}

if(isset($_POST['btn_convert'])){
    $u_input = htmlspecialchars($_POST['u_input']);
    $result = rgb2hex($u_input);
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
                        <textarea class="form-control" id="u_input" name="u_input" rows="5" placeholder="e.g: rgb(255,255,255)" required><?=$u_input?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-default mb-1 copytoclipboard"  data-clipboard-target="#u_input">Copy to Clipboard</button>
                        <button type="button" class="btn btn-default mb-1" onclick="select_all_input()">Select All</button>
                        <button type="button" class="btn btn-default mb-1" onclick="reset_all_input()">Clear</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box text-center-lg mb-0">
                    <h3 class="mb-1 mt-1">RGB TO HEX</h3>
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

    <?php include('content/rgb2hex.php')?>
    <?php include('components/footer.php')?>