<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

/**
* Theme path image
*/
$theme_path_images = MERGE_THEME_DIRECTORY . 'assets/img/';

/**
 * Wrapper for Kirki
 */
if ( ! class_exists( 'VLT_Options' ) ) {
	class VLT_Options {

		private static $default_options = array();

		public static function add_config( $args ) {
			if ( class_exists( 'Kirki' ) && isset( $args ) && is_array( $args ) ) {
				Kirki::add_config( 'merge_customize', $args );
			}
		}

		public static function add_panel( $name, $args ) {
			if ( class_exists( 'Kirki' ) && isset( $args ) && is_array( $args ) ) {
				Kirki::add_panel( $name, $args );
			}
		}

		public static function add_section( $name, $args ) {
			if ( class_exists( 'Kirki' ) && isset( $args ) && is_array( $args ) ) {
				Kirki::add_section( $name, $args );
			}
		}

		public static function add_field( $args ) {
			if ( isset( $args ) && is_array( $args ) ) {
				if ( class_exists( 'Kirki' ) ) {
					Kirki::add_field( 'merge_customize', $args );
				}
				if ( isset( $args['settings'] ) && isset( $args['default'] ) ) {
					self::$default_options[$args['settings']] = $args['default'];
				}
			}
		}

		public static function get_option( $name, $default = null ) {
			$value = get_theme_mod( $name, null );

			if ( $value === null ) {
				$value = isset( self::$default_options[$name] ) ? self::$default_options[$name] : null;
			}

			if ( $value === null ) {
				$value = $default;
			}

			return $value;
		}

	}
}

/**
 * Custom get_theme_mod
 */
if ( ! function_exists( 'merge_get_theme_mod' ) ) {
	function merge_get_theme_mod( $name = null, $use_acf = null, $postID = null, $acf_name = null ) {

		$value = null;

		if ( $name == null ) {
			return $value;
		}

		// try get value from meta box
		if ( $use_acf ) {
			$value = merge_get_field( $acf_name ? $acf_name : $name, $postID );
		}

		// get value from options
		if ( $value == null ) {
			if ( class_exists( 'VLT_Options' ) ) {
				$value = VLT_Options::get_option( $name );
			}
		}

		if ( is_archive() || is_search() || is_404() ) {
			if ( class_exists( 'VLT_Options' ) ) {
				$value = VLT_Options::get_option( $name );
			}
		}

		$value = apply_filters( 'merge/get_theme_mod', $value, $name );

		return $value;

	}
}

/**
 * Fix post ID preview
 * https://support.advancedcustomfields.com/forums/topic/preview-solution/page/3/
 */
if ( ! function_exists( 'merge_fix_post_id_on_preview' ) ) {
	function merge_fix_post_id_on_preview( $null, $post_id ) {
		if ( is_preview() ) {
			return get_the_ID();
		} else {
			return $null;
		}
	}
}
add_filter( 'acf/pre_load_post_id', 'merge_fix_post_id_on_preview', 10, 2 );

/**
 * Get value from acf field
 */
if ( ! function_exists( 'merge_get_field' ) ) {
	function merge_get_field( $name = null, $postID = null ) {

		$value = null;

		// try get value from meta box
		if ( function_exists( 'get_field' ) ) {
			if ( $postID == null ) {
				$postID = get_the_ID();
			}
			$value = get_field( $name, $postID );
		}

		return $value;

	}
}

/**
 * Get social icons
 */
