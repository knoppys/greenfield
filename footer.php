	</div>
		<footer>
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6">
						<p>&copy 2017 Greenfield IT - All rights reserved</p>						
					</div>
					<div class="col-sm-6">
						<div class="social">
							<a target="_blank" href="https://www.facebook.com/Greenfield.IT/"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png"></a>
							<a target="_blank" href="https://twitter.com/greenfieldrec"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png"></a>
							<a target="_blank" href="https://www.linkedin.com/company/greenfield-it?trk=cws-btn-overview-0-0"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png"></a>
						</div>				
					</div>
					
				</div>
				<div class="row">
					<div class="col-sm-6">						
						<?php $items = wp_get_nav_menu_items( 'primary' );
						echo '<nav>';					
						foreach ($items as $item){ echo '<a href="'.$item->url.'">'.$item->title.'</a>';}
						echo '</nav>';
						?>
					</div>
					<div class="col-sm-6">						
						<nav class="useful-links">
							<a target="_blank" href="<?php echo get_permalink('5203'); ?>">Privacy Policy</a>
							<a target="_blank" href="<?php echo get_permalink('5199'); ?>">Terms of Business</a>
							<a target="_blank" href="<?php echo get_site_url(); ?>/sitemap.xml">Sitemap</a>
						</nav>
					</div>
				</div>
			</div>
		</footer>
	</div>
</div>
<?php if (is_singular('vacancy')) {
	$id = get_the_id();
	$meta = get_post_meta($id);   
	$content = get_the_content($id); 

	$scriptarray = array(		
		'@context' => 'http://schema.org/',
		'@type' => 'JobPosting',
		'datePosted' => get_the_date( 'd/m/Y', $id ),
		'title' => get_the_title($id),
		'description' => $content,
		'employmentType' => $meta['employmentType'][0],
		'hiringOrganization' => array(
			'@type' => 'Organization',
			'name' => 'Greenfield IT',
			'sameAs' => 'http://www.greenfieldit.co.uk'
		),
		'jobLocation' => array(
			'@type' => 'Place',
			'address' => array(
				'@type' => 'PostalAddress',
				'addressLocality' => $meta['city'][0],
				'addressRegion' => 'UK'
			)
		)
	);
	

}?>
<?php schema_details(); ?>
<script type='application/ld+json'>
	<?php echo json_encode($scriptarray); ?>
</script>
<?php wp_footer(); ?>
</body>
</html>



