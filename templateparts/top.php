<div class="row top">
	<div class="col-md-3">
		<div class="social">
			<a target="_blank" href="https://www.facebook.com/Greenfield.IT/"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png"></a>
			<a target="_blank" href="https://twitter.com/greenfieldrec"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png"></a>
			<a target="_blank" href="https://www.linkedin.com/company/greenfield-it?trk=cws-btn-overview-0-0"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png"></a>
		</div>	
	</div>
	<div class="col-md-9">
		<span class="tel"><a target="_blank" href="mailto:info@greenfield-it.co.uk"><i class="fa fa-envelope"></i> info@greenfield-it.co.uk</a></span> 
		<span class="tel"><i class="fa fa-phone"></i>01743 23 40 29</span> 
		<?php if (!is_user_logged_in()) { ?> 
		<span class="login"><i class="fa fa-sign-in"></i>Login</span> 
		<?php } else { ?> 
		<span class="profile"><i class="fa fa-user"></i><a href="<?php echo get_site_url(); ?>/my-profile">My Profile</span> 
		<?php if (!get_user_meta(get_current_user_id(),'user_cv')) { ?>
			<span class="label label-danger">Your profile is incomplete</span>
		<?php } ?>
		</a>
		<span class="logout"><i class="fa fa-sign-out"></i><a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></span><?php } ?>
	</div>
</div>