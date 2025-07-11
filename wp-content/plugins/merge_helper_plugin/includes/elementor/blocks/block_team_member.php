<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Team_Member extends Widget_Base {

	private static $social_icons = [
		'internet' => 'socicon-internet',
		'moddb' => 'socicon-moddb',
		'indiedb' => 'socicon-indiedb',
		'traxsource' => 'socicon-traxsource',
		'gamefor' => 'socicon-gamefor',
		'pixiv' => 'socicon-pixiv',
		'myanimelist' => 'socicon-myanimelist',
		'blackberry' => 'socicon-blackberry',
		'wickr' => 'socicon-wickr',
		'spip' => 'socicon-spip',
		'napster' => 'socicon-napster',
		'beatport' => 'socicon-beatport',
		'hackerone' => 'socicon-hackerone',
		'hackernews' => 'socicon-hackernews',
		'smashwords' => 'socicon-smashwords',
		'kobo' => 'socicon-kobo',
		'bookbub' => 'socicon-bookbub',
		'mailru' => 'socicon-mailru',
		'gitlab' => 'socicon-gitlab',
		'instructables' => 'socicon-instructables',
		'portfolio' => 'socicon-portfolio',
		'codered' => 'socicon-codered',
		'origin' => 'socicon-origin',
		'nextdoor' => 'socicon-nextdoor',
		'udemy' => 'socicon-udemy',
		'livemaster' => 'socicon-livemaster',
		'crunchbase' => 'socicon-crunchbase',
		'homefy' => 'socicon-homefy',
		'calendly' => 'socicon-calendly',
		'realtor' => 'socicon-realtor',
		'tidal' => 'socicon-tidal',
		'qobuz' => 'socicon-qobuz',
		'natgeo' => 'socicon-natgeo',
		'mastodon' => 'socicon-mastodon',
		'unsplash' => 'socicon-unsplash',
		'homeadvisor' => 'socicon-homeadvisor',
		'angieslist' => 'socicon-angieslist',
		'codepen' => 'socicon-codepen',
		'slack' => 'socicon-slack',
		'openaigym' => 'socicon-openaigym',
		'logmein' => 'socicon-logmein',
		'fiverr' => 'socicon-fiverr',
		'gotomeeting' => 'socicon-gotomeeting',
		'aliexpress' => 'socicon-aliexpress',
		'guru' => 'socicon-guru',
		'appstore' => 'socicon-appstore',
		'homes' => 'socicon-homes',
		'zoom' => 'socicon-zoom',
		'alibaba' => 'socicon-alibaba',
		'craigslist' => 'socicon-craigslist',
		'wix' => 'socicon-wix',
		'redfin' => 'socicon-redfin',
		'googlecalendar' => 'socicon-googlecalendar',
		'shopify' => 'socicon-shopify',
		'freelancer' => 'socicon-freelancer',
		'seedrs' => 'socicon-seedrs',
		'bing' => 'socicon-bing',
		'doodle' => 'socicon-doodle',
		'bonanza' => 'socicon-bonanza',
		'squarespace' => 'socicon-squarespace',
		'toptal' => 'socicon-toptal',
		'gust' => 'socicon-gust',
		'ask' => 'socicon-ask',
		'trulia' => 'socicon-trulia',
		'loomly' => 'socicon-loomly',
		'ghost' => 'socicon-ghost',
		'upwork' => 'socicon-upwork',
		'fundable' => 'socicon-fundable',
		'booking' => 'socicon-booking',
		'googlemaps' => 'socicon-googlemaps',
		'zillow' => 'socicon-zillow',
		'niconico' => 'socicon-niconico',
		'toneden' => 'socicon-toneden',
		'augment' => 'socicon-augment',
		'bitbucket' => 'socicon-bitbucket',
		'fyuse' => 'socicon-fyuse',
		'yt-gaming' => 'socicon-yt-gaming',
		'sketchfab' => 'socicon-sketchfab',
		'mobcrush' => 'socicon-mobcrush',
		'microsoft' => 'socicon-microsoft',
		'pandora' => 'socicon-pandora',
		'messenger' => 'socicon-messenger',
		'gamewisp' => 'socicon-gamewisp',
		'bloglovin' => 'socicon-bloglovin',
		'tunein' => 'socicon-tunein',
		'gamejolt' => 'socicon-gamejolt',
		'trello' => 'socicon-trello',
		'spreadshirt' => 'socicon-spreadshirt',
		'500px' => 'socicon-500px',
		'8tracks' => 'socicon-8tracks',
		'airbnb' => 'socicon-airbnb',
		'alliance' => 'socicon-alliance',
		'amazon' => 'socicon-amazon',
		'amplement' => 'socicon-amplement',
		'android' => 'socicon-android',
		'angellist' => 'socicon-angellist',
		'apple' => 'socicon-apple',
		'appnet' => 'socicon-appnet',
		'baidu' => 'socicon-baidu',
		'bandcamp' => 'socicon-bandcamp',
		'battlenet' => 'socicon-battlenet',
		'mixer' => 'socicon-mixer',
		'bebee' => 'socicon-bebee',
		'bebo' => 'socicon-bebo',
		'behance' => 'socicon-behance',
		'blizzard' => 'socicon-blizzard',
		'blogger' => 'socicon-blogger',
		'buffer' => 'socicon-buffer',
		'chrome' => 'socicon-chrome',
		'coderwall' => 'socicon-coderwall',
		'curse' => 'socicon-curse',
		'dailymotion' => 'socicon-dailymotion',
		'deezer' => 'socicon-deezer',
		'delicious' => 'socicon-delicious',
		'deviantart' => 'socicon-deviantart',
		'diablo' => 'socicon-diablo',
		'digg' => 'socicon-digg',
		'discord' => 'socicon-discord',
		'disqus' => 'socicon-disqus',
		'douban' => 'socicon-douban',
		'draugiem' => 'socicon-draugiem',
		'dribbble' => 'socicon-dribbble',
		'drupal' => 'socicon-drupal',
		'ebay' => 'socicon-ebay',
		'ello' => 'socicon-ello',
		'endomodo' => 'socicon-endomodo',
		'envato' => 'socicon-envato',
		'etsy' => 'socicon-etsy',
		'facebook' => 'socicon-facebook',
		'feedburner' => 'socicon-feedburner',
		'filmweb' => 'socicon-filmweb',
		'firefox' => 'socicon-firefox',
		'flattr' => 'socicon-flattr',
		'flickr' => 'socicon-flickr',
		'formulr' => 'socicon-formulr',
		'forrst' => 'socicon-forrst',
		'foursquare' => 'socicon-foursquare',
		'friendfeed' => 'socicon-friendfeed',
		'github' => 'socicon-github',
		'goodreads' => 'socicon-goodreads',
		'google' => 'socicon-google',
		'googlescholar' => 'socicon-googlescholar',
		'googlegroups' => 'socicon-googlegroups',
		'googlephotos' => 'socicon-googlephotos',
		'googleplus' => 'socicon-googleplus',
		'grooveshark' => 'socicon-grooveshark',
		'hackerrank' => 'socicon-hackerrank',
		'hearthstone' => 'socicon-hearthstone',
		'hellocoton' => 'socicon-hellocoton',
		'heroes' => 'socicon-heroes',
		'smashcast' => 'socicon-smashcast',
		'horde' => 'socicon-horde',
		'houzz' => 'socicon-houzz',
		'icq' => 'socicon-icq',
		'identica' => 'socicon-identica',
		'imdb' => 'socicon-imdb',
		'instagram' => 'socicon-instagram',
		'issuu' => 'socicon-issuu',
		'istock' => 'socicon-istock',
		'itunes' => 'socicon-itunes',
		'keybase' => 'socicon-keybase',
		'lanyrd' => 'socicon-lanyrd',
		'lastfm' => 'socicon-lastfm',
		'line' => 'socicon-line',
		'linkedin' => 'socicon-linkedin',
		'livejournal' => 'socicon-livejournal',
		'lyft' => 'socicon-lyft',
		'macos' => 'socicon-macos',
		'mail' => 'socicon-mail',
		'medium' => 'socicon-medium',
		'meetup' => 'socicon-meetup',
		'mixcloud' => 'socicon-mixcloud',
		'modelmayhem' => 'socicon-modelmayhem',
		'mumble' => 'socicon-mumble',
		'myspace' => 'socicon-myspace',
		'newsvine' => 'socicon-newsvine',
		'nintendo' => 'socicon-nintendo',
		'npm' => 'socicon-npm',
		'odnoklassniki' => 'socicon-odnoklassniki',
		'openid' => 'socicon-openid',
		'opera' => 'socicon-opera',
		'outlook' => 'socicon-outlook',
		'overwatch' => 'socicon-overwatch',
		'patreon' => 'socicon-patreon',
		'paypal' => 'socicon-paypal',
		'periscope' => 'socicon-periscope',
		'persona' => 'socicon-persona',
		'pinterest' => 'socicon-pinterest',
		'play' => 'socicon-play',
		'player' => 'socicon-player',
		'playstation' => 'socicon-playstation',
		'pocket' => 'socicon-pocket',
		'qq' => 'socicon-qq',
		'quora' => 'socicon-quora',
		'raidcall' => 'socicon-raidcall',
		'ravelry' => 'socicon-ravelry',
		'reddit' => 'socicon-reddit',
		'renren' => 'socicon-renren',
		'researchgate' => 'socicon-researchgate',
		'residentadvisor' => 'socicon-residentadvisor',
		'reverbnation' => 'socicon-reverbnation',
		'rss' => 'socicon-rss',
		'sharethis' => 'socicon-sharethis',
		'skype' => 'socicon-skype',
		'slideshare' => 'socicon-slideshare',
		'smugmug' => 'socicon-smugmug',
		'snapchat' => 'socicon-snapchat',
		'songkick' => 'socicon-songkick',
		'soundcloud' => 'socicon-soundcloud',
		'spotify' => 'socicon-spotify',
		'stackexchange' => 'socicon-stackexchange',
		'stackoverflow' => 'socicon-stackoverflow',
		'starcraft' => 'socicon-starcraft',
		'stayfriends' => 'socicon-stayfriends',
		'steam' => 'socicon-steam',
		'storehouse' => 'socicon-storehouse',
		'strava' => 'socicon-strava',
		'streamjar' => 'socicon-streamjar',
		'stumbleupon' => 'socicon-stumbleupon',
		'swarm' => 'socicon-swarm',
		'teamspeak' => 'socicon-teamspeak',
		'teamviewer' => 'socicon-teamviewer',
		'technorati' => 'socicon-technorati',
		'telegram' => 'socicon-telegram',
		'tripadvisor' => 'socicon-tripadvisor',
		'tripit' => 'socicon-tripit',
		'triplej' => 'socicon-triplej',
		'tumblr' => 'socicon-tumblr',
		'twitch' => 'socicon-twitch',
		'twitter' => 'socicon-twitter',
		'uber' => 'socicon-uber',
		'ventrilo' => 'socicon-ventrilo',
		'viadeo' => 'socicon-viadeo',
		'viber' => 'socicon-viber',
		'viewbug' => 'socicon-viewbug',
		'vimeo' => 'socicon-vimeo',
		'vine' => 'socicon-vine',
		'vkontakte' => 'socicon-vkontakte',
		'warcraft' => 'socicon-warcraft',
		'wechat' => 'socicon-wechat',
		'weibo' => 'socicon-weibo',
		'whatsapp' => 'socicon-whatsapp',
		'wikipedia' => 'socicon-wikipedia',
		'windows' => 'socicon-windows',
		'wordpress' => 'socicon-wordpress',
		'wykop' => 'socicon-wykop',
		'xbox' => 'socicon-xbox',
		'xing' => 'socicon-xing',
		'yahoo' => 'socicon-yahoo',
		'yammer' => 'socicon-yammer',
		'yandex' => 'socicon-yandex',
		'yelp' => 'socicon-yelp',
		'younow' => 'socicon-younow',
		'youtube' => 'socicon-youtube',
		'zapier' => 'socicon-zapier',
		'zerply' => 'socicon-zerply',
		'zomato' => 'socicon-zomato',
		'zynga' => 'socicon-zynga',
	];

	private static $default_socials = [
		'internet' => 'Internet',
		'moddb' => 'Moddb',
		'indiedb' => 'Indiedb',
		'traxsource' => 'Traxsource',
		'gamefor' => 'Gamefor',
		'pixiv' => 'Pixiv',
		'myanimelist' => 'Myanimelist',
		'blackberry' => 'Blackberry',
		'wickr' => 'Wickr',
		'spip' => 'Spip',
		'napster' => 'Napster',
		'beatport' => 'Beatport',
		'hackerone' => 'Hackerone',
		'hackernews' => 'Hackernews',
		'smashwords' => 'Smashwords',
		'kobo' => 'Kobo',
		'bookbub' => 'Bookbub',
		'mailru' => 'Mailru',
		'gitlab' => 'Gitlab',
		'instructables' => 'Instructables',
		'portfolio' => 'Portfolio',
		'codered' => 'Codered',
		'origin' => 'Origin',
		'nextdoor' => 'Nextdoor',
		'udemy' => 'Udemy',
		'livemaster' => 'Livemaster',
		'crunchbase' => 'Crunchbase',
		'homefy' => 'Homefy',
		'calendly' => 'Calendly',
		'realtor' => 'Realtor',
		'tidal' => 'Tidal',
		'qobuz' => 'Qobuz',
		'natgeo' => 'Natgeo',
		'mastodon' => 'Mastodon',
		'unsplash' => 'Unsplash',
		'homeadvisor' => 'Homeadvisor',
		'angieslist' => 'Angieslist',
		'codepen' => 'Codepen',
		'slack' => 'Slack',
		'openaigym' => 'Openaigym',
		'logmein' => 'Logmein',
		'fiverr' => 'Fiverr',
		'gotomeeting' => 'Gotomeeting',
		'aliexpress' => 'Aliexpress',
		'guru' => 'Guru',
		'appstore' => 'Appstore',
		'homes' => 'Homes',
		'zoom' => 'Zoom',
		'alibaba' => 'Alibaba',
		'craigslist' => 'Craigslist',
		'wix' => 'Wix',
		'redfin' => 'Redfin',
		'googlecalendar' => 'Googlecalendar',
		'shopify' => 'Shopify',
		'freelancer' => 'Freelancer',
		'seedrs' => 'Seedrs',
		'bing' => 'Bing',
		'doodle' => 'Doodle',
		'bonanza' => 'Bonanza',
		'squarespace' => 'Squarespace',
		'toptal' => 'Toptal',
		'gust' => 'Gust',
		'ask' => 'Ask',
		'trulia' => 'Trulia',
		'loomly' => 'Loomly',
		'ghost' => 'Ghost',
		'upwork' => 'Upwork',
		'fundable' => 'Fundable',
		'booking' => 'Booking',
		'googlemaps' => 'Googlemaps',
		'zillow' => 'Zillow',
		'niconico' => 'Niconico',
		'toneden' => 'Toneden',
		'augment' => 'Augment',
		'bitbucket' => 'Bitbucket',
		'fyuse' => 'Fyuse',
		'yt-gaming' => 'Yt-gaming',
		'sketchfab' => 'Sketchfab',
		'mobcrush' => 'Mobcrush',
		'microsoft' => 'Microsoft',
		'pandora' => 'Pandora',
		'messenger' => 'Messenger',
		'gamewisp' => 'Gamewisp',
		'bloglovin' => 'Bloglovin',
		'tunein' => 'Tunein',
		'gamejolt' => 'Gamejolt',
		'trello' => 'Trello',
		'spreadshirt' => 'Spreadshirt',
		'500px' => '500px',
		'8tracks' => '8tracks',
		'airbnb' => 'Airbnb',
		'alliance' => 'Alliance',
		'amazon' => 'Amazon',
		'amplement' => 'Amplement',
		'android' => 'Android',
		'angellist' => 'Angellist',
		'apple' => 'Apple',
		'appnet' => 'Appnet',
		'baidu' => 'Baidu',
		'bandcamp' => 'Bandcamp',
		'battlenet' => 'Battlenet',
		'mixer' => 'Mixer',
		'bebee' => 'Bebee',
		'bebo' => 'Bebo',
		'behance' => 'Bēhance',
		'blizzard' => 'Blizzard',
		'blogger' => 'Blogger',
		'buffer' => 'Buffer',
		'chrome' => 'Chrome',
		'coderwall' => 'Coderwall',
		'curse' => 'Curse',
		'dailymotion' => 'Dailymotion',
		'deezer' => 'Deezer',
		'delicious' => 'Delicious',
		'deviantart' => 'Deviantart',
		'diablo' => 'Diablo',
		'digg' => 'Digg',
		'discord' => 'Discord',
		'disqus' => 'Disqus',
		'douban' => 'Douban',
		'draugiem' => 'Draugiem',
		'dribbble' => 'Dribbble',
		'drupal' => 'Drupal',
		'ebay' => 'Ebay',
		'ello' => 'Ello',
		'endomodo' => 'Endomodo',
		'envato' => 'Envato',
		'etsy' => 'Etsy',
		'facebook' => 'Facebook',
		'feedburner' => 'Feedburner',
		'filmweb' => 'Filmweb',
		'firefox' => 'Firefox',
		'flattr' => 'Flattr',
		'flickr' => 'Flickr',
		'formulr' => 'Formulr',
		'forrst' => 'Forrst',
		'foursquare' => 'Foursquare',
		'friendfeed' => 'Friendfeed',
		'github' => 'Github',
		'goodreads' => 'Goodreads',
		'google' => 'Google',
		'googlescholar' => 'Googlescholar',
		'googlegroups' => 'Googlegroups',
		'googlephotos' => 'Googlephotos',
		'googleplus' => 'Googleplus',
		'grooveshark' => 'Grooveshark',
		'hackerrank' => 'Hackerrank',
		'hearthstone' => 'Hearthstone',
		'hellocoton' => 'Hellocoton',
		'heroes' => 'Heroes',
		'smashcast' => 'Smashcast',
		'horde' => 'Horde',
		'houzz' => 'Houzz',
		'icq' => 'Icq',
		'identica' => 'Identica',
		'imdb' => 'Imdb',
		'instagram' => 'Instagram',
		'issuu' => 'Issuu',
		'istock' => 'Istock',
		'itunes' => 'Itunes',
		'keybase' => 'Keybase',
		'lanyrd' => 'Lanyrd',
		'lastfm' => 'Lastfm',
		'line' => 'Line',
		'linkedin' => 'LinkedIn',
		'livejournal' => 'Livejournal',
		'lyft' => 'Lyft',
		'macos' => 'Macos',
		'mail' => 'Mail',
		'medium' => 'Medium',
		'meetup' => 'Meetup',
		'mixcloud' => 'Mixcloud',
		'modelmayhem' => 'Modelmayhem',
		'mumble' => 'Mumble',
		'myspace' => 'Myspace',
		'newsvine' => 'Newsvine',
		'nintendo' => 'Nintendo',
		'npm' => 'Npm',
		'odnoklassniki' => 'Odnoklassniki',
		'openid' => 'Openid',
		'opera' => 'Opera',
		'outlook' => 'Outlook',
		'overwatch' => 'Overwatch',
		'patreon' => 'Patreon',
		'paypal' => 'Paypal',
		'periscope' => 'Periscope',
		'persona' => 'Persona',
		'pinterest' => 'Pinterest',
		'play' => 'Play',
		'player' => 'Player',
		'playstation' => 'Playstation',
		'pocket' => 'Pocket',
		'qq' => 'Qq',
		'quora' => 'Quora',
		'raidcall' => 'Raidcall',
		'ravelry' => 'Ravelry',
		'reddit' => 'Reddit',
		'renren' => 'Renren',
		'researchgate' => 'Researchgate',
		'residentadvisor' => 'Residentadvisor',
		'reverbnation' => 'Reverbnation',
		'rss' => 'Rss',
		'sharethis' => 'Sharethis',
		'skype' => 'Skype',
		'slideshare' => 'Slideshare',
		'smugmug' => 'Smugmug',
		'snapchat' => 'Snapchat',
		'songkick' => 'Songkick',
		'soundcloud' => 'Soundcloud',
		'spotify' => 'Spotify',
		'stackexchange' => 'Stackexchange',
		'stackoverflow' => 'Stackoverflow',
		'starcraft' => 'Starcraft',
		'stayfriends' => 'Stayfriends',
		'steam' => 'Steam',
		'storehouse' => 'Storehouse',
		'strava' => 'Strava',
		'streamjar' => 'Streamjar',
		'stumbleupon' => 'Stumbleupon',
		'swarm' => 'Swarm',
		'teamspeak' => 'Teamspeak',
		'teamviewer' => 'Teamviewer',
		'technorati' => 'Technorati',
		'telegram' => 'Telegram',
		'tripadvisor' => 'Tripadvisor',
		'tripit' => 'Tripit',
		'triplej' => 'Triplej',
		'tumblr' => 'Tumblr',
		'twitch' => 'Twitch',
		'twitter' => 'Twitter',
		'uber' => 'Uber',
		'ventrilo' => 'Ventrilo',
		'viadeo' => 'Viadeo',
		'viber' => 'Viber',
		'viewbug' => 'Viewbug',
		'vimeo' => 'Vimeo',
		'vine' => 'Vine',
		'vkontakte' => 'Vkontakte',
		'warcraft' => 'Warcraft',
		'wechat' => 'Wechat',
		'weibo' => 'Weibo',
		'whatsapp' => 'Whatsapp',
		'wikipedia' => 'Wikipedia',
		'windows' => 'Windows',
		'wordpress' => 'Wordpress',
		'wykop' => 'Wykop',
		'xbox' => 'Xbox',
		'xing' => 'Xing',
		'yahoo' => 'Yahoo',
		'yammer' => 'Yammer',
		'yandex' => 'Yandex',
		'yelp' => 'Yelp',
		'younow' => 'Younow',
		'youtube' => 'Youtube',
		'zapier' => 'Zapier',
		'zerply' => 'Zerply',
		'zomato' => 'Zomato',
		'zynga' => 'Zynga'
	];

	public function get_name() {
		return 'vlt-team-member';
	}

	public function get_title() {
		return esc_html__( 'Team Member', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-person vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'team', 'member', 'avatar' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Team Member', 'vlthemes' ),
			]
		);

		if ( ! vlthemes_is_theme_activated() ) {

			$this->add_control(
				'notification_' . $first_level++, [
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<strong>' . esc_html__( 'Theme not activated!', 'vlthemes' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">License Info</a> to activate.', 'vlthemes' ), admin_url( 'admin.php?page=theme-activate-panel' ) ),
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
					'separator' => 'after',
				]
			);

		}

		$this->add_control(
			'image', [
				'label' => esc_html__( 'Image', 'vlthemes' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(), [
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
			]
		);

		$this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Margaret Watson',
				'separator' => 'before'
			]
		);

		$this->add_control(
			'function', [
				'label' => esc_html__( 'Function', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => '/ Project Manager',
			]
		);

		$this->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'vlthemes' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Social Profiles', 'vlthemes' ),
			]
		);

		$this->add_control(
			'show_socials', [
				'label' => esc_html__( 'Show Socials', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$repeater = new Repeater();

		asort( self::$default_socials );

		$repeater->add_control(
			'icon', [
				'label' => esc_html__( 'Icon', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'options' => self::$default_socials,
			]
		);

		$repeater->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'vlthemes' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
			]
		);

		$this->add_control(
			'socials', [
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'icon' => 'facebook',
						'link' => [ 'url' => '#' ]
					],
					[
						'icon' => 'twitter',
						'link' => [ 'url' => '#' ]
					],
					[
						'icon' => 'instagram',
						'link' => [ 'url' => '#' ]
					]
				],
				'condition' => [
					'show_socials' => 'yes',
				]
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Image', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'border_radius', [
				'label' => esc_html__( 'Border Radius', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-team-member__avatar' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'image_indent', [
				'label' => esc_html__( 'Image Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-team-member__content' => 'padding-top: {{SIZE}}{{UNIT}};',
				]
			]
		);


		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Team Member', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'title_html_tag', [
				'label' => esc_html__( 'HTML Tag', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'h4',
				'options' => [
					'h1' => esc_html__( 'Heading 1', 'vlthemes' ),
					'h2' => esc_html__( 'Heading 2', 'vlthemes' ),
					'h3' => esc_html__( 'Heading 3', 'vlthemes' ),
					'h4' => esc_html__( 'Heading 4', 'vlthemes' ),
					'h5' => esc_html__( 'Heading 5', 'vlthemes' ),
					'h6' => esc_html__( 'Heading 6', 'vlthemes' ),
					'div' => esc_html__( 'div', 'vlthemes' ),
					'span' => esc_html__( 'span', 'vlthemes' ),
					'p' => esc_html__( 'p', 'vlthemes' )
				]
			]
		);

		$this->add_control(
			'title_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-team-member__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .vlt-team-member__title',
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Function', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'function_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-team-member__function' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'function_typography',
				'selector' => '{{WRAPPER}} .vlt-team-member__function',
			]
		);

		$this->add_control(
			'function_indent', [
				'label' => esc_html__( 'Function Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-team-member__function' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render_socials( $instance ) {

		$this->add_render_attribute( 'socials', 'class', 'vlt-team-member__socials' );

		if ( $instance[ 'socials' ] ) : ?>

			<div <?php echo $this->get_render_attribute_string( 'socials' ); ?>>

				<?php foreach ( $instance[ 'socials' ] as $item ) : ?>

					<?php if ( $item[ 'link' ][ 'url' ] ) : ?>

						<?php

							$this->add_render_attribute( 'social-link-' . $item[ '_id' ], [
								'class' => 'vlt-social-icon vlt-social-icon--style-3',
								'href' => $item[ 'link' ][ 'url' ]
							] );

							if ( $item[ 'link' ][ 'is_external' ] ) {
								$this->add_render_attribute( 'social-link-' . $item[ '_id' ], 'target', '_blank' );
							}

							if ( $item[ 'link' ][ 'nofollow' ] ) {
								$this->add_render_attribute( 'social-link-' . $item[ '_id' ], 'rel', 'nofollow' );
							}

						?>

						<a <?php echo $this->get_render_attribute_string( 'social-link-' . $item[ '_id' ] ); ?>>

							<?php

								if ( array_key_exists( $item[ 'icon' ], self::$default_socials ) ) {
									$icon_class = self::$social_icons[ $item[ 'icon' ] ];
								}

								if ( $icon_class ) :
									echo '<i class="socicon-fw ' . $icon_class . '"></i>';
								endif;

							?>

						</a>

					<?php endif; ?>

				<?php endforeach; ?>

			</div>

		<?php endif;

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'team-member', 'class', 'vlt-team-member' );

		$this->add_render_attribute( 'link', [
			'href' => $settings[ 'link' ][ 'url' ]
		] );

		if ( $settings[ 'link' ][ 'is_external' ] ) {
			$this->add_render_attribute( 'link', 'target', '_blank' );
		}

		if ( $settings[ 'link' ][ 'nofollow' ] ) {
			$this->add_render_attribute( 'link', 'rel', 'nofollow' );
		}

		?>

		<div <?php echo $this->get_render_attribute_string( 'team-member' ); ?>>

			<?php

				if ( $settings[ 'image' ][ 'url' ] ) :

					echo '<div class="vlt-team-member__avatar">';

						if ( $settings[ 'link' ][ 'url' ] ) {

							echo '<a ' . $this->get_render_attribute_string( 'link' ) . ' data-cursor="eye">';

						}

						echo Group_Control_Image_Size_2::get_attachment_image_html( $settings, 'image' );

						if ( $settings[ 'link' ][ 'url' ] ) {

							echo '</a>';

						}

						if ( $settings[ 'show_socials' ] == 'yes' ) {
							$this->render_socials( $settings );
						}

					echo '</div>';

				endif;

				if ( $settings[ 'title' ] || $settings[ 'function' ] ) :

					echo '<div class="vlt-team-member__content">';

						if ( $settings[ 'function' ] ) {

							echo '<p class="vlt-team-member__function">' . $settings[ 'function' ] . '</p>';

						}

						if ( $settings[ 'title' ] ) {

							echo '<' . $settings[ 'title_html_tag' ] . ' class="vlt-team-member__title">';

							if ( $settings[ 'link' ][ 'url' ] ) {

								echo '<a ' . $this->get_render_attribute_string( 'link' ) . '>';

							}

							echo $settings[ 'title' ];

							if ( $settings[ 'link' ][ 'url' ] ) {

								echo '</a>';

							}

							echo '</' . $settings[ 'title_html_tag' ] . '>';
						}

					echo '</div>';

				endif;

			?>

		</div>

		<?php

	}

}