<?php
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
$meta = get_post_meta($post->ID);
?>

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

<main>
	<section class="content">
		<div class="container">
			<div class="row">
				<article>
					<div class="col-md-8">					
						<?php include(locate_template('templateparts/content-single-jobs.php')); ?>												
					</div>					
				</article>
				<aside>
					<div class="col-md-4 sidebar">					
						<?php include(locate_template('templateparts/content-sidebar-jobs.php')); ?>						
					</div>
				</aside>
			</div>
		</div>
	</section>
</main>

<?php endwhile; else : 
//if there isnt any content, show this.	
echo '<p> Sorry, no posts matched your criteria. </p>';
//end the loop
endif;
//get the footer
get_footer();
