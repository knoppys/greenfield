<?php
/*
* Template Name: Login Page
*/

//get the header
get_header(); 
//start the page loop
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
    <section>
    <div class="container content">
        <div class="row">
            <article>
                <div class="col-md-9">
                    <div class="wp_login_form">
                        <div class="form_heading"> Login Form </div>

                        <?php
                        $args = array(
                        'redirect' => home_url(),
                        'id_username' => 'user',
                        'id_password' => 'pass',
                        )
                        ;?>

                        <?php wp_login_form( $args ); ?>

                    </div>
                </div>
            </article>
            <aside>
                <div class="col-md-3 sidebar">
                    <?php dynamic_sidebar('sidebar-page'); ?>                   
                    <form class="sidebar-block" role="search" method="get" id="searchform" action="<?php echo get_site_url(); ?>/find-a-job">
                        <h3 class="sidetitle">Search for a job</h3>
                        <input type="text" value="" name="job" id="job" placeholder="Key word or phrase" required/>     
                        <input type="text" value="" name="state" id="state" placeholder="Location" required/>                       
                        <input type="submit" id="searchsubmit" value="Search" class="btn" />            
                    </form>         
                </div>
            </aside>
        </div>
    </div>
</section>


<?php endwhile; else : 
//if there isnt any content, show this. 
echo '<p> Sorry, no posts matched your criteria. </p>';
//end the loop
endif;
//get the footer
get_footer();
