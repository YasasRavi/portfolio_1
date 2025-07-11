<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

/**
 * Wrapper function to deal with backwards compatibility.
 */
if ( ! function_exists( 'merge_body_open' ) ) {
	function merge_body_open() {
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open();
		} else {
			do_action( 'wp_body_open' );
		}
	}
}

/**
 * Sanitize slass tag
 */
if ( ! function_exists( 'merge_sanitize_class' ) ) {
	function merge_sanitize_class( $class, $fallback = null ) {

		if ( is_string( $class ) ) {
			$class = explode( ' ', $class );
		}

		if ( is_array( $class ) && count( $class ) > 0 ) {
			$class = array_map( 'esc_attr', $class );
			return implode( ' ', $class );
		} else {
			return esc_attr( $class, $fallback );
		}

	}
}

/**
 * Sanitize style tag
 */
if ( ! function_exists( 'merge_sanitize_style' ) ) {
	function merge_sanitize_style( $style ) {

		$allowed_html = array(
			'style' => array ()
		);
		return wp_kses( $style, $allowed_html );

	}
}

/**
 * Get trimmed content
 */
if ( ! function_exists( 'merge_get_trimmed_content' ) ) {
	function merge_get_trimmed_content( $max_words = 18 ) {

		global $post;

		$content = $post->post_excerpt != '' ? $post->post_excerpt : $post->post_content;
		$content = preg_replace( '~(?:\[/?)[^/\]]+/?\]~s', '', $content );
		$content = strip_tags( $content );
		$content = strip_shortcodes( $content );
		$words = explode( ' ', $content, $max_words + 1 );
		if ( count( $words ) > $max_words ) {
			array_pop( $words );
			array_push( $words, '...', '' );
		}
		$content = implode( ' ', $words );
		$content = esc_html( $content );

		return apply_filters( 'merge/get_trimmed_content', $content );

	}
}

/**
 * Get page pagination
 */
if ( ! function_exists( 'merge_get_page_pagination' ) ) {
	function merge_get_page_pagination( $query = null, $paginated = 'numeric' ) {

		if ( $query == null ) {
			global $wp_query;
			$query = $wp_query;
		}

		$page = $query->query_vars[ 'paged' ];
		$pages = $query->max_num_pages;
		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );

		if ( $page == 0 ) {
			$page = 1;
		}

		if ( $paginated == 'none' || $pages <= 1 ) {
			return;
		}

		$class = 'vlt-pagination';
		$class .= ' vlt-pagination--' . $paginated;

		$output = '<nav class="' . merge_sanitize_class( $class ) . '">';

		if ( $pages > 1 ) {

			if ( $paginated == 'paged' ) {

				if ( $page - 1 >= 1 ) {
					$output .= '<a class="prev" href="' . get_pagenum_link( $page - 1 ) . '"><div class="circle"><div class="fill"></div><div class="overflow-hidden"><div class="icon">' . merge_get_icon( 'arrow-left' ) . merge_get_icon( 'arrow-left' ) . '</div></div></div><span>' . esc_html__( 'Prev Page', 'merge' ) . '</span></a>';
				}

				if ( $page + 1 <= $pages ) {
					$output .= '<a class="next" href="' . get_pagenum_link( $page + 1 ) . '"><span>' . esc_html__( 'Next Page', 'merge' ) . '</span><div class="circle"><div class="fill"></div><div class="overflow-hidden"><div class="icon">' . merge_get_icon( 'arrow-right' ) . merge_get_icon( 'arrow-right' ) . '</div></div></div></a>';
				}

			}

			if ( $paginated == 'numeric' ) {

				$numeric_links = paginate_links( array(
					'type' => 'array',
					'foramt' => '',
					'add_args' => '',
					'current' => $paged,
					'total' => $pages,
					'prev_text' => '<div class="overflow-hidden"><div class="icon">' . merge_get_icon( 'arrow-left' ) . merge_get_icon( 'arrow-left' ) . '</div></div>',
					'next_text' => '<div class="overflow-hidden"><div class="icon">' . merge_get_icon( 'arrow-right' ) . merge_get_icon( 'arrow-right' ) . '</div></div>',
					'end_size' => 3,
					'mid_size' => 3,
				) );

				$paterns = ['/\>1\<\//', '/\>2\<\//','/\>3\<\//','/\>4\<\//','/\>5\<\//','/\>6\<\//', '/\>7\<\//','/\>8\<\//','/\>9\<\//'];
				$replacements = ['>01</', '>02</', '>03</', '>04</', '>05</', '>06</','>07</', '>08</', '>09</'];
				$numeric_links = preg_replace( $paterns, $replacements, $numeric_links );

				$output .= '<ul>';
				if ( is_array( $numeric_links ) ) {
					foreach ( $numeric_links as $numeric_link ) {
						$output .= '<li>' . $numeric_link . '</li>';
					}
				}
				$output .= '</ul>';

			}

		}

		$output .= '</nav>';

		return apply_filters( 'merge/get_page_pagination', $output );

	}
}

