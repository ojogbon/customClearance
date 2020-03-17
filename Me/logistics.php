<?php include '../includes/Booking.php';
$customer_user_id = $_SESSION["customer_user_id"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CustomClear | Logistic</title>

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
                                <h1>Logistic</h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="inde.php">Dashboard</a></li>
                                    <li class="active">Logistic</li>
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
                                    <h4> Logistic  </h4>
                                    <div class="card-header-right-icon">
										<ul>
											 <li class="card-close"><a href="approved.php"><i class="ti-back-left"></i> </a></li>
										</ul>
									</div>
                                </div>
                                <div class="card-body">
                                  <form method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                          <label>Logistic Company   </label>
                                          <select name="logisticCompany" class="form-control">
                                              <option value="">Logistic Company </option>
                                              <?php
                                                    $logistics = $logistic->getAllLogistic();
                                                    foreach ($logistics as $logistic => $value){
                                              ?>
                                              <option value="<?php echo $logistics[$logistic]["id"];?>"><?php echo $logistics[$logistic]["companyName"].' price/Kg{ N'.$logistics[$logistic]["pricePerkg"].'}'?> </option>
                                              <?php }?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label>Amount Paid   </label>
                                         <input name="amount" type="number" placeholder="Amount..."  class="form-control"/>
                                      </div>
                                      <div class="form-group">
                                          <label>Evidence of Payement   </label>
                                         <input name="evidence" type="file" placeholder="Evidence of Payement..."  class="form-control" />
                                      </div>
                                      <div class="form-group">
                                        <button type="submit" class="btn btn-default" name="request">REquest</button>
                                      </div>
                                  </form>
                                    <?php
                                        if (isset($_POST["request"])){
                                            $amount = $_POST["amount"];
                                            $logisticCompany = $_POST["logisticCompany"];
                                            $evidence = $_FILES["evidence"]["name"];
                                            $evidenceTmp = $_FILES["evidence"]["tmp_name"];
                                            $evidencePath = "../models/forAllImage/".$evidence;
                                            move_uploaded_file($evidenceTmp,$evidencePath);

                                             if(!empty($amount) || !empty($logisticCompany) || !empty($evidence)){

                                                    if($booking->saveBooking("`bookings`(`id`, `customer_id`, `logistic_id`, `amount`, `evidence`, `path`, `date`, `status`) ",
                                                        "values(null,'$customer_user_id','$logisticCompany','$amount','$evidence','$evidencePath',now(),'0')")){
                                                        echo "<span><i>"."Successful!"."</i></span>";
                                                    }else{
                                                        echo "<span><i>"."Sorry, Please try again"."</i></span>";
                                                    }
                                             }else{
                                                 echo "<span><i>"."field can't be empty, Please"."</i></span>";
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
