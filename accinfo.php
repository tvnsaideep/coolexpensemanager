<?php
session_start();
//setting category variables
  $food=0;$vehicle=0;$travel=0;$home=0;$elec=0;$rec=0;$fee=0;$tr=0;$other=0;
//storing username
$name=$_SESSION['username'];
//connecting to database
$conn=new mysqli("localhost","root","","users") or die("connectiong error".$conn->connect_error);
//selecting amount
$myquery=mysqli_query($conn,"select * from expenses where name='$name'and date >= DATE_SUB(CURDATE(),INTERVAL 1 MONTH)");
if($myquery)
{
  while($row=mysqli_fetch_assoc($myquery))
{
  //compare category values
  //to calculate total expense
  if($row['category']=='food')
  {
    $food=$food + $row['amount'];
  }
  elseif ($row['category']=='vehicle') {
    $vehicle=$vehicle+$row['amount'];
  }
  elseif ($row['category']=='home') {
    $home=$home+$row['amount'];
  }
  elseif ($row['category']=='recharge') {
    $rec=$rec+$row['amount'];
  }
  elseif ($row['category']=='electricity') {
    $elec=$elec+$row['amount'];
  }
  elseif ($row['category']=='fee') {
    $fee=$fee+$row['amount'];
  }
  elseif ($row['category']=='payment transfers') {
    $tr=$tr+$row['amount'];
  }
  elseif ($row['category']=='other') {
    $other=$other+$row['amount'];
  }
  elseif ($row['category']=='travel') {
    $travel=$travel+$row['amount'];
  }
}

}
//for displaying charts
function myfunction($food,$travel,$tr,$rec,$fee,$other,$elec,$vehicle,$home)
{
  echo'  <script>
window.onload = function() {

var chart1 = new CanvasJS.Chart("chartContainer1", {
theme: "light2", // "light1", "light2", "dark1", "dark2"
exportEnabled: true,
animationEnabled: true,
title: {
  text: "EXPENSES"
},
data: [{
  type: "pie",
  startAngle: 25,
  toolTipContent: "<b>{label}</b>: {y}%",
  showInLegend: "true",
  legendText: "{label}",
  indexLabelFontSize: 16,
  indexLabel: "{label} - {y}Rs",
  dataPoints: [
    { y: '. $travel.', label: "travel" },
    { y: '.$fee.', label: "Fee" },
    { y: '.$food.', label: "Food" },
    { y: '.$elec.', label: "Electricity" },
    { y: '.$tr.', label: "Payment transfers" },
    { y: '.$rec.', label: "Recharge" },
    { y: '.$other.', label: "Others" },
     {y: '.$vehicle.', label: "vehicle" },
      {y: '.$home.', label: "Home" }
  ]
}]
});

var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	title:{
		text: "doughnut chart",
		horizontalAlign: "left"
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [
			{ y: '.$travel.', label: "travel" },
			{ y: '.$home.', label: "home" },
			{ y: '.$rec.', label: "rec" },
			{ y:'.$elec.', label: "elec"},
			{ y: '.$tr.', label: "tr"},
			{ y:'.$food.', label:"Food"},
      { y:'.$fee.', label:"fee"},
      { y:'.$other.', label:"other"}

		]
	}]
});

chart1.render();
chart2.render();



}
</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">

                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile" >
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>

                        </li>
                        <li>
                            <a href="addincome.php">
                                <i class="fas fa-add"></i>ADD Income</a>
                        </li>
                        <li>
                            <a href="addexpense.php">
                                <i class="fas fa-add"></i>ADD EXPENSES</a>
                        </li>
                        <li>
                            <a href="accinfo.php">
                                <i class="far fa-check-square"></i>Account Info</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                     Cool Expense
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>

                        <li>
                            <a href="addincome.php">
                                <i class="fas fa-table"></i>ADD Income</a>
                        </li>
                        <li>
                            <a href="addexpense.php">
                                <i class="fas fa-table"></i>ADD EXPENSES</a>
                        </li>
                        <li>
                            <a href="accinfo.php">
                                <i class="far fa-check-square"></i>ACCOUNT INFO</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="container bg-info">
                <div class="">
                    <div class="container-fluid">



                                    <div  class="account-item clearfix js-item-menu">
                                        <div  class="image">
                                          <img src="images/icon/avatar.png" alt="" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['username'];?></a>
                                        </div>
                                        <div  class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar.png" alt="" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['username'];?></a>
                                                    </h5>
                                                    <span class="email"></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="login.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>



                    </div>
                </div>
                <div class="row">
                  <br>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <?php
                        $conn=new mysqli("localhost","root","","users");
                        $amt=0;
                        $name=$_SESSION['username'];
                        $q=mysqli_query($conn,"SELECT * FROM expenses WHERE `date` >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)");
                        $rowx=mysqli_fetch_assoc($q);
                        while($row=mysqli_fetch_assoc($q))
                        {

                          if($row['name']==$name)
                        {
                          //total expense calculate
                          $amt=$amt+$row['amount'];

                        }
                      }
                      ?>
                            <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-account-calendar"></i>User Details</h3>
                                        <button class="au-btn-plus">
                                            <a href="addincome.php">edit</a>
                                        </button>
                                    </div>
                                    <div class="au-task js-list-load">
                                        <div class="au-task-list js-scrollbar3">
                                          <?php
                                          $date=date('m-d-y');
                                            echo '
                                            <div class="container-fluid">
                                            <div>
                                            <br>
                                            </div>
                                                    <div>

                                                    <center>
                                                    <img class="img-circle" height="100px" width ="80px"src="images/icon/avatar.png"></img>
                                                    </center></div>
                                                    <div>
                                                    <br><hr>
                                                    </div>
                                                    <div>
                                                    <h3 class="text-info">NAME :
                                                        <a href="#" class="text-primary">'.$_SESSION['username'].'</a></h3>
                                                        </div><hr>
                                                        <div>
                                                        <h5 class="text-success">BALANCE :
                                                            <a href="#" class="text-primary">'.$rowx['balance'].'</a></h5>
                                                          </div><hr>
                                                          <div>
                                                            <h5 class="text-danger">EXPENSES :
                                                                <a href="#" class="text-primary" >'.$amt.'</a></h5>
                                                                </div><hr>
                                                                <p>'.$date.'

                                            </div>';
                                              ?>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 MSD. All rights reserved. Template by <a href="">COOL Expense Manager</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>


</body>

</html>
<!-- end document-->
