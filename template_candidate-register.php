<?php
/*
Template Name: Candidate Registration
*/
//get the header
get_header(); 
//start the page loop
if ( have_posts() ) : while ( have_posts() ) : the_post(); 
?>

		
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
	<section class="terms cvupload">
		<div class="container">
			<div class="row">
				<div class="col-sm-7">
					<?php the_content(); ?>
					<h3><i class="fa fa-hand-pointer-o"></i>  Upload your CV : </h3>			
					<form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
					    <p><input type="text" name="user_login" value="" id="user_login" class="input" placeholder="Your name" /></p>
					    <p><input type="text" name="user_email" value="" id="user_email" class="input" placeholder="Your email"  /></p>			    
					    <?php do_action('register_form'); ?>
					    <input class="btn" type="submit" value="Next step" id="register" />
					    <input type="hidden" name="redirect_to" value="<?php echo get_site_url(); ?>/new-candidate">
					</form>
				</div>	
				<div class="col-sm-5">
					<img src="<?php echo get_template_directory_uri(); ?>/images/cvupload.png">
				</div>
			</div>
		</div>
	</section>	
</article

<?php endwhile; else : 
//if there isnt any content, show this.	
echo '<p> Sorry, no posts matched your criteria. </p>';
//end the loop
endif;
//get the footer
get_footer('inner');



?>
	