if ( ! function_exists( 'merge_get_social_icons' ) ) {
	function merge_get_social_icons() {
		$social_icons = array(
			'socicon-internet' => esc_html__( 'Internet', 'merge' ),
			'socicon-moddb' => esc_html__( 'Moddb', 'merge' ),
			'socicon-indiedb' => esc_html__( 'Indiedb', 'merge' ),
			'socicon-traxsource' => esc_html__( 'Traxsource', 'merge' ),
			'socicon-gamefor' => esc_html__( 'Gamefor', 'merge' ),
			'socicon-pixiv' => esc_html__( 'Pixiv', 'merge' ),
			'socicon-myanimelist' => esc_html__( 'Myanimelist', 'merge' ),
			'socicon-blackberry' => esc_html__( 'Blackberry', 'merge' ),
			'socicon-wickr' => esc_html__( 'Wickr', 'merge' ),
			'socicon-spip' => esc_html__( 'Spip', 'merge' ),
			'socicon-napster' => esc_html__( 'Napster', 'merge' ),
			'socicon-beatport' => esc_html__( 'Beatport', 'merge' ),
			'socicon-hackerone' => esc_html__( 'Hackerone', 'merge' ),
			'socicon-hackernews' => esc_html__( 'Hackernews', 'merge' ),
			'socicon-smashwords' => esc_html__( 'Smashwords', 'merge' ),
			'socicon-kobo' => esc_html__( 'Kobo', 'merge' ),
			'socicon-bookbub' => esc_html__( 'Bookbub', 'merge' ),
			'socicon-mailru' => esc_html__( 'Mailru', 'merge' ),
			'socicon-gitlab' => esc_html__( 'Gitlab', 'merge' ),
			'socicon-instructables' => esc_html__( 'Instructables', 'merge' ),
			'socicon-portfolio' => esc_html__( 'Portfolio', 'merge' ),
			'socicon-codered' => esc_html__( 'Codered', 'merge' ),
			'socicon-origin' => esc_html__( 'Origin', 'merge' ),
			'socicon-nextdoor' => esc_html__( 'Nextdoor', 'merge' ),
			'socicon-udemy' => esc_html__( 'Udemy', 'merge' ),
			'socicon-livemaster' => esc_html__( 'Livemaster', 'merge' ),
			'socicon-crunchbase' => esc_html__( 'Crunchbase', 'merge' ),
			'socicon-homefy' => esc_html__( 'Homefy', 'merge' ),
			'socicon-calendly' => esc_html__( 'Calendly', 'merge' ),
			'socicon-realtor' => esc_html__( 'Realtor', 'merge' ),
			'socicon-tidal' => esc_html__( 'Tidal', 'merge' ),
			'socicon-qobuz' => esc_html__( 'Qobuz', 'merge' ),
			'socicon-natgeo' => esc_html__( 'Natgeo', 'merge' ),
			'socicon-mastodon' => esc_html__( 'Mastodon', 'merge' ),
			'socicon-unsplash' => esc_html__( 'Unsplash', 'merge' ),
			'socicon-homeadvisor' => esc_html__( 'Homeadvisor', 'merge' ),
			'socicon-angieslist' => esc_html__( 'Angieslist', 'merge' ),
			'socicon-codepen' => esc_html__( 'Codepen', 'merge' ),
			'socicon-slack' => esc_html__( 'Slack', 'merge' ),
			'socicon-openaigym' => esc_html__( 'Openaigym', 'merge' ),
			'socicon-logmein' => esc_html__( 'Logmein', 'merge' ),
			'socicon-mergerr' => esc_html__( 'Mergerr', 'merge' ),
			'socicon-gotomeeting' => esc_html__( 'Gotomeeting', 'merge' ),
			'socicon-aliexpress' => esc_html__( 'Aliexpress', 'merge' ),
			'socicon-guru' => esc_html__( 'Guru', 'merge' ),
			'socicon-appstore' => esc_html__( 'Appstore', 'merge' ),
			'socicon-homes' => esc_html__( 'Homes', 'merge' ),
			'socicon-zoom' => esc_html__( 'Zoom', 'merge' ),
			'socicon-alibaba' => esc_html__( 'Alibaba', 'merge' ),
			'socicon-craigslist' => esc_html__( 'Craigslist', 'merge' ),
			'socicon-wix' => esc_html__( 'Wix', 'merge' ),
			'socicon-redfin' => esc_html__( 'Redfin', 'merge' ),
			'socicon-googlecalendar' => esc_html__( 'Googlecalendar', 'merge' ),
			'socicon-shopify' => esc_html__( 'Shopify', 'merge' ),
			'socicon-freelancer' => esc_html__( 'Freelancer', 'merge' ),
			'socicon-seedrs' => esc_html__( 'Seedrs', 'merge' ),
			'socicon-bing' => esc_html__( 'Bing', 'merge' ),
			'socicon-doodle' => esc_html__( 'Doodle', 'merge' ),
			'socicon-bonanza' => esc_html__( 'Bonanza', 'merge' ),
			'socicon-squarespace' => esc_html__( 'Squarespace', 'merge' ),
			'socicon-toptal' => esc_html__( 'Toptal', 'merge' ),
			'socicon-gust' => esc_html__( 'Gust', 'merge' ),
			'socicon-ask' => esc_html__( 'Ask', 'merge' ),
			'socicon-trulia' => esc_html__( 'Trulia', 'merge' ),
			'socicon-loomly' => esc_html__( 'Loomly', 'merge' ),
			'socicon-ghost' => esc_html__( 'Ghost', 'merge' ),
			'socicon-upwork' => esc_html__( 'Upwork', 'merge' ),
			'socicon-fundable' => esc_html__( 'Fundable', 'merge' ),
			'socicon-booking' => esc_html__( 'Booking', 'merge' ),
			'socicon-googlemaps' => esc_html__( 'Googlemaps', 'merge' ),
			'socicon-zillow' => esc_html__( 'Zillow', 'merge' ),
			'socicon-niconico' => esc_html__( 'Niconico', 'merge' ),
			'socicon-toneden' => esc_html__( 'Toneden', 'merge' ),
			'socicon-augment' => esc_html__( 'Augment', 'merge' ),
			'socicon-bitbucket' => esc_html__( 'Bitbucket', 'merge' ),
			'socicon-fyuse' => esc_html__( 'Fyuse', 'merge' ),
			'socicon-yt-gaming' => esc_html__( 'Yt-gaming', 'merge' ),
			'socicon-sketchfab' => esc_html__( 'Sketchfab', 'merge' ),
			'socicon-mobcrush' => esc_html__( 'Mobcrush', 'merge' ),
			'socicon-microsoft' => esc_html__( 'Microsoft', 'merge' ),
			'socicon-pandora' => esc_html__( 'Pandora', 'merge' ),
			'socicon-messenger' => esc_html__( 'Messenger', 'merge' ),
			'socicon-gamewisp' => esc_html__( 'Gamewisp', 'merge' ),
			'socicon-bloglovin' => esc_html__( 'Bloglovin', 'merge' ),
			'socicon-tunein' => esc_html__( 'Tunein', 'merge' ),
			'socicon-gamejolt' => esc_html__( 'Gamejolt', 'merge' ),
			'socicon-trello' => esc_html__( 'Trello', 'merge' ),
			'socicon-spreadshirt' => esc_html__( 'Spreadshirt', 'merge' ),
			'socicon-500px' => esc_html__( '500px', 'merge' ),
			'socicon-8tracks' => esc_html__( '8tracks', 'merge' ),
			'socicon-airbnb' => esc_html__( 'Airbnb', 'merge' ),
			'socicon-alliance' => esc_html__( 'Alliance', 'merge' ),
			'socicon-amazon' => esc_html__( 'Amazon', 'merge' ),
			'socicon-amplement' => esc_html__( 'Amplement', 'merge' ),
			'socicon-android' => esc_html__( 'Android', 'merge' ),
			'socicon-angellist' => esc_html__( 'Angellist', 'merge' ),
			'socicon-apple' => esc_html__( 'Apple', 'merge' ),
			'socicon-appnet' => esc_html__( 'Appnet', 'merge' ),
			'socicon-baidu' => esc_html__( 'Baidu', 'merge' ),
			'socicon-bandcamp' => esc_html__( 'Bandcamp', 'merge' ),
			'socicon-battlenet' => esc_html__( 'Battlenet', 'merge' ),
			'socicon-mixer' => esc_html__( 'Mixer', 'merge' ),
			'socicon-bebee' => esc_html__( 'Bebee', 'merge' ),
			'socicon-bebo' => esc_html__( 'Bebo', 'merge' ),
			'socicon-behance' => esc_html__( 'Bēhance', 'merge' ),
			'socicon-blizzard' => esc_html__( 'Blizzard', 'merge' ),
			'socicon-blogger' => esc_html__( 'Blogger', 'merge' ),
			'socicon-buffer' => esc_html__( 'Buffer', 'merge' ),
			'socicon-chrome' => esc_html__( 'Chrome', 'merge' ),
			'socicon-coderwall' => esc_html__( 'Coderwall', 'merge' ),
			'socicon-curse' => esc_html__( 'Curse', 'merge' ),
			'socicon-dailymotion' => esc_html__( 'Dailymotion', 'merge' ),
			'socicon-deezer' => esc_html__( 'Deezer', 'merge' ),
			'socicon-delicious' => esc_html__( 'Delicious', 'merge' ),
			'socicon-deviantart' => esc_html__( 'Deviantart', 'merge' ),
			'socicon-diablo' => esc_html__( 'Diablo', 'merge' ),
			'socicon-digg' => esc_html__( 'Digg', 'merge' ),
			'socicon-discord' => esc_html__( 'Discord', 'merge' ),
			'socicon-disqus' => esc_html__( 'Disqus', 'merge' ),
			'socicon-douban' => esc_html__( 'Douban', 'merge' ),
			'socicon-draugiem' => esc_html__( 'Draugiem', 'merge' ),
			'socicon-dribbble' => esc_html__( 'Dribbble', 'merge' ),
			'socicon-drupal' => esc_html__( 'Drupal', 'merge' ),
			'socicon-ebay' => esc_html__( 'Ebay', 'merge' ),
			'socicon-ello' => esc_html__( 'Ello', 'merge' ),
			'socicon-endomodo' => esc_html__( 'Endomodo', 'merge' ),
			'socicon-envato' => esc_html__( 'Envato', 'merge' ),
			'socicon-etsy' => esc_html__( 'Etsy', 'merge' ),
			'socicon-facebook' => esc_html__( 'Facebook', 'merge' ),
			'socicon-feedburner' => esc_html__( 'Feedburner', 'merge' ),
			'socicon-filmweb' => esc_html__( 'Filmweb', 'merge' ),
			'socicon-firefox' => esc_html__( 'Firefox', 'merge' ),
			'socicon-flattr' => esc_html__( 'Flattr', 'merge' ),
			'socicon-flickr' => esc_html__( 'Flickr', 'merge' ),
			'socicon-formulr' => esc_html__( 'Formulr', 'merge' ),
			'socicon-forrst' => esc_html__( 'Forrst', 'merge' ),
			'socicon-foursquare' => esc_html__( 'Foursquare', 'merge' ),
			'socicon-friendfeed' => esc_html__( 'Friendfeed', 'merge' ),
			'socicon-github' => esc_html__( 'Github', 'merge' ),
			'socicon-goodreads' => esc_html__( 'Goodreads', 'merge' ),
			'socicon-google' => esc_html__( 'Google', 'merge' ),
			'socicon-googlescholar' => esc_html__( 'Googlescholar', 'merge' ),
			'socicon-googlegroups' => esc_html__( 'Googlegroups', 'merge' ),
			'socicon-googlephotos' => esc_html__( 'Googlephotos', 'merge' ),
			'socicon-googleplus' => esc_html__( 'Googleplus', 'merge' ),
			'socicon-grooveshark' => esc_html__( 'Grooveshark', 'merge' ),
			'socicon-hackerrank' => esc_html__( 'Hackerrank', 'merge' ),
			'socicon-hearthstone' => esc_html__( 'Hearthstone', 'merge' ),
			'socicon-hellocoton' => esc_html__( 'Hellocoton', 'merge' ),
			'socicon-heroes' => esc_html__( 'Heroes', 'merge' ),
			'socicon-smashcast' => esc_html__( 'Smashcast', 'merge' ),
			'socicon-horde' => esc_html__( 'Horde', 'merge' ),
			'socicon-houzz' => esc_html__( 'Houzz', 'merge' ),
			'socicon-icq' => esc_html__( 'Icq', 'merge' ),
			'socicon-identica' => esc_html__( 'Identica', 'merge' ),
			'socicon-imdb' => esc_html__( 'Imdb', 'merge' ),
			'socicon-instagram' => esc_html__( 'Instagram', 'merge' ),
			'socicon-issuu' => esc_html__( 'Issuu', 'merge' ),
			'socicon-istock' => esc_html__( 'Istock', 'merge' ),
			'socicon-itunes' => esc_html__( 'Itunes', 'merge' ),
			'socicon-keybase' => esc_html__( 'Keybase', 'merge' ),
			'socicon-lanyrd' => esc_html__( 'Lanyrd', 'merge' ),
			'socicon-lastfm' => esc_html__( 'Lastfm', 'merge' ),
			'socicon-line' => esc_html__( 'Line', 'merge' ),
			'socicon-linkedin' => esc_html__( 'Linkedin', 'merge' ),
			'socicon-livejournal' => esc_html__( 'Livejournal', 'merge' ),
			'socicon-lyft' => esc_html__( 'Lyft', 'merge' ),
			'socicon-macos' => esc_html__( 'Macos', 'merge' ),
			'socicon-mail' => esc_html__( 'Mail', 'merge' ),
			'socicon-medium' => esc_html__( 'Medium', 'merge' ),
			'socicon-meetup' => esc_html__( 'Meetup', 'merge' ),
			'socicon-mixcloud' => esc_html__( 'Mixcloud', 'merge' ),
			'socicon-modelmayhem' => esc_html__( 'Modelmayhem', 'merge' ),
			'socicon-mumble' => esc_html__( 'Mumble', 'merge' ),
			'socicon-myspace' => esc_html__( 'Myspace', 'merge' ),
			'socicon-newsvine' => esc_html__( 'Newsvine', 'merge' ),
			'socicon-nintendo' => esc_html__( 'Nintendo', 'merge' ),
			'socicon-npm' => esc_html__( 'Npm', 'merge' ),
			'socicon-odnoklassniki' => esc_html__( 'Odnoklassniki', 'merge' ),
			'socicon-openid' => esc_html__( 'Openid', 'merge' ),
			'socicon-opera' => esc_html__( 'Opera', 'merge' ),
			'socicon-outlook' => esc_html__( 'Outlook', 'merge' ),
			'socicon-overwatch' => esc_html__( 'Overwatch', 'merge' ),
			'socicon-patreon' => esc_html__( 'Patreon', 'merge' ),
			'socicon-paypal' => esc_html__( 'Paypal', 'merge' ),
			'socicon-periscope' => esc_html__( 'Periscope', 'merge' ),
			'socicon-persona' => esc_html__( 'Persona', 'merge' ),
			'socicon-pinterest' => esc_html__( 'Pinterest', 'merge' ),
			'socicon-play' => esc_html__( 'Play', 'merge' ),
			'socicon-player' => esc_html__( 'Player', 'merge' ),
			'socicon-playstation' => esc_html__( 'Playstation', 'merge' ),
			'socicon-pocket' => esc_html__( 'Pocket', 'merge' ),
			'socicon-qq' => esc_html__( 'Qq', 'merge' ),
			'socicon-quora' => esc_html__( 'Quora', 'merge' ),
			'socicon-raidcall' => esc_html__( 'Raidcall', 'merge' ),
			'socicon-ravelry' => esc_html__( 'Ravelry', 'merge' ),
			'socicon-reddit' => esc_html__( 'Reddit', 'merge' ),
			'socicon-renren' => esc_html__( 'Renren', 'merge' ),
			'socicon-researchgate' => esc_html__( 'Researchgate', 'merge' ),
			'socicon-residentadvisor' => esc_html__( 'Residentadvisor', 'merge' ),
			'socicon-reverbnation' => esc_html__( 'Reverbnation', 'merge' ),
			'socicon-rss' => esc_html__( 'Rss', 'merge' ),
			'socicon-sharethis' => esc_html__( 'Sharethis', 'merge' ),
			'socicon-skype' => esc_html__( 'Skype', 'merge' ),
			'socicon-slideshare' => esc_html__( 'Slideshare', 'merge' ),
			'socicon-smugmug' => esc_html__( 'Smugmug', 'merge' ),
			'socicon-snapchat' => esc_html__( 'Snapchat', 'merge' ),
			'socicon-songkick' => esc_html__( 'Songkick', 'merge' ),
			'socicon-soundcloud' => esc_html__( 'Soundcloud', 'merge' ),
			'socicon-spotify' => esc_html__( 'Spotify', 'merge' ),
			'socicon-stackexchange' => esc_html__( 'Stackexchange', 'merge' ),
			'socicon-stackoverflow' => esc_html__( 'Stackoverflow', 'merge' ),
			'socicon-starcraft' => esc_html__( 'Starcraft', 'merge' ),
			'socicon-stayfriends' => esc_html__( 'Stayfriends', 'merge' ),
			'socicon-steam' => esc_html__( 'Steam', 'merge' ),
			'socicon-storehouse' => esc_html__( 'Storehouse', 'merge' ),
			'socicon-strava' => esc_html__( 'Strava', 'merge' ),
			'socicon-streamjar' => esc_html__( 'Streamjar', 'merge' ),
			'socicon-stumbleupon' => esc_html__( 'Stumbleupon', 'merge' ),
			'socicon-swarm' => esc_html__( 'Swarm', 'merge' ),
			'socicon-teamspeak' => esc_html__( 'Teamspeak', 'merge' ),
			'socicon-teamviewer' => esc_html__( 'Teamviewer', 'merge' ),
			'socicon-technorati' => esc_html__( 'Technorati', 'merge' ),
			'socicon-telegram' => esc_html__( 'Telegram', 'merge' ),
			'socicon-tripadvisor' => esc_html__( 'Tripadvisor', 'merge' ),
			'socicon-tripit' => esc_html__( 'Tripit', 'merge' ),
			'socicon-triplej' => esc_html__( 'Triplej', 'merge' ),
			'socicon-tumblr' => esc_html__( 'Tumblr', 'merge' ),
			'socicon-twitch' => esc_html__( 'Twitch', 'merge' ),
			'socicon-twitter' => esc_html__( 'Twitter', 'merge' ),
			'socicon-uber' => esc_html__( 'Uber', 'merge' ),
			'socicon-ventrilo' => esc_html__( 'Ventrilo', 'merge' ),
			'socicon-viadeo' => esc_html__( 'Viadeo', 'merge' ),
			'socicon-viber' => esc_html__( 'Viber', 'merge' ),
			'socicon-viewbug' => esc_html__( 'Viewbug', 'merge' ),
			'socicon-vimeo' => esc_html__( 'Vimeo', 'merge' ),
			'socicon-vine' => esc_html__( 'Vine', 'merge' ),
			'socicon-vkontakte' => esc_html__( 'Vkontakte', 'merge' ),
			'socicon-warcraft' => esc_html__( 'Warcraft', 'merge' ),
			'socicon-wechat' => esc_html__( 'Wechat', 'merge' ),
			'socicon-weibo' => esc_html__( 'Weibo', 'merge' ),
			'socicon-whatsapp' => esc_html__( 'Whatsapp', 'merge' ),
			'socicon-wikipedia' => esc_html__( 'Wikipedia', 'merge' ),
			'socicon-windows' => esc_html__( 'Windows', 'merge' ),
			'socicon-wordpress' => esc_html__( 'Wordpress', 'merge' ),
			'socicon-wykop' => esc_html__( 'Wykop', 'merge' ),
			'socicon-xbox' => esc_html__( 'Xbox', 'merge' ),
			'socicon-xing' => esc_html__( 'Xing', 'merge' ),
			'socicon-yahoo' => esc_html__( 'Yahoo', 'merge' ),
			'socicon-yammer' => esc_html__( 'Yammer', 'merge' ),
			'socicon-yandex' => esc_html__( 'Yandex', 'merge' ),
			'socicon-yelp' => esc_html__( 'Yelp', 'merge' ),
			'socicon-younow' => esc_html__( 'Younow', 'merge' ),
			'socicon-youtube' => esc_html__( 'Youtube', 'merge' ),
			'socicon-zapier' => esc_html__( 'Zapier', 'merge' ),
			'socicon-zerply' => esc_html__( 'Zerply', 'merge' ),
			'socicon-zomato' => esc_html__( 'Zomato', 'merge' ),
			'socicon-zynga' => esc_html__( 'Zynga', 'merge' )
		);
		return apply_filters( 'merge/get_social_icons', $social_icons );
	}
}