/**
 * Get post taxonomy
 */
if ( ! function_exists( 'merge_get_post_taxonomy' ) ) {
	function merge_get_post_taxonomy( $post_id, $taxonomy, $delimiter = ', ', $get = 'name', $link = true, $max_count = 2 ) {

		$tags = wp_get_post_terms( $post_id, $taxonomy );
		$list = '';
		$count = 0;

		foreach ( $tags as $tag ) {
			$count++;
			if ( $link ) {
				$list .= '<a href="' . get_category_link( $tag->term_id ) . '" class="vlt-category-item">' . merge_get_icon( 'star-fill' ) . '<span>' . $tag->$get . '</span></a>' . $delimiter;
			} else {
				$list .= $tag->$get . $delimiter;
			}
			if ( $count > $max_count - 1 ) {
				break;
			}
		}

		return substr( $list, 0, strlen( $delimiter ) * ( -1 ) );

	}
}

/**
 * Callback for custom comment
 */
if ( ! function_exists( 'merge_callback_custom_comment' ) ) {
	function merge_callback_custom_comment( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment;
		global $post;

		?>

		<li <?php comment_class( 'vlt-comment-item' ); ?>>

			<div class="vlt-comment-item__inner" id="comment-<?php comment_ID(); ?>">

				<?php if ( 0 != $args['avatar_size'] && get_avatar( $comment ) ) : ?>
					<a class="vlt-comment-avatar" href="<?php echo get_comment_author_url(); ?>"><?php echo get_avatar( $comment, $args['avatar_size'], '', '', array( 'extra_attr' => 'loading=lazy' ) ); ?></a>
					<!-- /.vlt-comment-avatar -->
				<?php endif; ?>

				<div class="vlt-comment-content">

					<div class="vlt-comment-header">

						<h5 class="vlt-comment-name"><?php comment_author(); ?></h5>

						<div class="vlt-comment-metas">

							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">

								<time datetime="<?php comment_time( 'c' ); ?>">

									<?php echo get_comment_date(); ?>

								</time>

							</a>

						</div>

					</div>
					<!-- /.vlt-comment-header -->

					<div class="vlt-comment-text vlt-content-markup">

						<?php comment_text(); ?>

						<?php if ( '0' == $comment->comment_approved ): ?>

							<p><?php esc_html_e( 'Your comment is awaiting moderation.', 'merge' ); ?></p>

						<?php endif; ?>

						<?php
							comment_reply_link( array_merge( $args, array(
								'depth' => $depth,
								'max_depth' => $args['max_depth'],
							) ) );
						?>

					</div>
					<!-- /.vlt-comment-text -->

				</div>
				<!-- /.vlt-comment-content -->

			</div>
			<!-- /.vlt-comment-item__inner -->

		<!-- </li> is added by WordPress automatically -->
		<?php
	}
}

/**
 * Get comment navigation
 */
if ( ! function_exists( 'merge_get_comment_navigation' ) ) {
	function merge_get_comment_navigation() {

		$output = '';

		if ( get_comment_pages_count() > 1 ) :

			$output .= '<nav class="vlt-comments-navigation">';
			if ( get_previous_comments_link() ) {
				$output .= get_previous_comments_link( esc_html__( 'Prev Page', 'merge' ) );
			}
			if ( get_next_comments_link() ) {
				$output .= get_next_comments_link( esc_html__( 'Next Page', 'merge' ) );
			}
			$output .= '</nav>';

		endif;

		return apply_filters( 'merge/get_comment_navigation', $output );

	}
}

/**
 * Get single post/work navigation
 */
