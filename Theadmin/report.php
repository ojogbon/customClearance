<?php include '../includes/Evaluate.php';
 $officer_id = $_SESSION["adminID"]  ;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin | Report</title>

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
        .poss{
            border: 1px solid;
            width: auto;
            padding: 5px;
            text-align: center;
            border-radius: 20px;
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
                                <h1>Evaluate</h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.php">Dashboard</a></li>
                                    <li class="active">Evaluate</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div><!-- /# row -->
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12 tableAll">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4> Step 1  </h4>
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
                                            <th>Goods ID</th>
                                            <th> Date</th>
                                            <th> Proceed</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $sql = "SELECT *  FROM `evaluation` where   evaluateCode='' and officer_incharge = '0'";

                                        $evaluates = $evaluate->getAllEvaluateBySql($sql);
                                        $count = 0;
                                        foreach ($evaluates as $evaluate => $value){
                                            $count++;


                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $count;?></th>
                                                <td><?php echo $evaluates[$evaluate]["goodsID"];?></td>
                                                <td><?php echo $evaluates[$evaluate]["date"]?></td>
                                                <td><?php
                                                        echo "<p class='poss firstEver' data-officer='".$officer_id."' data-id='".$evaluates[$evaluate]["id"]."'> passed </p>" ;
                                                    ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>

                            <div class="card alert">
                                <div class="card-header">
                                    <h4> Step 2  </h4>
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
                                            <th>Goods ID</th>
                                            <th> Date</th>
                                            <th> Proceed</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $sql = "SELECT *  FROM `evaluation` where   evaluateCode='' and officer_incharge = '".$officer_id."'  and state = '1'";

                                        $evaluates = $evaluate->getAllEvaluateBySql($sql);
                                        $count = 0;
                                        foreach ($evaluates as $evaluate => $value){
                                            $count++;


                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $count;?></th>
                                                <td><?php echo $evaluates[$evaluate]["goodsID"];?></td>
                                                <td><?php echo $evaluates[$evaluate]["date"]?></td>
                                                <td><?php
                                                        echo "<p class='poss secondEver' data-val='2' data-id='".$evaluates[$evaluate]["id"]."'> passed </p>" ;
                                                    ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>

                            <div class="card alert">
                                <div class="card-header">
                                    <h4> Step 3  </h4>
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
                                            <th>Goods ID</th>
                                            <th> Date</th>
                                            <th> Proceed</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $sql = "SELECT *  FROM `evaluation` where   evaluateCode='' and officer_incharge = '".$officer_id."'  and state = '2'";

                                        $evaluates = $evaluate->getAllEvaluateBySql($sql);
                                        $count = 0;
                                        foreach ($evaluates as $evaluate => $value){
                                            $count++;


                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $count;?></th>
                                                <td><?php echo $evaluates[$evaluate]["goodsID"];?></td>
                                                <td><?php echo $evaluates[$evaluate]["date"]?></td>
                                                <td><?php
                                                        echo "<p class='poss thirdEver' data-val='3' data-id='".$evaluates[$evaluate]["id"]."'> passed </p>" ;
                                                    ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>

                            <div class="card alert">
                                <div class="card-header">
                                    <h4> Step 4  </h4>
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
                                            <th>Goods ID</th>
                                            <th> Date</th>
                                            <th> Proceed</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $sql = "SELECT *  FROM `evaluation` where   evaluateCode='' and officer_incharge = '".$officer_id."'  and state = '3'";

                                        $evaluates = $evaluate->getAllEvaluateBySql($sql);
                                        $count = 0;
                                        foreach ($evaluates as $evaluate => $value){
                                            $count++;


                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $count;?></th>
                                                <td><?php echo $evaluates[$evaluate]["goodsID"];?></td>
                                                <td><?php echo $evaluates[$evaluate]["date"]?></td>
                                                <td><?php
                                                        echo "<p class='poss fourthEver' data-val='4' data-id='".$evaluates[$evaluate]["id"]."'> passed </p>" ;
                                                    ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>

                            <div class="card alert">
                                <div class="card-header">
                                    <h4> Step 5  </h4>
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
                                            <th>Goods ID</th>
                                            <th> Date</th>
                                            <th> Proceed</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $sql = "SELECT *  FROM `evaluation` where   evaluateCode='' and officer_incharge = '".$officer_id."'  and state = '4'";

                                        $evaluates = $evaluate->getAllEvaluateBySql($sql);
                                        $count = 0;
                                        foreach ($evaluates as $evaluate => $value){
                                            $count++;


                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $count;?></th>
                                                <td><?php echo $evaluates[$evaluate]["goodsID"];?></td>
                                                <td><?php echo $evaluates[$evaluate]["date"]?></td>
                                                <td><?php
                                                        echo "<p class='poss fifthEver' data-val='5' data-id='".$evaluates[$evaluate]["id"]."'> passed </p>" ;
                                                    ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>

                            <div class="card alert">
                                <div class="card-header">
                                    <h4> Step 6  </h4>
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
                                            <th>Goods ID</th>
                                            <th> Date</th>
                                            <th> Proceed</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $sql = "SELECT *  FROM `evaluation` where   evaluateCode='' and officer_incharge = '".$officer_id."'  and state = '5'";

                                        $evaluates = $evaluate->getAllEvaluateBySql($sql);
                                        $count = 0;
                                        foreach ($evaluates as $evaluate => $value){
                                            $count++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $count;?></th>
                                                <td><?php echo $evaluates[$evaluate]["goodsID"];?></td>
                                                <td><?php echo $evaluates[$evaluate]["date"]?></td>
                                                <td><?php
                                                        echo "<p class='poss sixthEver' data-val='6' data-id='".$evaluates[$evaluate]["id"]."'> passed </p>" ;
                                                    ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>

                            <div class="card alert">
                                <div class="card-header">
                                    <h4> Step 7  </h4>
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
                                            <th>Goods ID</th>
                                            <th> Date</th>
                                            <th> Proceed</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $sql = "SELECT *  FROM `evaluation` where   evaluateCode='' and officer_incharge = '".$officer_id."'  and state = '6'";

                                        $evaluates = $evaluate->getAllEvaluateBySql($sql);
                                        $count = 0;
                                        foreach ($evaluates as $evaluate => $value){
                                            $count++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $count;?></th>
                                                <td><?php echo $evaluates[$evaluate]["goodsID"];?></td>
                                                <td><?php echo $evaluates[$evaluate]["date"]?></td>
                                                <td><?php
                                                        echo "<p class='poss sixthEver' data-val='7' data-id='".$evaluates[$evaluate]["id"]."'> passed </p>" ;
                                                    ?></td>
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
<script src="../js/ConfirmEvaluation.js"></script>





</body>

</html>
