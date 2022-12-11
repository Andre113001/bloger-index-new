<?php 
include 'connection.php';
unset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Flaticon -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <!-- Tab Icon -->
    <link rel="icon" href="assets/img/logo - bloger.png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>bloger - Share your stories online</title>
</head>
<body>
  <!-- ====== Header ====== -->
  <header id="header" class="header fixed-top mx-3">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between brand">
          <!-- Navigation bar logo -->
          <a href="#" class="logo d-flex align-items-center">
              <span>bloger.</span>
          </a>

          <nav id="navbar" class="navbar">
              <div class="lc-block d-grid gap-2 d-md-flex justify-content-md-start">
                <a class="btn px-4 me-md-2" href="log-in.php">
                  Login
                </a>
              </div>
          </nav> 
          <!-- END nav -->
      </div>
  </header> <!--END Header-->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
          <div class="row">
            <!-- Hero Image -->
            <div class="col-lg-6 hero-img">
              <img src="https://blush.design/api/download?shareUri=XS1mfW70si83Tksg&c=Bottom_0%7E393f82-0.1%7E89c5cc-0.2%7E89c5cc_Hair_0%7E4a312c-0.1%7E4a312c-0.2%7E2c1b18_Skin_0%7Eb28b67-0.1%7Ed4a181-0.2%7E915b3c_Top_0%7Ef2f2f2-0.1%7Ea8e5ba-0.2%7Ef2f2f2&w=800&h=800&fm=png" class="img-fluid rounded-3" alt="">
            </div>
            
            <!-- Hero Text -->
            <div class="col-lg-6 d-flex flex-column justify-content-center">
              <h1>Share your stories to everyone!</h1>
              <p>Become an influence to the world by sharing your unique stories. Entertain the world by your thoughts. Join bloger</p>
              <div>
                <div class="text-center text-lg-start">
                  <a href="register.php" class="btn-get-started btn-primary  d-inline-flex align-items-center justify-content-center align-self-center">
                    <span>Get Started</span>
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div>
    </section>
    <!-- Hero Section - END -->
    
</body>
</html>