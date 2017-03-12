<?php
    /**
    Template Name: about-us
    */
    get_header();
    get_template_part( 'template-parts/page-title' );
?>
<main class="primary-content">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <section class="row section introductory-section">
                <?php /* Start the Loop */
                while ( have_posts() ) : the_post();//get_term_link( $term,

                    the_content();?>
                    </section>

                    <section class="col-lg-8 col-lg-offset-2 section skills-section">
                        <header class="header-in-about-us">
                            <h2>
                                <?php
                                $string=get_post_custom_values('skils-section-title', $post->ID );
                                echo $string[0];
                                ?>
                            </h2>
                            <p>
                                <?php
                                $string=get_post_custom_values('skils-section-description', $post->ID );
                                echo $string[0];
                                ?>
                            </p>
                        </header>
                        <ul class="row">
                            <?php
                            // $string = 'Photoshop:90|Illustrator:80|Html/css:87|Php:76|Wordpress:70|Joomla:65|Javascript:75|Mysql:85';

                            $string = get_post_custom_values('skils', $post->ID );
                            $skils = array();
                            $array2 = explode('|', $string[0]);
                            foreach($array2 as $str) {
                                list($key, $value) = explode(':', $str);
                                $skils[$key] = $value;
                            }
                            foreach ( $skils as $key => $value ) {?>
                                <li class="col-sm-6">
                                    <div class="percent"> <?php echo $value . "%" ?></div>
                                    <div class="full-band">
                                        <h3 class="skill-name" style=" width: <?php echo $value . "%" ?>"> <?php echo $key ?>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </section>
                    <section class="col-xs-12 section section-team">
                        <div class="row">
                            <header class="col-lg-8 col-lg-offset-2 header-in-about-us">
                                <h2>
                                    <?php
                                    $string=get_post_custom_values('team-section-title', $post->ID );
                                    echo $string[0];
                                    ?>
                                </h2>
                                <p>
                                    <?php
                                    $string=get_post_custom_values('team-section-description', $post->ID );
                                    echo $string[0];
                                    ?>
                                </p>
                            </header>
                <?php  endwhile;
            endif; ?>
                            </header>
                        </div>
                        <ul class="row">
                        <?php
                            $args = array(
                                'post_type' => 'employee',
                                'orderby'=>rand,
                                'posts_per_page' => 7,
                            );
                            $employeePosts = new WP_Query($args);

                            if ( $employeePosts->have_posts() ) :
                                while ( $employeePosts->have_posts() ) : $employeePosts->the_post();
                                    ?>
                                    <li class="col-xs-6 col-sm-4 col-md-3">
                                        <a class="photo-wrapper" href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                        <h3 class="caption-photo"> <?php the_terms( $post->ID, 'positions' );  ?></h3>
                                    </li>
                                <?php endwhile;?>
                                <li class="col-xs-6 col-sm-4 col-md-3">
                                        <a class="photo-wrapper"  href="#">
                                            <img src="http://www.skokov/wp-content/uploads/2017/03/team-photo-8.jpg" alt="Photo send cv">
                                        </a>
                                        <a class="send-link">Send CV</a>
                                </li>
                            <?php endif;
                        wp_reset_postdata();
                        ?>
                        </ul>
                    </section>
    </div>
</main>



<?php

get_footer();