if ( ! function_exists( 'merge_get_post_navigation' ) ) {
	function merge_get_post_navigation( $style = 'style-1', $post_type = 'post' ) {

		$navClass = 'vlt-page-navigation';
		$navClass .= ' vlt-page-navigation--' . $style;

		$nextPost = get_adjacent_post( false, '', true );
		$prevPost = get_adjacent_post( false, '', false );

		$allPosts = get_posts('post_type=' . $post_type . '&numberposts=-1');

		if ( ! $nextPost && ! $prevPost ) {
			return;
		}

		$allLinkID = false;
		$imageSize = 'merge-800x790_crop';

		if ( $post_type == 'post' ) {

			$allLinkID = merge_get_theme_mod( 'blog_link' );
			$textLink = [
				esc_html__( 'Prev post', 'merge' ),
				esc_html__( 'Next post', 'merge' ),
				esc_html__( 'All posts', 'merge' )
			];

		} else {

			$allLinkID = merge_get_theme_mod( 'portfolio_link' );
			$textLink = [
				esc_html__( 'Prev project', 'merge' ),
				esc_html__( 'Next project', 'merge' ),
				esc_html__( 'All projects', 'merge' )
			];

		}

		$output = '<nav class="' . merge_sanitize_class( $navClass ) . '">';

		switch( $style ) {

			case 'style-1':

				$output .= '<div class="container">';

					$output .= '<div class="row align-items-center">';

						$output .= '<div class="d-flex col">';

						if ( ! empty( $prevPost ) ) {
							$output .= '<div class="prev"><a href="' . get_permalink( $prevPost->ID ) . '" data-tooltip-size="200x160" data-tooltip-image="' . get_the_post_thumbnail_url( $prevPost->ID, $imageSize ) . '" data-cursor="eye"><div class="overflow-hidden"><div class="icon">' . merge_get_icon( 'arrow-left' ) . merge_get_icon( 'arrow-left' ) . '</div></div><span>' . $textLink[0] . '</span></a></div>';
						} else {
							$output .= '<div class="prev"><a href="' . get_permalink( end( $allPosts )->ID ) . '" data-tooltip-size="200x160" data-tooltip-image="' . get_the_post_thumbnail_url( end( $allPosts )->ID, $imageSize ) . '" data-cursor="eye"><div class="overflow-hidden"><div class="icon">' . merge_get_icon( 'arrow-left' ) . merge_get_icon( 'arrow-left' ) . '</div></div><span>' . $textLink[0] . '</span></a></div>';
						}

						$output .= '</div>';

						$output .= '<div class="d-flex justify-content-center col">';
						if ( $allLinkID ) {
							$output .= '<div class="all"><a href="' . get_permalink( $allLinkID ) . '" data-tippy-content="' . $textLink[2] . '" data-tippy-placement="top"><span class="grid"><span></span><span></span><span></span><span></span></span></a></div>';
						} else {
							$output .= '<div class="all"><a href="#" class="btn-go-back"><span class="grid"><span></span><span></span><span></span><span></span></span></a></div>';
						}
						$output .= '</div>';

						$output .= '<div class="d-flex justify-content-end col">';
						if ( ! empty( $nextPost ) ) {
							$output .= '<div class="next"><a href="' . get_permalink( $nextPost->ID ) . '"data-tooltip-size="200x160" data-tooltip-image="' . get_the_post_thumbnail_url( $nextPost->ID, $imageSize ) . '" data-cursor="eye"><span>' . $textLink[1] . '</span><div class="overflow-hidden"><div class="icon">' . merge_get_icon( 'arrow-right' ) . merge_get_icon( 'arrow-right' ) . '</div></div></a></div>';
						} else {
							$output .= '<div class="next"><a href="' . get_permalink( $allPosts[0]->ID ) . '" data-tooltip-size="200x160" data-tooltip-image="' . get_the_post_thumbnail_url( $allPosts[0]->ID, $imageSize ) . '" data-cursor="eye"><span>' . $textLink[1] . '</span><div class="overflow-hidden"><div class="icon">' . merge_get_icon( 'arrow-right' ) . merge_get_icon( 'arrow-right' ) . '</div></div></a></div>';
						}
						$output .= '</div>';

					$output .= '</div>';

				$output .= '</div>';

			break;

			case 'style-2':

				$output .= '<div class="container">';

					$output .= '<div class="row align-items-stretch g-0">';

						$output .= '<div class="col-5">';

							if ( ! empty( $prevPost ) ) {
								$output .= '<div class="prev"><span class="label">' . $textLink[0] . '</span><h4><a href="' . get_permalink( $prevPost->ID ) . '" data-tooltip-size="200x160" data-tooltip-image="' . get_the_post_thumbnail_url( $prevPost->ID, $imageSize ) . '" data-cursor="eye">' . wp_trim_words( get_the_title( $prevPost->ID ), 4, '...' ) . '</a></h4></div>';
							} else {
								$output .= '<div class="prev"><span class="label">' . $textLink[0] . '</span><h4><a href="' . get_permalink( end( $allPosts )->ID ) . '" data-tooltip-size="200x160" data-tooltip-image="' . get_the_post_thumbnail_url( end( $allPosts )->ID, $imageSize ) . '" data-cursor="eye">' . wp_trim_words( get_the_title( end( $allPosts )->ID ), 4, '...' ) . '</a></h4></div>';
							}

						$output .= '</div>';

						$output .= '<div class="col-2 d-flex align-items-center justify-content-center">';

							if ( $allLinkID ) {

								$output .= '<div class="all">';
								$output .= '<a href="' . get_permalink( $allLinkID ) . '" data-tippy-content="' . $textLink[2] . '" data-tippy-placement="top"><span class="grid"><span></span><span></span><span></span><span></span></span></a>';
								$output .= '</div>';

							} else {
								$output .= '<div class="all"><a href="#" class="btn-go-back"><span class="grid"><span></span><span></span><span></span><span></span></span></a></div>';
							}

						$output .= '</div>';

						$output .= '<div class="col-5">';

							if ( ! empty( $nextPost ) ) {
								$output .= '<div class="next"><span class="label">' . $textLink[1] . '</span><h4><a href="' . get_permalink( $nextPost->ID ) . '" data-tooltip-size="200x160" data-tooltip-image="' . get_the_post_thumbnail_url( $nextPost->ID, $imageSize ) . '" data-cursor="eye">' . wp_trim_words( get_the_title( $nextPost->ID ), 4, '...' ) . '</a></h4></div>';
							} else {
								$output .= '<div class="next"><span class="label">' . $textLink[1] . '</span><h4><a href="' . get_permalink( $allPosts[0]->ID ) . '" data-tooltip-size="200x160" data-tooltip-image="' . get_the_post_thumbnail_url( $allPosts[0]->ID, $imageSize ) . '" data-cursor="eye">' . wp_trim_words( get_the_title( $allPosts[0]->ID ), 4, '...' ) . '</a></h4></div>';
							}

						$output .= '</div>';

					$output .= '</div>';

				$output .= '</div>';

			break;

		}

		$output .= '</nav>';

		return apply_filters( 'merge/get_post_navigation', $output );

	}
}

