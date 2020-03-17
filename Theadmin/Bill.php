<?php include "../includes/Bill.php";
$admin_id = $_SESSION["adminID"];
?>
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
											 <li class="card-close"><a href="viewBill.php"><i class="ti-view-list"></i>View Bill </a></li>

										</ul>
									</div>
                                </div>
                                <div class="card-body">
                                   <form method="post" enctype="multipart/form-data">
                                       <div class="form-group">
                                           <label> Bill Type</label>
                                           <input class="form-control" type="text" placeholder="Bill Type..." name="type"/>
                                       </div>
                                       <div class="form-group">
                                           <label> Amount to be paid</label>
                                           <input class="form-control" type="number" placeholder="Amount to be paid..." name="amount"/>
                                       </div>
                                       <div class="form-group">
                                                <button class="btn btn-default" name="adBill">add</button>
                                       </div>

                                   </form>
                                    <?php

                                        if (isset($_POST["adBill"])){
                                            echo 'dddd';
                                            $type = $_POST["type"];
                                            $amount = $_POST["amount"];

;
                                            if (!$bill->saveBill(" `bill`(`id`, `officedr_id`, `type`, `amount`, `date`, `status`)",
                                                "VALUES (null,'$admin_id','$type','$amount',now(),'0')")){
                                                echo "<script type='text/javascript'>alert('Something Went Wrong');</script>";;
                                            }
                                            else
                                            {
                                                echo "<p style='color:#0F0'> <script type='text/javascript'>alert('Successful!');</script>";;
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