/**
 * Get Elementor templates
 */
if ( ! function_exists( 'merge_get_elementor_templates' ) ) {
	function merge_get_elementor_templates( $type = null ) {

		$args = [
			'post_type' => 'elementor_library',
			'posts_per_page' => -1,
		];

		if ( $type ) {

			$args[ 'tax_query' ] = [
				[
					'taxonomy' => 'elementor_library_type',
					'field' => 'slug',
					'terms' => $type,
				],
			];

		}

		$page_templates = get_posts( $args );

		$options[0] = esc_html__( 'Select a Template', 'merge' );

		if ( ! empty( $page_templates ) && ! is_wp_error( $page_templates ) ) {
			foreach ( $page_templates as $post ) {
				$options[ $post->ID ] = $post->post_title;
			}
		} else {

			$options[0] = esc_html__( 'Create a Template First', 'merge' );

		}

		return $options;

	}
}

/**
 * Get hsl variables
 */
if ( ! function_exists( 'merge_get_hsl_variables' ) ) {
	function merge_get_hsl_variables( $name, $color ) {
		if ( class_exists( 'ariColor' ) ) {
			$color_obj = ariColor::newColor( $color );
			$new_color = "{$name}-h: {$color_obj->hue};";
			$new_color .= "{$name}-s: {$color_obj->saturation}%;";
			$new_color .= "{$name}-l: {$color_obj->lightness}%;";
			return $new_color;
		}
		return "{$name}: {$color};";
	}
}

/**
 * Add custom fonts
 */
if ( ! function_exists( 'merge_add_custom_font' ) ) {
	function merge_add_custom_font( $fonts ) {
		$fonts[ 'families' ][ 'theme_fonts' ] = array(
			'text' => esc_html__( 'Marge Fonts', 'merge' ),
			'children' => [
				[
					'id' => 'PP Hatton',
					'text' => 'PP Hatton'
				]
			]
		);
		$fonts[ 'variants' ][ 'PP Hatton' ] = [ '500' ];
		return $fonts;
	}
}
add_filter( 'vlthemes_fonts_list', 'merge_add_custom_font' );

add_filter( 'elementor/fonts/groups', function( $font_groups ) {
	$font_groups[ 'theme_fonts' ] = esc_html__( 'Merge Fonts', 'merge' );
	return $font_groups;
} );

add_filter( 'elementor/fonts/additional_fonts', function( $additional_fonts ) {
	$additional_fonts[ 'PP Hatton' ] = 'theme_fonts';
	return $additional_fonts;
} );