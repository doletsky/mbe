<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>

<?//pre($arResult);?>

<?
//print_r($arResult['ITEMS']);
$arSecSelect = Array('ID', 'NAME', 'UF_CITY_TITLE', 'UF_CITY_MAP', 'UF_CITY_MAP_ZOOM', 'UF_CSS_CLASS');
$arSecFilter = Array('IBLOCK_ID' => $arResult['IBLOCK_ID'], "ID"=>$arResult['IBLOCK_SECTION_ID'], "ACTIVE"=>"Y");

$resSec = CIBlockSection::GetList(Array('SORT'=>'ASC'), $arSecFilter, false, $arSecSelect);

if ($section = $resSec->GetNext()){
	//print_r($section);
	$city_points = array();
	$latlng = explode(',', $section['UF_CITY_MAP']);

	$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_MAP");
	$arFilter = Array("IBLOCK_ID"=>4, 'SECTION_ID' => $section['ID'], "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();

		$point = '';
		$point->size->width = "47";
		$point->size->height = "68";
		$point->icon =  $section['UF_CSS_CLASS'];
		$point->tooltip = "<a href='" . $arFields['DETAIL_PAGE_URL'] . "'>" . $arFields['NAME'] . "</a>";
		$pointlatlng = explode(',', $arFields['PROPERTY_MAP_VALUE']);
		$point->lat = $pointlatlng[0];
		$point->lng = $pointlatlng[1];

		$city_points[] = $point;
	}

	//pre($city_points);

?>

<div id="center-item" class="page-inner page-inner--relative centers-holder"
	style="margin-left: -615px; display:none;   background: #fff;">
</div>

<div class="page-inner">
	<div class="page-heading-holder" style="position: relative;">
		<h1 class="page-heading-title page-heading-title--h1"><?= $section['UF_CITY_TITLE'];?></h1>

		<div class="centers-toolbar">
	  	<div class="centers-view center-backtomap" data-city="<?= $arResult['IBLOCK_SECTION_ID'];?>"><a href="#" data-view="mapobject" class="centers-view-item"><span class="centers-view-item-icon">
	        <svg width="25" viewBox="0 0 23.23 20.28">
	          <polyline points="7.16 4.63 4.03 2.72 7.16 0.4" fill="none" stroke="#000" stroke-miterlimit="10"></polyline>
	          <polyline points="4.66 2.53 22.73 2.53 22.73 19.78 0.5 19.78 0.5 2.53" fill="none" stroke="#000" stroke-miterlimit="10"></polyline>
	        </svg></span><span class="centers-view-item-name">Вернуться к карте</span></a>
			</div>
		</div>
	</div>
	<div class="page-content-inner page-text-block">
		<div class="columns">
			<div class="column-item column-item--left column-item--w40 column-item--m5 page-text">
				<div class="contacts-title">

					<?= $arResult['PROPERTIES']['POST_INDEX']['VALUE'];?>,
					<?= $section['NAME'];?>,
					<?= $arResult['NAME'];?>
				</div>
			</div>
			<div class="column-item column-item--left column-item--w25">
				<div class="contacts-title-holder"><a href="tel:+74957881566" title="Позвоните нам" class="contacts-title link link--black link--black--inverse">	<?= $arResult['PROPERTIES']['PHONE']['VALUE'];?></a></div>
				<div class="contacts-title-holder"><a href="#callback-form" class="link link--blue link--blue--inverse ajax-form">Закажите обратный звонок</a></div>
			</div>
			<div class="column-item column-item--right column-item--w28">
				<div class="contacts-title-holder"><a href="mailto:mberus0040@mailboxesetc.ru" title="Напишите нам" class="contacts-title link link--black link--black--inverse">	<?= $arResult['PROPERTIES']['EMAIL']['VALUE'];?></a></div>
				<div class="contacts-title-holder"><a href="#feedback-form" class="link link--blue link--blue--inverse ajax-form">Напишите нам</a></div>
			</div>
		</div>
	</div>
	<div class="columns page-text-block">
		<div class="column-item column-item--w48 column-item--left page-text">
			<h2>О центре</h2>
			<?= $arResult['PREVIEW_TEXT'];?>
		</div>
		<div class="column-item column-item--w48 column-item--right page-text">
			<div data-nav="false" data-allowfullscreen="true" data-loop="true" data-auto="false" data-loopclass="icon-loop_blue-before" data-prevclass="icon-blue_pointer_left-before" data-nextclass="icon-blue_pointer_right-before" data-width="100%" data-shadows="false" data-margin="0" data-arrows="always" data-autoplay="5000" data-transitionduration="1500" class="fotorama fotorama--noauto content-slider">
				<? foreach($arResult['PROPERTIES']['IMAGES']['VALUE'] as $i)
				{?>
					<img src="<?= CFile::GetPath($i);?>"/>
				<?}?>
			</div>
		</div>
	</div>
</div>
	<? if (count($arResult['PROPERTIES']['SERVICES']['VALUE']))
		{
			$pricelist = CFile::GetFileArray($arResult['PROPERTIES']['PRICE_LIST']['VALUE']);
		?>
		<div id="service-slider" class="services services--inline masonry">
			<div class="page-inner">
				<div class="page-heading-holder">
					<h2 class="page-heading-title page-heading-title--h2">Услуги</h2>
					<div class="page-heading-aside">
						<a href="<?=  $pricelist['SRC'];?>" data="<?= $arResult['PROPERTIES']['PRICE_LIST']['VALUE'];?>" class="download-link icon-download-before">
							<span class="download-link-title">Скачать прайс-лист</span>
							<span class="download-link-note">Excel, <?= round($pricelist['FILE_SIZE'] /(1024*1024), 2);?>Мб</span>
						</a></div>
				</div>
				<div class="masonry-sizer"></div>
				<div class="service-slider-inner">
						<?
							$arSelect = Array("ID", "NAME", 'PREVIEW_TEXT', "DETAIL_PAGE_URL","PROPERTY_COLOR", 'PROPERTY_ICON');
							$arFilter = Array("IBLOCK_ID"=>1, 'ID' => $arResult['PROPERTIES']['SERVICES']['VALUE'], "ACTIVE"=>"Y");
							$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
							while($ob = $res->GetNextElement())
							{
								$arFields = $ob->GetFields();
							?>
								<a href="<?= $arFields['DETAIL_PAGE_URL'];?>" class="service-item service-item--hx1 masonry-item masonry-item--hx1 service-item--block service-item--<?= $arFields['PROPERTY_COLOR_VALUE'];?>">
									<div class="service-item-inner">
										<span class="service-item-icon">
											<?= $arFields['~PROPERTY_ICON_VALUE'];?>
										</span>
										<span class="service-item-name"><?= $arFields['NAME'];?></span>
										<span class="service-item-description page-text"><?= $arFields['PREVIEW_TEXT'];?></span>
									</div>
								</a>
							<?
							}
							?>
				</div>
				<span class="service-slider-control service-slider-control--prev"></span><span class="service-slider-control service-slider-control--next"></span>
			</div>
		</div>
	<?}?>

<div class="page-inner">
	<div class="news-list-holder">
		<div class="cols news-list-toolbar-holder">
			<div class="news-list-toolbar news-list-toolbar--title col-item col-item--col2 col-item--middle">
				<h2 class="page-heading-title page-heading-title--h2" style="pointer-events: none;">Новости и акции</h2>
				<div class="page-tabs news-tabs">
					<a href="#" data-tab="#news-msk" data-tabs="news-tabs" class="page-tab-item page-tab-item--active"><?= $section['NAME'];?></a>
					<a href="#" data-tab="#news-region" data-tabs="news-tabs" class="page-tab-item">РФ</a>
				</div>
			</div>
		</div>

		<? $GLOBALS['filter'] = array('PROPERTY_CENTER' => $arResult['ID']); ?>
		<?$APPLICATION->IncludeComponent("bitrix:news.list", "news-center",
		  Array(
		    'IBLOCK_ID' => 5,
		    'CENTER' => $arResult['ID'],
		    'CITY' => $section['ID'],
				"SORT_BY1" => "ACTIVE_FROM",
		    "SORT_ORDER1" => "DESC",
		    "PROPERTY_CODE" => Array("DESCRIPTION"),
				"FILTER_NAME" => "filter",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"DETAIL_URL" => "/about/news-and-promotion/#ELEMENT_CODE#/",
		  ), false);?>

		<?$APPLICATION->IncludeComponent("bitrix:news.list", "news-center-rf",
		  Array(
		    'IBLOCK_ID' => 5,
				'CENTER' => $arResult['ID'],
				"SORT_BY1" => "ACTIVE_FROM",
		    "SORT_ORDER1" => "DESC",
		    "PROPERTY_CODE" => Array("DESCRIPTION"),
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		  ), false);?>

		</div>
	</div>

	<? $GLOBALS['filter_vacancy'] = array('PROPERTY_CENTER' => $arResult['ID']); ?>
	<?$APPLICATION->IncludeComponent("bitrix:news.list", "vacancies-center",
		Array(
			'IBLOCK_ID' => 7,
			'CENTER' => $arResult['ID'],
			'CITY' => $section['ID'],
			"SORT_BY1" => "SORT",
			"SORT_ORDER1" => "DESC",
			"PROPERTY_CODE" => Array("DESCRIPTION"),
			"FILTER_NAME" => "filter_vacancy",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		), false);?>


	<div class="contacts-map-holder">
		<div class="contacts-map-title">Наши офисы в г. <?= $section['NAME'];?></div>
		<div class="contacts-map-inner">
			<div data-lat="<?= $latlng[0];?>" data-lng="<?= $latlng[1];?>" data-zoom="<?= $section['UF_CITY_MAP_ZOOM'];?>" data-points="<?= htmlspecialchars(json_encode($city_points), ENT_QUOTES, 'UTF-8');?>" class="contacts-map"></div>
		</div>
	</div>

<?
//end city
}
?>
