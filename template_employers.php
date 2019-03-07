<?php
/*
Template Name: Employers
*/
//get the header
get_header(); 
//start the page loop
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article class="employers">
	<section class="title-header" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">		
					<h1><?php the_title(); ?></h1>
					<h3><?php the_field('title_slogan'); ?></h3>
				</div>
			</div>
		</div>
	</section>	
	<section class="services">
		<?php echo get_template_part('templateparts/content_services'); ?>
	</section>	
	<section class="brands">
		<div class="container">	
			<div class="row">		
				<div class="col-md-12">
					<h1>Some of the names we work with</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">					
					<?php
					$bbclients = get_field('big_brand_clients',20);
					$i = 0;
					foreach ($bbclients as $client) { 

						if ($i == 0) {echo '<div class="row">';}
						echo '<div class="col-xs-6"><img src="'.$client['bb_logo'].'"></div>';
						if ($i == 1) {echo '</div>';}
						$i++;
						
					}?>
				</div>
				<div class="col-sm-6">						
					<?php
					$bbclients = get_field('sme_clients',20);
					$i = 0;
					foreach ($bbclients as $client) { 

						if ($i == 0) {echo '<div class="row">';}
						echo '<div class="col-xs-6"><img src="'.$client['sme_logo'].'"></div>';
						if ($i == 1) {echo '</div>';}
						$i++;
						
					}?>					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<a href="<?php echo get_site_url(); ?>/contact" class="btn">Find Talent</a>
				</div>
			</div>
		</div>
	</section>
	<section class="success">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><?php the_field('success_stories_title_text'); ?></h1>					
					<p><strong><?php the_field('success_stories_description_text'); ?></strong>			</p>
				</div>
			</div>
			<div class="row">				
				<?php if(get_field('story_links')): while(has_sub_field('story_links')): ?>
					<div class="col-sm-4">
						<a href="<?php the_sub_field('link'); ?>">
							<img src="<?php the_sub_field('story_image'); ?>">
						</a>
					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</section>
	<section class="testimonials">
		<?php echo get_template_part('templateparts/content_testimonials'); ?>
	</section>
	<section class="terms">
		<div class="container">
			<div class="row">
				<div class="col-sm-7">
					<?php the_field('how_we_work_text'); ?>
					<a href="<?php the_field('terms_button_link'); ?>" class="btn"><?php the_field('term_button_text'); ?></a>
				</div>	
				<div class="col-sm-5">
					<img src="<?php echo get_template_directory_uri(); ?>/images/terms.jpg">
				</div>
			</div>
		</div>
	</section>
	<?php echo get_template_part('templateparts/content_data_protection'); ?>
	<section class="contact-form">
		<?php echo get_template_part('templateparts/talentform'); ?>
	</section>
</article>

<?php endwhile; else : 
//if there isnt any content, show this.	
echo '<p> Sorry, no posts matched your criteria. </p>';
//end the loop
endif;
//get the footer
get_footer();