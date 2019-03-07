<?php
/**********
Breadcrumbs					
***********/
?>
<section class="breadcrumbs job-filter">
	<div class="container">
		<div class="row">
			<div class="col-md-8">								
				<?php
					if ($search) {
						echo '<a href="'.get_site_url().'">Home</a> > '.$pagetitle.' > <strong>'.$title.'</strong> jobs in <strong>'.$state.'</strong>';
					} else {
						echo '<a href="'.get_site_url().'">Home</a> > '.$post->post_title;
					}
				?>	
			</div>
			<div class="col-md-4 filter">
				<form class="filter" role="search" method="get" id="searchform" action="<?php echo get_site_url(); ?>/find-a-job">		
					<input type="hidden" value="<?php echo $job; ?>" name="job" id="job" placeholder="Key word or phrase" required/>		
					<input type="hidden" value="<?php echo $state; ?>" name="state" id="state" placeholder="Location" required/>			
					<label class="control control-checkbox">
			        Permanent
			            <input type="checkbox" name="employmentType" value="Permanent" checked id="permCheck">
			        <div class="control_indicator"></div>
			    </label>
			    <label class="control control-checkbox">
			        Contract
			            <input type="checkbox" name="employmentType" value="Contract" checked id="contCheck">
			        <div class="control_indicator"></div>
			    </label>		
				</form>	
			</div>
		</div>
	</div>
</section>


	
		


