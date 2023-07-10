<?php // 記事一覧の投稿日
$st_is_ex    = st_is_ver_ex();
$show_published_date = ( get_option( 'st-data140', '' ) === 'yes' ); // 更新日がある場合も投稿日を表示する ?>

<?php if ( ! is_front_page() ): //トップページ以外 ?>
	<div class="blogbox <?php st_hidden_class(); ?>">
		<p><span class="kdate">
			<?php if( $st_is_ex ): //更新日の表示確認
				$postID = get_the_ID();
				$updatewidgetset = get_post_meta( $postID, 'updatewidget_set', true );
			else:
				$updatewidgetset = '';
			endif;

			if ( ! $show_published_date && trim ( $updatewidgetset ) === '' && ( get_the_date() != get_the_modified_date() ) ) : //更新がある場合 ?>
				<?php if ( isset($GLOBALS['stdata140']) && $GLOBALS['stdata140'] === 'both' ) : ?>
					<i class="fa fa-clock-o"></i><?php echo esc_html( get_the_date() ); ?>
				<?php endif; ?>
				<i class="fa fa-refresh"></i><time class="updated" datetime="<?php echo esc_attr( get_the_modified_date( DATE_ISO8601 ) ); ?>"><?php echo esc_html( get_the_modified_date() ); ?></time>
			<?php else: //更新がない場合 ?>
				<i class="fa fa-clock-o"></i><time class="updated" datetime="<?php echo esc_attr( get_the_date( DATE_ISO8601 ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
			<?php endif; ?>
		</span></p>
	</div>
<?php endif; ?>
