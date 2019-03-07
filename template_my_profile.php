<?php
/*
Template Name: My Profile
*/
//get the header
get_header(); 
if (!is_user_logged_in()) {
	wp_redirect(home_url());
	exit;
}

global $current_user;

//start the page loop
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<section class="title-header" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">							
						<h1><?php the_title(); ?></h1>
						<h3>Welcome <?php echo $current_user->user_firstname; ?> <?php echo $current_user->user_lastname; ?></h3>
					</div>
				</div>
			</div>
		</section>
	<section>
	<section class="profile-edit content">
		<div class="container">			
			<div class="row">
				<div class="col-sm-9">
					<h1 class="page-title">Edit your profile</h1>
					<p>You can edit all your profile details here. In order to use the 1-click-apply feature you need to make sure all your details are up to date and a recent copy of your CV has bee uploaded. </p>					    
			          <div class="row">
			            <div class="col-md-6">              
			              	<?php echo updatecandidateprofile(); ?>              	
			            </div>
			            <div class="col-md-6">
			               <?php echo do_shortcode('[password_form]'); ?>	                      	
			            </div>
			          </div>            
				</div>
				<div class="col-sm-3 sidebar">
					<?php dynamic_sidebar('sidebar-profile'); ?>
					<form class="sidebar-block" role="search" method="get" id="searchform" action="<?php echo get_site_url(); ?>/find-a-job">
						<h3 class="sidetitle">Search for a job</h3>
						<input type="text" value="" name="job" id="job" placeholder="Key word or phrase" required/>		
						<input type="text" value="" name="state" id="state" placeholder="Location" required/>						
						<input type="submit" id="searchsubmit" value="Search" class="btn" />			
					</form>			
				</div>
			</div>
		</div>
	</section>
</section>


<?php 
endwhile; else : 
//if there isnt any content, show this.	
echo '<p> Sorry, no posts matched your criteria. </p>';
//end the loop
endif;
//get the footer
get_footer();
