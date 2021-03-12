<?php 
$pagetitle = "HEX CALCULATOR";
$first_number = $second_number = $calc_type = $result = "" ;
$ch_number  = $ch_result = $cd_number = $cd_result = "";

if(isset($_POST['btn_calculate'])){
    $first_number = htmlspecialchars($_POST['first_number']);
    $second_number = htmlspecialchars($_POST['second_number']);
    $calc_type = htmlspecialchars($_POST['calc_type']);

    if($calc_type == "a"){
        $result .= "Hex Value: " . $first_number . " + " . $second_number . " = ";
        $result .= dechex(hexdec($first_number) + hexdec($second_number));
        $result .= "\nDecimal Value: " . hexdec($first_number) . " + " . hexdec($second_number) . " = ";
        $result .= hexdec($first_number) + hexdec($second_number);
    } 

    if($calc_type == "s"){
        $result .= "Decimal Value: " . hexdec($first_number) . " - " . hexdec($second_number) . " = ";
        $result .= hexdec($first_number) - hexdec($second_number);
    }

    if($calc_type == "m"){
        $result .= "Decimal Value: " . hexdec($first_number) . " * " . hexdec($second_number) . " = ";
        $result .= hexdec($first_number) * hexdec($second_number);
    }

    if($calc_type == "d"){
        $result .= "Decimal Value: " . hexdec($first_number) . " / " . hexdec($second_number) . " = ";
        $result .= hexdec($first_number) / hexdec($second_number);
    }
}

if(isset($_POST['ch_convert'])){
    $ch_number = htmlspecialchars($_POST['ch_number']);
    $ch_result = dechex($ch_number);
}

if(isset($_POST['cd_convert'])){
    $cd_number = htmlspecialchars($_POST['cd_number']);
    $cd_result = hexdec($cd_number);
}

?>

    <?php include('components/header.php')?>

    <div class="container-fluid" id="webtools">
        <div class="row no-margins">
            <div class="col-lg-8">
                <div class="row no-margins">
                    <div class="col-lg-12 mb-3" id="submit">
                        <div class="box">
                            <h2>HEX CALCULATOR</h2>
                            <form action="#submit" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?=$first_number?>" name="first_number" placeholder="Enter First Number" required>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" required name="calc_type">
                                        <option value="" hidden>Calculation Type</option>
                                        <option <?=($calc_type == "a") ? 'selected' : ''?> value="a">Addition</option>
                                        <option <?=($calc_type == "s") ? 'selected' : ''?> value="s">Substraction</option>
                                        <option <?=($calc_type == "m") ? 'selected' : ''?> value="m">Multiplication</option>
                                        <option <?=($calc_type == "d") ? 'selected' : ''?> value="d">Division</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?=$second_number?>" name="second_number" placeholder="Enter Second Number" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-block" value="CALCULATE" name="btn_calculate">
                                </div>
                            </form>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Result will be show here.." id="result" readonly><?=strtoupper($result)?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-default mb-1 copytoclipboard"  data-clipboard-target="#result">Copy to Clipboard</button>
                                <button type="button" class="btn btn-default mb-1" onclick="select_all_result()">Select All</button>
                                <button type="button" class="btn btn-default mb-1" onclick="reset_all_result()">Clear</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3" id="second_box">
                        <div class="box">
                             <form action="#submit_second" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?=$ch_number?>" name="ch_number" placeholder="Enter Decimal Number" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-block" name="ch_convert" value="CONVERT TO HEX">
                                </div>
                            </form>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?=strtoupper($ch_result)?>" placeholder="Result will be show here..">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="box">
                             <form action="#submit_second" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?=$cd_number?>" name="cd_number" placeholder="Enter Hex Number" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-block" name="cd_convert" value="CONVERT TO DECIMAL">
                                </div>
                            </form>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?=strtoupper($cd_result)?>" placeholder="Result will be show here..">
                            </div>
                        </div>
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
                <div class="card mb-3" id="submit_second">
                    <?php include('ads/square-ad.php');?>
                </div>
                <div class="card mb-3">
                    <?php include('ads/square-ad.php');?>
                </div>
            </div>
        </div>
    </div>

    <?php include('content/hex-calculator.php')?>
    <?php include('components/footer.php')?>