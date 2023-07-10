<?php // この記事を書いた人（記事上）
if (( isset($GLOBALS['stdata497']) && $GLOBALS['stdata497'] === 'yes' ) 
&& ( is_single() || ( is_page() && ( isset($GLOBALS['stdata212']) && $GLOBALS['stdata212'] === 'yes' )))) :
$user_info = get_userdata($post->post_author); //ユーザーID
$st_users_id = $user_info->ID;
?>
<div class="st-shortcode-author">
	<div class="st-author-box">
		<div id="st-tab-box" class="clearfix">
			<div class="active">
				<dl>
				<dt>
					<a rel="nofollow" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( $st_users_id, 80 ); ?></a>
				</dt>
				<dd>
					<p class="st-author-nickname"><?php the_author_meta( 'nickname',$st_users_id ); ?></p>
					<p class="st-author-description"><?php the_author_meta( 'description',$st_users_id ); ?></p>
					<p class="st-author-sns">
						<?php if(get_the_author_meta('twitter',$st_users_id)): ?>
							<a rel="nofollow" class="st-author-twitter" href="<?php the_author_meta('twitter',$st_users_id); ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
						<?php endif; ?>
						<?php if(get_the_author_meta('facebook',$st_users_id)): ?>
							<a rel="nofollow" class="st-author-facebook" href="<?php the_author_meta('facebook',$st_users_id); ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
						<?php endif; ?>
						<?php if(get_the_author_meta('instagram',$st_users_id)): ?>
							<a rel="nofollow" class="st-author-instagram" href="<?php the_author_meta('instagram',$st_users_id); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<?php endif; ?>
						<?php if(get_the_author_meta('youtube',$st_users_id)): ?>
							<a rel="nofollow" class="st-author-youtube" href="<?php the_author_meta('youtube',$st_users_id); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
						<?php endif; ?>
						<?php if(get_the_author_meta('user_url',$st_users_id)): ?>
							<a rel="nofollow" class="st-author-homepage" href="<?php the_author_meta('user_url',$st_users_id); ?>"><i class="fa fa-home" aria-hidden="true"></i></a>
						<?php endif; ?>
					</p>
				</dd>
				</dl>
			</div>
		</div>
	</div>
</div>
<?php endif;
