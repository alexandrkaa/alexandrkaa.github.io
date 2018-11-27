<? // The single post template is used when a visitor requests a single post. ?>
<?php
    get_header();
    if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    else :
        _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
    endif;
    //get_sidebar();
    get_footer();
