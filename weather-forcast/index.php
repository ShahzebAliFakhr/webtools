<?php 
$pagetitle = "WEATHER FORCAST";
$u_input = $url = $api = $result = $cURLConnection = $data = $weather = $weather_desc = $icon = $temp = $wind = $clouds = $humidity = $city = $state = "";

if(isset($_POST['btn_submit'])){

    $api = '919a3810f503cda99056a8ae91de39bc';
    $u_input = htmlspecialchars($_POST['u_input']);
    $url = 'api.openweathermap.org/data/2.5/weather?q='.$u_input.'&APPID='.$api;

    $cURLConnection = curl_init();

    curl_setopt($cURLConnection, CURLOPT_URL, $url);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($cURLConnection);
    $message = json_decode($result, true);
    
    if($result){
        $state = $message['cod'];
        if($state != 404){
            $data = json_decode($result, true);
            $weather = $data['weather'][0]['main'];
            $weather_desc = $data['weather'][0]['description'];
            $icon = $data['weather'][0]['icon'];
            $temp = $data['main']['temp'] - 273.15 . "<sup>°C</sup>";            
            $wind = $data['wind']['speed'] * 3.6 . " km/h";
            $clouds = $data['clouds']['all'] . "%";
            $humidity = $data['main']['humidity'] . "%";
            $city = $data['name'];
        }
    }

    curl_close($cURLConnection);
}

?>

    <?php include('components/header.php')?>

    <div class="container-fluid" id="webtools">
        <div class="container">
            <form action="#" method="POST">
                <div class="form-group">
                    <h2>WEATHER FORCAST</h2>
                    <div class="input-group">
                        <input type="search" name="u_input" value="<?=$u_input?>" class="form-control" placeholder="Enter City Name.." required>
                        <div class="input-group-append">
                          <input type="submit" class="btn btn-success" value="SEARCH" name="btn_submit">
                        </div>
                    </div>
                </div>
            </form>
            <div class="row no-margins <?=($u_input == "") ? 'd-none' : '' ?>">
                <?php if($state != 404 && $result != ""){?>
                <div class="col-lg-12 p-0">
                    <div class="card p-3 mb-3">
                        <img src="https://openweathermap.org/img/wn/<?=$icon?>.png" width="50px">
                    </div>
                    <table class="table table-hover table-bordered">
                        <tr>
                            <td style="width:50%;"><strong>City</strong></td>
                            <td style="width:50%;"><?=$city?></td>
                        </tr>
                        <tr>
                            <td style="width:50%;"><strong>Weather</strong></td>
                            <td style="width:50%;"><?=$weather?></td>
                        </tr>
                        <tr>
                            <td style="width:50%;"><strong>Description</strong></td>
                            <td style="width:50%;"><?=$weather_desc?></td>
                        </tr>
                        <tr>
                            <td style="width:50%;"><strong>Temperature</strong></td>
                            <td style="width:50%;"><?=$temp?></td>
                        </tr>
                        <tr>
                            <td style="width:50%;"><strong>Wind</strong></td>
                            <td style="width:50%;"><?=$wind?></td>
                        </tr>
                        <tr>
                            <td style="width:50%;"><strong>Humidity</strong></td>
                            <td style="width:50%;"><?=$humidity?></td>
                        </tr>
                        <tr>
                            <td style="width:50%;"><strong>Clouds</strong></td>
                            <td style="width:50%;"><?=$clouds?></td>
                        </tr>
                    </table>
                </div>
                <?php }else{?>
                    <div class="col-lg-12 p-0 mb-3">
                        <div class="card shadow p-3">
                            No Result Found for <?=$u_input?>.
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>

    <?php include('content/weather-forcast.php')?>
    <?php include('components/footer.php')?>