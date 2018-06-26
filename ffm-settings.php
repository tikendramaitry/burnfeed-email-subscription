<style>
#poststuff.ldc-meta-box {
    width: 50%;
}
.ldc-meta-box td {
    text-align: left;
    vertical-align: top;
}
</style>
<div class="wrap">
	<?php echo get_screen_icon('plugins'); ?>
	<h2><?php _e("Feedburner Follow Me Settings ( version ".ffm_get_version()." )",'ffollowme'); ?></h2>
		<div class="ffmlite_wrap">
			
		</div>

		<div id="poststuff" class="ffm-meta-box" style="width:703px;">
		<div class="postbox" id="post_settings_box">
		<div class="handlediv" title="Click to toggle"><br/></div>
			<h3 class="hndle"><span><?php _e('Feedburner Follow Me Settings', 'ffollowme'); ?></span></h3>
			<div class="inside">
				<form action="options.php" method="post" id="ffm_options_form" name="ffm_options_form">
					<?php settings_fields('ffm_plugin_options'); ?>
					<?php $options = get_option('ffm_options'); ?>
				<table class="form-table">
					<thead>
					   <tr>
						<td></td>
						<td></td>
					   </tr>
					</thead>
					<tfoot>
					   <tr>
						<td><input type="submit" name="submit" value="Save Settings" class="button-primary" /></td>
						<td></td>
					   </tr>
					</tfoot>
					
					<tbody>
					   <tr>
						<td><label for="ffm_options[ffm_feed_url]"><?php _e('Enter Your Feed Address:', 'ffollowme'); ?></label></td>
						<td><input type="text" name="ffm_options[ffm_feed_url]" id="ffm_options[ffm_feed_url]" value="<?php echo $options['ffm_feed_url']; ?>" />
						<p><small style="margin-left:3px;color:#666;"><?php _e('Enter Your Feed Address ( eg : tiks_in )', 'ffollowme'); ?></small></p></td>
					   </tr>
					   
					   <tr>
						<td><label for="ffm_options[ffm_feed_pop_btn_text]"><?php _e('FeedBurner Popup Button Text:', 'ffollowme'); ?></label></td>
						<td><input type="text" name="ffm_options[ffm_feed_pop_btn_text]" id="ffm_options[ffm_feed_pop_btn_text]" value="<?php echo $options['ffm_feed_pop_btn_text']; ?>" /></td>
					   </tr>
					   
					   <tr>
						<td><label for="ffm_options[ffm_feed_subs_text]"><?php _e('FeedBurner Subscribe Button Text:', 'ffollowme'); ?></label></td>
						<td><input type="text" name="ffm_options[ffm_feed_subs_text]" id="ffm_options[ffm_feed_subs_text]" value="<?php echo $options['ffm_feed_subs_text']; ?>" /></td>
					   </tr>
					   
					   <tr>
						<td><label for="ffm_options[ffm_feed_pre_content]"><?php _e('FeedBurner Pre Content:', 'ffollowme'); ?></label></td>
						<td><?php wp_editor( $options['ffm_feed_pre_content'], 'ffm_feed_pre_content', array('textarea_rows' => 15,'teeny' => true,'quicktags' => true, 'textarea_name' => 'ffm_options[ffm_feed_pre_content]')) ?></td>
					   </tr>
					   
					   <tr>
						<td><label for="ffm_options[ffm_feed_post_content]"><?php _e('FeedBurner Post Content:', 'ffollowme'); ?></label></td>
						<td><?php wp_editor( $options['ffm_feed_post_content'], 'ffm_feed_post_content', array('textarea_rows' => 15,'teeny' => true,'quicktags' => true, 'textarea_name' => 'ffm_options[ffm_feed_post_content]')) ?></td>
					   </tr>
					   
					</tbody>
				</table>
				</form>
			</div>
		</div>
	</div><!-- #poststuff -->
</div>