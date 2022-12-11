<?php 

include 'connection.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $encrypted_password = hash('md5', $password);

    $sql = "SELECT * from users where username = '$username' and user_password = '$encrypted_password'";
    $result = mysqli_query($conn, $sql) or die("Data Retrieval Failed.");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['email'] = $row['user_email'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['firstname'] = $row['user_first_name'];
        $_SESSION['surname'] = $row['user_last_name'];
        $_SESSION['userbio'] = $row['user_bio'];

        header("Location: user-profile.php");
    }
    else{

        echo "<p style= 'color: red; text-align: center'>Account Not Found.</p>";
    }
}

?>


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

  <title>Login | bloger.</title>
</head>
    
    <body>
            <!-- ====== Header ====== -->
    <header id="header" class="header fixed-top mx-3">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between brand">
          <!-- Navigation bar logo -->
          <a href="index-welcome.php" class="logo d-flex align-items-center">
              <span>bloger.</span>
          </a>

          <nav id="navbar" class="navbar">
              <div class="lc-block d-grid gap-2 d-md-flex justify-content-md-start">
                  &nbsp;
              </div>
          </nav> 
          <!-- END nav -->
      </div>
  </header> <!--END Header-->
      <!-- ====== Login Form====== -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <!-- <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="https://cdn.dribbble.com/users/283823/screenshots/2613621/media/03ef371eee92f39ea434e14271ed1ba7.jpg?compress=1&resize=800x600&vertical=top"
                class="img-fluid" alt="Sample image">
            </div> -->
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form action="" role="form" method="post" enctype="multipart/form-data">
      
                <div class="divider d-flex align-items-center my-4">
                  <h1 class="text-center fw-bold mx-3 mb-0">Login to bloger.</h1>
                </div>
                <!-- Username input -->
                <div class="form-outline mb-4">
                  <input type="text" name="username" id="username" class="form-control form-control-lg"
                    placeholder="Enter your Username" required autocomplete="off">
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                  <input type="password" name="password" id="password" class="form-control form-control-lg"
                    placeholder="Enter password" required>
                </div>
                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" name="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button><br><br>
                  <span class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php">Register</a></span>

                </form>
            </div>
        </div>
                            
        </div>

        </div>
    </div>
</section>

    </body>
</html>
