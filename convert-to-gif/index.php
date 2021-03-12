<?php 
$pagetitle = "CONVERT TO GIF";
$url = "";

if(isset($_POST['btn_submit'])){
    include('plugin/image-convertor.php');
    $uploading_dir = "uploads/";
    $from = $_FILES["convertImg"]["tmp_name"];
    $to = $uploading_dir . rand() . ".gif";
    \ImageConverter\convert($from, $to);
    $url = $to;
}

?>

    <?php include('components/header.php')?>

    <div class="container-fluid" id="webtools">
        <div class="container">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <h2><?=$pagetitle?></h2>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="convertImg" id="convertImg" required>
                        <label class="custom-file-label" for="convertImg">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6 text-center-lg order-lg-1 order-2">
                            <a href="../convert-to-jpg" class="btn btn-default mb-1">CONVERT TO JPG</a>
                            <a href="../convert-to-png" class="btn btn-default mb-1">CONVERT TO PNG</a>
                            <a href="../convert-to-webp" class="btn btn-default mb-1">CONVERT TO WEBP</a>
                        </div>
                        <div class="col-lg-6 text-right text-center-lg order-lg-2 order-1">
                            <input type="submit" class="btn btn-base btn-success btn-block mb-1" name="btn_submit"/>
                        </div>
                    </div>
                </div>
                <?php if($url != ""){?>
                    <div class="form-group text-right text-center-lg">
                        <a href="<?=$url?>" target="_blank" class="btn btn-success" download>DOWNLOAD</a>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>

    <?php include('content/convert2gif.php')?>
    <?php include('components/footer.php')?>