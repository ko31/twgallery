<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package twgallery
 */

/**
 * Output pagination
 *
 * @return void
 */
if ( ! function_exists( 'twgallery_paginate_links' ) ) {
	function twgallery_paginate_links() {

		$links = paginate_links( array(
			'prev_text' => '前へ',
			'next_text' => '次へ',
			'show_all'  => false,
			'end_size'  => 1,
			'mid_size'  => 2,
			'type'      => 'array',
		) );

		if ( ! $links ) {
			return;
		}

		$links = array_map( function ( $link ) {
			$link = str_replace( 'page-numbers', 'page-link', $link );

			return $link;
		}, $links );
		?>

		<nav class="mb-5">
			<ul class="pagination justify-content-center">
				<?php
				foreach ( $links as $link ) {
					if ( strpos( $link, 'current' ) !== false ) {
						echo '<li class="page-item disabled">' . $link . '</li>';
					} else {
						echo '<li class="page-item">' . $link . '</li>';
					}
				}
				?>
			</ul>
		</nav>
		<?php
	}
}

/**
 * メニュー項目を取得
 *
 * @param string $slug nav menu slug
 *
 * @return array
 */
if ( ! function_exists( 'twgallery_get_nav_menu_items' ) ) {
	function twgallery_get_nav_menu_items( $slug = '' ) {
		if ( empty( get_nav_menu_locations()[ $slug ] ) ) {
			return [];
		}
		$header_menus = wp_get_nav_menu_items( get_nav_menu_locations()[ $slug ] );

		$items = [];
		foreach ( $header_menus as $m ) {
			if ( ! isset( $items[ $m->menu_item_parent ] ) ) {
				$items[ $m->menu_item_parent ] = [];
			}
			$items[ $m->menu_item_parent ][] = $m;
		}

		return $items;
	}
}

/**
 * タクソノミー棋士一覧を表示するショートコード
 *
 * @return void
 */
function twgallery_players_list( $atts ) {
	?>
	<ul>
		<?php
		$args = [
			'title_li'   => '',
			'show_count' => 1,
			'taxonomy'   => 'player',
			'orderby'    => 'count',
			'order'      => 'DESC',
		];
		wp_list_categories( $args );
		?>
	</ul>
	<?php
}

add_shortcode( 'players_list', 'twgallery_players_list' );

/**
 * タクソノミー描く将一覧を表示するショートコード
 *
 * @return void
 */
function twgallery_artists_list( $atts ) {
	?>
	<ul>
		<?php
		$args = [
			'title_li'   => '',
			'show_count' => 1,
			'taxonomy'   => 'artist',
			'orderby'    => 'count',
			'order'      => 'DESC',
		];
		//wp_list_categories( $args );
		foreach ( get_categories( $args ) as $cat ):
			echo '<li>';
			echo '<a href="' . get_category_link( $cat->term_id ) . '">@' . $cat->name . '</a>&nbsp;';
			echo '(' . $cat->count . ')';
			echo '</li>';
		endforeach;
		?>
	</ul>
	<?php
}

add_shortcode( 'artists_list', 'twgallery_artists_list' );
