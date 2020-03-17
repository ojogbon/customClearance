<?php include '../includes/Advice.php';
$customer_user_id = $_SESSION["customer_user_id"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CustomClear | Advice</title>

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
    <style>
        .nexti{
            border: 1px solid;
            padding: 5px;
            border-radius: 10px;
            font-style: italic;
            cursor: pointer;
        }
    </style>
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
                                <h1>Advice</h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="inde.php">Dashboard</a></li>
                                    <li class="active">Advice</li>
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
                                    <h4> Advice  </h4>
                                    <div class="card-header-right-icon">
										<ul>
											 <li class="card-close"><a href="initiate.php"><i class="ti-plus"></i>Initiate </a></li>
										</ul>
									</div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Amount</th>
                                                <th>evidence</th>
                                                <th>State</th>
                                                <th>Code Bill</th>
                                                <th>Code Advice </th>
                                                <th> Date</th>
                                                <th> Proceed</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql = "SELECT *  FROM `advice_payment` where   user_id='".$customer_user_id."' and state='0'";
                                        $advicePayments = $advicePayment->getAllAdvicePaymentBySql($sql);
                                        $count = 0;
                                        foreach ($advicePayments as $advicePayment => $value){
                                            $count++;


                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $count;?></th>
                                                <td><?php echo $advicePayments[$advicePayment]["amount"];?></td>
                                                <td> <img style="width: 400px;" src="../models/forAllImage/<?php echo $advicePayments[$advicePayment]["evidence"]?>" alt="loading..."/>
                                                </td>
                                                <td><?php if($advicePayments[$advicePayment]["status"] == "0") {
                                                            echo "Pending";
                                                    }else{
                                                        echo $advicePayments[$advicePayment]["status"] ;
                                                    }?>
                                                </td>
                                                <td><?php if($advicePayments[$advicePayment]["billcode"] == "0") {
                                                            echo "Not yet available";
                                                    }else{
                                                        echo $advicePayments[$advicePayment]["billcode"] ;
                                                    }?></td>
                                                <td><?php echo $advicePayments[$advicePayment]["date"]?></td>
                                                <td><?php if($advicePayments[$advicePayment]["billcode"] == "0") {
                                                        echo "Not yet available";
                                                    }else{
                                                        echo $advicePayments[$advicePayment]["billcode"] ;
                                                    }?></td>
                                                <td><?php if($advicePayments[$advicePayment]["adviceCode"] == "0") {
                                                        echo "Not yet available";
                                                    }else{
                                                        echo '<p class="nexti startEvaluate" data-customerid='.$advicePayments[$advicePayment]["user_id"].' data-id='.$advicePayments[$advicePayment]["id"].'> Start Evaluation </p>' ;
                                                    }?></td>
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



                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4> Ongoing  </h4>
                                    <div class="card-header-right-icon">
										<ul>
											 <li class="card-close"><a href="initiate.php"><i class="ti-plus"></i>Initiate </a></li>
										</ul>
									</div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Amount</th>
                                                <th>evidence</th>
                                                <th>State</th>
                                                <th>Code Bill</th>
                                                <th>Code Advice </th>
                                                <th> Date</th>
                                                <th> Proceed</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $advicePay = new AdvicePayment();
                                        $sql = "SELECT *  FROM `advice_payment` where   user_id='".$customer_user_id."' and state = '1'";

                                        $advisePayments = $advicePay->getAllAdvicePaymentBySql($sql);
                                        $count = 0;
                                        foreach ($advisePayments as $advicePayment => $value){
                                            $count++;


                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $count;?></th>
                                                <td><?php echo $advisePayments[$advicePayment]["amount"];?></td>
                                                <td> <img style="width: 400px;" src="../models/forAllImage/<?php echo $advisePayments[$advicePayment]["evidence"]?>" alt="loading..."/>
                                                </td>
                                                <td><?php if($advisePayments[$advicePayment]["status"] == "0") {
                                                            echo "Pending";
                                                    }else{
                                                        echo $advisePayments[$advicePayment]["status"] ;
                                                    }?>
                                                </td>
                                                <td><?php if($advisePayments[$advicePayment]["billcode"] == "0") {
                                                            echo "Not yet available";
                                                    }else{
                                                        echo $advisePayments[$advicePayment]["billcode"] ;
                                                    }?></td>
                                                <td><?php echo $advisePayments[$advicePayment]["date"]?></td>
                                                <td><?php if($advisePayments[$advicePayment]["billcode"] == "0") {
                                                        echo "Not yet available";
                                                    }else{
                                                        echo $advisePayments[$advicePayment]["billcode"] ;
                                                    }?></td>
                                                <td><?php if($advisePayments[$advicePayment]["adviceCode"] == "0") {
                                                        echo "Not yet available";
                                                    }else{
                                                        echo '<a class="nexti" href="history.php?key=&method=&evaluate='.$advisePayments[$advicePayment]["user_id"].'"> Continue </a>' ;
                                                    }?></td>
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
    <script src="../js/ConfirmAdvice.js"></script><!-- scripit init-->





</body>

</html>
