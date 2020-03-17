<?php include "../includes/Advice.php";
$customer_user_id = $_SESSION["customer_user_id"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CustomClear | User</title>

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
                                <h1>Payment</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="inde.php">Dashboard</a></li>
                                    <li class=""><a href="staff.php">Payment</a></li>
                                    <li class="active">Add Payment</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Payment</h4>
                                    <div class="card-header-right-icon">
                                        <ul>
                                            <li class="card-close"><a href="viewAdvice.php"><i class="ti-back-right"></i >View </a></li>
                                            <li class="card-close"><a href="viewInitiate.php"><i class="ti-back-left"></i > </a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="basic-form">
                                        <form method="post" enctype="multipart/form-data" >

                                            <div class="form-group">
                                                <p>	Bill Code </p>
                                                <input type="text" disabled="" name="billss"  value="<?php echo $_GET["billCode"];?>"  class="form-control input-default " required>
                                            </div>
                                            <div class="form-group">
                                                <p>	Advice type </p>
                                                <select class="form-control" name="adviceId">
                                                    <option value="">Advice type</option>
                                                    <?php
                                                        $advices = $advice->getAllAdvice();
                                                        foreach ($advices as $advice => $value) {
                                                            ?>
                                                            <option value="<?php echo $advices[$advice]["id"] ;?>"><?php echo $advices[$advice]["type"]  .'  { '.$advices[$advice]["amount"].' } ' ;?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <p>	Amount paid </p>
                                                <input type="number" name="amountpaid" class="form-control input-default " placeholder="Amount Paid" required>
                                            </div>
                                            <div class="form-group">
                                                <p>Evidence of payment </p>
                                                <input type="file" name="evidence" class="form-control input-default " required>
                                            </div>
								            <button type="submit" name="add_advice_payment" class="btn btn-primary btn-flat m-b-30 m-t-30 ">Add Advice</button>
                                        </form>
                                        <?php
                                            if (isset($_POST["add_advice_payment"])){
                                                $codebill = $_POST["billss"];
                                                $amountpaid = $_POST["amountpaid"];
                                                $adviceId = $_POST["adviceId"];

                                                $evidence =$_FILES["evidence"]["name"];
                                                $evidencetmp =$_FILES["evidence"]["tmp_name"];
                                                $destination = "../models/forAllImage/".$evidence;
                                                move_uploaded_file($evidencetmp, $destination);
                                                $diretry = $destination;

                                                if ($advicePayment->saveAdvicePayment("`advice_payment`(`id`, `user_id`, `advice_id`, `evidence`, `path`, `amount`, `billcode`, `adviceCode`, `date`, `status`,`state`)",
                                                    "VALUES (null,'$customer_user_id','$adviceId','$evidence','$destination','$amountpaid','$codebill','0',now(),'0','0')")){
                                                    echo "<script type='text/javascript'>alert('Successful!');</script>";;
                                                }else{
                                                     echo "Something went wrong please try again...";
                                                }

                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /# column -->
                    </div>
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
    <script src="../js/Transaction.js"></script><!-- scripit init-->




</body>

</html>
