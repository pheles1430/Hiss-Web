<?php 

	if(session_status() == PHP_SESSION_NONE) {
		
		include('config/config.php');
		
		session_start();
		
	}

	$conf = new configure;

?>

<div>

    <form method="post" action"#" class="container" id="logout-form" data-action="<?php echo $conf->mc_encrypt('login'); ?>">
    
        <button type="submit" class="btn btn-primary send" id="btn-login">Logout</button>
        
    </form>
    
</div>