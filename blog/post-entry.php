<?php 
include 'connection.php';
if (isset($_SESSION['user_id'])== false) {
  header("Location: log-in.php");
}

?>

<html lang="en">
<head>

<script>

  function checkBlank()
  {
    if(document.getElementById('title_box').value == "" || document.getElementById('content_box').value == "")
    {
      alert('Field must not be blank!');
      return false;
    }
  }

</script>

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

  <title>Post a blog | bloger.</title>
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

    
    <!-- ====== Login Form====== -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

              <!-- =========================START OF ADDING==================== -->
              <form action="functions/add_entry.php" method="POST" onsubmit="return checkBlank()">
      
                <div class="divider d-flex align-items-center my-4">
                  <h1 class="text-center fw-bold mx-3 mb-0">
                    Write your blog.
                </h1>
                </div>

                <!-- GET THE USER ID AND PUT IT ON FOREIGN KEY -->
                <input type="hidden" name="foreign_box" value="<?php echo $_SESSION['user_id']; ?>"/>

                <!-- GET TEH DATE AND PUT IT ON DATE -->
                <input type="hidden" name="date_box" value="<?php echo date('Y/m/d');?>">
      
                <!-- Title Input -->
                <div class="form-outline mb-4">
                  <input type="Text" name="title_box" id="title_box" class="form-control form-control-lg"
                    placeholder="Title" />
                </div>
      
                <!-- Content Textarea Input -->
                <div class="form-outline mb-3">
                    <textarea class="form-control" name="content_box" id="content_box" rows="5" placeholder="Content"></textarea>
                </div>
      
                <div class="text-center text-lg-start mt-4 pt-2">
                    <a href="user-profile.php">
                    <button type="button" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: rgb(255, 109, 109);">
                        Discard
                    </button>
                    </a>
                    
                    <button type="submit" name="submit_btn" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;" onClick="validation()">
                        Submit
                    </button>
                </div>
      
              </form>
              <!-- ============================END OF ADDING======================= -->

            </div>
          </div>
        </div>
          
      </section>
    <!-- ====== Login Form - END ====== -->


    
</body>
</html>