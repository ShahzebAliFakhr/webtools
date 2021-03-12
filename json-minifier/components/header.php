<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?=(isset($pagetitle) ? $pagetitle. ' - ' : '')?> WEBTOOLS</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <!-- CSS FILES -->
      <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="assets/css/fontawesome.min.css" rel="stylesheet" type="text/css">
      <link href="assets/css/main.css" rel="stylesheet" type="text/css">

      <!-- FONTS -->
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
   </head>
   <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navigation">
            <a class="navbar-brand" href="index.php"><img src="assets/img/logo.jpg" style="width: 120px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavigation">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavigation">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">HOME</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown">SERVICES</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">LINK 1</a>
                            <a class="dropdown-item" href="#">LINK 2</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">LINK 3</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">PRICING</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">CONTACT</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid mt-3">
          <div class="row no-margins">
            <div class="col-md-12 mb-3">
              <?php include('ads/rectangle-ad.php');?>
            </div>
          </div>
        </div>