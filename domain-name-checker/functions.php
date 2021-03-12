<?php

// Paste Your Script Here
$ad = '<img src="assets/img/ad.jpg" class="img-fluid"/>';


function checkHost($domain){
    if(gethostbyname($domain) === $domain){
        return TRUE;
    }
}

function isURL($url){

    $regex = "((https?|ftp)\:\/\/)?"; // SCHEME 
    $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass 
    $regex .= "([a-z0-9-.]*)\.([a-z]{2,25})"; // Host or IP 
    $regex .= "(\:[0-9]{2,5})?"; // Port 
    $regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path 
    $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query 
    $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor 

   if(preg_match("/^$regex$/i", $url)) // `i` flag for case-insensitive
   { 
           return true; 
   }
}

if(isset($_POST['domain_p'])){
    $start = $_POST['display'];
    $end = $start + 10;
    $domain = $_POST['domain_p'];
    $suggesions_tld = "";
        
    $tld = ['.com', '.net', '.org', '.dev', '.app', '.inc', '.website', '.io', '.co', '.ai', '.co.uk', '.ca', '.me', '.de', '.tech', '.online', '.shop', '.site', '.club', '.design', '.space', '.us', '.ac', '.academy', '.accountant', '.accountants', '.actor', '.adult', '.ae.org', '.ae', '.af', '.africa', '.ag', '.agency', '.am', '.apartments', '.com.ar', '.archi', '.art', '.as', '.asia', '.associates', '.at', '.attorney', '.com.au', '.id.au', '.net.au', '.org.au', '.auction', '.band', '.bar', '.bargains', '.bayern', '.be', '.beer', '.berlin', '.best', '.bet', '.bid', '.bike', '.bingo', '.bio', '.biz', '.black', '.blog', '.blue', '.boats', '.boston', '.boutique', '.br.com', '.brussels', '.build', '.builders', '.business', '.buzz', '.bz', '.cab', '.cafe', '.cam', '.camera', '.camp', '.capetown', '.capital', '.cards', '.care', '.career', '.careers', '.casa', '.cash', '.casino', '.catering', '.cc', '.center', '.ch', '.charity', '.chat', '.cheap', '.church', '.city', '.cl', '.claims', '.cleaning', '.click', '.clinic', '.clothing', '.cloud', '.cm', '.cn.com', '.coach', '.codes', '.coffee', '.college', '.cologne', '.community', '.company', '.compare', '.computer', '.condos', '.construction', '.consulting', '.contractors', '.cooking', '.cool', '.country', '.coupons', '.courses', '.credit', '.cricket', '.cruises', '.cx', '.cyou', '.cz', '.dance', '.date', '.dating', '.deals', '.degree', '.delivery', '.democrat', '.dental', '.dentist', '.diamonds', '.digital', '.direct', '.directory', '.discount', '.dk', '.doctor', '.dog', '.domains', '.download', '.durban', '.earth', '.ec', '.eco', '.education', '.email', '.energy', '.engineer', '.engineering', '.enterprises', '.equipment', '.es', '.estate', '.eu', '.eu.com', '.events', '.exchange', '.expert', '.exposed', '.express', '.fail', '.faith', '.family', '.fan', '.fans', '.farm', '.fashion', '.fi', '.finance', '.financial', '.fish', '.fishing', '.fit', '.fitness', '.flights', '.florist', '.fm', '.football', '.forsale', '.foundation', '.fr', '.fun', '.fund', '.furniture', '.futbol', '.fyi', '.gallery', '.games', '.garden', '.gd', '.gg', '.gift', '.gifts', '.gives', '.gl', '.glass', '.global', '.gold', '.golf', '.gr', '.graphics', '.gratis', '.green', '.gripe', '.group', '.gs', '.guide', '.guru', '.gy', '.hamburg', '.haus', '.health', '.healthcare', '.help', '.hn', '.hockey', '.holdings', '.holiday', '.homes', '.horse', '.hospital', '.host', '.house', '.how', '.ht', '.id', '.im', '.immo', '.immobilien', '.in', '.industries', '.info', '.ink', '.institute', '.insure', '.international', '.investments', '.is', '.it', '.je', '.jetzt', '.jewelry', '.joburg', '.jp', '.jpn.com', '.kaufen', '.kim', '.kitchen', '.kiwi', '.koeln', '.kyoto', '.la', '.land', '.lat', '.lawyer', '.lc', '.lease', '.legal', '.lgbt', '.li', '.life', '.lighting', '.limited', '.limo', '.link', '.live', '.loan', '.loans', '.lol', '.london', '.love', '.lt', '.ltd', '.lu', '.luxe', '.lv', '.maison', '.management', '.market', '.marketing', '.mba', '.media', '.melbourne', '.memorial', '.men', '.menu', '.miami', '.mn', '.mobi', '.moda', '.moe', '.mom', '.money', '.mortgage', '.ms', '.mu', '.mx', '.nagoya', '.name', '.network', '.news', '.ngo', '.ninja', '.nl', '.nu', '.nyc', '.ac.nz', '.org.nz', '.kiwi.nz', '.net.nz', '.school.nz', '.gen.nz', '.geek.nz', '.nz', '.co.nz', '.maori.nz', '.okinawa', '.one', '.onl', '.organic', '.osaka', '.page', '.paris', '.partners', '.parts', '.party', '.pe', '.pet', '.ph', '.photo', '.photography', '.photos', '.pics', '.pictures', '.pink', '.pizza', '.pl', '.place', '.plumbing', '.plus', '.pm', '.poker', '.porn', '.press', '.pro', '.productions', '.promo', '.properties', '.pt', '.pub', '.pw', '.qa', '.qpon', '.quebec', '.racing', '.re', '.realestate', '.recipes', '.red', '.rehab', '.reise', '.reisen', '.rent', '.rentals', '.repair', '.report', '.republican', '.rest', '.restaurant', '.review', '.reviews', '.rip', '.rocks', '.rodeo', '.ru.com', '.run', '.ryukyu', '.sa.com', '.sale', '.salon', '.sarl', '.com.sb', '.sc', '.school', '.schule', '.science', '.scot', '.se', '.select', '.services', '.sg', '.com.sg', '.sh', '.shiksha', '.shoes', '.shopping', '.show', '.singles', '.ski', '.soccer', '.social', '.software', '.solar', '.solutions', '.soy', '.store', '.stream', '.studio', '.study', '.style', '.supplies', '.supply', '.support', '.surf', '.surgery', '.sx', '.sydney', '.systems', '.taipei', '.tattoo', '.tax', '.taxi', '.tc', '.team', '.technology', '.tel', '.tennis', '.tf', '.theater', '.tienda', '.tips', '.tires', '.tk', '.tl', '.to', '.today', '.tokyo', '.tools', '.top', '.tours', '.town', '.toys', '.trade', '.trading', '.training', '.tube', '.tv', '.tw', '.org.uk', '.me.uk', '.uk', '.uk.com', '.university', '.uno', '.us.com', '.vacations', '.vc', '.vegas', '.ventures', '.vet', '.vg', '.viajes', '.video', '.villas', '.vin', '.vip', '.vision', '.vlaanderen', '.vodka', '.vote', '.voyage', '.wales', '.wang', '.watch', '.webcam', '.wedding', '.wf', '.wien', '.wiki', '.win', '.wine', '.work', '.works', '.world', '.ws', '.wtf', '.xyz', '.yoga', '.yokohama', '.yt', '.co.za', '.za.com', '.zone'];

    for($i = $start; $i < $end; $i++){
        $suggestion = str_replace('://','',$domain.$tld[$i]);
        if(checkHost($suggestion)){
            if(isURL($suggestion)){
                $suggesions_tld .= "<a href='https://bluehost.sjv.io/pratap' class='btn btn-outline-success m-1' target='_blank'><i class='fa fa-check-circle mr-2'></i>".$suggestion." is available!</a>";
            }
        }
    }

    $suggesions_tld .= '
        <div class="container-fluid mt-3">
          <div class="row no-margins">
            <div class="col-md-12 mb-3">
              '.$ad.'
            </div>
          </div>
        </div>';

    $response = ["status" => "success", "suggestion" => $suggesions_tld, "display" => $end];

    echo json_encode($response);

}

