<?php
/*
Template Name: Home
*/
get_header('home'); 

	//start the page loop
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
	
	<section class="banner">	
		<div class="container">			
			<div class="row">
				<div class="col-md-12 search-slide">						
					<div>
						<h1>
							<?php the_field('welcome_title'); ?>
						</h1>
						<h2>
							<?php the_field('welcome_slogan'); ?>
						</h2>	
							<div class="half">	
								<a id="searchclick">
									<i class="fa fa-search"></i>			
									<?php the_field('job_search_link'); ?>
								</a>					
							</div>
							<div class="half">	
								<a id="welcomeclick" href="<?php echo get_site_url(); ?>/employers">
									<i class="fa fa-users"></i>			
									<?php the_field('employers_link'); ?>
								</a>						
							</div>
						</div>
						<div>
						<h1>
							Looking for a new role?
						</h1>						
						<?php echo get_template_part('templateparts/job-search'); ?>
					</div>
				</div>			
			</div>	
		</div>
	</section>
</section>

<section id="welcome" class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<?php the_field('welcome_text'); ?>
			</div>
			<div class="col-md-5 clients">
				<?php echo get_template_part('templateparts/clientlogos'); ?>
			</div>
		</div>
	</div>
</section>

<!--
<section class="featured-jobs">
	<div class="container">
		<div class="row">
			<div class="col-md-12 centre">
				<?php the_field('featured_jobs_text'); ?>
			</div>			
		</div>
		<div class="row jobs-slide">
			<?php
			$args = array(
				'post_type' => 'bullhornjoblisting',
				'meta_key' => 'featJob',
				'meta' => '1'
			);
			$knoposts = get_posts( $args );
			foreach ( $knoposts as $knopost ) { 
			$meta = get_post_meta($knopost->ID);
			?>
				
					<div class="col-md-3">
						<div class="job-container">
							<a href="<?php echo get_post_permalink($knopost->ID);?>">
							<?php 
							//echo '<h3><span class=""></span>'.$knopost->post_title.'</h3>';
							//echo '<p><span class="employmentType"></span>'.$meta->employmentType.'</p>';
							//echo '<p><span class="baseSalary"></span>'.$meta->baseSalary.'</p>';
							//echo '<p><span class="city"></span>'.$meta->city.'</p>';
							//echo '<a class="more" href="'.$knopost->url.'"></a>';						
							?>
							<div class="specs">
								<p class="title"><?php echo $knopost->post_title;?></p>
								<p><i class="fa fa-file"></i> Contract</p>
								<p><i class="fa fa-gbp"></i> £250</p>
								<p><i class="fa fa-map-pin"></i> Chester</p>
							</div>
							</a>				

						</div>
					</div>
				
			<?php } ?>			
		</div>
		<div class="arrows">
			<img id="slideleft" src="<?php echo get_template_directory_uri(); ?>/images/arrow-left.png">
			<img id="slideright" src="<?php echo get_template_directory_uri(); ?>/images/arrow-right.png">
			<br><a class="btn" href="<?php echo get_site_url(); ?>/find-a-job">View all jobs</a>
		</div>
	</div>
</section>
-->
<section class="career-centre" id="career-centre">
	<?php echo get_template_part('templateparts/content_career_center'); ?>
</section>
<section class="testimonials">
	<?php echo get_template_part('templateparts/content_testimonials'); ?>
</section>

<section class="media">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Greenfield Media</h1>
			</div>
		</div>
		<div class="row">
			<?php $args = array('post_type'=>'post','posts_per_page'=>4);
			$knoposts = get_posts( $args ); 			
			?>
			<div class="col-md-4">
				<div class="home-news news-left white-text" style="background: url(<?php if (get_the_post_thumbnail_url($knoposts[0]->ID, 'medium')) {echo get_the_post_thumbnail_url($knoposts[0]->ID, 'medium');} else {echo get_template_directory_uri().'/images/newsbkg.png';} ?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
					<div class="news-container">
						<p class="white-text"><?php echo $knoposts[0]->post_title;?></p>
						<a class="btn btn-primary" href="<?php echo get_post_permalink($knoposts[0]->ID); ?>">Read More</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="home-news news-right-one" style="background: url(<?php if (get_the_post_thumbnail_url($knoposts[1]->ID, 'medium')) {echo get_the_post_thumbnail_url($knoposts[1]->ID, 'medium');} else {echo get_template_directory_uri().'/images/newsbkg.png';}?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
					<div class="news-container">
						<p class="white-text"><?php echo $knoposts[1]->post_title;?></p>
						<a class="btn btn-primary" href="<?php echo get_post_permalink($knoposts[1]->ID); ?>">Read More</a>
					</div>
				</div>
				<div style="position: relative;"></div>
				<div class="home-news news-right-two" style="background: url(<?php if (get_the_post_thumbnail_url($knoposts[2]->ID, 'medium')) {echo get_the_post_thumbnail_url($knoposts[2]->ID, 'medium');} else {echo get_template_directory_uri().'/images/newsbkg.png';}?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
					<div class="news-container">
						<p class="white-text"><?php echo $knoposts[2]->post_title;?></p>
						<a class="btn btn-primary" href="<?php echo get_post_permalink($knoposts[2]->ID); ?>">Read More</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="home-news news-right-three" style="background: url(<?php if (get_the_post_thumbnail_url($knoposts[3]->ID, 'medium')) {echo get_the_post_thumbnail_url($knoposts[3]->ID, 'medium');} else {echo get_template_directory_uri().'/images/newsbkg.png';}?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
					<div class="news-container">
						<p class="white-text"><?php echo $knoposts[3]->post_title;?></p>
						<a class="btn btn-primary" href="<?php echo get_post_permalink($knoposts[3]->ID); ?>">Read More</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php endwhile; else : 
//if there isnt any content, show this.	
echo '<p> Sorry, no posts matched your criteria. </p>';
//end the loop
endif;
//get the footer
get_footer();
