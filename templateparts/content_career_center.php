<div class="container">
	<div class="row">
		<div class="col-md-12 centre">
		<h1><?php the_field('career_center_title'); ?></h1>		
		<p><strong><?php the_field('career_centre_slogan'); ?></strong></p>	
		</div>			
	</div>
	<?php
		$args = array('post_type' => 'page', 'post__in' => array('60','57', '63', '66'), 'orderby' => 'post__in');
		$knoposts = get_posts( $args );	
		$rowCount = 0; 
	?>
	<div class="row">
		<?php foreach ( $knoposts as $knopost ) { 
			if (get_field('career_center_image', $knopost->ID)) {
				$thumbnail = get_field('career_center_image', $knopost->ID);
			} else {
				$thumbnail = get_the_post_thumbnail_url($knopost->ID,'medium');
			}
			?>
		
			<div class="col-sm-3 serv-cont">				
				<img src="<?php echo $thumbnail; ?>">		
			
				<h3><?php echo $knopost->post_title; ?></h3>		
				<!--<p><?php echo  get_the_excerpt($knopost->ID)?></p>-->
				<a class="btn btn-primary" href="<?php echo get_post_permalink($knopost->ID);?>">Read More</a>
			</div>		
		<?php 
		 
		} 
		?></div>
	<div class="row centre">
		<div class="col-md-12">			
			<?php the_field('career_center_bottom_text'); ?>				
		</div>
	</div>
</div>