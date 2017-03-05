<?php
/**
 * Template part for displaying page title
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Skokov
 */

?>


<section class="title-section" style=" background: url('<?php echo get_theme_mod('background-page-title', ''); ?>') no-repeat;">
    <?php  ?>
    <div class="container">
        <h1><?php single_post_title();?> </h1>
    </div>
</section>
