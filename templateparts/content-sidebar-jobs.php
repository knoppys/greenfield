<?php
if (is_singular('bullhornjoblisting')) {
	include(locate_template('templateparts/content-sidebar-jobs-related.php'));
}
?>
<div class="sidebar-block">
	<h3 class="sidetitle">Candidate Services</h3>
	<?php $items = wp_get_nav_menu_items( 'candidate-services' );
	echo '<nav role="navigation">';
		foreach ($items as $item){ echo '<a href="'.$item->url.'"><i class="fa fa-chevron-right"></i> '.$item->title.'</a>';}
	echo '</nav>';?>
</div>

<div class="sidebar-block">
	<h3 class="sidetitle">Training Recruitment</h3>
	<nav role="navigation">
		<ul>
			<li><i class="fa fa-chevron-right"></i> Assesors</li>
			<li><i class="fa fa-chevron-right"></i> Apprenticeship Managers</li>
			<li><i class="fa fa-chevron-right"></i> Tutors</li>
			<li><i class="fa fa-chevron-right"></i> IQA’s</li>
			<li><i class="fa fa-chevron-right"></i> Learning and Development Managers</li>
			<li><i class="fa fa-chevron-right"></i> Training Advisors</li>
			<li><i class="fa fa-chevron-right"></i> Curriculum Managers</li>
			<li><i class="fa fa-chevron-right"></i> BID and Tender Managers</li>
		</ul>
		<strong><p>Find out more about our Training Recruitment Division</p></strong>
		<a href="<?php echo get_permalink('5254'); ?>"class="btn">Read More</a>
	</nav>
</div>

<?php
if (!is_user_logged_in()) { ?>
	<div class="sidebar-block oneclick">
		<a href="<?php echo get_site_url(); ?>/upload-your-cv/"><img src="<?php echo get_template_directory_uri();?>/images/1click.png"></a>
	</div>
<?php } ?>

