<?php
/*
Template Name: Find a job
*/
session_start();
get_header(); 
global $post;
/**********
Search Query					
***********/
$search = $_SERVER["QUERY_STRING"];
//If there is a query then split it up 
if ($search) {		
	parse_str($search, $search_array);
	$title = $search_array['job'];
	$state = $search_array['state'];	

	//Create a session variable for use within the back to search button.	
	$_SESSION['searchquery'] = 'find-a-job/?job='.$title.'&state='.$state;
}

//Get the page title in order to pass it around different template parts. 
$pagetitle = get_the_title();

//Page loop
if ( have_posts() ) : while ( have_posts() ) : the_post(); 

	//If there is a query then get the breadcrumbs and filter, if not then get the search form
	
	include(locate_template('templateparts/breadcrumbs.php'));
	echo '<div class="innersearch">';
	include(locate_template('templateparts/job-search.php'));
	echo '</div>';
?>


	<section class="content">
		<div class="container">
			<div class="row">
				<article>
					<div class="col-md-8">	
					<span class="label label-danger">Please select a job type</span>						
						<?php 
						/*********************
						Query to get the jobs from the submitted search term
						*********************/
						$args = array(
							'post_type' => array( 'vacancy' ),
							's' => $title,		
							'posts_per_page' =>	-1,
							'meta_query' => array(
								'key' => 'Location',
								'value' => $state								
							)
						);
						$job_search = new WP_Query( $args );						
						if ( $job_search->have_posts() ) { while ( $job_search->have_posts() ) { $job_search->the_post(); 
							$ajax_nonce = wp_create_nonce( "Gr33nf13ld" );
							echo '<div class="item-container '. term_classes($post->ID) .'" id="'.get_the_id().'">';
								echo '<span class="nonce" style="display:none;">'.$ajax_nonce.'</span>';
								echo get_template_part('templateparts/content-item-listings');
							echo '</div>';
						} } else { echo '<p> Sorry, no posts matched your criteria. </p>'; } 
						wp_reset_postdata(); 
						/*******************
						Query ends here
						*******************/
						?>		
									
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

<?php endwhile; else : 
//if there isnt any content, show this.	
echo '<p> Sorry, no posts matched </p>';
//end the loop
endif;
//get the footer
get_footer();





