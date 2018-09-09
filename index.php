<?php
session_start();

  $food=0;$vehicle=0;$travel=0;$home=0;$elec=0;$rec=0;$fee=0;$tr=0;$other=0;
$name=$_SESSION['username'];
$conn=new mysqli("localhost","root","","users") or die("connectiong error".$conn->connect_error);
$myquery=mysqli_query($conn,"select * from expenses where name='$name'and date >= DATE_SUB(CURDATE(),INTERVAL 1 MONTH)");
if($myquery)
{
  while($row=mysqli_fetch_assoc($myquery))
{
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
?><!DOCTYPE html>
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
                            <a class="js-arrow" href="#">
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    <a class="au-btn au-btn-icon au-btn--blue" href="addexpense.php">
                                        <i class="zmdi zmdi-plus"></i>add Expense</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        $conn=new mysqli("localhost","root","","users");
                        $amt=0;
                        $name=$_SESSION['username'];
                        $q=mysqli_query($conn,"SELECT * FROM expenses WHERE `date` >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)");
                        while($row=mysqli_fetch_assoc($q))
                        {

                          if($row['name']==$name)
                        {
                          $amt=$amt+$row['amount'];

                        }
                      }
                      $totex=mysqli_query($conn,"SELECT * FROM expenses WHERE name='$name'");
                      $tex=0;
                      while($rows=mysqli_fetch_assoc($totex))
                      {
                        $tex=$tex+$rows['amount'];
                      }
                      $weekex=mysqli_query($conn,"SELECT * FROM expenses WHERE `date` >= DATE_SUB( CURDATE( ) ,INTERVAL 1 WEEK )");
                      $wex=0;
                      while($wrow=mysqli_fetch_assoc($weekex))
                      {
                        if($wrow['name']==$name)
                        {
                        $wex=$wex+$wrow['amount'];
                      }
                      }
                      $totin=mysqli_query($conn,"SELECT * FROM regusers where name='$name'");
                      $ti=0;
                      while($rows=mysqli_fetch_assoc($totin))
                      {
                        $ti=$rows['income'];
                      }
                        ?>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>

                                            <div class="text">
                                                <h2><?php echo $amt;?></h2><br><br>
                                                <span>this month</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $tex;?></h2>
                                                <span>total expenses</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div><br>
                                            <div class="text">
                                                <h2><?php echo $wex;?></h2>
                                                <span >this week</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $ti;?></h2><br><br>
                                                <span>total earnings</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                              <div id="chartContainer1" style="height: 300px; width: 100%;"><?php myfunction($food,$travel,$tr,$rec,$fee,$other,$elec,$vehicle,$home);?></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                            </div>
                            <div class="col-lg-6">
                              <div id="chartContainer2" style="height: 300px; width: 100%;"><?php myfunction($food,$travel,$tr,$rec,$fee,$other,$elec,$vehicle,$home);?></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-account-calendar"></i><?php echo date('d-m-Y');?></h3>
                                        <button class="au-btn-plus">
                                            <a href="addtask.php">+</a>
                                        </button>
                                    </div>
                                    <div class="au-task js-list-load">
                                        <div class="au-task__title">
                                            <p>Tasks for <?php echo $name;?></p>
                                        </div>

                                        <div class="au-task-list js-scrollbar3">
                                          <?php
                                          $tasks=mysqli_query($conn,"select * from tasks where name='$name'");
                                          while($rows=mysqli_fetch_assoc($tasks))
                                          {
                                            $curdate=date('Y-m-d');
                                            if($rows['date']==$curdate)
                                            {
                                            echo '
                                            <div class="au-task__item au-task__item--danger">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">'.$rows['taskname'].'</a>
                                                    </h5>
                                                    <span class="time">'.$rows['time'].'</span>
                                                </div>
                                            </div>';}
                                              }?>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-comment-text"></i>New Messages</h3>
                                        <button class="au-btn-plus">
                                            <a href="msg.php" class="zmdi zmdi-plus"></a>
                                        </button>
                                    </div>

                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">

                                            <div class="au-message-list">


                                              <?php
                                              $msgsel=mysqli_query($conn,"select * from messages where tomsg='$name'");

                                              $i=0;
                                              while($rows=mysqli_fetch_assoc($msgsel))
                                              {
                                                echo '
                                            <div class="container-fluid">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap online">
                                                                <div class="avatar">
                                                                    <img src="images/icon/avatar-04.jpg" alt="Michelle Sims">
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">'.$rows['frommsg'].'</h5>
                                                                <p>'.$rows['message'].'</p>
                                                            </div>
                                                        </div>
                                                        <div class="au-message__item-time">
                                                            <span>'.$rows['date'].'</span>
                                                        </div>
                                                    </div>
                                                </div>';}?>


                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 MSD. All rights reserved. Template by <a href="">Cool Expense Manager</a>.</p>
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
