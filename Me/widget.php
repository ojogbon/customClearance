<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-6">
									<div class="card p-0">
										<div class="stat-widget-three">
											<div class="stat-icon bg-primary p-48">
												<i class="ti-cup"></i>
											</div>
											<div class="stat-content p-30">
												<div class="stat-text">Processes</div>
												<?php
                                                echo $customer_user_id;
                                                $sql = "SELECT count(`id`) as total FROM `progress` where 	customer_id='".$customer_user_id."'";
                                                $progresses = $progress->getAllProgressBySql($sql);

                        ?>
												<div class="stat-digit"><?php echo $progresses[0]["total"];?></div>
												<?php
					  //}
					  ?>
											</div>

										</div>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="card p-0">
										<div class="stat-widget-three">
											<div class="stat-icon bg-warning p-48">
												<i class="ti-bag"></i>
											</div>
											<div class="stat-content p-30">
												<div class="stat-text"> Logistics company </div>
												<?php

                                                $logistics = $logistic->getAllLogistic();
                        ?>
												<div class="stat-digit"><?php echo count($logistics);?></div>
												<?php

					  ?>
											</div>

										</div>
									</div>
								</div>

                                <div class="col-lg-6">
									<div class="card p-0">
										<div class="stat-widget-three">
											<div class="stat-icon bg-primary p-48">
												<i class="ti-star"></i>
											</div>
											<div class="stat-content p-30">
												<div class="stat-text">Evaluation</div>
												<?php
                                                $sql = "SELECT count(id) as marked FROM `evaluation` where customer_id='".$customer_user_id."'";
                                                $evaluates = $evaluate->getAllEvaluateBySql($sql);

                        ?>
												<div class="stat-digit"><?php echo $evaluates[0]["marked"];?></div>
												<?php
					 // }
					  ?>
											</div>

										</div>
									</div>
                                </div>

								<div class="col-lg-6">
									<div class="card p-0">
										<div class="stat-widget-three">
											<div class="stat-icon bg-warning p-48">
												<i class="ti-user"></i>
											</div>
											<div class="stat-content p-30">
												<div class="stat-text">Logistic confirmation</div>
												<?php

                                                $sql = "SELECT count(id) as marked FROM `bookings` where customer_id ='".$customer_user_id."' and status = 'confirmed'";
                                                $bookings = $booking->getAllBookingBySql($sql);

                                                ?>
												<div class="stat-digit"><?php echo $bookings[0]["marked"];?></div>
												<?php
					 // }
					  ?>
											</div>

										</div>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="card bg-success">
										<div class="stat-widget-six">
											<div class="stat-icon p-15">
												<i class="ti-stats-up"></i>
											</div>
											<div class="stat-content p-t-12 p-b-12">
											   <div class="text-left dib">
												<div class="stat-heading">Logistics</div>
												<div class="stat-text">Ongoing</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="card bg-danger">
										<div class="stat-widget-six">
											<div class="stat-icon p-15">
												<i class="ti-stats-down"></i>
											</div>
											<div class="stat-content p-t-12 p-b-12">
											   <div class="text-left dib">
												<div class="stat-heading">Evaluation</div>
												<div class="stat-text">Ongoing</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- /# column -->
                    </div>
