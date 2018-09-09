<?php
session_start();

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
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Your Expenses</div>
                                    <div class="card-body">
                                        <form action="" method="post" novalidate="novalidate">
                                      <!--get bal from expenses db-->
                                         <div class="form-group">
                                            <button class="au-btn au-btn--block btn-info" disabled>BALANCE &nbsp;<?php echo $_SESSION['balance'];?>
                                              <small> Rs</small>
                                         </button></div>
                                          <div class="form-group">
                                            <select name="category" class="au-input">
                                              <option>select category</option>
                                              <option value="vehicle">vehicle</option>
                                              <option value="food">food</option>
                                              <option value="home">home</option>
                                              <option value="electricity">electricity</option>
                                              <option value="recharge">recharge</option>
                                              <option value="fee">fee</option>
                                              <option value="transfer">payment transfers</option>
                                              <option value="other">other</option>
                                            </select>




                                          </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1"> amount</label>
                                                <input id="cc-pament" name="amount" type="text" class="form-control" aria-required="true" aria-invalid="false" value="100.00">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Name</label>
                                                <input disabled id="cc-name" name="name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo $_SESSION['username'];?>">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1"> Note</label>
                                                <input id="cc-pament" name="note" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder=" vehicle spare parts e.tc.,">
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Date</label>
                                                        <input type="date" name="date"/>
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>

                                                <button id="payment-button" type="submit" name="submit"class="btn btn-lg btn-danger btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Add $100.00</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
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
<?php
$conn=new mysqli("localhost","root","","users") or die('connecting error'.$conn->connect_error);

if(isset($_POST['submit']))
{
  $cat=$_POST['category'];
  $rs=$_POST['amount'];
  $name=$_SESSION['username'];
  $note=$_POST['note'];
  $bal=$_SESSION['balance'];
  $date=$_POST['date'];
  //deduce expense amount from total balance
  $total=$bal-$rs;
  $user=$_SESSION['username'];
  $myexp=mysqli_query($conn,"insert into expenses(category,amount,name,note,date,balance) values('$cat','$rs','$name','$note','$date','$total')");

  if($myexp)
  {
    //update regusers database with current balance
    echo '<script>alert("deducted  from total balance");</script>';
    mysqli_query($conn,"UPDATE `regusers` SET `balance`='".$total."' WHERE name='$user'");
  echo '<script>window.location.href="addexpense.php";</script>';
  $_SESSION['balance']=$total;
}
  else {
    echo '<script>alert("Couldnot add expense");</script>';
  }
} ?>
