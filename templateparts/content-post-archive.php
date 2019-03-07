<div class="col-sm-4 post-thumbnail">
	<?php if( has_post_thumbnail() ){
		the_post_thumbnail('medium');
	} else { ?>
		<img src="<?php echo get_template_directory_uri(); ?>/images/newsbkg.png" alt="no-image" />
	<?php }; ?>						
</div>
<div class="col-sm-8">
	<p><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></p>
	<p><?php the_excerpt(); ?></p>
	<strong>Posted on : <?php echo get_the_date(); ?></strong>								    
</div>