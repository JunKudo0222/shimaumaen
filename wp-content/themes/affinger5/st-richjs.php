<?php if ( ! defined( 'ST_LAZY_LOAD' ) && trim( $GLOBALS["stdata78"] ) !== '' ): ?>
	<?php
	$selector = '';

	if ( $GLOBALS["stdata78"] === 'allopacity' ) {
		$selector = 'img';
	} elseif ( $GLOBALS["stdata78"] === 'postopacity' ) {
		$selector = '.post img';
	}
	?>

	<?php if ( ! empty( $selector ) ): ?>
		<script>
			(function (window, document, $, undefined) {
				'use strict';

				function transparentize(selector) {
					var scrollTop = $(window).scrollTop();
					var windowHeight = $(window).height();

					$(selector).each(function () {
						var $img = $(this);
						var imgTop = $img.offset().top;

						if (imgTop >= scrollTop + windowHeight) {
							$img.css("opacity", "0");
						}
					});
				}

				function fadeIn(selector) {
					var scrollTop = $(window).scrollTop();
					var windowHeight = $(window).height();

					$(selector).each(function () {
						var $img = $(this);
						var imgTop = $img.offset().top;

						if (scrollTop > imgTop - windowHeight + 100) {
							$img.animate({
								"opacity": "1"
							}, 1000);
						}
					});
				}

				$(function () {
					var timer;
					var selector = '<?php echo esc_js( $selector ); ?>';
					var onEvent = fadeIn.bind(null, selector);

					transparentize(selector);

					$(window).on('orientationchange resize', function () {
						if (timer) {
							clearTimeout(timer);
						}

						timer = setTimeout(onEvent, 100);
					});

					$(window).scroll(onEvent);
				});
			}(window, window.document, jQuery));
		</script>
	<?php endif; ?>
<?php endif; ?>

<?php
if ( trim( $GLOBALS["stdata79"] ) !== '' && $GLOBALS["stdata79"] === 'yes' ) { ?>
	<script>
		jQuery(function(){
		jQuery(".post .entry-title").css("opacity",".0").animate({ 
				"opacity": "1"
				}, 2500);;
		});


	</script>
<?php 
}
?>

<?php
if ( ( trim( $GLOBALS["stdata467"] ) === '' ) && ( isset( $GLOBALS["stdata108"] ) && $GLOBALS["stdata108"] === 'yes' ) ) { ?>
	<script>
		jQuery(function(){
		jQuery('.entry-content a[href^=http]')
			.not('[href*="'+location.hostname+'"]')
			.attr({target:"_blank"})
		;})
	</script>
<?php 
}
?>

<script>
	jQuery(function(){
		jQuery('.st-btn-open').click(function(){
			jQuery(this).next('.st-slidebox').stop(true, true).slideToggle();
			jQuery(this).addClass('st-btn-open-click');
		});
	});
</script>

<?php 
$st_entrytitle_setdesign = st_get_entrytitle_designsetting();
if( (trim( $st_entrytitle_setdesign ) !== '') && (($st_entrytitle_setdesign === 'dotdesign')||($st_entrytitle_setdesign === 'centerlinedesign')||($st_entrytitle_setdesign === 'gradient_underlinedesign')) ): ?>
	<script>
		jQuery(function(){
		jQuery('.entry-title').wrapInner('<span class="st-dash-design"></span>');
		}) 
	</script>
<?php endif;

$st_h2_setdesign = st_get_h2_designsetting();
if( (trim( $st_h2_setdesign ) !== '') && (($st_h2_setdesign === 'dotdesign')||($st_h2_setdesign === 'centerlinedesign')||($st_entrytitle_setdesign === 'gradient_underlinedesign')) ): ?>
	<script>
		jQuery(function(){
		jQuery('.post h2 , .h2modoki').wrapInner('<span class="st-dash-design"></span>');
		}) 
	</script>
<?php endif;

$st_h3_setdesign = st_get_h3_designsetting();
if( (trim( $st_h3_setdesign ) !== '') && (($st_h3_setdesign === 'dotdesign')||($st_h3_setdesign === 'centerlinedesign')||($st_entrytitle_setdesign === 'gradient_underlinedesign')) ): ?>
	<script>
		jQuery(function(){
		jQuery('.post h3:not(.rankh3):not(#reply-title) , .h3modoki').wrapInner('<span class="st-dash-design"></span>');
		}) 
	</script>
<?php endif;

if ( isset($GLOBALS['stdata210']) && $GLOBALS['stdata210'] === 'yes' ) : ?>
<script>
jQuery(function(){
  jQuery('#st-tab-menu li').on('click', function(){
    if(jQuery(this).not('active')){
      jQuery(this).addClass('active').siblings('li').removeClass('active');
      var index = jQuery('#st-tab-menu li').index(this);
     jQuery('#st-tab-menu + #st-tab-box div').eq(index).addClass('active').siblings('div').removeClass('active');
    }
  });
});
</script>
<?php endif; ?>

