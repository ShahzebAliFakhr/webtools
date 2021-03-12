<?php 
$pagetitle = "WORDS COUNTER";
$result = $u_input = $words = $characters_wos = $characters_ws = $sentence = $numeric = $paragraph = $short_words = $long_words = $keyword_density = $u_url = "";
include('plugin/keyword-density-checker.php');

if(isset($_POST['btn_submit'])){

    if($_POST['u_url'] != ''){
        
        if(strpos($_POST['u_url'], "https://") !== false){
            $u_url = $_POST['u_url'];
        }else{
            $u_url = 'https://' . $_POST['u_url'];
        }
        
        $html = loadHTML($u_url);
        $words = str_word_count($html);
        $characters_wos = count_characters_without_spaces($html);
        $characters_ws = count_characters_with_spaces($html);
        $sentence = count_sentence($html);
        $numeric = count_numeric($html);
        $paragraph = count_paragraph($html);
        $short_words = count_short_words($html);
        $long_words = count_long_words($html);
        $keyword_density = keyword_density($html);

    }else if($_POST['u_url'] === '' && $_POST['u_input'] === ''){
        $words = $characters_wos = $characters_ws = $sentence = $numeric = $paragraph = $short_words = $long_words = 0;
    }
    else{
        $u_input = $_POST['u_input'];
        $words = str_word_count(strip_tags($u_input));
        $characters_wos = count_characters_without_spaces(strip_tags($u_input));
        $characters_ws = count_characters_with_spaces(strip_tags($u_input));
        $sentence = count_sentence(strip_tags($u_input));
        $numeric = count_numeric(strip_tags($u_input));
        $paragraph = count_paragraph(strip_tags($u_input));
        $short_words = count_short_words(strip_tags($u_input));
        $long_words = count_long_words(strip_tags($u_input));
        $keyword_density = keyword_density(strip_tags($u_input));

    }
}

function loadHTML($url){
    
    $page_source = file_get_contents($url);
    $remove_scripts = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $page_source);
    $remove_styles = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', "", $remove_scripts);
    return strip_tags($remove_styles);
}

function count_characters_without_spaces($string){
    $length = strlen($string);
    $characters = 0;
    for($i = 0 ; $i < $length; $i++) {
      if(!( $string[$i]==" ")) {
        $characters++;
      }
    }
    return $characters;
}

function count_characters_with_spaces($string){
    $length = strlen($string);
    $characters = 0;
    for($i = 0 ; $i < $length; $i++) {
        $characters++;
    }
    return $characters;
}

function count_sentence($string){
    $length = strlen($string);
    $sentence = 0;
    for($i = 0 ; $i < $length; $i++) {
      if(($string[$i]==".")) {
        $sentence++;
      }
    }
    return $sentence;
}

function count_numeric($string){
    $length = strlen($string);
    $numeric = 0;
    for($i = 0 ; $i < $length; $i++) {
      if(($string[$i]=="0") || ($string[$i]=="1") || ($string[$i]=="2") || ($string[$i]=="3") || ($string[$i]=="4") || ($string[$i]=="5") || ($string[$i]=="6") || ($string[$i]=="7") || ($string[$i]=="8") || ($string[$i]=="9")) {
        $numeric++;
      }
    }
    return $numeric;
}

function count_paragraph($string){
    $length = strlen($string);
    $paragraph = 1;
    for($i = 0 ; $i < $length; $i++) {
      if(($string[$i]=="\n")) {
        $paragraph++;
      }
    }
    return $paragraph;
}

function count_short_words($string){
    $words = explode(" ",$string);
    $short_words = 0;
    foreach ($words as $s) {
        if(strlen($s) < 4){
            $short_words++;
        }
    }
    return $short_words;
}

function count_long_words($string){
    $words = explode(" ",$string);
    $long_words = 0;
    foreach ($words as $s) {
        if(strlen($s) > 8){
            $long_words++;
        }
    }
    return $long_words;
}

?>

    <?php include('components/header.php')?>

    <div class="container-fluid" id="webtools">
        <form action="#" method="POST">
            <div class="row no-margins">
                <div class="col-lg-6">
                    <div class="form-group
                    ">
                        <input type="text" class="form-control" id="u_url" name="u_url" value="<?=$u_url?>" placeholder="Enter URL">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="u_input" name="u_input" rows="14" placeholder="Or Paste Your Text here.."><?=$u_input?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-default mb-1 copytoclipboard"  data-clipboard-target="#u_input">COPY TO CLIPBOARD</button>
                        <button type="button" class="btn btn-default mb-1" onclick="select_all_input()">SELECT ALL</button>
                        <button type="button" class="btn btn-default mb-1" onclick="reset_all_input()">CLEAR</button>
                         <input type="submit" class="btn btn-primary mb-1" name="btn_submit" value="COUNT"/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <table class="table table-bordered">
                        <tr>
                           <td>Total Words</td> 
                           <td><?=$words?></td> 
                        </tr>
                        <tr>
                           <td>Total Characters (Without Spaces)</td> 
                           <td><?=$characters_wos?></td> 
                        </tr>
                        <tr>
                           <td>Total Characters (With Spaces)</td> 
                           <td><?=$characters_ws?></td> 
                        </tr>
                        <tr>
                           <td>Total Sentence</td> 
                           <td><?=$sentence?></td> 
                        </tr>
                        <tr>
                           <td>Total Numeric</td> 
                           <td><?=$numeric?></td> 
                        </tr>
                        <tr>
                           <td>Total Paragraphs</td> 
                           <td><?=$paragraph?></td> 
                        </tr>
                        <tr>
                           <td>Short Words</td> 
                           <td><?=$short_words?></td> 
                        </tr>
                        <tr>
                           <td>Long Words</td> 
                           <td><?=$long_words?></td> 
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
   <?php if($keyword_density != ''){ ?>
    <div class="container-fluid">
        <div class="row no-margins">
            <div class="col-lg-9">
                <?=$keyword_density?>
            </div>
            <div class="col-lg-3">
                <div class="card mb-3">
                    <?php include('ads/square-ad.php');?>
                </div>
                <div class="card mb-3">
                    <?php include('ads/square-ad.php');?>
                </div>
                <div class="card mb-3">
                    <?php include('ads/square-ad.php');?>
                </div>
                <div class="card mb-3">
                    <?php include('ads/square-ad.php');?>
                </div>
                <div class="card mb-3">
                    <?php include('ads/square-ad.php');?>
                </div>
            </div>
        </div>
    </div>
    <?php }?>

    <?php include('content/words-counter.php')?>
    <?php include('components/footer.php')?>