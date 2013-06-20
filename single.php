<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>

<div id="main" role="main">

  <?php
    $options = get_option('elect_theme_options');
    if ($options['side'] == 'left') { get_sidebar(); };
  ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

   <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <header>
        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          <p class="post-meta">Posted <time datetime="<?php the_time('Y-m-d')?>"><?php the_time('F jS, Y') ?></time></p>
        </header>
      <?php the_content('Read the rest of this entry &raquo;'); ?>
    </article>

  <?php endwhile; else: ?>

    <p>Sorry, no posts matched your criteria.</p>

  <?php endif; ?>

  <?php
    $options = get_option('elect_theme_options');
    if ($options['side'] == 'left') { }
    else { get_sidebar(); };
  ?>

</div><!-- #main -->

<?php get_footer(); ?>
