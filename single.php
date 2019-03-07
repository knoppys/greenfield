<?php
//get the header
get_header(); 
//start the page loop
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section>
	<div class="container content">
		<div class="row">
			<article>
				<div class="col-md-9">
					<?php echo get_template_part('templateparts/content-single'); ?>
				</div>
			</article>
			<div class="col-md-3 sidebar">
				<?php echo get_template_part('templateparts/content-categories-nav'); ?>					
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

<?php endwhile; else : 
//if there isnt any content, show this.	
echo '<p> Sorry, no posts matched your criteria. </p>';
//end the loop
endif;
//get the footer
get_footer();
