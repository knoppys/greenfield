<?php
/*
Template Name: About Us
*/
get_header(); 
//start the page loop
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article>
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
	<section class="about">
		<div class="container">
			<div class="col-sm-6">
				<?php the_content(); ?>
				<a href="<?php the_field('content_button_link'); ?>" class="btn"><?php the_field('content_button_text'); ?></a>
			</div>
			<div class="col-sm-6 border-top">
				<img src="<?php echo get_template_directory_uri(); ?>/images/about2.png" alt="about-grenfield">
			</div>
		</div>
	</section>
	<section class="services">		
		<?php echo get_template_part('templateparts/content_services'); ?>
	</section>	
	<section class="team">
		<div class="container">
			<div class="row">
				<div class="col-md-12 centre">
					<h1><?php the_field('team_title_text'); ?></h1>					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 centre">
					<p><?php the_field('team_description_text'); ?></p>
				</div>
			</div>
			<div class="row team-slide">
				<?php				
				$staffs = get_field('staff');				
				foreach ($staffs as $staff){ ?>					
					<div class="col-md-4 col-sm-4">				
						<div class="profile">
							<div class="image">																												<div class="bio">							
								<ul>
									<?php $items = $staff['personal_items'];									
									foreach ($items as $item){?>
										<li><strong><?php echo $item['item_name']; ?></strong><p class="whitetext"><?php echo $item['item_value']; ?></p></li>
									<?php } ?>
								</ul>
							</div>
								<img src="<?php echo $staff['image']['sizes']['medium_large']; ?>">														</div>
							<div class="info">	
								<span class="name"><?php echo $staff['name']; ?><i class="fa fa-chevron-up"></i></span>						
								<p class="title"><?php echo $staff['job_title']; ?></p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			
		</div>
	</section>
	<section class="testimonials">
		<?php echo get_template_part('templateparts/content_testimonials'); ?>
	</section>	
	<?php echo get_template_part('templateparts/content_data_protection'); ?>
	<section class="cta" style="background: url(<?php echo get_template_directory_uri();?>/images/featured.jpg) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">	
		<div class="container">			
			<div class="row">
				<div class="col-md-12">
					<h1>
						<?php the_field('welcome_title', 20); ?>
					</h1>
					<h2>
						<?php the_field('welcome_slogan', 20); ?>
					</h2>	
				</div>
			</div>
			<div class="row">
				<div class="search-slide">						
					<div>					
						<div class="half">	
							<a href="<?php echo get_site_url(); ?>/find-a-job">
								<i class="fa fa-search"></i>			
								<h1>Find a job</h1>		
								<h4>Looking for a Job in IT?</h4>													
							</a>					
						</div>
						<div class="half">	
							<a href="<?php echo get_site_url(); ?>/employers">
								<i class="fa fa-users"></i>			
								<h1>Find talent</h1>	
								<h4>Looking for the perfect candidates?</h4>							
							</a>						
						</div>
					</div>
					<div>					
				</div>			
			</div>	
		</div>
	</section>
</article>

<?php endwhile; else : 
//if there isnt any content, show this.	
echo '<p> Sorry, no posts matched your criteria. </p>';
//end the loop
endif;
//get the footer
get_footer();
