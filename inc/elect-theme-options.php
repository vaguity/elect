<?php

// Theme options:
// 	Color selection (dropdown)
// 	Typography selection (dropdown)

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init() {
	register_setting( 'elect_options', 'elect_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'electtheme' ), __( 'Theme Options', 'electtheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for our select and radio options
 */
$side_options = array(
	'left' => array(
		'value' => 'left',
		'label' => __( 'Left', 'electtheme' )
	),
	'right' => array(
		'value' => 'right',
		'label' => __( 'Right', 'electtheme' )
	)
);

$palette_options = array(
	'0' => array(
		'value' =>	'0',
		'label' => __( 'Default Setup', 'electtheme' )
	),
	'1' => array(
		'value' =>	'1',
		'label' => __( 'Terracotta', 'electtheme' )
	),
	'2' => array(
		'value' =>	'2',
		'label' => __( 'Greenleaf', 'electtheme' )
	),
	'3' => array(
		'value' =>	'3',
		'label' => __( 'Victory 1', 'electtheme' )
	),
	'4' => array(
		'value' =>	'4',
		'label' => __( 'Victory 2', 'electtheme' )
	)
);

// $typography_options = array(
// 	'0' => array(
// 		'value' =>	'0',
// 		'label' => __( '1Zero', 'electtheme' )
// 	),
// 	'1' => array(
// 		'value' =>	'1',
// 		'label' => __( '1One', 'electtheme' )
// 	)
// );

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $palette_options, $typography_options, $side_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . wp_get_theme() . __( ' Theme Options', 'electtheme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'electtheme' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'elect_options' ); ?>
			<?php $options = get_option( 'elect_theme_options' ); ?>

			<table class="form-table">

				<?php
				/**
				 * Logo URL
				 */
				?>
				<tr valign="top"><th scope="row">Logo URL<br /><br /><em>Upload an image to the media library, get the URL, and add it here.</em></th>
                    <td><input type="text" name="elect_theme_options[logourl]" value="<?php echo $options['logourl']; ?>" style="width: 300px;" /></td>
                </tr>

				<?php
				/**
				 * Palette dropdown
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Palette', 'electtheme' ); ?></th>
					<td>
						<select name="elect_theme_options[palette]">
							<?php
								$selected = $options['palette'];
								$p = '';
								$r = '';

								foreach ( $palette_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="elect_theme_options[palette]"></label>
					</td>
				</tr>

				<?php
				/**
				 * Typography dropdown
				 */
				?>
<!-- 				<tr valign="top"><th scope="row"><?php _e( 'Typography', 'electtheme' ); ?></th>
					<td>
						<select name="elect_theme_options[typography]">
							<?php
								$selected = $options['typography'];
								$p = '';
								$r = '';

								foreach ( $typography_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="elect_theme_options[selectinput]"></label>
					</td>
				</tr> -->

				<?php
				/**
				 * Side radio buttons
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Side for calls-to-action', 'electtheme' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Side for calls-to-action', 'electtheme' ); ?></span></legend>
						<?php
							if ( ! isset( $checked ) )
								$checked = 'right';
							foreach ( $side_options as $option ) {
								$side_setting = $options['side'];

								if ( '' != $side_setting ) {
									if ( $options['side'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
								<label class="description"><input type="radio" name="elect_theme_options[side]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> /> <?php echo $option['label']; ?></label><br />
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>

				<?php
				/**
				 * Logo URL
				 */
				?>
				<tr valign="top"><th scope="row">Google Analytics Tracking Code<br /><br /><em>Should be in the format: <span style="white-space: nowrap;">UA-XXXXX-X.</span></em></th>
                    <td><input type="text" name="elect_theme_options[gacode]" value="<?php echo $options['gacode']; ?>" style="width: 300px;" /></td>
                </tr>

			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'electtheme' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $palette_options, $typography_options, $side_options;

	// Select option must actually be in our array of select options
	if ( ! array_key_exists( $input['palette'], $palette_options ) )
		$input['palette'] = null;

	// Select option must actually be in our array of select options
	// if ( ! array_key_exists( $input['typography'], $typography_options ) )
	// 	$input['typography'] = null;

	// Our side option must actually be in our array of radio options
	if ( ! isset( $input['side'] ) )
		$input['side'] = null;
	if ( ! array_key_exists( $input['side'], $side_options ) )
		$input['side'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	// $input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

// To return these options:
// $options = get_option('elect_theme_options');
// echo $options['id'];

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/