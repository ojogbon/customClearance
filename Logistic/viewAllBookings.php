<?php include '../includes/Booking.php';
$logistic_user_id = $_SESSION["logistic_user"]["id"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LabPro | Appointment</title>

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
                                <h1>Booking</h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.php">Dashboard</a></li>
                                    <li class="active">Booking</li>
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
                                    <h4>Booking List </h4>
                                    <div class="card-header-right-icon">
										<!-- <ul>
											<li class="card-close"><a href="add_staff.php"><i class="ti-plus"></i>Add Staff </a></li>
										</ul> -->
									</div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Amount</th>
                                                <th>Evidence of payment</th>
                                                <th>Customer</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `bookings` WHERE logistic_id ='".$logistic_user_id."' and status = '0'";
                                        $bookings = $booking->getAllBookingBySql($sql);
                                          $count = 0;
                                          foreach ($bookings as $booking => $value){
                                              $count++;

                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $count;?></th>
                                                <td><?php echo '<span style="text-decoration: line-through;">N</span>'.$bookings[$booking]["amount"]?></td>
                                                <td><img  style="width: 350px;" src=" ../models/forAllImage/<?php echo $bookings[$booking]["evidence"]?> " /></td>
                                                <td> <?php echo $user->getUserById($bookings[$booking]["customer_id"])["companyName"]?> </td>
                                                <td> <?php echo $bookings[$booking]["date"]?> </td>
                                                <td>
                                                    <button data-id="<?php echo $bookings[$booking]["logistic_id"];?>" class="btn btn-primary addConfirmed"><i data-id="<?php echo $bookings[$booking]["logistic_id"];?>" class="ti-check"></i></button>
                                                    <button data-id="<?php echo $bookings[$booking]["logistic_id"];?>" class="btn btn-danger addClose"><i data-id="<?php echo $bookings[$booking]["logistic_id"];?>" class="ti-close"></i></button>

                                                </td>

                                            </tr>
                                            <?php
                      }
                      ?>
                                        </tbody>
                                    </table>


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
    <script src="../js/ConfirmBooking.js"></script><!-- scripit init-->





</body>

</html>
