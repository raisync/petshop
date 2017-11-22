<?php
/*
Template Name: Page with Left Sidebar
*/
get_header(); 
    //Start Middle Section 
    global $petshop_kaya_post_item_id, $post;
  echo  petshop_kaya_post_item_id(); ?>
    <div id="mid_container_wrapper" class="mid_container_wrapper_section">
        <div id="mid_container" class="container">
            <?php echo petshop_kaya_custom_pagetitle($post->ID); ?>
            <section class="three_fourth_last" id="content_section">
                <?php // Page Content
                if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <?php
                            the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </section>
                <aside class="one_fourth sidebar_left">
                    <?php get_sidebar(); ?> 
                </aside>
                 <?php wp_link_pages(); ?>
    <?php get_footer(); ?>