<?php include '../includes/Evaluate.php';
$customer_user_id = $_SESSION["customer_user_id"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CustomClear | Evaluate</title>

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
        .roundRing{
            border: 2px solid;
            padding: 12px 10px;
            width: auto;
            border-radius: 50%;
            font-size: 8px;float: left;
        }
        .doneIT{
            background-color: grey;
            color: #fff;
            border-color: grey;
        }
        .lining{
            width: 120px;
            float: left;
            border: 1px solid;
        }
        .finals{
            font-style: italic;
            padding: 10px;
            background-color: grey;
            color: #fff;
            border-radius: 25px;
            margin-left: 10px;
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
                                    <li><a href="inde.php">Dashboard</a></li>
                                    <li class="active">Evaluate</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div><!-- /# row -->
                <div class="main-content">
                    <?php
                        $evaluateID = $_GET["evaluate"];

                        if(count($evaluate->getEvaluateById($evaluateID)) > 0){
                            if($evaluate->getEvaluateById($evaluateID)["state"] == 0){
                                echo "<div class=\"row\" style=\"padding-left: 90px; align-content: center;margin: auto\">
                        <div class=\"col-md-2 roundRing\">step 1</div>
                        <hr class=\"lining\"/>
                        <div class=\"col-md-2 roundRing\">step 1</div>
                        <hr class=\"lining\"/><div class=\"col-md-2 roundRing\">step 1</div>
                        <hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 1</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 1</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 1</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 1</div>
                    </div>
                    <div class=\"row\">
                            <h1>Final Release code: Not yet Available..</h1>
					</div>";
                            }
                            elseif ($evaluate->getEvaluateById($evaluateID)["state"] == 1){
                                echo "<div class=\"row\" style=\"padding-left: 90px; align-content: center;margin: auto\">
                        <div class=\"col-md-2 roundRing doneIT\">step 1</div>
                        <hr class=\"lining\"/>
                        <div class=\"col-md-2 roundRing\">step 2</div>
                        <hr class=\"lining\"/><div class=\"col-md-2 roundRing\">step 3</div>
                        <hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 4</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 5</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 6</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 7</div>
                    </div>
                    <div class=\"row\">
                        <h1>Final Release code: Not yet Available..</h1>
					</div>";
                            }
                            elseif ($evaluate->getEvaluateById($evaluateID)["state"] == 2){
                                echo "<div class=\"row\" style=\"padding-left: 90px; align-content: center;margin: auto\">
                        <div class=\"col-md-2 roundRing doneIT\">step 1</div>
                        <hr class=\"lining\"/>
                        <div class=\"col-md-2 roundRing doneIT\">step 2</div>
                        <hr class=\"lining\"/><div class=\"col-md-2 roundRing\">step 3</div>
                        <hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 4</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 5</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 6</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 7</div>
                    </div>
                    <div class=\"row\">
                        <h1>Final Release code: Not yet Available..</h1>
					</div>";
                            }
                            elseif ($evaluate->getEvaluateById($evaluateID)["state"] == 3){
                                echo "<div class=\"row\" style=\"padding-left: 90px; align-content: center;margin: auto\">
                        <div class=\"col-md-2 roundRing doneIT\">step 1</div>
                        <hr class=\"lining\"/>
                        <div class=\"col-md-2 roundRing doneIT\">step 2</div>
                        <hr class=\"lining\"/><div class=\"col-md-2 roundRing doneIT\">step 3</div>
                        <hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 4</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 5</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 6</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 7</div>
                    </div>
                    <div class=\"row\">
                        <h1>Final Release code: Not yet Available..</h1>
					</div>";
                            }
                            elseif ($evaluate->getEvaluateById($evaluateID)["state"] == 4){
                                echo "<div class=\"row\" style=\"padding-left: 90px; align-content: center;margin: auto\">
                        <div class=\"col-md-2 roundRing doneIT\">step 1</div>
                        <hr class=\"lining\"/>
                        <div class=\"col-md-2 roundRing doneIT\">step 2</div>
                        <hr class=\"lining\"/><div class=\"col-md-2 roundRing doneIT\">step 3</div>
                        <hr class=\"lining\"/> <div class=\"col-md-2 roundRing doneIT\">step 4</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 5</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 6</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 7</div>
                    </div>
                    <div class=\"row\">
                        <h1>Final Release code: Not yet Available..</h1>
					</div>";
                            }
                            elseif ($evaluate->getEvaluateById($evaluateID)["state"] == 5){
                                echo "<div class=\"row\" style=\"padding-left: 90px; align-content: center;margin: auto\">
                        <div class=\"col-md-2 roundRing doneIT\">step 1</div>
                        <hr class=\"lining\"/>
                        <div class=\"col-md-2 roundRing doneIT\">step 2</div>
                        <hr class=\"lining\"/><div class=\"col-md-2 roundRing doneIT\">step 3</div>
                        <hr class=\"lining\"/> <div class=\"col-md-2 roundRing doneIT\">step 4</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing doneIT\">step 5</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 6</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 7</div>
                    </div>
                    <div class=\"row\">
                        <h1>Final Release code: Not yet Available..</h1>
					</div>";
                            }
                            elseif ($evaluate->getEvaluateById($evaluateID)["state"] == 6){
                                echo "<div class=\"row\" style=\"padding-left: 90px; align-content: center;margin: auto\">
                        <div class=\"col-md-2 roundRing doneIT\">step 1</div>
                        <hr class=\"lining\"/>
                        <div class=\"col-md-2 roundRing doneIT\">step 2</div>
                        <hr class=\"lining\"/><div class=\"col-md-2 roundRing doneIT\">step 3</div>
                        <hr class=\"lining\"/> <div class=\"col-md-2 roundRing doneIT\">step 4</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing doneIT\">step 5</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing doneIT\">step 6</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing\">step 7</div>
                    </div>
                    <div class=\"row\">
                        <h1>Final Release code: Not yet Available..</h1>
					</div>";
                            }
                            elseif ($evaluate->getEvaluateById($evaluateID)["state"] == 7){
                                echo "<div class=\"row\" style=\"padding-left: 90px; align-content: center;margin: auto\">
                        <div class=\"col-md-2 roundRing doneIT\">step 1</div>
                        <hr class=\"lining\"/>
                        <div class=\"col-md-2 roundRing doneIT\">step 2</div>
                        <hr class=\"lining\"/><div class=\"col-md-2 roundRing doneIT\">step 3</div>
                        <hr class=\"lining\"/> <div class=\"col-md-2 roundRing doneIT\">step 4</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing doneIT\">step 5</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing doneIT\">step 6</div><hr class=\"lining\"/> <div class=\"col-md-2 roundRing doneIT\">step 7</div>
                    </div>
                    <div class=\"row\">
                        <h1>Final Release code:<span class='finals'>".$evaluate->getEvaluateById($evaluateID)["evaluateCode"]."</span> </h1>
					</div>";
                            }
                        }

//
                    ?>
                    <!-- /# row -->
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