/**
 * Render elementor template
 */
if ( ! function_exists( 'merge_render_elementor_template' ) ) {
	function merge_render_elementor_template( $template ) {

		if ( ! $template ) {
			return;
		}

		if ( 'publish' !== get_post_status( $template ) ) {
			return;
		}

		$new_frontend = new Elementor\Frontend;
		return $new_frontend->get_builder_content_for_display( $template, false );

	}
}

/**
 * Reading time
 */
if ( ! function_exists( 'merge_get_reading_time' ) ) {
	function merge_get_reading_time() {
		global $post;
		$wpm = 200;
		$words = str_word_count( strip_tags( $post->post_content ) );
		$minutes = floor( $words / $wpm );
		if ( 1 <= $minutes ) {
			$output = $minutes . esc_html__( ' min read', 'merge' );
		} else {
			$output = esc_html__( '1 min read', 'merge' );
		}
		return apply_filters( 'merge/get_reading_time', $output );
	}
}

/**
 * Post views
 */
if ( ! function_exists( 'merge_set_post_views' ) ) {
	function merge_set_post_views( $postID ) {

		$count_key = 'views';
		$count = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			$count = 0;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
		} else {
			$count++;
			update_post_meta( $postID, $count_key, $count );
		}

	}
}
add_action( 'wp_head', 'merge_track_post_views' );

if ( ! function_exists( 'merge_track_post_views' ) ) {
	function merge_track_post_views( $postID ) {

		if ( !is_single() ) {
			return;
		}
		if ( empty( $postID ) ) {
			global $post;
			$postID = $post->ID;
		}
		merge_set_post_views( $postID );

	}
}

if ( ! function_exists( 'merge_get_post_views' ) ) {
	function merge_get_post_views( $postID ) {

		$count_key = 'views';
		$count = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
			return '0';
		}
		return $count;

	}
}

/*
 * Get the Vimeo/YouTube Video ID from a URL
 */
