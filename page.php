<?php

if ( !defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;

?>

<?php get_header(); ?>
    <div class="row">
        <section class="main-content col l8 m12 s12" itemscope itemtype="http://schema.org/Blog">
            <?php custom_breadcrumbs(); ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'content', 'page' ); ?>

            <?php endwhile; // end of the loop. ?>
        </section> <!-- main content -->
        <aside class="col l4 m12 s12" itemscope itemtype="http://schema.org/WPSideBar">
            <?php get_sidebar(); ?>
        </aside>
    </div><!-- .bootstrap cols -->
<?php get_footer(); ?>
