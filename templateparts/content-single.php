<?php /*This is the content part*/ ?>
<header>
	<?php the_title('<h1 class="page-title">','<h1>'); ?>
</header>
<?php the_content(); ?>
<footer>
	<?php /*comments would go in here*/ ?>
	<p><?php if(get_post_type() == 'post'){ echo 'Posted by '.the_author().' |'; }?> On : <?php the_date(); ?></p>
</footer>