if ( ! function_exists( 'merge_parse_video_id' ) ) {
	function merge_parse_video_id( $url ) {

		$vendors = [
			[
				'vendor' => 'youtube',
				'pattern' => '/(https?:\/\/)?(www.)?(youtube\.com|youtu\.be|youtube-nocookie\.com)\/(?:embed\/|v\/|watch\?v=|watch\?list=(.*)&v=|watch\?(.*[^&]&)v=)?((\w|-){11})(&list=(\w+)&?)?/',
				'patternIndex' => 6
			],
			[
				'vendor' => 'vimeo',
				'pattern' => '/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/',
				'patternIndex' => 3
			]
		];

		foreach ( $vendors as $vendor ) {

			$video_id = false;

			if ( preg_match( $vendor[ 'pattern' ], $url, $matches ) ) {
				$video_id = $matches[ $vendor[ 'patternIndex' ] ];
			}

			if ( $video_id ) {
				$video_data = [$vendor[ 'vendor' ], $video_id ];
				return $video_data;
			}

		}

		return [ 'custom', $url ];

	}
}

/*
 * Check is elementor post/page
 */
if ( ! function_exists( 'merge_check_is_elementor' ) ) {
	function merge_check_is_elementor() {
		global $post;
		return \Elementor\Plugin::$instance->documents->get( $post->ID )->is_built_with_elementor();
	}
}

/**
 * Get icon
 */
