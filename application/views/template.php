<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="<?php echo config_item('assets'); ?>favicon.png">
		<title>TCID | Dashboard</title>
		<link href="<?php echo config_item('assets'); ?>css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo config_item('assets'); ?>css/bootstrap-reset.css" rel="stylesheet">
		<link href="<?php echo config_item('assets'); ?>css/font-awesome.css" rel="stylesheet" />
		<link href="<?php echo config_item('assets'); ?>css/jquery.gritter.css" rel="stylesheet">
		<link href="<?php echo config_item('assets'); ?>css/dataTables.bootstrap.css" rel="stylesheet" />
		<link href="<?php echo config_item('assets'); ?>css/style.css" rel="stylesheet">
		<link href="<?php echo config_item('assets'); ?>css/style-responsive.css" rel="stylesheet" />
		<!--[if lt IE 9]>
		<script src="<?php echo config_item('assets'); ?>js/html5shiv.js"></script>
		<script src="<?php echo config_item('assets'); ?>js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<section id="container">
			<!--header start-->
			<header class="header">
				<div class="sidebar-toggle-box">
					<div title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
				</div>
				<div class="top-nav ">
					<ul class="nav pull-right top-menu">
						<!-- user login dropdown start-->
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#"> <img alt="" src="<?php echo config_item('assets'); ?>img/avatar.png"> <span class="username"><?php echo $this->session->userdata('name'); ?></span> <b class="caret"></b> </a>
							<ul class="dropdown-menu extended logout">
								<div class="log-arrow-up"></div>
								<li>
									<a href="#"><i class=" icon-suitcase"></i>Profile</a>
								</li>
								<li>
									<a href="#"><i class="icon-cog"></i> Settings</a>
								</li>
								<li>
									<a href="#"><i class="icon-bell-alt"></i> Notification</a>
								</li>
								<li>
									<?php echo anchor('auth/logout', '<i class="icon-off"></i> Sign Out'); ?>
								</li>
							</ul>
						</li>
						<!-- user login dropdown end -->
					</ul>
				</div>
			</header>
			<!--header end-->
			<!--sidebar start-->
			<aside>
				<div id="sidebar"  class="nav-collapse">
					<!-- sidebar menu start-->
					<ul class="sidebar-menu" id="nav-accordion">
						<li>
							<?php echo anchor('dashboard', '<i class="icon-dashboard"></i> <span>Dashboard</span>'); ?>
						</li>
						<li>
							<?php echo anchor('tenant', '<i class="icon-suitcase"></i> <span>Tenant Management</span>'); ?>
						</li>
						<li>
							<?php echo anchor('user', '<i class="icon-user"></i> <span>User Management</span>'); ?>
						</li>
						<li>
							<?php echo anchor('event', '<i class="icon-calendar"></i> <span>Events</span>'); ?>
						</li>
						<li>
							<?php echo anchor('news', '<i class="icon-comments"></i><span>News Management</span>'); ?>
						</li>
						<li class="sub-menu">
							<a href="javascript:;"> <i class="icon-pencil"></i> <span>Post</span> </a>
							<ul class="sub">
								<li>
									<?php echo anchor('', 'Posts'); ?>
								</li>
								<li>
									<?php echo anchor('', 'Categories'); ?>
								</li>
								<li>
									<?php echo anchor('', 'Tags'); ?>
								</li>
							</ul>
						</li>
						<li class="sub-menu">
							<a href="javascript:;"> <i class="icon-home"></i> <span>Property</span> <span class="label label-danger">2</span></a>
							<ul class="sub">
								<li>
									<?php echo anchor('property', 'Properties'); ?>
								<li>
									<?php echo anchor('', 'Types'); ?>
								</li>
							</ul>
						</li>
					</ul>
					<!-- sidebar menu end-->
				</div>
			</aside>
			<!--sidebar end-->
			<!--main content start-->
			<section id="main-content">
				<section class="wrapper">
					<!-- page start-->
					<?php echo $content; ?>
					<!-- page end-->
				</section>
			</section>
			<!--main content end-->
		</section>
		
		<!-- Modal -->
		<div class="modal fade" id="confirmModal">
		  <div class="modal-dialog">
		      <div class="modal-content">
		          <div class="modal-header">
		              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		              <h4 class="modal-title"><i class="icon-info-sign"></i> Confirmation</h4>
		          </div>
		          <div class="modal-body">
						<p>
							<i class="icon-exclamation-sign"></i> Are you sure whant to delete	
						</p>
		          </div>
		          <div class="modal-footer">
		              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
		              <button class="btn btn-warning" type="button"> Confirm</button>
		          </div>
		      </div>
		  </div>
		</div>
		<!-- modal -->

		<!-- js placed at the end of the document so the pages load faster -->
		<script src="<?php echo config_item('assets'); ?>js/jquery.js"></script>
		<script src="<?php echo config_item('assets'); ?>js/bootstrap.min.js"></script>
		<script src="<?php echo config_item('assets'); ?>js/jquery.dcjqaccordion.2.7.js"></script>
		<script src="<?php echo config_item('assets'); ?>js/jquery.scrollTo.min.js"></script>
		<script src="<?php echo config_item('assets'); ?>js/jquery.nicescroll.js"></script>
		<script src="<?php echo config_item('assets'); ?>js/respond.min.js" ></script>
		<script src="<?php echo config_item('assets'); ?>js/jquery.gritter.js"></script>
		<script src="<?php echo config_item('assets'); ?>js/common-scripts.js"></script>
		<script>
			<?php if(isset($alert)) : ?>
				$.gritter.add({	text: '<?php echo $alert; ?>' });			
			<?php endif;?>
		</script>
		<?php
			if(isset($script))
			{
				echo $script;
			}
		?>
				
	</body>
</html>
