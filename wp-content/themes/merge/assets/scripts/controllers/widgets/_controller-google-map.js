/***********************************************
 * WIDGET: GOOGLE MAP
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.googleMap = {
		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $googleMap = $scope.find('.vlt-google-map');

			$googleMap.each(function () {

				const dataMapLat = $googleMap.data('map-lat'),
					dataMapLng = $googleMap.data('map-lng'),
					dataMapZoom = $googleMap.data('map-zoom'),
					dataMapGestureHandling = $googleMap.data('map-gesture-handling'),
					dataMapZoomControl = $googleMap.data('map-zoom-control') ? true : false,
					dataMapZoomControlPosition = $googleMap.data('map-zoom-control-position'),
					dataMapDefaultUi = $googleMap.data('map-default-ui') ? false : true,
					dataMapType = $googleMap.data('map-type'),
					dataMapTypeControl = $googleMap.data('map-type-control') ? true : false,
					dataMapTypeControlStyle = $googleMap.data('map-type-control-style'),
					dataMapTypeControlPosition = $googleMap.data('map-type-control-position'),
					dataMapStreetviewControl = $googleMap.data('map-streetview-control') ? true : false,
					dataMapStreetviewPosition = $googleMap.data('map-streetview-position'),
					dataMapInfoWindowWidth = $googleMap.data('map-info-window-width'),
					dataMapLocations = $googleMap.data('map-locations'),
					dataMapStyles = $googleMap.data('map-style') || '';

				let infowindow,
					map;

				function initMap() {

					const myLatLng = {
						lat: parseFloat(dataMapLat),
						lng: parseFloat(dataMapLng)
					};

					if (typeof google === 'undefined') {
						return;
					}

					const map = new google.maps.Map($googleMap[0], {
						center: myLatLng,
						zoom: dataMapZoom,
						disableDefaultUI: dataMapDefaultUi,
						zoomControl: dataMapZoomControl,
						zoomControlOptions: {
							position: google.maps.ControlPosition[dataMapZoomControlPosition]
						},
						mapTypeId: dataMapType,
						mapTypeControl: dataMapTypeControl,
						mapTypeControlOptions: {
							style: google.maps.MapTypeControlStyle[dataMapTypeControlStyle],
							position: google.maps.ControlPosition[dataMapTypeControlPosition]
						},
						streetViewControl: dataMapStreetviewControl,
						streetViewControlOptions: {
							position: google.maps.ControlPosition[dataMapStreetviewPosition]
						},
						styles: dataMapStyles,
						gestureHandling: dataMapGestureHandling,
					});

					$.each(dataMapLocations, function (index, $googleMapement, content) {

						var content = '\
						<div class="vlt-google-map__container">\
						<h6>' + $googleMapement.title + '</h6>\
						<div>' + $googleMapement.text + '</div>\
						</div>';

						let icon = '';

						if ($googleMapement.pin_icon !== '') {
							if ($googleMapement.pin_icon_custom) {
								icon = $googleMapement.pin_icon_custom;
							} else {
								icon = '';
							}
						}

						const marker = new google.maps.Marker({
							map: map,
							position: new google.maps.LatLng(parseFloat($googleMapement.lat), parseFloat($googleMapement.lng)),
							animation: google.maps.Animation.DROP,
							icon: icon,
						});

						if ($googleMapement.title !== '' && $googleMapement.text !== '') {
							addInfoWindow(marker, content);
						}

					});
				}

				function addInfoWindow(marker, content) {
					google.maps.event.addListener(marker, 'click', function () {
						if (!infowindow) {
							infowindow = new google.maps.InfoWindow({
								maxWidth: dataMapInfoWindowWidth
							});
						}
						infowindow.setContent(content);
						infowindow.open(map, marker);
					});
				}

				initMap();
			});

		}
	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-google-map.default',
			VLTJS.googleMap.init
		);
	});

	VLTJS.googleMap.init();

})(jQuery);