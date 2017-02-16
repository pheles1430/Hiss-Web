<?php 

	if(session_status() == PHP_SESSION_NONE) {
		
		include('config/config.php');
		
		session_start();
		
	}

	$conf = new configure;

?>

							<form method="post" action"#" class="container" id="login-form" data-action="<?php echo $conf->mc_encrypt('login'); ?>">
								
								<h4>Login</h4>
								
								<br />
								
								<input type="text" class="form-control" placeholder="Username" name="username" aria-describedby="basic-addon1" id="UserName" value="<?php if(isset($_COOKIE['username'])) { echo $_COOKIE['username']; } ?>" />
								<span id="check-e"></span>
								<br />
								
								<input type="password" class="form-control" placeholder="Password" name="password" aria-describedby="basic-addon1" id="UserPassword" />
								
								<div class="checkbox">
									
									<label>
										
										<input type="checkbox" name="rememberMe" id="rememberMe" <?php if(isset($_COOKIE['username'])) { echo 'checked'; } ?> /> Remember me
										
									</label>
									
								</div>

								<div id="error">
						        <!-- error will be shown here ! -->
						        </div>
								
								<br />
								
								<button type="submit" class="btn btn-primary send" id="btn-login">Sign in</button>
								<button type="button" class="btn btn-primary modal-call" data-target="views/register.php" data-title="Register">Register</button>
							
							</form>