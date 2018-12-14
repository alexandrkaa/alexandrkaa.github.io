<? //The home page template is the front page by default. If you do not set WordPress to use a static front page, this template is used to show latest posts. ?>
<?php
    get_header();
    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article class="news-article">
      <h2><? the_title(); ?></h2>
      <? the_content(); ?>
    </article>
    <? endwhile;
    else :
        _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
    endif;
    //get_sidebar();
    get_footer();
