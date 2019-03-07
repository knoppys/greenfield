<header>
	<div class="row">
		<div class="col-sm-6">
			<h2><?php echo esc_html( get_the_title()); ?></h2>
			<h3><?php echo $meta['Location'][0] ;?></h3>
		</div>
		<div class="col-sm-6">
			<h2 class="salary">
			<?php 
			if ($meta['IsHidden'][0] == 'false') { 
				echo $meta['Salary'][0];				
			} else { 
				echo 'Salary: Market Related';
			}
			 ?></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p><strong>Posted by : <?php echo $meta['Individual'][0]; ?> | On : <?php the_date(); ?></strong></p>
		</div>
	</div>
</header>

<div class="description">
	<div class="row">
		<div class="col-md-12">
			<?php the_content(); ?>	
		</div>
	</div>
</div>


<div class="apply-links" id="<?php echo get_the_id(); ?>">
<?php $ajax_nonce = wp_create_nonce( "Gr33nf13ld" ); ?>
	<div class="row">
		<div class="col-sm-6">
		<?php
		if (is_user_logged_in()) {
			$userId = get_current_user_id();
			if (get_user_meta($userId, 'user_cv', true)) { ?>
				<div class="quick-message">
					<p><h4>Send a quick message with your CV?</h4></p>
					<textarea rows="5"></textarea>
					<span id="nonce" style="display:none;"><?php echo $ajax_nonce; ?></span>
					<a class="btn postSingle">Apply</a>
				</div>	
			<?php } else { ?>
				<div class="quick-message">
					<h4>Ooops!</h4>
					<p>You have not updated your profile or uploaded your CV. Please view and edit your profile <a href="<?php echo get_site_url(); ?>/my-profile">here</a></p>
				</div>	
			<?php }} ?>		
			<?php if(is_user_logged_in()){ echo '<a title="1 Click Apply" class="btn applySingle"><i class="fa fa-file-text"></i></a>';} ?>
			<span class="btn dropdown">Apply Now</span>
		</div>
	</div>
</div>

<div class="apply-form">
	<div class="row">
		<div class="col-md-12">
			<h3>Please upload a copy of your CV to apply for this position</h3>
		</div>
	</div>
	<div class="row loadhere" data-jobid="<?php echo get_the_id(); ?>">		
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#jobApplication').validate({
			rules: {
				fullName: 'required',
				email:{
					required: true,
					email: true
				},
				tel:{
					required: true,
					number: true,
					minlength: 11
				},
				message:{
					required: false,

				},
				cv:{
					required: true,
					extension: "doc|docx|pdf"
				}
			},
			messages:{
				cv: 'We prefer a .doc or .docx but a pdf will do.'
			},
			submitHandler: function (form) {
	            return false;
	        }
		})
	})
</script>






	
		
						
						
				
						

	