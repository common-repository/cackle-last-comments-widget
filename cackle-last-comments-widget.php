<?php
/*
 * Plugin Name: Cackle Last Comments Widget 
 * Plugin URI:
 * http://wordpress.org/extend/plugins/cackle-last-comments-widget/ 
 * Description:
 * Cackle last comments 
 * Version: 1.4
 * Author: Cackle 
 * Author URI: http://cackle.me
 */

class CackleLastCommentsWidget extends WP_Widget {
	
	function __construct() {
		parent::__construct ( false, $name = 'Cackle Last Comments Widget' );
	}
	
	function widget($args, $instance) {
		
		extract ( $args );
		$title = apply_filters ( 'widget_title', $instance ['title'] );
		$mcSite = esc_attr ( $instance ['mcSite'] );
		$mcSize = esc_attr ( $instance ['mcSize'] );
		$mcAvatarSize = esc_attr ( $instance ['mcAvatarSize'] );
		$mcTextSize = esc_attr ( $instance ['mcTextSize'] );
		
		?>
<div id="mc-last"></div>
<script type="text/javascript">
cackle_widget = window.cackle_widget || [];
cackle_widget.push({widget: 'CommentRecent', id: '<?php echo $mcSite?>', size: '<?php echo $mcSize?>', avatarSize: '<?php echo $mcAvatarSize?>', textSize: '<?php echo $mcTextSize?>', titleSize: 40});
(function() {
    var mc = document.createElement('script');
    mc.type = 'text/javascript';
    mc.async = true;
    mc.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cackle.me/widget.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(mc, s.nextSibling);
})();
</script>
		<a href="http://cackle.ru" id="mc-link">powered by <b
			style="color: #4FA3DA">CACKL</b><b style="color: #F65077">E</b></a>

	<?php

	
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance ['mcSite'] = strip_tags ( $new_instance ['mcSite'] );
		$instance ['mcSize'] = strip_tags ( $new_instance ['mcSize'] );
		$instance ['mcAvatarSize'] = strip_tags ( $new_instance ['mcAvatarSize'] );
		$instance ['mcTextSize'] = strip_tags ( $new_instance ['mcTextSize'] );
		
		return $instance;
	}
	
	function form($instance) {
		$instance = wp_parse_args ( ( array ) $instance, array ('mcSite' => '', 'mcSize' => '7', 'mcAvatarSize' => '24', 'mcTextSize' => '150' ) );
		
		$mcSite = esc_attr ( $instance ['mcSite'] );
		$mcSize = esc_attr ( $instance ['mcSize'] );
		$mcAvatarSize = esc_attr ( $instance ['mcAvatarSize'] );
		$mcTextSize = esc_attr ( $instance ['mcTextSize'] );
		?>

		<p>
			<label for="<?php echo $this->get_field_id('mcSite'); ?>"><?php _e('mcSite:'); ?></label>
			<input class="widefat"
				id="<?php echo $this->get_field_id('mcSite'); ?>"
				name="<?php echo $this->get_field_name('mcSite'); ?>" type="text"
				value="<?php if(isset($mcSite)) { echo $mcSite; } ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('mcSize'); ?>"><?php _e('mcSize:'); ?></label>
			<input class="widefat"
				id="<?php echo $this->get_field_id('mcSize'); ?>"
				name="<?php echo $this->get_field_name('mcSize'); ?>" type="text"
				value="<?php if(isset($mcSize)) { echo $mcSize; } ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('mcAvatarSize'); ?>"><?php _e('mcAvatarSize:'); ?></label>
			<input class="widefat"
				id="<?php echo $this->get_field_id('mcAvatarSize'); ?>"
				name="<?php echo $this->get_field_name('mcAvatarSize'); ?>"
				type="text"
				value="<?php if(isset($mcAvatarSize)) { echo $mcAvatarSize; } ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('mcTextSize'); ?>"><?php _e('mcTextSize:'); ?></label>
			<input class="widefat"
				id="<?php echo $this->get_field_id('mcTextSize'); ?>"
				name="<?php echo $this->get_field_name('mcTextSize'); ?>" type="text"
				value="<?php if(isset($mcTextSize)) { echo $mcTextSize; } ?>" />
		</p>


<?php
	
}

}

add_action ( 'widgets_init', create_function ( '', 'return register_widget("CackleLastCommentsWidget");' ) );

?>
