<div class="container">
	<div class="row">
		<div class="col-md-12 centre">
			<h1><?php the_field('testimonial_title'); ?></h1>			
		</div>	
	</div>		
	<div class="row">				
		<?php if( have_rows('testimonials') ) : while ( have_rows('testimonials') ) : the_row(); ?>
		        <div class="col-sm-4">
					<img src="<?php the_sub_field('image'); ?>">
					<p><strong><?php the_sub_field('name'); ?></strong></p>
					<p class="job-title"><?php the_sub_field('title'); ?></p>
					<p><?php the_sub_field('testimonial'); ?></p>						
				</div>
		<?php endwhile; endif; ?>				
	</div>
</div>	