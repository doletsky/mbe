(function($) {

	var MBE = (function() {

		var $sel = {};

		// Кэширование выборки
		$sel["window"] = $(window);
		$sel["html"] = $("html");
		$sel["body"] = $("body");

		return {

			// Карта
			initContactsMap: function($container) {

				$container = $container || $sel.body;

				var $maps = $(".contacts-map", $container);

				if(!$maps.length) {
					return false;
				}

				// Обход всех карт на странице
				$maps.each(function(i) {
					var $map = $(this);

					// Получение данных о карте
					var lat = $map.data("lat"),
						lng = $map.data("lng"),
						zoom = $map.data("zoom"),
						points = $map.data("points");

					// Стили для карты
		            var options = {
						center: new google.maps.LatLng(55.797113, 37.576995),
						zoom: 15,
						mapTypeControl: false,
						panControl: false,
						zoomControl: true,
						zoomControlOptions: {
							style: google.maps.ZoomControlStyle.LARGE,
							position: google.maps.ControlPosition.LEFT_CENTER
						},
						scaleControl: true,
						streetViewControl: true,
						streetViewControlOptions: {
							position: google.maps.ControlPosition.LEFT_CENTER
						},
						scrollwheel: false,
						mapTypeId: google.maps.MapTypeId.ROADMAP,
						styles: [
							{"featureType": "landscape", "stylers": [
			                    {"saturation": -100},
			                    {"lightness": 0},
			                    {"visibility": "on"}
			                ]},
			                {"featureType": "poi", "stylers": [
			                    {"saturation": -300},
			                    {"lightness": -10},
			                    {"visibility": "simplified"}
			                ]},
			                {"featureType": "road.highway", "stylers": [
			                    {"saturation": -100},
			                    {"visibility": "simplified"}
			                ]},
			                {"featureType": "road.arterial", "stylers": [
			                    {"saturation": -100},
			                    {"lightness": 0},
			                    {"visibility": "on"}
			                ]},
			                {"featureType": "road.local", "stylers": [
			                    {"saturation": -100},
			                    {"lightness": 0},
			                    {"visibility": "on"}
			                ]},
			                {"featureType": "transit", "stylers": [
			                    {"saturation": -100},
			                    {"visibility": "simplified"}
			                ]},
			                {"featureType": "administrative.province", "stylers": [
			                    {"visibility": "off"}
			                ]},
			                {"featureType": "water", "elementType": "labels", "stylers": [
			                    {"visibility": "on"},
			                    {"lightness": -25},
			                    {"saturation": -100}
			                ]},
			                {"featureType": "water", "elementType": "geometry", "stylers": [
			                    {"hue": "#ffff00"},
			                    {"lightness": -25},
			                    {"saturation": -97}
			                ]}
			            ]
			        };

			        // Инициализация карты
					var api = new google.maps.Map($map[0], options);
					// Добавление точек на карту
					for(var j = 0, len = points.length; j < len; j++) {
						var point = points[j];
						switch (point.icon) {
							case 'salad':
								point.icon = '#00de9a';
								break;
							case 'fiolet':
								point.icon = '#9265e5';
								break;
							case 'blue':
								point.icon = '#009CE0';
								break;
							case 'red':
								point.icon = '#FF3D22';
								break;
							case 'orange':
								point.icon = '#FF7A00';
								break;
							case 'pink':
								point.icon = '#FF4FE0';
								break;
							case 'green':
								point.icon = '#00B86C';
								break;

						}
							var mapPoint = new CustomMarker(
									new google.maps.LatLng(point.lat, point.lng), 
									api,
									{
										size: point.size,
										fillColor: point.icon
									}
								);



						// Добавление тултипа
						var tooltipID = "tooltip_" + i + "_" + j;
						var $tooltip = $('<div class="map-tooltip" title="' + point.tooltip +'" id="' + tooltipID + '">');
						$map.after($tooltip);
						mapPoint.tooltip = tooltipID;
						mapPoint.size = point.size;

						// Наведение на маркер
						google.maps.event.addDomListener(mapPoint, "mouseover", function() {
							var marker = this,
								point = fromLatLngToPoint(marker.getPosition(), api),
								$tooltip = $("#" + this.tooltip);
							$tooltip.css({
								left: point.x,
								top: point.y,
								width: marker.size.width,
								height: marker.size.height,
								"margin-left": "-11px",
								"margin-top": "-21px"
							});
							$tooltip.tooltipster("show");

						});
					}

					// Если карта сдвинулась, то смещаем метки
					api.addListener("center_changed", function() {
						$map.parent().find(".map-tooltip").css({
							"left": "-10000px",
							"top": "-10000px"
						});
					});

		        });
				
				// Инициализация тултипов для карты
				$(".map-tooltip").tooltipster({
					animation: "grow",
					arrow: false,
					delay: 100,
					offsetX: -54,
					offsetY: 10,
					position: "right",
					theme: "page-tooltip page-tooltip--map",
					interactive: true,
					contentAsHTML: true
				});

				// Преобразование из координат в пиксели
				function fromLatLngToPoint(latLng, map) {
					var topRight = map.getProjection().fromLatLngToPoint(map.getBounds().getNorthEast());
					var bottomLeft = map.getProjection().fromLatLngToPoint(map.getBounds().getSouthWest());
					var scale = Math.pow(2, map.getZoom());
					var worldPoint = map.getProjection().fromLatLngToPoint(latLng);
					
					return new google.maps.Point((worldPoint.x - bottomLeft.x) * scale, (worldPoint.y - topRight.y) * scale);
				}

			},

			// Выстраивание блоков
			initMasonry: function() {

				var $masonries = $(".masonry");

				$masonries.each(function() {
					var $masonry = $(this),
						$items = $(".masonry-item", $masonry);
						
					checkItemsHeight($items);

					$masonry.masonry({
						itemSelector: ".masonry-item",
						columnWidth: ".masonry-sizer",
						percentPosition: true
					});
					$masonry.addClass("masonry--active");
				});

				// Установка высоты для блоков
				function checkItemsHeight($items) {
					var maxHeight = 0;

					// Ищем максимальную высоту
					$items.filter(".masonry-item--hx1").each(function() {
						var $item = $(this),
							itemHeight = $item.outerHeight();

						if(itemHeight > maxHeight) {
							maxHeight = itemHeight;
						}
					});

					// Устанавливаем высоту для блоков
					$items.each(function() {
						var $item = $(this);

						if($item.hasClass("masonry-item--hx1")) {
							$item.css({
								"height": maxHeight + "px",
								"line-height": maxHeight + "px"
							});
						} else if($item.hasClass("masonry-item--hx2")) {
							$item.css({
								"height": maxHeight + "px",
								"line-height": maxHeight + "px"
							});
						} else if($item.hasClass("masonry-item--vx2")) {
							$item.css({
								"height": (maxHeight * 2) + "px",
								"line-height": (maxHeight * 2) + "px"
							});
						}
					});
				}

			},

			// Добавление фона для стран
			initWorld: function() {
				var $items = $(".world-item");

				if(!$items.length) {
					return false;
				}

				$items.each(function(i) {
					var $item = $(this),
						country = $item.data("country");

					var $bg = $('<div class="world-item-map">');
					$bg.load('/bitrix/templates/mbe/i/svg/' + country + '.svg');
					$item.append($bg);

					var $icon = $('<div class="world-item-icon">');
					$icon.css("background-image", "url('/bitrix/templates/mbe/i/svg/" + country + "-city.svg')");
					$item.prepend($icon);

					$item.addClass("world-item--" + country);
					
				});


			},



			// Главная страница
			initHome: function() {

				// Если не главная, то не выполняем ничего
				if(!$sel.body.hasClass("home-page")) {
					return false;
				}

				var serviceSlider = function() {
					var $serviceSliderHolder = $(".service-slider-holder"),
						$serviceSlider = $(".service-slider-inner", $serviceSliderHolder),
						serviceSliderOwl = false;

					serviceSliderOwl = $serviceSlider.owlCarousel({
						items: 6,
						slideSpeed: 500,
						itemsDesktopSmall: [1280, 4],
						itemsTablet: [1024, 3],
						itemsMobile: [767, 2],
						itemsMobileSmall: [590, 1]
					});

					$(".service-slider-control--prev", $serviceSliderHolder).on("click", function() {
						serviceSliderOwl.trigger("owl.prev");
					});

					$(".service-slider-control--next", $serviceSliderHolder).on("click", function() {
						serviceSliderOwl.trigger("owl.next");
					});
				}
				serviceSlider();


				var features = function() {

					var $featuresHolder = $("#personal-features"),
						$featuresItem = $(".personal-feature-item", $featuresHolder),
						$featuresSlider = $(".personal-features-demo-screen", $featuresHolder);

					$featuresSlider.on("fotorama:ready", function(e, fotorama) {
						$featuresItem.on("mouseover", function() {
							fotorama.show($(this).data("screen") - 1);
						});
					});
				}
				features();


				var partnersSlider = function() {
					var $partnersSliderHolder = $("#partners-slider"),
						$partnersSlider = $(".partners-slider-inner", $partnersSliderHolder),
						partnersSliderOwl = false;

					partnersSliderOwl = $partnersSlider.owlCarousel({
						items: 6,
						slideSpeed: 500,
						itemsDesktopSmall: [1050, 4],
						itemsTablet: [767, 2],

					});

					$(".partners-slider-control--prev", $partnersSliderHolder).on("click", function() {
						partnersSliderOwl.trigger("owl.prev");
					});

					$(".partners-slider-control--next", $partnersSliderHolder).on("click", function() {
						partnersSliderOwl.trigger("owl.next");
					});
				}
				partnersSlider();

				var initHomeForm = function() {
					var $form = $("#header-form");
					$form.addClass("header-form--active");

					$form.on("mouseover", function() {
						$form.addClass("header-form--active");
					});

					$(".header-form-close").on("click", function() {
						$form.removeClass("header-form--active");
					});
				};

				var setHeader = function() {
					var $header= $("#page-header-main"),
						serviceMenuHeight = 0;

					$sel.window.on("resize", function() {
						setHeaderHeight();
					});
					setHeaderHeight();
					$header.addClass("page-header-main--active")

					function setHeaderHeight() {
						$header.css("height", ($sel.window.height() - serviceMenuHeight) + "px");
					}

					initHomeForm();
				};
				//setHeader();
				$("#page-header-main").addClass("page-header-main--active")	
				initHomeForm();

				MBE.setCenter($(".page-header-service"));


				$(".home-page").addClass("home-page--active");
				setTimeout(function() {
					startHeaderAnimations();
				}, 6500);

				function setHeaderAnimationSize() {
					var $headerAnimation = $("#header-animations"),
						headerAnimationWidth = $headerAnimation.width(),
						headerAnimationHeight = $headerAnimation.height()
						$container = $("#page-header-main"),
						ratio = headerAnimationWidth / headerAnimationHeight;

					console.log("Animation start sizes: %spx, %spx", headerAnimationWidth, headerAnimationHeight);

					function resize() {
						var containerHeight = $container.height(),
							containerWidth = $container.width(),
							containerRatio = containerWidth / containerHeight;

						console.log("Container sizes: %spx, %spx, ratio: %s", containerWidth, containerHeight, containerRatio);

						var frameWidth = containerWidth,
							frameHeight = containerWidth * Math.abs(1 - ratio),
							frameRatio = frameWidth / headerAnimationWidth;

						console.log("Frame sizes: %spx, %spx. Ratio: %s", frameWidth, frameHeight, frameRatio);

						var offsetLeft = (headerAnimationWidth * (1 - frameRatio)) / 2,
							offsetTop = (headerAnimationHeight * (1 - frameRatio)) / 2;

						console.log("Offset: %spx, %spx", offsetLeft, offsetTop);

						$headerAnimation.css({
							"transform": "scale(" + frameRatio + ")",
							"left": offsetLeft * -1 + ((containerWidth - frameWidth) / 2),
							"top": offsetTop * -1 + ((containerHeight - (headerAnimationHeight * frameRatio)) / 2)
						});
					}
					resize();
					$(window).on("resize", function() {
						setTimeout(function() {
							resize();
						}, 100);
					});



				}
				setHeaderAnimationSize();

				function startHeaderAnimations() {
					var delay = 0;

					$(".header-animation-item").each(function() {
						var $item = $(this);

						queue()
							.defer(d3.xml, "/bitrix/templates/mbe/i/svg/" + $item.data("route") + ".svg", "image/svg+xml")
							.await(startObjectAnimation.bind({
								"route": $item.data("route"),
								"object": $item.data("object"),
								"width": $item.data("width"),
								"height": $item.data("height"),
								"duration": $item.data("duration"),
								"offsetX": $item.data("offsetx"),
								"offsetY": $item.data("offsety"),
								"delay": delay
							}));

						// Анимация появления

						console.log(delay);
						delay += $item.data("duration");
					});

					function startObjectAnimation(error, xml) {
						var animationParams = this,
							importedNode = document.importNode(xml.documentElement, true);

						// Добавление пути
						d3.select("#header-animations").node().appendChild(importedNode);

					  	var svg = d3.select("#" + animationParams.route),
					  		path = svg.select("path.path"),
					  		startPoint = pathStartPoint(path);

					  	// Добавление объекта анимации
					  	var object = svg.append("image")
					  		.attr("xlink:href", "/bitrix/templates/mbe/i/" + animationParams.object + ".png")
					  		.attr("transform", "translate(" + startPoint[0] + "," + startPoint[1] + ")")
					  		.attr("width", animationParams.width)
					  		.attr("height", animationParams.height);

					  	// Начальная точка
					 	function pathStartPoint(path) {
					    	var d = path.attr("d"),
					    		dsplitted = d.split(" ");
					    	return dsplitted[1].split(",");
					  	};

					  	// Старт анимации
					  	//transition();
						(function(object, path, animationParams) {
							transition(object, path, animationParams);
						})(object, path, animationParams);


					  	// Анимация
					  	function transition(object, path, animationParams) {

					    	object.transition()
					    		.delay(animationParams.delay)
					        	.duration(animationParams.duration)
					        	.each("start", function() {
					        		$("#" + animationParams.route).css("opacity", "1");
					        	})
					        	.ease("linear")
					        	.attrTween("transform", translateAlong(path.node()))
					        	.each("end", function() {
					        		$("#" + animationParams.route).css("opacity", "0");
					        	});
					  	};
						
						// Процесс анимации по пути
					  	function translateAlong(path) {
					    	var l = path.getTotalLength(),
					    		t0 = 0;

					    	return function(i) {

					      		return function(t) {
					        		var p0 = path.getPointAtLength(t0 * l),
					        			p = path.getPointAtLength(t * l),
					        			angle = Math.atan2(p.y - p0.y, p.x - p0.x) * 180 / Math.PI,
					        			centerX = p.x + animationParams.offsetX,
					        			centerY = p.y + animationParams.offsetY;
					        	
					        		t0 = t;
					      			
					        		return "translate(" + centerX + "," + centerY + ")rotate(" + angle + " 24" + " 12" +")";
					      		}

					    	}
					  	}
					}
				}

			},



			// Блок новостей с табами
			initTabs: function() {
				var $tabs = $(".page-tab-item"),
					tabs = [],
					activeTab = "page-tab-item--active",
					activeContent = "active";

				$tabs.each(function() {
					var $tab = $(this),
						code = $tab.data("tabs"),
						$tabContent = $($tab.data("tab"));

					if($tabContent.hasClass(activeContent)) {
						$tabContent.removeClass(activeContent).css("display", "block");
						(function($tabContent) {
							setTimeout(function() {
								$tabContent.addClass(activeContent);
							}, 50);
						})($tabContent);
					}

					if(!tabs[code]) {
						tabs[code] = [];
					}
					tabs[code].push($tab);
				});

				$tabs.on("click", function(e) {
					var $tab = $(this),
						code = $tab.data("tabs");

					if($tab.hasClass(activeTab)) {
						return false;
					}
					for(var i = 0, len = tabs[code].length; i < len; i++) {
						var $tempTab = tabs[code][i];
						$($tempTab.data("tab")).removeClass(activeContent).css("display", "none");
						$tempTab.removeClass(activeTab);
					}

					$tab.addClass(activeTab);

					$($tab.data("tab")).css("display", "block");
					(function($tabContent) {
						setTimeout(function() {
							$tabContent.addClass(activeContent);
						}, 50);
					})($($tab.data("tab")));

					e.preventDefault();
				});
			},



			initAjaxForms: function() {

				var $buttons = $(".ajax-form");

				$buttons.fancybox({
					wrapCSS: "ajax-form-holder",
					padding: [40, 40, 40, 40],
					helpers: {
						title: null,
						overlay: {
							locked: false
						}
					},
					tpl: {
						closeBtn: '<a title="Закрыть" class="ajax-form-close" href="javascript:;"></a>'
					},
					afterLoad: function(i, j) {
						var $content = $(this.content)
						MBE.customizeForms($content);
					}
				});

			},

			// Страница услуги
			initService: function() {
				// Плавающее меню
				$("#service-menu").stick_in_parent();

			},


			// Инифициализация фоторамы
			initFotorama: function() {
				$(".fotorama--noauto").on("fotorama:ready", function(e, fotorama) {
					$fotorama = $(this);

					// Кастомизация стрелок
					$fotorama.find(".fotorama__arr--prev").addClass(fotorama.options.prevclass);
					$fotorama.find(".fotorama__arr--next").addClass(fotorama.options.nextclass);

					// Кастомизация лупы
					$fotorama.find(".fotorama__fullscreen-icon").addClass(fotorama.options.loopclass);
				}).fotorama();
			},


			initReviewsSlider: function() {
				var $reviewsSliderHolder = $("#reviews-slider"),
					$reviewsSlider = $(".reviews-inner", $reviewsSliderHolder),
					reviewsSliderOwl = false;

				if(!$reviewsSliderHolder.length) {
					return false;
				}

				reviewsSliderOwl = $reviewsSlider.owlCarousel({
					items: 2,
					itemsDesktopSmall: [1050, 2],
					itemsTablet: [770, 1],
					slideSpeed: 500,
					navigation: false
				});

				$(".reviews-slider-control--prev", $reviewsSliderHolder).on("click", function() {
					reviewsSliderOwl.trigger("owl.prev");
				});

				$(".reviews-slider-control--next", $reviewsSliderHolder).on("click", function() {
					reviewsSliderOwl.trigger("owl.next");
				});
			},

			initWorldSlider: function() {
				var $worldSliderHolder = $("#world-slider"),
					$worldSlider = $(".world-list-inner", $worldSliderHolder),
					worldSliderOwl = false;

				if(!$worldSliderHolder.length) {
					return false;
				}

				worldSliderOwl = $worldSlider.owlCarousel({
					items: 4,
					itemsDesktopSmall: [1050, 2],
					itemsTablet: [770, 1],
					slideSpeed: 500,
					navigation: false
				});

				$(".world-slider-control--prev", $worldSliderHolder).on("click", function() {
					worldSliderOwl.trigger("owl.prev");
				});

				$(".world-slider-control--next", $worldSliderHolder).on("click", function() {
					worldSliderOwl.trigger("owl.next");
				});
			},


			customizeForms: function($container) {

				if(!$container) {
					$container = $sel.body;
				}
				jcf.setOptions("Select", {
					wrapNative: false
				});

				jcf.replace(".form-element--select");
				jcf.replace(".form-element--file");



				function custimizeCheckboxList() {
					$(".checkbox-item-element").on("change", function() {
						var $parent = $(this).closest(".checkbox-item");
						if($(this).is(":checked")) {
							$parent.addClass("checked");
						} else {
							$parent.removeClass("checked");
						}
					});
				}
				if($container.find(".checkbox-list").length) {
					custimizeCheckboxList();
				}

			},




			// Центры
			initCenters: function() {

				if(!$sel.body.hasClass("centers-page")) {
					return false;
				}

				// Инициализация карты
				var rMap = Raphael("centers-map", 500, 300);
				var rMapAttrs = {
					"def": {
						"fill": "#d5e4ec",
						"stroke": "#FFF",
						"stroke-width": "0.5",
						"stroke-linejoin": "round",
						"cursor": "pointer"
					},
					"hover": {
						"fill": "#e9f4fa"
					},
					"active": {
						"fill": "#e9f4fa"
					}
				};
				// Объекты на карте
				var rMapObjects = {};

				// Загрузка данных о центрах
				var regions;
				/*$.getJSON("/bitrix/templates/mbe/ajax/regions.php", function(data) {
						
					var regions = data;

					// Проход по всем регионам
					for(var i = 0, len = regions.length; i < len; i++) {
						
						var rMapObj = rMap.set(),
							region = regions[i];

						// Добавление объекта на карту
						rMapObj.push(rMap.path(region.path));
						rMapObj.attr(rMapAttrs.def);
						if(region.strokeWidth) {
							rMapObj.attr("stroke-width", region.strokeWidth);
						}
						// Кастомные параметры
						rMapObj.data("areaCode", region.code);
						rMapObj.data("areaName", region.name);


						// Наведение на регион
						//rMapObj.mouseover(function() {
						//	hoverArea(this.data("areaCode"), this.data("cities"));
						//});
						//rMapObj.mouseout(function() {
						//	unHoverAreas();
						//});
					
						// Если в регионе нет городов - идем далее
						if(!region.cities) {
							continue;
						}

						// Координаты текущего региона
						var rMapObjCoords = rMapObj.getBBox();

						// Добавление городов
						for(var j = 0, len2 = region.cities.length; j < len2; j++) {
							var rMapObjPoint,
								city = region.cities[j];

							// HTML для метки
							var $mapMarker = $('<div class="map-marker map-marker--small" data-area="' + region.code + '" data-id="' + city.id + '" data-left="' + ((parseInt(city.position.left) - (parseInt(rMapObjCoords.x) * 2)) / (parseInt((rMapObjCoords.width) * 2))) + '" data-top="' + (parseInt(city.position.top - parseInt(rMapObjCoords.y) * 2 - 80) / (parseInt((rMapObjCoords.height) * 2))) + '" />');
							$mapMarker.append('<svg width="100%" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 47 68" style="enable-background:new 0 0 47 68;" xml:space="preserve"><ellipse opacity="0.48" fill="#7C8B93" cx="24" cy="64" rx="12" ry="4"/><path fill="' + city.color + '" d="M23.5,0C36.5,0,47,10.5,47,23.5C47,36.5,24,65,24,65S0,36.5,0,23.5C0,10.5,10.5,0,23.5,0z"/><circle fill="1E1E1E" cx="24" cy="22" r="18"/><path fill="#d4d4d4" d="M18.4,9.3l12,0.4l0.5,0.3l-14.5,0.3C17,10,17.8,9.5,18.4,9.3z"/><path fill="#d4d4d4" d="M14.2,12.3l20.1,0.5l0.4,0.4l-21.5,0.4C13.3,13.2,13.8,12.7,14.2,12.3z"/><path fill="#d4d4d4" d="M11.8,15.7l24.5,0.5l0.1,0.3L11.3,17C11.4,16.5,11.6,16.1,11.8,15.7z"/><path fill="#d4d4d4" d="M10.9,18.4l26.4,0.7l0,0.1l-26.7,0.5C10.7,19.2,10.8,18.8,10.9,18.4z"/><path fill="#d4d4d4" d="M10.5,21.6c0-0.1,0-0.4,0-0.5l27,0.7V22l-27,0.5C10.5,22.1,10.5,22,10.5,21.6z"/><path fill="#d4d4d4" d="M10.7,23.9l26.5,0.6l0,0.1L11,25.2C10.8,24.7,10.7,24.3,10.7,23.9z"/><path fill="#d4d4d4" d="M30.4,33.5l-12,0.4c-0.5-0.3-1.4-0.8-1.9-1.1l14.7,0.3L30.4,33.5z"/><path fill="#d4d4d4" d="M34.2,30.5l-19.9,0.5c-0.3-0.4-0.8-0.8-1-1.3l21.3,0.4L34.2,30.5z"/><path fill="#d4d4d4" d="M36.1,27.6l-24,0.5c-0.2-0.4-0.4-0.9-0.6-1.3l24.8,0.5L36.1,27.6z"/></svg>');
							
							// Добавление тутлипа
							var mapTooltip = city.name + ' - <a href="#" class="show-city" data-city="' + city.id + '">' + city.count + ' офисов</a>';
							$mapMarker.attr("title", mapTooltip);

							// Координаты для метки
							var mapMarkerPosition = {
								left: parseInt(city.position.left),
								top: parseInt(city.position.top)
							}

							// Добавление метки на карту
							$("#centers-map").append($mapMarker.css({
								left: mapMarkerPosition.left,
								top: mapMarkerPosition.top
							}));
						}
					


						// Добавление в массив
						rMapObjects[region.code] = rMapObj;

					}

					// Инициализация тултипов для карты
					$(".map-marker").tooltipster({
						animation: "grow",
						arrow: false,
						delay: 100,
						offsetX: -52,
						offsetY: 20,
						position: "right",
						theme: "page-tooltip page-tooltip--map",
						interactive: true,
						contentAsHTML: true,
						speed: 600,
						functionBefore: function(origin, continueTooltip) {
							continueTooltip();

							$(origin).addClass("map-marker--large");
						},
						functionAfter: function(origin, continueTooltip) {
							$(origin).removeClass("map-marker--large");
						}
					});

				});
				*/
				$.ajax({
					url: "/bitrix/templates/mbe/ajax/regions.php",
					//dataType: "json",
					success: function(result) {


						var regions = JSON.parse(result);
						//console.log(regions);

						// Проход по всем регионам
						for(var i = 0, len = regions.length; i < len; i++) {

							var rMapObj = rMap.set(),
								region = regions[i];

							// Добавление объекта на карту
							rMapObj.push(rMap.path(region.path));
							rMapObj.attr(rMapAttrs.def);
							if(region.strokeWidth) {
								rMapObj.attr("stroke-width", region.strokeWidth);
							}

							// Кастомные параметры
							rMapObj.data("areaCode", region.code);
							rMapObj.data("areaName", region.name);



							// Наведение на регион
							/*
							rMapObj.mouseover(function() {
								hoverArea(this.data("areaCode"));
							});
							rMapObj.mouseout(function() {
								unHoverAreas();
							})
							*/

							// Если в регионе нет городов - идем далее
							if(!region.cities) {
								continue;
							}

							// Координаты текущего региона
							var rMapObjCoords = rMapObj.getBBox();

							// Добавление городов
							for(var j = 0, len2 = region.cities.length; j < len2; j++) {
								var rMapObjPoint,
									city = region.cities[j];
									//city.color = '##FF3D22';
								// HTML для метки
								var $mapMarker = $('<div class="map-marker map-marker--small"  data-area="' + region.code + '" data-id="' + city.id + '" data-left="' + ((parseInt(city.position.left) - (rMapObjCoords.x * 2)) / (parseInt((rMapObjCoords.width) * 2))) + '" data-top="' + (parseInt(city.position.top - rMapObjCoords.y * 2) / (parseInt((rMapObjCoords.height) * 2))) + '" />');
								$mapMarker.append('<img src="../i/thunder.png" alt="thunder">');
								// Добавление тутлипа
								if (city.count == 1){
									var mapTooltip = city.name + ' - <a href="' + city.detail + '" class="" data-city="' + city.id + '">' + city.count + ' ' + city.office_morph + '</a>';
								}else{
									var mapTooltip = city.name + ' - <a href="' + city.detail + '" class="show-city" data-city="' + city.id + '">' + city.count + ' ' + city.office_morph + '</a>';
								}
								$mapMarker.attr("title", mapTooltip);

								// Координаты для метки
								var mapMarkerPosition = {
									left: parseInt(city.position.left),
									top: parseInt(city.position.top)
								}

								// Добавление метки на карту
								$("#centers-map").append($mapMarker.css({
									left: mapMarkerPosition.left,
									top: mapMarkerPosition.top
								}));

							}

							// Добавление в массив
							rMapObjects[region.code] = rMapObj;

						}

						// Инициализация тултипов для карты
						$(".map-marker").tooltipster({
							animation: "grow",
							arrow: false,
							delay: 100,
							offsetX: -52,
							offsetY: 20,
							position: "right",
							theme: "page-tooltip page-tooltip--map",
							interactive: true,
							contentAsHTML: true,
							speed: 600,
							functionBefore: function(origin, continueTooltip) {
								continueTooltip();

								$(origin).addClass("map-marker--large");
							},
							functionAfter: function(origin, continueTooltip) {
								$(origin).removeClass("map-marker--large");
							}
						});

					}
				});


				$mapTemplates = $(".centers-template-item");
				// Виды карты
				function initMapViews() {
					$mapViews = $(".centers-view-item");
					$mapViews.on("click", function(e) {
						var $mapView = $(this),
							mapViewCode = $mapView.data("view"),
							$viewTemplate = $("#" + mapViewCode);

						if(mapViewCode == "mapobject") {
							$centerItem.removeClass("centers-holder--active");
							$centersList.addClass("centers-holder--active");
						} else {
							// Деактивация текущих видов
							$mapTemplates.addClass("centers-template-item--ready").removeClass("centers-template-item--active");
							$mapViews.removeClass("centers-view-item--active");

							// Активация выбранного вида
							$mapView.addClass("centers-view-item--active");
							$viewTemplate.removeClass("centers-template-item--ready").addClass("centers-template-item--active");
						}
						e.preventDefault();
					});
				}
				initMapViews();

				$mapViews.filter("[data-view=map]").trigger("click");

				// Фильтрация регионов карты
				var $mapRegions = $(".map-point-item");
				$mapRegions.on("click", function(e) {
					var $mapRegion = $(this),
						regionArea = $mapRegion.data("area");

					if($mapRegion.hasClass("centers-point-item--active")) {
						$mapRegions.removeClass("centers-point-item--active");
						unHoverAreas();
						return false;
					}

					// Сброс все активных меток
					$mapRegions.removeClass("centers-point-item--active");
					unHoverAreas(true);

					// Активация выбранной метки
					$mapRegion.addClass("centers-point-item--active");
					hoverArea(regionArea, rMapObjects[regionArea].data("cities"));

					e.preventDefault();
				});

				// Фильтрация списков
				var $listRegions = $(".list-point-item"),
					$listCities = $(".list-city-item");
				if($sel.window.width() >= 770) {
					/*$listRegions.on("click", function(e) {
						var $listRegion = $(this),
							regionArea = $listRegion.data("area");

						// Сброс все активных меток
						$listRegions.removeClass("centers-point-item--active");
						$listCities.hide();

						// Активация выбранной метки
						$listRegion.addClass("centers-point-item--active");
						$listCities.filter("[data-area=" + regionArea + "]").show();

						e.preventDefault();
					});*/
					$listRegions.on("click", function(e) {

						var $listRegion = $(this),
							regionArea = $listRegion.data("area");

						if ($listRegion.hasClass("centers-point-item--active")){

							// Сброс все активных меток
							$listRegions.removeClass("centers-point-item--active");
							$listCities.show();

						}else{

							// Сброс все активных меток
							$listRegions.removeClass("centers-point-item--active");
							$listCities.hide();

							// Активация выбранной метки
							$listRegion.addClass("centers-point-item--active");
							$listCities.filter("[data-area=" + regionArea + "]").show();
						}

						e.preventDefault();
					});
				}

				// Показ плашки с городом
				var $centersList = $("#centers-list"),
					$centerItem = $("#center-item");
				$sel.body.on("click", ".show-city,.center-backtomap", function(e) {
					var $item = $(this),
						$centerBacktomap = $(this)
						cityCode = $item.data("city");

					$.ajax({
						url: "/bitrix/templates/mbe/ajax/centers_city.php",
						data: {
							"id": cityCode
						},
						success: function(result) {
							$centersList.removeClass("centers-holder--active");
							$centerItem.empty().append(result);

							//$centerItem.find('.centers-toolbar').hide();
							$centerItem.find('.centers-toolbar .centers-view-item').addClass('only-city');
							$centerItem.find('h1').css({'z-index': '1000', 'position':'relative'});
							$centerBacktomap.hide();

							MBE.initContactsMap($centerItem);
							$centerItem.addClass("centers-holder--active");
							jcf.replace($centerItem.find(".jcf-scrollable"));
							initMapViews();
						}
					});

					e.preventDefault();
				});

				MBE.setCenter($(".centers-holder"));

				var $hoverCities = [];
				function hoverArea(areaCode) {
					if(!rMapObjects[areaCode]) {
						return false;
					}

					var rmapObjectBox = rMapObjects[areaCode].getBBox();

					rMapObjects[areaCode].toFront().animate({
						"fill": rMapAttrs.hover.fill,
						"transform": "s1.8 1.8"
					}, 300);

					var $cities = $("div[data-area=" + areaCode + "]");
					$("div[data-area=" + areaCode + "]").removeClass("map-marker--fade");
					if($cities.length) {
						var rmapObjectBoxWidthAdd = (rmapObjectBox.width) * 0.8,
							rmapObjectBoxHeightAdd = (rmapObjectBox.height) * 0.8;

						$cities.each(function() {
							var $city = $(this),
								cityLeft = $city.data("left"),
								cityTop = $city.data("top"),
								cityLeftNew = (rmapObjectBoxWidthAdd / 2) * cityLeft,
								cityTopNew = (rmapObjectBoxHeightAdd / 2) * cityTop;

							$hoverCities.push($city);

							console.log(cityLeftNew, cityTopNew)
							
							$city.css({
								"z-index": "10000",
								"transform": "translateX(" + (cityLeftNew * (cityLeft > 0.5 ? 1 : -1)) + "px) translateY(" + (cityTopNew * (cityTop > 0.5 ? 1 : -1)) + "px)" 
							});

						});
					}

				}

				function unHoverAreas(isFadeOut) {
					for(var areaCode in rMapObjects) {
						rMapObjects[areaCode].animate({
							"fill": rMapAttrs.def.fill,
							"transform": "s1 1"
						}, 300);

						if(isFadeOut !== undefined) {
							$("div[data-area=" + areaCode + "]").addClass("map-marker--fade");
						} else {
							$("div[data-area=" + areaCode + "]").removeClass("map-marker--fade");
						}
						
					}


						for(var i = 0, len = $hoverCities.length; i < len; i++) {
							var $city = $hoverCities[i];

							$city.css({
								"transform": "translateX(0) translateY(0)" 
							});
						}

						$hoverCities = [];
				}





			},

			// Всплывающие подсказки (для карт производится отдельная инициализация)
			initTooltips: function() {

				$(".has-tooltip").each(function() {
					var $item = $(this);

					$item.tooltipster({
						animation: $item.data("tooltipanimation") || "grow",
						arrow: $item.data("tooltiparrow") || false,
						delay: $item.data("tooltipdelay") || 100,
						offsetX: $item.data("tooltipoffsetx") || 0,
						offsetY: $item.data("tooltipoffsety") || 0,
						position: $item.data("tooltipposition") || "top",
						theme: $item.data("tooltiptheme") || "tooltipster-default",
						content: $item.find($item.data("tooltipcontent")) || null,
						interactive: true
					});
				});

			},

			// Инициализация временной ленты на странице "О компании"
			initTimeline: function() {
				var $timelineHolder = $("#timeline-holder");

				if(!$timelineHolder.length) {
					return false;
				}

				var $timeline = $("#timeline", $timelineHolder),
					$timelineItems = $(".timeline-item", $timeline),
					$timelineTexts = $(".timeline-text-item", $timelineHolder),
					itemMargin = 130;

				// Выстараивание элементов на ленте
				function setItems(callback) {
					// Обновление элементов ленты
					$timelineItems = $(".timeline-item", $timeline);

					var currentLeft = 0;
					$timelineItems.each(function() {
						var $item = $(this);

						// Пропускаем наш последний элемент
						if(!$item.hasClass("timeline-item--last")) {
							$item.css({
								"margin-left": currentLeft + "px"
							});

							(function($item) {
								setTimeout(function() {
									$item.css("visibility", "visible");
								}, 400);
							})($item);

							currentLeft += itemMargin;
						}

					});

					if(callback) {
						callback();
					}
				}

				// Старт
				setItems(function() {
					$timeline.addClass("timeline--show");
					initTooltip();

					showInfo($timelineItems.filter(":eq(0)"));
				});

				// Перемещение элементов после клика
				function movingItems($itemFrom) {
					// Все элементы, находящиеся до текущего смещаем влево
					var $itemsPrev = $($itemFrom.prevAll().get().reverse());

					// Перемещение поселднего элемента
					var $lastItems = $timeline.find(".timeline-item--last");
					if($lastItems.length) {
						$lastItems.css({
							"visibility": "hidden",
							"left": "50%",
							"margin-left": "10000px"
						});
						$lastItems.removeClass("timeline-item--last");
					}

					$itemsPrev.each(function(i) {
						var $itemPrev = $(this);

						// Для последней метки добавляем специальный класс
						if(i == ($itemsPrev.length - 1)) {
							$itemPrev.addClass("timeline-item--last");
							$itemPrev.css({
								"left": "-20px",
								"margin-left": "0"
							});
						}

						$itemPrev.remove();
						$timeline.append($itemPrev);

					});

					initTooltip();
				}

				// Клик по тултипу
				function showInfo($item) {
					// Активируем метку
					$timelineItems.removeClass("timeline-item--active");
					$item.addClass("timeline-item--active");
					
					// Убираем тултип
					$item.tooltipster("hide");

					// Показываем выбранный текст
					$timelineTexts.removeClass("timeline-text-item--active");
					$("#" + $item.data("info")).addClass("timeline-text-item--active");
	
					// Перемещение элементов
					movingItems($item);
					// Пересортировка
					setItems();
				}

				// Инициализация тултипов
				function initTooltip() {
					$(".has-tooltip").each(function() {
						var $item = $(this);

						$item.tooltipster({
							animation: $item.data("tooltipanimation") || "grow",
							arrow: $item.data("tooltiparrow") || false,
							delay: $item.data("tooltipdelay") || 100,
							offsetX: $item.data("tooltipoffsetx") || 0,
							offsetY: $item.data("tooltipoffsety") || 0,
							position: $item.data("tooltipposition") || "top",
							theme: $item.data("tooltiptheme") || "tooltipster-default",
							content: $item.find($item.data("tooltipcontent")) || null,
							interactive: true,
							functionBefore: function(origin, continueTooltip) {
								var $origin = $(origin);
								// Для активных меток не показываем тултип
								if(!$origin.hasClass("timeline-item--active") && !$origin.hasClass("timeline-item--last")) {
									continueTooltip();
								}
							},
							functionReady: function(origin, tooltip) {
								// Обработка клика по тултипу
								$(tooltip).on("click", function() {
									showInfo($(origin));
								});
							}
						});
					});
				}

			},

			// Подгрузка данных
			initLoadMore: function() {

				$("body").on("click", ".more-link", function(e) {
					var $link = $(this),
						$container = $($link.data("container"));

					if($link.isLoading) {
						return false;
					}
					$link.isLoading = true;
					$link.addClass("more-link--loading");
					$.ajax({
						url: $link.attr("href"),
						success: function(data) {
							var $html = $(data).addClass("more-item");
							setTimeout(function() {
								$html.addClass("more-item--active");
							}, 100);
							$container.append($html);

							$link.remove();
						}
					});

					e.preventDefault();
				})

			},


			setCenter: function($elements) {

				$elements.each(function() {
					var $element = $(this),
						elementWidth = $element.outerWidth();

					$element.css("margin-left", (elementWidth / 2 * -1) + "px");
				});
			},


			initServiceSlider: function() {
				var $serviceSliderHolder = $("#service-slider"),
					$serviceSlider = $(".service-slider-inner", $serviceSliderHolder),
					serviceSliderOwl = false;

				if(!$serviceSliderHolder.length) {
					return false;
				}

				serviceSliderOwl = $serviceSlider.owlCarousel({
					items: 4,
					slideSpeed: 500,
					navigation: false
				});

				$(".service-slider-control--prev", $serviceSliderHolder).on("click", function() {
					serviceSliderOwl.trigger("owl.prev");
				});

				$(".service-slider-control--next", $serviceSliderHolder).on("click", function() {
					serviceSliderOwl.trigger("owl.next");
				});

				if($serviceSlider.data("owlCarousel").itemsAmount < 5) {
					$(".service-slider-control--prev", $serviceSliderHolder).hide();
					$(".service-slider-control--next", $serviceSliderHolder).hide();	
				}
			},

			initCenter: function() {

				var $centersList = $("#centers-list"),
					$centerItem = $("#center-item");

				$sel.body.on("click", ".center-backtomap", function(e) {
					var $centerBacktomap = $(this),
					cityCode = $(this).data("city");



					$.ajax({
						url: "/bitrix/templates/mbe/ajax/centers_city.php",
						data: {
							"id": cityCode
						},
						success: function(result) {
							$('.page-content *:not(#center-item)').fadeOut(300);
							$('.page-content').css({
								'position':'relative',
								'overflow':'hidden',
								'height':'700px'
							});
							$centerItem.show();

							$centersList.removeClass("centers-holder--active");
							$centerItem.empty().append(result);

							//$centerItem.find('.centers-toolbar').hide();
							$centerItem.find('.centers-toolbar .centers-view-item').addClass('only-city');
							$centerItem.find('h1').css({'z-index': '1000', 'position':'relative'});
							$centerBacktomap.hide();


							MBE.initContactsMap($centerItem);
							$centerItem.addClass("centers-holder--active");
							jcf.replace($centerItem.find(".jcf-scrollable"));
							initMapViews();
						}
					});

					e.preventDefault();
				});


				function initMapViews() {
					$mapViews = $(".centers-view-item:not(.only-city)");
					$mapViews.on("click", function(e) {
						var $mapView = $(this),
							mapViewCode = $mapView.data("view"),
							$viewTemplate = $("#" + mapViewCode);

						if(mapViewCode == "mapobject") {
							$centerItem.removeClass("centers-holder--active");
							$centersList.addClass("centers-holder--active");
						} else {
							// Деактивация текущих видов
							$mapTemplates.addClass("centers-template-item--ready").removeClass("centers-template-item--active");
							$mapViews.removeClass("centers-view-item--active");

							// Активация выбранного вида
							$mapView.addClass("centers-view-item--active");
							$viewTemplate.removeClass("centers-template-item--ready").addClass("centers-template-item--active");
						}
						e.preventDefault();
					});
				}
			},

			initScroll: function() {
				var $scrollItems = $("[data-scrolltarget]");

				$scrollItems.on("click", function(e) {
					var $item = $(this),
						$target = $($item.data("scrolltarget"));

					if(!$target.length) {
						return false;
					}

					$("body").animate({
						"scrollTop": $target.offset().top
					}, Math.abs(($target.offset().top - $(window).scrollTop()) / 2));

					e.stopPropagation();
				});
			},

			initSteps: function() {
				var $stepButtons = $("[data-targetstep]"),
					$steps = $("[data-step]");

				$stepButtons.on("click", function(e) {
					var currentStepCode = $(this).data("targetstep"),
						$currentStep = $steps.filter("[data-step=" + currentStepCode + "]"),
						$prevStep = $steps.filter(".step--active.step--required"),
						flag = true;

					if($prevStep.length) {
						var tag = $prevStep.prop("tagName");

						if(tag == "FIELDSET") {
							var $fields = $prevStep.find(".form-element");

							$fields.each(function() {
								var $field = $(this);

								if($field.val() == "c0" || !$field.val()) {
									flag = false;
								}
							});
						}
					}

					if(flag) {
						$steps.removeClass("step--active");
						$currentStep.addClass("step--active");
					}


					e.preventDefault();
				});
			},



			initSimpleBinder: function() {

				var $items = $("[data-bval]");

				$items.on("change blur", function() {
					var $item = $(this),
						val = '';

					switch($item.prop("tagName")) {
						case "SELECT":
							val = $item.find("option:selected").text()
						break;
						default:
							val = $item.val()
						break; 
					}

					$("[data-btext=" + $item.data("bval") + "]").text(val);
				});

			},

			initLocations: function() {

				var $radios = $(".location-item-radio"),
					$radioHolders = $(".location-item");

				$radios.on("change", function() {
					var $radio = $(this);
					$radioHolders.removeClass("current");

					$radio.closest(".location-item").addClass("current");

				});

			},

			initMobile: function() {

				var $menuToggler = $(".mobile-menu-toggler"),
					$menu = $(".header-menu");

				$menuToggler.on("click", function() {
					$menu.toggle();
					$menu.toggleClass("active");
					$menuToggler.toggleClass("active");
				});
			},

			initHeaderScroll: function() {
				var $page = $(".page");
				$sel.window.on("scroll", function() {
					checkHeader();
				});
				checkHeader();
				function checkHeader() {
					var vh = $('.page-header').height();
					 if($sel.window.scrollTop() > vh) {
						$page.addClass("page--scroll");
						$('.svg.scroll').css({'display':'block'});
					} else {
						$page.removeClass("page--scroll");
						$('.svg.scroll').css({'display':'none'});
					}
				}
			}


		}

	}());

	MBE.initContactsMap();
	MBE.initMasonry();

	MBE.initWorld();

	MBE.initHome();

	MBE.initTabs();

	MBE.initAjaxForms();

	MBE.initService();

	MBE.initFotorama();

	MBE.initCenters();

	MBE.initReviewsSlider();
	MBE.initWorldSlider();
	MBE.initServiceSlider();

	//MBE.initTooltips();

	MBE.customizeForms();

	MBE.initTimeline();

	MBE.initLoadMore();

	MBE.initScroll();

	MBE.initSteps();

	MBE.initLocations();


	MBE.initSimpleBinder();

	MBE.initCenter();

	MBE.initMobile();

	MBE.initHeaderScroll();


})(jQuery);

$(document).on('ready', function(){
	/*
     * Replace all SVG images with inline SVG
     */
    $('img.svg').each(function(){
        var $img = $(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('data-src');

        $.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = $(data).find('svg');

            // Add replaced image's ID to the new SVG
            if(typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if(typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass+' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');

            // Replace image with new SVG
            $img.replaceWith($svg);

        }, 'xml');
   });

    if ( window.location.pathname == '/' ){
   		
	} else {
	    $('.page').addClass('not_main_page');
	}
	
	

});