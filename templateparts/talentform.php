<div class="container">
	<div class="row">
		<div class="col-md-12 centre">
			<?php the_field('above_talent_form_text'); ?>
		</div>	
	</div>
	
		<form id="talentform" name="talentform" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" enctype="multipart/form-data">
			<div class="row">				
				<div class="col-md-6">
					<label>
						Name:
					</label>
					<input type="text" name="name" id="name" required>
					<label>
						Contact Number:
					</label>
					<input type="text" name="number" id="number" required>
				</div>
				<div class="col-md-6">
					<label>
						Company:
					</label>
					<input type="text" name="company" id="company" required>
					<label>
						Email Address:
					</label>
					<input type="email" name="email" id="email" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<label>What are you looking for?</label>
					<input type="textarea" name="message">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<form>
						<script type="text/javascript">
							function enableBtn(){
							    document.getElementById("talentbutton").disabled = false;
							}
							jQuery(document).ready(function(){								
								document.getElementById("talentbutton").disabled = true;
							})
						</script>
						<p>Do you have a job specification(s) prepared? <span>
						<input type="file" name="cv" accept=".doc,.docx,.pdf" required></span></p>
						<input type="hidden" name="action" value="email_talent_form">
						<input type="hidden" name="check" value="">					
						<center><div class="g-recaptcha" data-sitekey="6LeBaYwUAAAAALzFrp6w1kACUjn3aPi9ZcKgy0Zv" data-callback="enableBtn"></div></center>
						<input id="talentbutton" type="submit" class="btn" name="submit" value="Submit">
					</form>
				</div>
			</div>
		</form>
	
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#talentform').validate({
			rules: {
				name: 'required',
				email:{
					required: true,
					email: true
				},
				number:{
					required: true,
					number: true,
					minlength: 11
				},
				message:{
					required: false,

				},
				cv:{
					required: true,
					extension: "doc|docx|pdf"
				}
			},
			messages:{
				cv: 'We prefer a .doc or .docx but a pdf will do.'
			},
			submitHandler: function (form) {
	            return false;
	        }
		})
	})
</script>