if(isset($_POST['domain'])){

    $display = 14;
    $domain = $_POST['domain'];
    $domain_parts = explode('.', $domain);
    $domain_name = $domain_parts[0];
    $suggesions_tld = "";
    $tld = ['.com','.net','.org','.dev','.app','.inc','.website','.io','.co','.ai','.co.uk','.ca','.me','.de'];

    $suggesions_tld .= "<h2 class='badge badge-success'>POPULAR DOMAINS</h2><br>";

    foreach($tld as $d){
        $suggestion = str_replace('://','',$domain_name.$d);
        if(checkHost($suggestion)){
            if(isURL($suggestion)){

                $suggesions_tld .= "<a href='https://bluehost.sjv.io/pratap' class='btn btn-outline-success m-1' target='_blank'><i class='fa fa-check-circle mr-2'></i>".$suggestion." is available!</a>";
            }
        }
    }

    $suggesions_tld .= '
        <div class="container-fluid mt-3">
          <div class="row no-margins">
            <div class="col-md-12 mb-3">
              '.$ad.'
            </div>
          </div>
        </div>';

    if(isURL($_POST['domain'])){
        $domain = str_replace('://','',$_POST['domain']);
        if (checkHost($domain)) {
            $response = ["status" => "success", "message" => "<div class='row'><div class='col-lg-8'><h5 class='text-success mt-2'><i class='fa fa-check-circle mr-2'></i>Hurray! ".$domain." is available for register.</h5></div><div class='col-lg-4 text-center-lg text-right'><a href='https://bluehost.sjv.io/pratap' class='btn btn-success' target='_blank'>BUY NOW</a></div></div>", "suggestion" => $suggesions_tld, "display" => $display, "domain" => $domain_name];
        }
        else {
            $response = ["status" => "success", "message" => "<h5 class='text-danger mb-0'><i class='fa fa-times-circle mr-2'></i>Sorry! ".$domain." is already registered!</h5>", "suggestion" => $suggesions_tld, "display" => $display, "domain" => $domain_name];
        }
    }else{
            $response = ["status" => "success", "message" => "<h5 class='text-danger mb-0'><i class='fa fa-times-circle mr-2'></i>Sorry! ".$domain." is invalid!</h5>", "suggestion" => $suggesions_tld, "display" => $display, "domain" => $domain_name];
    }

    echo json_encode($response);
}

?>