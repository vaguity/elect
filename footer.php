<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>

  <footer id="footer">
      <p class="copyright">&copy; <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></p>
      <p class="credit">Site built by <a href="http://uptownpoliticalconsulting.com/">Uptown Political Consulting</a>.</p>
  </footer>
</div> <!-- #container -->

  <!-- Javascript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"] ?>js/vendor/jquery-1.8.0.min.js"><\/script>')</script>

  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/plugins.js") ?>
  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/main.js") ?>

<?php
  $options = get_option('elect_theme_options');
  if (strpos($options['gacode'],'UA-') !== false) {
    $gacode = $options['gacode'];
?>
    <script>
      var _gaq=[['_setAccount','<?php echo $gacode; ?>'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>

<?php
} ?>
			   
  <?php wp_footer(); ?>

</body>
</html>
