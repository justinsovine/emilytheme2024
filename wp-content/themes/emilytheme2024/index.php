<?php get_header(); ?>

<main>
    <?php
    if ( is_front_page() ) {
        get_template_part('template-parts/homepage');
    } else {
        // Display the default loop for other pages or posts
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                get_template_part('template-parts/content', get_post_format());
            endwhile;
            
            // Pagination
            the_posts_pagination(array(
                'prev_text'          => __('Previous page', 'textdomain'),
                'next_text'          => __('Next page', 'textdomain'),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'textdomain') . ' </span>',
            ));
        else :
            // If no content, include the "no content" template.
            get_template_part('template-parts/content', 'none');
        endif;
    }
    ?>
</main>

<?php get_footer(); ?>
