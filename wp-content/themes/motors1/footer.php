			</div> <!--main-->
		</div> <!--wrapper-->
		<?php if(!is_404() and !is_page_template('coming-soon.php')){ ?>
			<footer id="footer">
				<?php get_template_part('partials/footer/footer'); ?>
				<?php get_template_part('partials/footer/copyright'); ?>

				<?php get_template_part('partials/global', 'alerts'); ?>
				<!-- Searchform -->
				<?php get_template_part('partials/modals/searchform'); ?>
			</footer>
		<?php }elseif(is_page_template('coming-soon.php')) {
			get_template_part('partials/footer/footer-coming','soon');
		}; ?>

		<?php
			if ( get_theme_mod( 'frontend_customizer' ) ) {
				get_template_part( 'partials/frontend_customizer' );
			}
		?>
		
	<?php wp_footer(); ?>
	
	<?php get_template_part('partials/modals/test', 'drive'); ?>
	<?php get_template_part('partials/modals/get-car', 'price'); ?>
	<?php get_template_part('partials/modals/car', 'calculator'); ?>
	<?php get_template_part('partials/modals/trade', 'offer'); ?>
	<?php get_template_part('partials/single-car/single-car-compare-modal'); ?>
	<?php
		if(stm_pricing_enabled()) {
			get_template_part( 'partials/modals/limit_exceeded' );
			get_template_part( 'partials/modals/subscription_ended' );
		}
	?>

	

	 <!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,3779052,4,0,0,0,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?3779052&101" alt="web log free" border="0"></a></noscript>
<!-- Histats.com  END  -->



	</body>
</html>