<!DOCTYPE html>
<html>
<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>
	<link rel="shortcut icon" href="<?php echo $dir; ?>/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo $dir; ?>/images/favicon.ico" type="image/x-icon">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	
	<!-- Facebook Pixel Code -->
	<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window,document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		 fbq('init', '1075570759267565'); 
		fbq('track', 'PageView');
	</script>
	<noscript>
		<img height="1" width="1" src="https://www.facebook.com/tr?id=1075570759267565&ev=PageView	&noscript=1"/>
	</noscript>


	<!-- Global Site Tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135079065-1"></script>
	<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-135079065-1');
	</script>
	<!-- End Facebook Pixel Code -->

	<?php 
	wp_head(); 
	$dir = get_template_directory_uri();
	global $dir;  
	?>
	
</head>

<body <?php body_class(); ?>>

	<header class="home-navigation header">	
		
		<div class="container-fluid">		
			<?php echo get_template_part('templateparts/top'); ?>		
		</div>

		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo get_site_url(); ?>"><?php echo get_template_part('templateparts/headerlogo'); ?></a>
				</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav menu-cont">
						<?php $items = wp_get_nav_menu_items( 'primary' );
						foreach ($items as $item){ echo '<li><a href="'.$item->url.'">'.$item->title.'</a></li>';}
						?>
					</ul>     
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>		

		<?php echo get_template_part('templateparts/login'); ?>
		<span class="success">Your application has been received and we will be in touch shortly.</span>
	</header>
	<div class="toppadding"></div>