if ( ! function_exists( 'merge_get_icon' ) ) {
	function merge_get_icon( $icon, $class = '' ) {
		$icons = [
			'star-outline' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 18 19"><path fill="currentColor" fill-rule="evenodd" d="M8.174 4.29A9.07 9.07 0 0 0 9 .5v.1c0 1.324.287 2.57.8 3.688a8.962 8.962 0 0 0 4.403 4.384A9.074 9.074 0 0 0 18 9.5a9.29 9.29 0 0 0-3.804.795 8.685 8.685 0 0 0-4.4 4.397A9.288 9.288 0 0 0 9 18.5c0-1.36-.296-2.646-.828-3.798A8.954 8.954 0 0 0 .1 9.5L0 9.5h.1a8.801 8.801 0 0 0 3.692-.803A8.962 8.962 0 0 0 8.174 4.29Zm.815 1.664a10.477 10.477 0 0 0 3.534 3.52 10.174 10.174 0 0 0-3.548 3.549 10.466 10.466 0 0 0-3.52-3.512 10.478 10.478 0 0 0 3.534-3.557Z" clip-rule="evenodd"/></svg>',
			'star-fill' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 14 15"><path fill="currentColor" d="M7 .578V.5c0 3.811-3.033 7-6.922 7H0c3.889 0 7 3.111 7 7 0-3.967 3.033-7 7-7-3.811 0-7-3.033-7-6.922Z"/></svg>',
			'star' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 100 100"><path fill="currentColor" d="M46.572 8.28c0-1.596 1.724-3.193 5.173-4.789 3.63-1.596 7.26-2.66 10.89-3.192 3.63-.532 5.263-.354 4.9.532L48.75 42.33c-.182.532-.726.798-1.633.798-.726 0-1.09-.266-1.09-.798l.545-34.05ZM6.824 36.21c-2.178-.709-3.267-4.433-3.267-11.172 0-3.015.273-5.675.817-7.98.545-2.483 1.089-3.458 1.634-2.926l34.847 30.591c.544.177.635.71.272 1.596-.363.71-.726.975-1.089.798L6.824 36.211Zm46.01 13.035c-.363 0-.726-.354-1.09-1.064-.18-.886-.09-1.419.273-1.596l33.486-10.108c1.633-.532 3.72.62 6.262 3.458 2.722 2.837 4.9 5.852 6.534 9.044 1.814 3.192 2.177 4.788 1.088 4.788l-46.553-4.522ZM21.798 81.167c-.545.709-1.724 1.064-3.54 1.064-2.177 0-4.9-.444-8.167-1.33-3.085-1.065-5.717-2.129-7.895-3.193C.2 76.467-.436 75.668.29 75.314l40.293-22.877.544-.266c.363 0 .726.266 1.09.798.544.532.725.887.544 1.064L21.798 81.166Zm26.135-26.07c-.181-.354.091-.798.817-1.33.726-.709 1.18-.886 1.361-.532L70.53 81.433c.907 1.24.362 3.546-1.634 6.916a43.765 43.765 0 0 1-7.078 9.044c-2.541 2.483-3.902 3.192-4.084 2.128l-9.8-44.424Z"/></svg>',
			'arrow-left' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 14 14"><path fill="currentColor" fill-rule="evenodd" d="M6.07 13.387v.176h-1v-.176c0-3.466-2.36-6.103-5.07-6.103V6.282h.142c2.649-.09 4.927-2.7 4.927-6.106V0h1v.176c0 2.559-1.17 4.853-2.955 6.106h10.712v1H3.11c1.787 1.25 2.96 3.544 2.96 6.105Z" clip-rule="evenodd"/></svg>',
			'arrow-right' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 14 14"><path fill="currentColor" fill-rule="evenodd" d="M7.757.176V0h1v.176c0 3.466 2.36 6.103 5.069 6.103v1.003h-.142c-2.649.09-4.927 2.699-4.927 6.105v.176h-1v-.176c0-2.559 1.17-4.852 2.956-6.105H0v-1h10.718C8.93 5.03 7.757 2.738 7.757.176Z" clip-rule="evenodd"/></svg>',
			'arrow-down' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 14 14"><path fill="currentColor" fill-rule="evenodd" d="M13.824 7.757H14v1h-.176c-3.466 0-6.103 2.36-6.103 5.069H6.718v-.142c-.09-2.649-2.699-4.927-6.105-4.927H.437v-1h.176c2.559 0 4.852 1.17 6.105 2.956V0h1v10.718c1.252-1.788 3.544-2.961 6.106-2.961Z" clip-rule="evenodd"/></svg>',
			'plus' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 34 34"><path fill="currentColor" fill-rule="evenodd" d="M16 0h1.5v16h16v1.5h-16v16H16v-16H0V16h16V0Z" clip-rule="evenodd"/></svg>',
			'dot' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 2 3"><path fill="currentColor" d="M.154 1.418a.15.15 0 0 1-.001-.212L.937.414a.15.15 0 0 1 .213 0l.79.79a.15.15 0 0 1-.001.213l-.79.778a.15.15 0 0 1-.211 0l-.784-.778Z"/></svg>',
			'copy' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 18 22"><path fill="currentColor" fill-rule="evenodd" d="M6 1.75a.25.25 0 0 0-.25.25v2c0 .138.112.25.25.25h6a.25.25 0 0 0 .25-.25V2a.25.25 0 0 0-.25-.25H6Zm7.75.5V2A1.75 1.75 0 0 0 12 .25H6A1.75 1.75 0 0 0 4.25 2v.25H3A2.75 2.75 0 0 0 .25 5v14A2.75 2.75 0 0 0 3 21.75h12A2.75 2.75 0 0 0 17.75 19V5A2.75 2.75 0 0 0 15 2.25h-1.25Zm0 1.5V4A1.75 1.75 0 0 1 12 5.75H6A1.75 1.75 0 0 1 4.25 4v-.25H3A1.25 1.25 0 0 0 1.75 5v14A1.25 1.25 0 0 0 3 20.25h12A1.25 1.25 0 0 0 16.25 19V5A1.25 1.25 0 0 0 15 3.75h-1.25Z" clip-rule="evenodd"/></svg>',
			'eye' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 28 15"><path fill="currentColor" fill-rule="evenodd" d="M1.27 7.25c.144.172.36.418.644.714.575.599 1.43 1.4 2.547 2.2 2.232 1.6 5.494 3.192 9.64 3.192 4.146 0 7.408-1.591 9.64-3.192 1.117-.8 1.972-1.601 2.547-2.2.285-.296.5-.542.644-.714-.144-.172-.36-.418-.644-.714a18.544 18.544 0 0 0-2.546-2.2c-2.233-1.6-5.495-3.192-9.64-3.192-4.147 0-7.409 1.591-9.641 3.193-1.117.8-1.972 1.6-2.547 2.199-.285.296-.5.542-.644.714Zm26.235 0 .359-.267-.002-.002-.003-.005-.013-.016a9.605 9.605 0 0 0-.224-.278c-.156-.187-.387-.45-.69-.765a19.435 19.435 0 0 0-2.67-2.307C21.926 1.935 18.485.25 14.102.25 9.716.25 6.276 1.935 3.94 3.61a19.44 19.44 0 0 0-2.67 2.307 15.135 15.135 0 0 0-.867.983l-.047.06-.012.016-.004.005-.001.001v.001l.358.267-.359-.267a.447.447 0 0 0 0 .534l.359-.267-.358.267.001.002.004.005.012.016.047.06a15.136 15.136 0 0 0 .867.984 19.44 19.44 0 0 0 2.67 2.306c2.337 1.675 5.777 3.36 10.161 3.36 4.384 0 7.825-1.685 10.161-3.36a19.436 19.436 0 0 0 2.67-2.307A15.123 15.123 0 0 0 27.8 7.6l.046-.06.012-.016.004-.005.001-.001v-.001l-.358-.267Zm0 0 .359.267a.447.447 0 0 0 0-.534l-.359.267ZM14.4 4.122a3.128 3.128 0 1 0 0 6.256 3.128 3.128 0 0 0 0-6.256ZM10.378 7.25a4.021 4.021 0 1 1 8.042 0 4.021 4.021 0 0 1-8.042 0Z" clip-rule="evenodd"/></svg>',
			'hash' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 18 20"><path fill="currentColor" fill-rule="evenodd" d="M7.828.338 7.171 6.25h4.491l.675-6.078 1.491.166-.657 5.912h4.579v1.5h-4.745l-.5 4.5h5.245v1.5h-5.412l-.675 6.078-1.491-.165.657-5.913H6.338l-.675 6.078-1.491-.165.657-5.913H.25v-1.5h4.745l.5-4.5H.25v-1.5h5.412L6.337.172l1.491.166ZM7.005 7.75l-.5 4.5h4.49l.5-4.5h-4.49Z" clip-rule="evenodd"/></svg>',
			'search' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 21 21"><path fill="currentColor" fill-rule="evenodd" d="M8.984 2.052a7.25 7.25 0 1 0 4.854 12.636l.532-.532A7.25 7.25 0 0 0 8.984 2.052Zm6.695 12.885a8.75 8.75 0 1 0-1.06 1.06l4.365 4.366 1.061-1.06-4.366-4.366Z" clip-rule="evenodd"/></svg>',
			'maximize' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 21 20"><path fill="currentColor" fill-rule="evenodd" d="M1.733 1.018A2.75 2.75 0 0 1 3.678.212h3.75v1.5h-3.75a1.25 1.25 0 0 0-1.25 1.25v3.75h-1.5v-3.75c0-.73.29-1.429.805-1.944ZM13.928.212h3.75a2.75 2.75 0 0 1 2.75 2.75v3.75h-1.5v-3.75a1.25 1.25 0 0 0-1.25-1.25h-3.75v-1.5Zm-11.5 13v3.75a1.25 1.25 0 0 0 1.25 1.25h3.75v1.5h-3.75a2.75 2.75 0 0 1-2.75-2.75v-3.75h1.5Zm18 0v3.75a2.75 2.75 0 0 1-2.75 2.75h-3.75v-1.5h3.75a1.25 1.25 0 0 0 1.25-1.25v-3.75h1.5Z" clip-rule="evenodd"/></svg>',
			'minimize' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 20 20"><path fill="currentColor" fill-rule="evenodd" d="M6.75.25V4A2.75 2.75 0 0 1 4 6.75H.25v-1.5H4A1.25 1.25 0 0 0 5.25 4V.25h1.5Zm8 0V4A1.25 1.25 0 0 0 16 5.25h3.75v1.5H16A2.75 2.75 0 0 1 13.25 4V.25h1.5Zm-14.5 13H4A2.75 2.75 0 0 1 6.75 16v3.75h-1.5V16A1.25 1.25 0 0 0 4 14.75H.25v-1.5ZM16 14.75A1.25 1.25 0 0 0 14.75 16v3.75h-1.5V16A2.75 2.75 0 0 1 16 13.25h3.75v1.5H16Z" clip-rule="evenodd"/></svg>',
			'close' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 26 26"><path fill="currentColor" fill-rule="evenodd" d="m24.314.272 1.06 1.06-11.313 11.314L25.375 23.96l-1.06 1.06L13 13.708 1.687 25.021.626 23.96 11.94 12.646.626 1.332l1.06-1.06L13 11.585 24.314.272Z" clip-rule="evenodd"/></svg>',
			'play' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 8 10"><path fill="currentColor" d="m0 0 8 5-8 5V0Z"/></svg>',
			'circle-highlight' => '<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" fill="none" class="' . $class . '" viewBox="0 0 183 77"><path stroke-width="1.5" d="M179.715 44.792c-26.68 21.9-150.678 24.638-172.36 2.737C-19.75 20.154 43.775-2.842 123.39 1.538 203.006 5.918 213.17 46.434 80.195 76"/></svg>',
			'wave-highlight' => '<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" fill="none" class="' . $class . '" viewBox="0 0 262 7"><path stroke-linecap="round" stroke-width="1.5" d="m1 5.014 3.484-3.23C5.641.71 7.222.742 8.351 1.861l3.303 3.274c1.133 1.123 2.719 1.152 3.877.07L19.172 1.8c1.158-1.082 2.744-1.053 3.877.07l3.241 3.213c1.158 1.148 2.786 1.15 3.945.004l3.22-3.18C34.616.76 36.243.762 37.4 1.91l3.254 3.225c1.133 1.123 2.72 1.152 3.877.07l3.645-3.408c1.157-1.08 2.742-1.053 3.875.068l3.253 3.22c1.158 1.146 2.786 1.146 3.944 0l3.198-3.165c1.158-1.147 2.786-1.147 3.945 0l3.252 3.219c1.133 1.121 2.718 1.149 3.875.067l3.36-3.14c1.287-1.203 3.077-1.02 4.193.427l1.523 1.974c1.132 1.466 2.95 1.632 4.236.387L89.8 1.98m-3.2 3.034 3.484-3.23c1.157-1.074 2.738-1.041 3.867.078l3.303 3.274c1.132 1.123 2.719 1.152 3.876.07l3.643-3.406c1.158-1.082 2.744-1.053 3.877.07l3.241 3.213c1.158 1.148 2.786 1.15 3.945.004l3.22-3.18C120.215.76 121.843.762 123 1.91l3.254 3.225c1.133 1.123 2.719 1.152 3.877.07l3.645-3.408c1.157-1.08 2.742-1.053 3.875.068l3.253 3.22c1.158 1.146 2.786 1.146 3.944 0l3.198-3.165c1.158-1.147 2.786-1.147 3.945 0l3.252 3.219c1.133 1.121 2.718 1.149 3.875.067l3.361-3.14c1.286-1.203 3.076-1.02 4.192.427l1.523 1.974c1.132 1.466 2.95 1.632 4.236.387l2.97-2.875m-3.2 3.034 3.484-3.23c1.157-1.074 2.738-1.041 3.867.078l3.303 3.274c1.132 1.123 2.719 1.152 3.876.07l3.643-3.406c1.158-1.082 2.744-1.053 3.877.07l3.241 3.213c1.158 1.148 2.786 1.15 3.945.004l3.22-3.18c1.159-1.146 2.787-1.144 3.944.004l3.254 3.225c1.133 1.123 2.719 1.152 3.877.07l3.645-3.408c1.157-1.08 2.742-1.053 3.875.068l3.253 3.22c1.158 1.146 2.786 1.146 3.944 0l3.198-3.165c1.158-1.147 2.786-1.147 3.945 0l3.252 3.219c1.133 1.121 2.718 1.149 3.875.067l3.361-3.14c1.286-1.203 3.076-1.02 4.192.427l1.523 1.974c1.132 1.466 2.95 1.632 4.236.387L261 1.98"/></svg>',
			'mail' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 18 18"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.2 5.8v4a2.4 2.4 0 0 0 4.8 0V9a8 8 0 1 0-3.136 6.351M12.2 9a3.2 3.2 0 1 1-6.4 0 3.2 3.2 0 0 1 6.4 0Z"/></svg>',
			'phone' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 18 18"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.968 12.98v2.408a1.605 1.605 0 0 1-1.75 1.606 15.89 15.89 0 0 1-6.93-2.465A15.657 15.657 0 0 1 3.472 9.71a15.89 15.89 0 0 1-2.464-6.96A1.606 1.606 0 0 1 2.604 1h2.409a1.606 1.606 0 0 1 1.606 1.38c.101.77.29 1.528.562 2.256a1.606 1.606 0 0 1-.362 1.694L5.8 7.351a12.847 12.847 0 0 0 4.818 4.817l1.02-1.02a1.606 1.606 0 0 1 1.694-.36c.728.271 1.485.46 2.256.561a1.606 1.606 0 0 1 1.38 1.63Z"/></svg>',
			'quote' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 71 70"><path fill="currentColor" d="M.726 70a7.262 7.262 0 0 1-.707-2.121c-.043-11.202 0-22.403 0-33.604 1.004-.739 1.97-1.53 2.892-2.369 9.744-9.702 19.472-19.418 29.184-29.148.778-.778 1.62-1.485 3.02-2.758v34.996L69.834.226c.092.877.184 1.287.184 1.705 0 10.366.078 20.74-.085 31.114a6.774 6.774 0 0 1-1.994 4.087c-9.886 10.084-19.913 19.984-29.813 29.976-.84.922-1.63 1.888-2.37 2.892h-.706V35.35c-1.075.955-1.599 1.372-2.072 1.846A31681.594 31681.594 0 0 0 2.126 68.062c-.52.606-.988 1.254-1.4 1.938Z"/></svg>',
			'check' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="' . $class . '" viewBox="0 0 10 8"><path fill="currentColor" fill-rule="evenodd" d="M9.393 1.454 3.75 7.61.607 4.181l1.106-1.013L3.75 5.39 8.288.44l1.105 1.014Z" clip-rule="evenodd"/></svg>'
		];
		if ( isset( $icons[ $icon ] ) ) {
			return $icons[ $icon ];
		}
		return;
	}
}