<script>
	jQuery(function(){
		jQuery("#toc_container:not(:has(ul ul))").addClass("only-toc");
		jQuery(".st-ac-box ul:has(.cat-item)").each(function(){
			jQuery(this).addClass("st-ac-cat");
		});
	});
</script>

<?php
$st_h4_husen_shadow = get_theme_mod( 'st_h4_husen_shadow', '' );
$st_h5_husen_shadow = get_theme_mod( 'st_h5_husen_shadow', '' );
?>
<script>
	jQuery(function(){
		<?php if( $st_h4_husen_shadow ): ?>
			jQuery( '.post h4:not(.st-css-no):not(.st-matome):not(.rankh4):not(#reply-title):not(.point)' ).wrap( '<div class="st-h4husen-shadow"></div>' );
			jQuery( '.h4modoki' ).wrap( '<div class="st-h4husen-shadow"></div>' );
		<?php endif; ?>
		<?php if( $st_h5_husen_shadow ): ?>
			jQuery( '.post h5:not(.st-css-no):not(.st-matome):not(.rankh5):not(.point):not(.st-cardbox-t):not(.popular-t):not(.kanren-t):not(.popular-t)' ).wrap( '<div class="st-h5husen-shadow"></div>' );
			jQuery( '.h5modoki' ).wrap( '<div class="st-h5husen-shadow"></div>' );
		<?php endif; ?>
		jQuery('.st-star').parent('.rankh4').css('padding-bottom','5px'); // スターがある場合のランキング見出し調整
	});
</script>

<?php if ( get_theme_mod( 'st_sticky_menu', '') === 'fixed' ): ?>
	<script>
		(function (window, document, $, undefined) {
			'use strict';

			var largeScreen = window.matchMedia('screen and (min-width: 960px)');

			function resetStickyPosition() {
				$('.st-sticky, thead th, thead td').css('top', '');
			}

			function updateStickyPosition() {
				var $headerBar      = $('#s-navi dl.acordion');
				var headerBarHeight = $headerBar.height();
				var scrollTop       = $(window).scrollTop();

				$('.st-sticky, thead th, thead td').each(function (index, element) {
					var $element = $(element);
					var tagName  = $element.prop('nodeName');
					var elementTop;

					if (tagName === 'TH' || tagName === 'TD') {
						if ($element.closest('.scroll-box').length) {
							return;
						}

						elementTop = $element.parent('tr').offset().top;
					} else {
						elementTop = $element.offset().top;
					}

					if (scrollTop + headerBarHeight > elementTop) {
						if (parseInt($element.css('top'), 10) !== headerBarHeight) {
							$element.css('top', headerBarHeight);
						}
					} else {
						$element.css('top', '');
					}
				});
			}

			function resetContentPosition() {
				$('header').css('padding-top', '');
				$('#headbox-bg').css('margin-top', '');
			}

			function fixContentPosition() {
				var $headerBar = $('#s-navi dl.acordion');
				var height     = $headerBar.height();

				$headerBar.css('padding-top', height);
				$headerBar.css('margin-top', -height);
			}

			function onScroll() {
				updateStickyPosition();
			}

			function onLargeScreen() {
				$(window).off('scroll', onScroll);

				resetContentPosition();
				resetStickyPosition();
			}

			function onSmallScreen() {
				$(window).on('scroll', onScroll);

				fixContentPosition();
				updateStickyPosition();
			}

			function initialize() {
				largeScreen.addListener(function (mql) {
					if (mql.matches) {
						onLargeScreen();
					} else {
						onSmallScreen();
					}
				});

				if (largeScreen.matches) {
					onLargeScreen();
				} else {
					onSmallScreen();
				}
			}

			$(function () {
				initialize();
			});
		}(window, window.document, jQuery));

		$(function() { 
			$( window ).scroll( function () {
				if ( jQuery(this).scrollTop() > 100 ) {
					$('#s-navi dl.acordion').addClass('ac-shadow');
				} else {
					$('#s-navi dl.acordion').removeClass('ac-shadow');
				}
			});
		});
	</script>
<?php endif; ?>

<?php if ( ! st_is_mobile() && get_theme_mod( 'st_header_height_vh' ) ): // トップページのヘッダー画像エリアの高さを画面サイズに応じて最大にする ?>
	<script>
		$(function() {
			$('.front-page header').append('<div id="st-header-link"><a href="#st-header-bottom-anchor"><i class="fa fa-angle-down" aria-hidden="true"></i></a></div>').after('<div id="st-header-bottom-anchor"></div>');
		});
	</script>
<?php endif; ?>
