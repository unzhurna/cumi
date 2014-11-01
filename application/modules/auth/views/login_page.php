<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo config_item('assets'); ?>favicon.png">
	<title>TCID | Login</title>
	<link href="<?php echo config_item('assets'); ?>css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo config_item('assets'); ?>css/bootstrap-reset.css" rel="stylesheet">
	<link href="<?php echo config_item('assets'); ?>css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo config_item('assets'); ?>css/jquery.gritter.css" rel="stylesheet">
	<link href="<?php echo config_item('assets'); ?>css/style.css" rel="stylesheet">
	<link href="<?php echo config_item('assets'); ?>css/style-responsive.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="<?php echo config_item('assets'); ?>js/html5shiv.js"></script>
	<script src="<?php echo config_item('assets'); ?>js/respond.min.js"></script>
	<![endif]-->
</head>
  <body class="login-body">
    <div class="container">
    	<?php echo form_open('auth/login', 'class="form-signin"'); ?>
    		<!--<h2 class="form-signin-heading">Preview Dialer</h2>-->
    		<?php echo validation_errors(); ?>
	        <div class="login-wrap">
	           	<?php
	        		echo form_input(array('name'=>'username', 'class'=>'form-control', 'placeholder'=>'Username'));
					echo form_password(array('name'=>'password', 'class'=>'form-control', 'placeholder'=>'Password'));
					echo "<p><a href='#' id='showExt'>Submit extension</a></p>";
					echo form_input(array('name'=>'extension', 'class'=>'form-control hide', 'id'=>'extension', 'placeholder'=>'Extension'));
	        	?>
		        <button class="btn btn-info btn-block" type="submit"><i class="icon-signin"></i> Sign In</button>
	         </div>
         <?php echo form_close(); ?>          
    </div>

	<!-- js placed at the end of the document so the pages load faster -->
	<script src="<?php echo config_item('assets'); ?>js/jquery.js"></script>
	<script src="<?php echo config_item('assets'); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo config_item('assets'); ?>js/jquery.gritter.js"></script>
	<script>
		<?php if(isset($alert)) : ?>
			jQuery.gritter.add({ text: '<?php echo $alert; ?>' });			
		<?php endif;?>
		
		//Submit Extension 
		jQuery('#showExt').click(function () {
		    if (jQuery('#extension').hasClass("hide")) {
		        jQuery('#extension').removeClass("hide");
		    } else {
		        jQuery('#extension').addClass("hide");
		    }
		});	
	</script>

</body>
</html>