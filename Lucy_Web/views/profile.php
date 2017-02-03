<?php 

	if(session_status() == PHP_SESSION_NONE) {
		
		include('config/config.php');
		
		session_start();
		
	}

	$conf = new configure;

?>

<div>

    <div class="user one">
    </div>
    
    <form method="post" action"#" class="container" id="logout-form" data-action="<?php echo $conf->mc_encrypt('login'); ?>">
         
        <a href="#">Edit Your Profil</a>
        <a href="#">Change Password</a>
        <button type="submit" class="btn btn-primary send" id="btn-login">Logout</button>
        
    </form>
    
</div>