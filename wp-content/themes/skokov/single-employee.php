<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Skokov
 */

get_header();
get_template_part( 'template-parts/page-title');?>

    <main class="section section-team primary-content">
        <div class="container">
            <?php

            if ( have_posts() ) :
                while (  have_posts() ) : the_post();?>
                    <div class="photo-wrapper">
                        <?php the_post_thumbnail(); ?>
                    </div>

                    <?php the_content(); ?>
                    <p>Positions: <span class="caption-photo"> <?php the_terms( $post->ID, 'positions'); ?></span></p>
                <?php  endwhile; // End of the loop.
            endif;
            ?>
        </div><!-- .container -->
    </main><!-- #main -->


<?php
get_footer();