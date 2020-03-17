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
												<div class="stat-text">Available Customers</div>
												<?php
                                                $sql = "SELECT count(`id`) as total FROM `customer` ";
                                                $logistic_users = $user->getAllUserBySql($sql);

                        ?>
												<div class="stat-digit"><?php echo $logistic_users[0]["total"];?></div>
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
												<div class="stat-text"> Logistics </div>
												<?php
                                                $sql = "SELECT count(id) as marked FROM `bookings`   ";
                                                $bookings = $booking->getAllBookingBySql($sql);
                        ?>
												<div class="stat-digit"><?php echo $bookings[0]["marked"];?></div>
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
                                                <div class="stat-text"> Confirmed Transaction </div>
                                                <?php
                                                $sql = "SELECT count(id) as marked FROM `bookings`   ";
                                                $bookings = $booking->getAllBookingBySql($sql);
                                                ?>
                                                <div class="stat-digit"><?php echo $bookings[0]["marked"];?></div>
                                                <?php

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
                                                <div class="stat-text"> Total income </div>
                                                <?php
                                                $sql = "SELECT sum(amount) as total FROM `bookings`   ";
                                                $bookings = $booking->getAllBookingBySql($sql);
                                                ?>
                                                <div class="stat-digit"><?php
                                                    $tot = $bookings[0]["total"];
                                                    if($tot == null){
                                                    echo 'N'.'0.0';
                                                    }else{
                                                    echo $tot;
                                                    };?></div>
                                                <?php

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
