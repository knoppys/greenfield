
<section class="job-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">	
			<?php
			if (is_page('6179')) {
				$url = get_the_permalink('6179');
				$training = '<input type="hidden" name="training" value="true">';
			} else {
				$url = get_the_permalink('49');
				$trainin = '';
			}
			?>		
				<form role="search" method="get" id="searchform" action="<?php echo $url; ?>">
					<input type="text" value="" name="job" id="job" placeholder="<?php if ($title){echo $title;}else{echo 'Key word or phrase';}?>" required/>		
					<input type="text" value="" name="state" id="state" placeholder="<?php if ($state){echo $state;}else{echo 'Location';}?>" required/>			
					<?php echo $training; ?>	
					<input type="submit" id="searchsubmit" value="Search" />			
				</form>			
			</div>
		</div>
	</div>
</section>