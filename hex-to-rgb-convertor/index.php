<?php 
$pagetitle = "HEX TO RGB";
$result = $u_input = "";

function hex2rgb( $colour ) {
    if ( $colour[0] == '#' ) {
            $colour = substr( $colour, 1 );
    }
    if ( strlen( $colour ) == 6 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
    } elseif ( strlen( $colour ) == 3 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
    } else {
            return "Invalid HEX code";
    }
    $r = hexdec( $r );
    $g = hexdec( $g );
    $b = hexdec( $b );
    $rgb = 'rgb('.$r.','.$g.','.$b.')';
    return  $rgb;
}

if(isset($_POST['btn_convert'])){
    $u_input = htmlspecialchars($_POST['u_input']);
    $result = hex2rgb($u_input);
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
                        <textarea class="form-control" id="u_input" name="u_input" rows="5" placeholder="e.g: #fff or #ffffff" required><?=$u_input?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-default mb-1 copytoclipboard"  data-clipboard-target="#u_input">Copy to Clipboard</button>
                        <button type="button" class="btn btn-default mb-1" onclick="select_all_input()">Select All</button>
                        <button type="button" class="btn btn-default mb-1" onclick="reset_all_input()">Clear</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box text-center-lg mb-0">
                    <h3 class="mb-1 mt-1">HEX TO RGB</h3>
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

    <?php include('content/hex2rgb.php')?>
    <?php include('components/footer.php')?>