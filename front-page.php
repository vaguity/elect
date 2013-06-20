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
  <article class="post" id="post-<?php the_ID(); ?>">
    <header>
      <h2><?php the_title(); ?></h2>
    </header>
  
    <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
  
  </article>
  <?php endwhile; endif; ?>

  <?php /* comments_template(); */ ?>

  <?php
    $options = get_option('elect_theme_options');
    if ($options['side'] == 'left') { }
    else { get_sidebar(); };
  ?>

</div><!-- #main -->

<?php get_footer(); ?>
