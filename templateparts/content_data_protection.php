<section class="candidate-info">
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
				<?php the_field('candidate_privacy_policy_text', 29); ?>
				<a href="<?php the_field('button_link', 29); ?>" class="btn"><?php the_field('button_text', 29); ?></a>
			</div>
			<div class="col-sm-5">
				<img src="<?php echo get_template_directory_uri(); ?>/images/privacy.jpg">
			</div>
		</div>
	</div>
</section>