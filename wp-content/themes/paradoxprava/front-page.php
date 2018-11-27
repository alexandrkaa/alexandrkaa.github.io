<? //The front page template is always used as the site front page if it exists, regardless of what settings on Admin > Settings > Reading. ?>
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
