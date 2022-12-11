<?php 
include 'connection.php';
$user_id = $_SESSION['user_id'];
if (isset($_SESSION['user_id'])== false) {
  header("Location: log-in.php");
}

$date = date("Y-m-d");

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

    <!-- Font Awesome -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>

    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>bloger | <?php echo "@".$_SESSION['username']; ?></title>
</head>
<body>
    <!-- ====== Header ====== -->
    <header id="header" class="header fixed-top mx-3">
        <div class="container d-flex align-items-center justify-content-between brand">
            <!-- Navigation bar logo -->
            <a href="#" class="logo d-flex align-items-center">
                <span>bloger.</span>
            </a>

            <nav id="navbar" class="navbar">
                <div class="lc-block d-grid gap-2 d-md-flex justify-content-md-start">
                
                <a class="btn px-4 me-md-2" href="functions/logout.php">
                    Logout
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
            <?php
                $select = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id = '$user_id'") or die('query failed');
                if(mysqli_num_rows($select) > 0){
                $fetch = mysqli_fetch_assoc($select);
            }
                if($fetch['user_image'] == ''){
                echo '<img src="assests/img/Default.jpg" class="img-fluid mx-3 rounded-5" style="width: 100%; height: 100%;">';
            }else{
                echo '<img src="uploads/'.$fetch['user_image'].'" class="img-fluid rounded-5">';
            }
            ?>       
            </div>
              
              <!-- Hero Text -->
              <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 class="mt-4 mb-2"><?php echo $_SESSION['firstname']." ".$_SESSION['surname']; ?></h1>
                <h4>@<?php echo $_SESSION['username']; ?></h4>
                <p><?php echo $_SESSION['userbio']; ?></p>
                
                <div class="text-center text-lg-start">
                    <a href="post-entry.php">
                        <span  class="d-inline rounded-3 d-flex align-items-center justify-content-center align-self-center shadow" style="background-color: rgb(204, 204, 204, 0.3); padding: 10px 30px 10px 30px; margin-top: 20px; font-weight: 5000;" role="button">
                            <i class="fa fa-plus" aria-hidden="true" style="font-size: 1rem;"><span style="font-family: Nunito;">&nbsp&nbspPost Entry</span></i>
                        </span>
                    </a>
                </div>
                

              </div>
  
            </div>
          </div>
          <hr class="hr hr-blurry" />
    </section>
    <!-- Hero Section - END -->

    <section class="d-flex align-items-center">
        <div class="container">
            <div class="row p-4">
                <div class="col-md-9">
                    <h1 class="">My Entries.</h1>
                </div>
                <div class="col-md-3">
                    <div class="text-center dropdown">
                        <div id="myDropdown" data-bs-toggle="dropdown">
                            <span  class="d-inline rounded-3 d-flex align-items-center justify-content-center align-self-center shadow" style="background-color: rgb(204, 204, 204, 0.3); padding: 10px 5px 10px 5px;font-weight: 5000;" role="button">
                                <i class="fa fa-calendar" aria-hidden="true" style="font-size: 1rem;"><span style="font-family: Nunito;">&nbsp&nbspView by Date</span></i>
                            </span>
                        </div>
                        
            
                        <ul class="dropdown-menu" aria-labelledby="myDropdown">
                            <form method="post">
                                <li><input type="date" id="dateform" name="dateform" value="View Date" class="dropdown-item"></li>
                                <li><input type="submit" class=" btn dropdown-item" name="submitBtn"></li>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>

            
            <div class="lighthouse">
                <div class="row">

                    <!-- INSERT PHP -->

                    <?php

                    $sql = "SELECT user_foreign_key, entry_title, entry_content, entry_date from blogs ORDER BY entry_timestamp DESC";
                    $result = $conn -> query($sql);

                    // $displayDate = $_POST['dateform'];
                    $countDate = 0;
                    $entryTitle = array();
                    $entryDate = array();
                    $entryContent = array();

                    if(array_key_exists('submitBtn', $_POST)) {
                        $date = $_POST['dateform'];
                    }

                    while($row = $result -> fetch_assoc())
                    {
                        
                        if($_SESSION['user_id'] == $row['user_foreign_key'] && $row['entry_date'] == $date)
                        {
                            $countDate += 1;
                            array_push($entryTitle, $row['entry_title']);
                            array_push($entryDate, $row['entry_date']);
                            array_push($entryContent, $row['entry_content']);
                        }

                    }
                    
                    if ($countDate > 0)
                    {
                        for ($i = 0; $i < $countDate; $i++)
                        { 
                            ?> 

                                <div class="col-lg-6">
                                    <div class="w-100 mb-2 mb-md-4 shadow-1-strong rounded">
                                        <div class="container p-4">
                                            <div class="card-body">
                                                <h2 class="card-title mt-4"><?php echo $entryTitle[$i]?></h2>
                                                <h6><?php echo $entryDate[$i]?></h6>
                                                <hr class="hr hr-blurry"/>
                                                <p class="card-text text-justify"><?php echo $entryContent[$i]?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php

                        }
                    }
                    else 
                    {
                        ?> 
                        
                        <h6 class="text-center">No Entries on this Day...</h6>
                        
                        <?php
                    }

                    

                    ?>

                    <!-- END OF PHP -->

                
                </div>
            </div>
        </div>
    </section>
</body>
</html>