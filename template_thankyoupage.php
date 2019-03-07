<?php
/*
Template name: Thank you page
*/
//get the header
session_start();
get_header(); 
global $post;



//Get the query url for the back to search function. 
$http = $_SERVER['HTTP_REFERER'];
if (strpos($http, '?')) {
	$queryUrl = $_SESSION['searchquery'];
} else {
	$queryUrl = NULL;
}

//start the page loop
if ( have_posts() ) : while ( have_posts() ) : the_post(); 
?>
<section class="title-header" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">		
				<h1><?php the_title(); ?></h1>
				<h3><?php the_field('title_slogan'); ?></h3>
			</div>
		</div>
	</div>
</section>
<?php
if ($queryUrl) { ?>
	<section class="breadcrumbs job-filter" style="padding-bottom:20px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="<?php echo get_site_url(); ?>/find-a-job/<?php echo $queryUrl; ?>"><i class="fa fa-chevron-left"></i> Back to search</a>
				</div>
			</div>
		</div>
	</section>
<?php } else { ?>
	<section class="breadcrumbs job-filter" style="padding-bottom:20px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="<?php echo get_site_url(); ?>/find-a-job"><i class="fa fa-chevron-left"></i> Back to all jobs</a>
				</div>
			</div>
		</div>
	</section>
<?php }	?> 
<article>	
	<section class="about">
		<div class="container">
			<div class="col-sm-6">
				<?php the_content(); ?>		
				<a href="<?php echo get_site_url(); ?>/career-centre" class="btn">Career Centre</a>		
			</div>
			<div class="col-sm-6 border-top">
				<img src="<?php echo get_template_directory_uri(); ?>/images/thumbsup.jpg" alt="about-grenfield">
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
