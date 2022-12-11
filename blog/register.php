<?php 

include 'connection.php';

if (isset($_POST["email"])) {


    $email = $_POST["email"];
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $surname = $_POST["surname"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $bio = $_POST["bio"];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploads/'.$image;


//set errors.
    $errors = array();

    $e = "SELECT user_email FROM users WHERE user_email = '$email'";
    $ee = mysqli_query($conn, $e);

    $u = "SELECT username FROM users WHERE username = '$username'";
    $uu = mysqli_query($conn, $e);

    if (empty($email)) {
        die;
    }elseif (mysqli_num_rows($ee) > 0) {
        $errors['e'] = "Email is already taken. Please Use another Email.";
    }
    if (empty($username)) {
        die;
    }elseif (mysqli_num_rows($uu) > 0) {
        $errors['u'] = "Username is already taken. Please Use another Username.";
    }

if (count($errors)==0) {
    if ($password == $confirm_password) {

//uploads to database.
        $encrypted_password = hash('md5', $password);
        $bio = str_replace("'", "\'", $bio);
        $sql = "INSERT into users (user_email, user_password, user_first_name, user_last_name, username, user_bio, user_image) values ('$email', '$encrypted_password', '$firstname', '$surname', '$username', '$bio', '$image')";
        $result = mysqli_query($conn, $sql) or die("Data not saved!");
        if($result){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:log-in.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }else{
        echo "<p style= 'color: red; text-align: center'>Confirm Password Did Not Match.</p>";
      }
        
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

    <title>Sign-up | Join bloger.</title>
</head>
    
    <body>

   <!-- ====== Header ====== -->
   <header id="header" class="header fixed-top mx-3">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between brand">
          <!-- Navigation bar logo -->
          <a href="index-welcome.html" class="logo d-flex align-items-center">
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

    
    <!-- ====== Register Form====== -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-">
              <form action="" role="form" method="post" enctype="multipart/form-data">
                <div class="divider d-flex align-items-center my-4">
                  <h1 class="text-center fw-bold mx-3 mb-0">Register to bloger</h1>
                </div>

                    <!-- Email input -->
                    <div class="form-outline mb-3">
                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control form-control-lg" placeholder="Email address" autocomplete="off" required>
                        <p class="text-danger"><?php if (isset($errors['e'])) echo $errors['e']; ?></p>
                    </div>

                    <!-- Password input -->
                    <div class="row mb-3">  
                        <div class="col">
                            <div class="form-outline">
                                <input type="password" name="password" id="password" class="form-control form-control-lg"
                                placeholder="Enter password" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control form-control-lg"
                                placeholder="Confirm password" autocomplete="off" required>
                            </div>
                        </div>
                    </div>

                    <!-- Name input -->
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" name="firstname" id="firstname" class="form-control form-control-lg"
                                placeholder="First Name" autocomplete="off"  required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" name="surname" id="surname" class="form-control form-control-lg"
                                placeholder="Surname" autocomplete="off" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Username" autocomplete="off" required>
                        <p class="text-danger"><?php if (isset($errors['u'])) echo $errors['u']; ?></p>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <textarea class="form-control form-control-lg" name="bio" id="bio" rows="3" placeholder="Bio" autocomplete="off" required></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Profile Picture</label>
                            <input name="image" type="file" accept=".png, .jpg, .jpeg" class="form-control form-control-lg" placeholder="Upload Profile Picture">
                        </div>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Next</button><br><br>
                        <span class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="log-in.php">Login</a></span>
                    </div>


                </form>
                </div>
                </div>
                            
            </div>

        </div>
    </div>
            </section>

    </body>
</html>
