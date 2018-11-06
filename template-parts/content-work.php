<div class="col-lg-4 col-md-6 col-xs-6">
	<?php
	global $wp_embed;
	echo $wp_embed->run_shortcode( "[embed]" . tscfp( 'tweet' ) . '[/embed]' );
	?>

	<?php
	if ( is_single() ) :
	?>
	<ul>
		<li>棋士：<?php echo get_the_term_list( get_the_ID(), 'player', '', ', ' ); ?></li>
		<li>作者：<?php echo get_the_term_list( get_the_ID(), 'artist', '', ', ' ); ?></li>
	</ul>
	<?php
	endif;
	?>
</div>

