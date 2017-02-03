<?php 

	if(session_status() == PHP_SESSION_NONE) {
		
		include('../config/config.php');
		
		session_start();
		
	}

	$conf = new configure;

?>

		<nav class="navbar navbar-inverse">

			<div class="container">

				<div class="navbar-header">

					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>

					</button>

					<a class="navbar-brand" href="#">Lucy’s Pets Service</a>

				</div>

				<ul class="nav navbar-nav">

					<li>

						<a href="#" title="Home" data-action="<?php echo $conf->mc_encrypt('index'); ?>" data-controller="<?php echo $conf->mc_encrypt('home'); ?>">

						<i class="fa fa-home" aria-hidden="true"></i>
						<br />
						<span>HOME</span>

						</a>

					</li>

					<li>

						<a href="#" title="PET SECTION" data-action="<?php echo $conf->mc_encrypt('index'); ?>" data-controller="<?php echo $conf->mc_encrypt('petsection'); ?>">

						<i class="fa fa-user-circle" aria-hidden="true"></i>
						<br />
						<span>PET SECTION</span>

						</a>

					</li>

					<li>

						<a href="#" title="CALENDER" data-action="<?php echo $conf->mc_encrypt('index'); ?>" data-controller="<?php echo $conf->mc_encrypt('calender'); ?>">

						<i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
						<br />
						<span>CALENDER</span>

						</a>

					</li>

					<li>

						<a href="#" title="OFFERS">

						<i class="fa fa-money" aria-hidden="true"></i>
						<br />
						<span>OFFERS</span>

						</a>

					</li>

					<li class="dropdown">
						
						<?php if(!isset($_SESSION['USER'])) { ?>
						
							<a href="#" title="LOGIN" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

								<i class="fa fa-user" aria-hidden="true"></i>
								<br />
								<span>Login</span>

							</a>
							
						<?php } else { ?>
						
							<a href="#" title="LOGIN" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

								<i class="fa fa-gear" aria-hidden="true"></i>
								<br />
								<span>Profile</span>

							</a>
						
						<?php } ?>

						<div class="dropdown-menu animated fadeIn">
							
							<div></div>
							
							<?php 
                                if(!isset($_SESSION['cater']) || $_SESSION['cater'] == true) {
                            
                                    if(!isset($_SESSION['USER'])) {

                                        include("views/login.php");

                                    } else {

                                        include("views/profile.php");

                                    }
                                    
                                    $_SESSION['cater'] = false;
                                    
                                } else {

                                    if(!isset($_SESSION['USER'])) {

                                        include("../views/login.php");

                                    } else {

                                        include("../views/profile.php");

                                    }
                                    
                                }
                            
                            ?>
							
						</div>

					</li>

				</ul>

			</div>

		</nav>