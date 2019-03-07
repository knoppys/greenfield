<?php
/*
Template Name: Contact
*/
//get the header
get_header(); 
//start the page loop
if ( have_posts() ) : while ( have_posts() ) : the_post(); 
?>	
	<div id="map"></div>
	<script>
	  function initMap() {
	    var uluru = {lat: 52.687478, lng: -2.773876};
	    var map = new google.maps.Map(document.getElementById('map'), {
	      zoom: 8,
	      center: {lat: 52.814028, lng: -1.637136},
	      gestureHandling: 'none',
	      zoomControl: false
	    });
	    var marker = new google.maps.Marker({
	      position: uluru,
	      map: map,
	      content: 'hello'
	    });
	  }
	</script>
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwA02qQflofi5uU3IPNJdM8piclV1XCp4&callback=initMap">
	</script>
		

<section class="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-4 reach-us">
				<h2>General Enquiries</h2>
				<?php the_field('reach_us'); ?>
			</div>			
			<div class="col-md-4">
				<h2></h2>
				<?php the_field('address'); ?>
			</div>
			<div class="col-md-4 main-contact">
				<h2></h2>
				<?php echo do_shortcode('[contact-form-7 id="223" title="Contact form 1"]'); ?>
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
get_footer('inner');



?>
