<?php session_start();
include './connect.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin | Bill</title>

	<!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

	<!-- Styles -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/lib/themify-icons/themify-icons.css">
    <link href="assets/css/lib/mmc-chat.css" rel="stylesheet" />
    <link href="assets/css/lib/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/unix.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

<?php include 'nav.php';
include 'header.php';?>

    <!-- END chat Sidebar-->

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Bill</h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.php">Dashboard</a></li>
                                    <li class="active">Bill</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div><!-- /# row -->
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Bill  </h4>
                                    <div class="card-header-right-icon">
										<ul>
											<!-- <li class="card-close"><a href="add_staff.php"><i class="ti-plus"></i>Add Staff </a></li> -->
										</ul>
									</div>
                                </div>
                                <div class="card-body">
                                   <form method="post" enctype="multipart/form-data">
                                       <div class="form-group">
                                           <label> First Name</label>
                                           <input class="form-control" type="text" placeholder="First Name..." name="firstName"/>
                                       </div>
                                       <div class="form-group">
                                           <label> Last Name</label>
                                           <input class="form-control" type="text" placeholder="Last Name..." name="lastName"/>
                                       </div>
                                       <div class="form-group">
                                           <label> Email</label>
                                           <input class="form-control" type="email" placeholder="Email..." name="email"/>
                                       </div>
                                       <div class="form-group">
                                           <label> Phone Number</label>
                                           <input class="form-control" placeholder="Phone Number..." name="phoneNumber"/>
                                       </div>
                                       <div class="form-group">
                                           <label> Photo</label>
                                           <input class="form-control" type="file" placeholder="Photo..." name="file"/>
                                       </div>
                                       <div class="form-group">
                                                <button type="submit"  name="addDoctor" style="background-color: #32c69a; color: #fff;" class="btn btn-default">Save </button>
                                       </div>
                                   </form>
                                    <?php

                                        if (isset($_POST["addDoctor"])){
                                            echo 'dddd';
                                            $firstName = $_POST["firstName"];
                                            $lastName = $_POST["lastName"];
                                            $email = $_POST["email"];
                                            $phoneNumber = $_POST["phoneNumber"];


                                            $filen =$_FILES["file"]["name"];
                                            $filetmp =$_FILES["file"]["tmp_name"];
                                            $destination = "../models/forAllImage/".$filen;
                                            move_uploaded_file($filetmp, $destination);
                                            $diretry = $destination;

                                            if (!$billPayment->saveBillPayment("`bill_payment`(`id`, `user_id`, `bill_id`, `evidence`, `path`, `amount`, `date`, `status`) ",
                                                "VALUES (null,now(),'0')")){
                                                echo "<script type='text/javascript'>alert('Something Went Wrong');</script>";;
                                            }
                                            else
                                            {
                                                echo "<p style='color:#0F0'> <script type='text/javascript'>alert(BBooking);</script>";;
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div><!-- /# column -->
					</div><!-- /# row -->
				</div><!-- /# main content -->
            </div><!-- /# container-fluid -->
        </div><!-- /# main -->
    </div><!-- /# content wrap -->







    <script src="assets/js/lib/jquery.min.js"></script><!-- jquery vendor -->
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script><!-- nano scroller -->
    <script src="assets/js/lib/sidebar.js"></script><!-- sidebar -->
    <script src="assets/js/lib/bootstrap.min.js"></script><!-- bootstrap -->
    <script src="assets/js/lib/mmc-common.js"></script>
    <script src="assets/js/lib/mmc-chat.js"></script>
    <script src="assets/js/scripts.js"></script><!-- scripit init-->





</body>

</html>
