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
?>

    <section class="title-section" style=" background: url('<?php echo get_theme_mod('background-page-title', ''); ?>') no-repeat;">
        <?php  ?>
        <div class="container">
            <h1> Blog </h1>
        </div>
    </section>


    <div class="container-fluid content">
        <div class="row">
            <main class="col-sm-8 primary-content">

                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content', 'single' );

                ?>
                    <section class="text-wrapper">
                        <h2>Related posts</h2>
                        <ul class="row recent bottom-line">
                            <?php $tags = wp_get_post_tags($post->ID);
                            if ($tags) :
                                $tag_ids = array();
                                foreach($tags as $individual_tag) {$tag_ids[] = $individual_tag->term_id;}
                                $args = array(
                                    'tag__in' => $tag_ids, // Sort by Tags
                                    'orderby'=>rand,
                                    'post__not_in' => array($post->ID),
                                    'posts_per_page' => 3,
                                );
                                $relatedPosts = new WP_Query($args);

                                if ( $relatedPosts->have_posts() ) :
                                    while ( $relatedPosts->have_posts() ) : $relatedPosts->the_post();
                                        ?>
                                        <li class="col-sm-4">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail(); ?>
                                                <strong class="text-block">
                                                    <?php the_title();?>
                                                </strong>
                                            </a>
                                        </li>
                                    <?php endwhile;
                                else :
                                    echo '<p>No content found. <p>';
                                endif;
                            endif;
                            wp_reset_postdata();
                            ?>
                        </ul>
                    </section>
                    <section class="text-wrapper">
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    else :
                        get_template_part( 'template-parts/content', 'none' );
                    endif;
                    ?>
                    </section>

            </main><!-- #main -->

            <?php get_sidebar(); ?>
        </div>
    </div>

<?php

get_footer();
