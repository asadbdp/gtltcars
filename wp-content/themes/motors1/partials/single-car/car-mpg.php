<?php
	$city_mpg = get_post_meta(get_the_ID(),'city_mpg',true);
	$highway_mpg = get_post_meta(get_the_ID(),'highway_mpg',true);

	if(!empty($city_mpg) and !empty($highway_mpg)): ?>

	<div class="single-car-mpg heading-font">
		<div class="text-center">
			<div class="clearfix dp-in text-left mpg-mobile-selector">
				<div class="mpg-unit">
					<div class="mpg-value"><?php echo esc_attr($city_mpg); ?></div>
					<div class="mpg-label"><?php esc_html_e('city km/l', 'motors'); ?></div>
				</div>
				<div class="mpg-icon">
					<i class="stm-icon-fuel"></i>
				</div>
				<div class="mpg-unit">
					<div class="mpg-value"><?php echo esc_attr($highway_mpg); ?></div>
					<div class="mpg-label"><?php esc_html_e('hwy km/l', 'motors'); ?></div>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>

