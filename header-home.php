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

	<?php 
	wp_head(); 
	$dir = get_template_directory_uri();
	global $dir;  
	?>
	
</head>

<body <?php body_class(); ?>>
<section class="landing" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
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

	</header>



