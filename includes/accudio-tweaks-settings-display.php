<?php

/**
 * @link				https://accudio.com/development
 * @since				1.1.0
 * @package				Accudio_Tweaks
 * @subpackage			Accudio_Tweaks/Settings_Display
 */

?>
<div class="wrap">
	<h1>Accudio Tweaks</h1>
	<hr>

	<form action="<?php echo admin_url('admin-post.php') ?>" method="POST">

		<div id="accudio_tweaks_settings_admin">
			<h2>Admin Tweaks</h2>
			<p class='description'>The below settings only affect users without the manage_options() permission in the admin panel (any non-admin). I recommend you use a plugin like <a href="plugin-install.php?s=User+Role+Editor&tab=search&type=term">User Role Editor</a> to create custom user roles without this permissions. Most of these tweaks are standalone but are designed to be used with a plugin like <a href="plugin-install.php?s=Absolutely+Glamorous+Custom+Admin&tab=search&type=term">Absolutely Glamorous Custom Admin</a> for more general admin interface tweaks.</p>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">
							<label for="accudio_tweaks_admin_quickedit">Remove &apos;Quick Edit&apos; link from page manager</label>
						</th>
						<td>
							<input id='accudio_tweaks_admin_quickedit_hidden' type='hidden' value="0" name='accudio_tweaks_admin_quickedit'>
							<input name="accudio_tweaks_admin_quickedit" type="checkbox" id="accudio_tweaks_admin_quickedit" value="1" <?php echo $accudio_tweaks_admin_quickedit_value; ?>>
							<span class="description"></span>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="accudio_tweaks_admin_bar_edit">Remove &apos;Edit&apos; link from admin bar</label>
						</th>
						<td>
							<input id='accudio_tweaks_admin_bar_edit_hidden' type='hidden' value="0" name='accudio_tweaks_admin_bar_edit'>
							<input name="accudio_tweaks_admin_bar_edit" type="checkbox" id="accudio_tweaks_admin_bar_edit" value="1" <?php echo $accudio_tweaks_admin_bar_edit_value; ?>>
							<span class="description"></span>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="accudio_tweaks_admin_trash">Remove &apos;Trash&apos; link from page manager</label>
						</th>
						<td>
							<input id='accudio_tweaks_admin_trash_hidden' type='hidden' value="0" name='accudio_tweaks_admin_trash'>
							<input name="accudio_tweaks_admin_trash" type="checkbox" id="accudio_tweaks_admin_trash" value="1" <?php echo $accudio_tweaks_admin_trash_value; ?>>
							<span class="description"></span>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="accudio_tweaks_admin_authorcomments">Remove &apos;Author&apos; and &apos;Comments&apos; columns from page manager</label>
						</th>
						<td>
							<input id='accudio_tweaks_admin_authorcomments_hidden' type='hidden' value="0" name='accudio_tweaks_admin_authorcomments'>
							<input name="accudio_tweaks_admin_authorcomments" type="checkbox" id="accudio_tweaks_admin_authorcomments" value="1" <?php echo $accudio_tweaks_admin_authorcomments_value; ?>>
							<span class="description"></span>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="accudio_tweaks_admin_elementor">Change &apos;Edit&apos; link in page manager to edit with <a href="plugin-install.php?s=Elementor+Page+Builder&tab=search&type=term">Elementor</a></label>
						</th>
						<td>
							<input id='accudio_tweaks_admin_elementor_hidden' type='hidden' value="0" name='accudio_tweaks_admin_elementor'>
							<input name="accudio_tweaks_admin_elementor" type="checkbox" id="accudio_tweaks_admin_elementor" value="1" <?php echo $accudio_tweaks_admin_elementor_value; ?>>
							<?php if(accudio_tweaks_admin_elementor_is_enabled()) {
								echo "<span class='description'>Elementor is installed and active, setting enabled.</span>";
							} else {
								echo "<span class='description accudio_tweaks_danger'>Elementor is not installed or inactive, setting has no affect. To download and install, click <a href='plugin-install.php?s=Elementor+Page+Builder&tab=search&type=term'>here</a>.</p>";
							} ?>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="accudio_tweaks_admin_yoast_cols">Remove <a href="plugin-install.php?s=Yoast+SEO&tab=search&type=term">Yoast SEO</a> columns in page manager</label>
						</th>
						<td>
							<input id='accudio_tweaks_admin_yoast_cols_hidden' type='hidden' value="0" name='accudio_tweaks_admin_yoast_cols'>
							<input name="accudio_tweaks_admin_yoast_cols" type="checkbox" id="accudio_tweaks_admin_yoast_cols" value="1" <?php echo $accudio_tweaks_admin_yoast_cols_value; ?>>
							<?php if(accudio_tweaks_admin_yoast_is_enabled()) {
								echo "<span class='description'>Yoast is installed and active, setting enabled.</span>";
							} else {
								echo "<span class='description accudio_tweaks_danger'>Yoast is not installed or inactive, setting has no affect. To download and install, click <a href='plugin-install.php?s=Yoast+SEO&tab=search&type=term'>here</a>.</p>";
							} ?>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="accudio_tweaks_admin_yoast_filters">Remove <a href="plugin-install.php?s=Yoast+SEO&tab=search&type=term">Yoast SEO</a> filters in page manager</label>
						</th>
						<td>
							<input id='accudio_tweaks_admin_yoast_filters_hidden' type='hidden' value="0" name='accudio_tweaks_admin_yoast_filters'>
							<input name="accudio_tweaks_admin_yoast_filters" type="checkbox" id="accudio_tweaks_admin_yoast_filters" value="1" <?php echo $accudio_tweaks_admin_yoast_filters_value; ?>>
							<?php if(accudio_tweaks_admin_yoast_is_enabled()) {
								echo "<span class='description'>Yoast is installed and active, setting enabled.</span>";
							} else {
								echo "<span class='description accudio_tweaks_danger'>Yoast is not installed or inactive, setting has no affect. To download and install, click <a href='plugin-install.php?s=Yoast+SEO&tab=search&type=term'>here</a>.</p>";
							} ?>
						</td>
					</tr>
          <tr>
            <th scope="row">
              <label for="accudio_tweaks_admin_yoast_dashboard">Remove <a href="plugin-install.php?s=Yoast+SEO&tab=search&type=term">Yoast SEO</a> widget on Dashboard</label>
            </th>
            <td>
              <input id='accudio_tweaks_admin_yoast_dashboard_hidden' type='hidden' value="0" name='accudio_tweaks_admin_yoast_dashboard'>
              <input name="accudio_tweaks_admin_yoast_dashboard" type="checkbox" id="accudio_tweaks_admin_yoast_dashboard" value="1" <?php echo $accudio_tweaks_admin_yoast_dashboard_value; ?>>
              <?php if(accudio_tweaks_admin_yoast_is_enabled()) {
                echo "<span class='description'>Yoast is installed and active, setting enabled.</span>";
              } else {
                echo "<span class='description accudio_tweaks_danger'>Yoast is not installed or inactive, setting has no affect. To download and install, click <a href='plugin-install.php?s=Yoast+SEO&tab=search&type=term'>here</a>.</p>";
              } ?>
            </td>
          </tr>
				</tbody>
			</table>
			<hr>
		</div>

		<div id="accudio_tweaks_settings_security">
			<h2>Security Tweaks</h2>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">
							<label for="accudio_tweaks_security_https">Enforce HTTPS</label>
						</th>
						<td>
							<input id='accudio_tweaks_security_https_hidden' type='hidden' value="0" name='accudio_tweaks_security_https'>
							<input name="accudio_tweaks_security_https" type="checkbox" id="accudio_tweaks_security_https" value="1" <?php echo $accudio_tweaks_security_https_value; ?>>
							<span class="description">(Using header Strict-Transport-Security)</span>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="accudio_tweaks_security_frame">Frame Options</label>
						</th>
						<td>
							<select name="accudio_tweaks_security_frame" id="accudio_tweaks_security_frame">
								<option value="ALLOWALL">All Allowed</option>
								<option value="ALLOW-FROM">Whitelist</option>
								<option value="SAMEORIGIN">Same Origin</option>
								<option value="DENY">Deny</option>
							</select>
							<script>jQuery("select option[value='<?php echo $accudio_tweaks_security_frame_value; ?>']").attr("selected","selected");</script>
							<input name="accudio_tweaks_security_frame_whitelist" type="text" id="accudio_tweaks_security_frame_whitelist" value="<?php echo $accudio_tweaks_security_frame_whitelist_value; ?>" placeholder="eg. https://fonts.google.com http://...">
							<p class="description">(See more <a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-Frame-Options" target="_blank" rel="noopener">here</a>)</p>
						</td>
					</tr>
					<tr>
						<th scope="row">
							Content Security Policy
						</th>
						<td>
							<div class="accudio_tweaks_csp">
                <span class="description">Default Policy</span>
								<input name="accudio_tweaks_security_csp_default" type="text" id="accudio_tweaks_security_csp_default" class="accudio_tweaks_csp" value="<?php echo $accudio_tweaks_security_csp_default_value; ?>" aria-label="Default Content Security Policy">
							</div>
							<div class="accudio_tweaks_csp">
                <span class="description">Script Policy</span>
								<input name="accudio_tweaks_security_csp_script" type="text" id="accudio_tweaks_security_csp_script" class="accudio_tweaks_csp" value="<?php echo $accudio_tweaks_security_csp_script_value; ?>" aria-label="Script Content Security Policy">
							</div>
							<div class="accudio_tweaks_csp">
                <span class="description">Style Policy</span>
								<input name="accudio_tweaks_security_csp_style" type="text" id="accudio_tweaks_security_csp_style" class="accudio_tweaks_csp" value="<?php echo $accudio_tweaks_security_csp_style_value; ?>" aria-label="Style Content Security Policy">
							</div>
							<div class="accudio_tweaks_csp">
                <span class="description">Font Policy</span>
								<input name="accudio_tweaks_security_csp_font" type="text" id="accudio_tweaks_security_csp_font" class="accudio_tweaks_csp" value="<?php echo $accudio_tweaks_security_csp_font_value; ?>" aria-label="Font Content Security Policy">
							</div>
							<div class="accudio_tweaks_csp">
                <span class="description">Image Policy</span>
								<input name="accudio_tweaks_security_csp_img" type="text" id="accudio_tweaks_security_csp_img" class="accudio_tweaks_csp" value="<?php echo $accudio_tweaks_security_csp_img_value; ?>" aria-label="Image Content Security Policy">
							</div>
							<div class="accudio_tweaks_csp">
                <span class="description">Frame Policy</span>
								<input name="accudio_tweaks_security_csp_frame" type="text" id="accudio_tweaks_security_csp_frame" class="accudio_tweaks_csp" value="<?php echo $accudio_tweaks_security_csp_frame_value; ?>" aria-label="Frame Content Security Policy">
							</div>
							<div class="accudio_tweaks_csp">
                <span class="description">Object Policy</span>
								<input name="accudio_tweaks_security_csp_object" type="text" id="accudio_tweaks_security_csp_object" class="accudio_tweaks_csp" value="<?php echo $accudio_tweaks_security_csp_object_value; ?>" aria-label="Object Content Security Policy">
							</div>
							<p class="description">(See more <a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy" target="_blank" rel="noopener">here</a>)</p>
						</td>
					</tr>
				</tbody>
			</table>
			<hr>
		</div>

		<div id="accudio_tweaks_settings_woocommerce">
			<h2>WooCommerce Tweaks</h2>
			<?php if(accudio_tweaks_woocomm_is_enabled()) {
				echo "<p class='description'>WooCommerce is installed and active, settings below are enabled.</p>";
			} else {
				echo "<p class='description accudio_tweaks_danger'>WooCommerce is not installed or inactive, settings below have no affect. To download and install WooCommerce, click <a href='plugin-install.php?s=woocommerce&tab=search&type=term'>here</a>.</p>";
			} ?>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">
							<label for="accudio_tweaks_woocomm_outstock">Hide out of stock products from Frontend</label>
						</th>
						<td>
							<input id='accudio_tweaks_woocomm_outstock_hidden' type='hidden' value="0" name='accudio_tweaks_woocomm_outstock'>
							<input name="accudio_tweaks_woocomm_outstock" type="checkbox" id="accudio_tweaks_woocomm_outstock" value="1" <?php echo $accudio_tweaks_woocomm_outstock_value; ?>>
							<span class="description"></span>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="accudio_tweaks_woocomm_shipping">Hide shipping dimensions from Frontend</label>
						</th>
						<td>
							<input id='accudio_tweaks_woocomm_shipping_hidden' type='hidden' value="0" name='accudio_tweaks_woocomm_shipping'>
							<input name="accudio_tweaks_woocomm_shipping" type="checkbox" id="accudio_tweaks_woocomm_shipping" value="1" <?php echo $accudio_tweaks_woocomm_shipping_value; ?>>
							<span class="description"></span>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="accudio_tweaks_woocomm_sku">Hide SKU on product pages</label>
						</th>
						<td>
							<input id='accudio_tweaks_woocomm_sku_hidden' type='hidden' value="0" name='accudio_tweaks_woocomm_sku'>
							<input name="accudio_tweaks_woocomm_sku" type="checkbox" id="accudio_tweaks_woocomm_sku" value="1" <?php echo $accudio_tweaks_woocomm_sku_value; ?>>
							<span class="description"></span>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="accudio_tweaks_woocomm_sidebar">Force removal of Woocommerce sidebar</label>
						</th>
						<td>
							<input id='accudio_tweaks_woocomm_sidebar_hidden' type='hidden' value="0" name='accudio_tweaks_woocomm_sidebar'>
							<input name="accudio_tweaks_woocomm_sidebar" type="checkbox" id="accudio_tweaks_woocomm_sidebar" value="1" <?php echo $accudio_tweaks_woocomm_sidebar_value; ?>>
							<span class="description"></span>
						</td>
					</tr>
				</tbody>
			</table>
			<hr>
		</div>

		<?php wp_nonce_field( 'accudio_tweaks_settings_save', 'accudio_tweaks_settings_nonce' ); ?>
		<input type="hidden" name="action" value="accudio_tweaks_update_options">
		<input type="submit" value="Save Changes" aria-label="Save Changes" class="button button-primary button-large">

	</form>
</div>