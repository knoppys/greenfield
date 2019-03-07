<div class="row">
	<div class="col-sm-6 title">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>		
	</div>
	<div class="col-sm-6 more">
	<?php
	if (is_user_logged_in()) {
		$userId = get_current_user_id();
		if (get_user_meta($userId, 'user_cv', true)) { ?>
			<div class="quick-message">
				<p><h4>Send a quick message with your CV?</h4></p>
				<textarea rows="5"></textarea>
				<a class="btn post">Apply</a>
			</div>	
		<?php } else { ?>
			<div class="quick-message">
				<h4>Ooops!</h4>
				<p>You have not updated your profile or uploaded your CV. Please view and edit your profile <a href="<?php echo get_site_url(); ?>/my-profile">here</a></p>
			</div>	
		<?php }} ?>		
		<?php if(is_user_logged_in()){ echo '<a title="1 Click Apply" class="btn apply"><i class="fa fa-file-text"></i></a>';} ?>
		<a href="<?php the_permalink(); ?>" class="btn">Read More</a>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">				
		<h4><?php echo get_post_meta($post->ID, 'Location', true);?></h4>
	</div>
	<div class="col-sm-6">
		<h4 class="salary">
		<?php 
		$salary = get_post_meta($post->ID, 'Salary', true);
		$hidden = get_post_meta($post->ID, 'IsHidden', true);
		if ($hidden == 'false') { 
			echo $salary;				
		} else { 
			echo 'Salary: Market Related';
		}
		 ?></h4>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="item-content">
			<p>Posted on : <?php echo get_the_date(); ?></strong></p>	
			<!--<strong><?php $content = get_the_content($post->ID); ?></strong>
			<p><?php echo substr($content, 0, 500); ?>...</p>-->
		</div>
	</div>
</div>