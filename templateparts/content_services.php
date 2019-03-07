<div class="container">
	<div class="row">
		<div class="col-md-12 centre">
			<h1><?php the_field('services_title'); ?></h1>
			<?php
			if (get_field('services_stapline')){ ?>
			<h3><?php the_field('services_stapline'); ?></h3>
			<?php } ?>
		</div>
	</div>
	<div class="row services-links">
		<div class="col-sm-4 centre">			
			<img src="<?php echo the_field('service_image_1'); ?>">			
			<?php the_field('service_text_1'); ?>
			<?php
			if (get_field('service_link_1')){ ?>
			<a class="btn btn-primary" href="<?php the_field('service_link_1'); ?>">Read More</a>		
			<?php } ?>
		</div>
		<div class="col-sm-4 centre">		
			<img src="<?php echo the_field('service_image_2'); ?>">			
			<?php the_field('service_text_2'); ?>
			<?php
			if (get_field('service_link_2')){ ?>
			<a class="btn btn-primary" href="<?php the_field('service_link_2'); ?>">Read More</a>			
			<?php } ?>
		</div>			
		<div class="col-sm-4 centre">			
			<img src="<?php echo the_field('service_image_3'); ?>">			
			<?php the_field('service_text_3'); ?>
			<?php
			if (get_field('service_link_3')){ ?>
			<a class="btn btn-primary" href="<?php the_field('service_link_3'); ?>">Read More</a>			
			<?php } ?>
		</div>
	</div>	
</div>