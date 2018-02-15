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

<?
//print_r($arResult['ITEMS']);
$arSecSelect = Array('ID', 'NAME', 'UF_CITY_TITLE', 'UF_CITY_MAP', 'UF_CITY_MAP_ZOOM', 'UF_CSS_CLASS');
$arSecFilter = Array('IBLOCK_ID' => $arParams['IBLOCK_ID'], "ID"=>$arParams['PARENT_SECTION'], "ACTIVE"=>"Y");

$resSec = CIBlockSection::GetList(Array('SORT'=>'ASC'), $arSecFilter, false, $arSecSelect);

if ($section = $resSec->GetNext()){
	//print_r($section);
	$city_points = array();
	$latlng = explode(',', $section['UF_CITY_MAP']);
?>

	<h1 class="page-heading-title page-heading-title--h1"><?= $section['UF_CITY_TITLE'];?></h1>
	<div class="centers-toolbar">
	  <div class="centers-view"><a href="/centers-mbe/" data-view="mapobject" class="centers-view-item"><span class="centers-view-item-icon">
	        <svg width="25" viewbox="0 0 23.23 20.28">
	          <polyline points="7.16 4.63 4.03 2.72 7.16 0.4" fill="none" stroke="#000" stroke-miterlimit="10"></polyline>
	          <polyline points="4.66 2.53 22.73 2.53 22.73 19.78 0.5 19.78 0.5 2.53" fill="none" stroke="#000" stroke-miterlimit="10"></polyline>
	        </svg></span><span class="centers-view-item-name">Вернуться к карте РФ</span></a></div>
	</div>
	<div class="center-page">
	  <div class="center-page-addresses">
	    <div class="center-page-addresses-inner jcf-scrollable">
				<?foreach($arResult['ITEMS'] as $address)
				{?>
					<a href="<?= $address['DETAIL_PAGE_URL'];?>" class="center-page-address-item icon-map_label_small_<?= $section['UF_CSS_CLASS'];?>-before">
					<span class="center-page-address-item-name"><?= $address['NAME'];?></span>
					</a>
				<?
					$point = '';
					$point->size->width = "47";
					$point->size->height = "68";
					$point->icon =  $section['UF_CSS_CLASS'];
					$point->tooltip = "<a href='" . $address['DETAIL_PAGE_URL'] . "'>" . $address['NAME'] . "</a>";
					$pointlatlng = explode(',', $address['PROPERTIES']['MAP']['VALUE']);
					$point->lat = $pointlatlng[0];
					$point->lng = $pointlatlng[1];

					$city_points[] = $point;
				}?>
	  	</div>
		</div>
	  <div class="center-map-holder">
	    <svg viewbox="0 0 350.36 795.32" class="center-map-mask center-map-mask--right">
	      <path d="M2122.26,1292.24a40.51,40.51,0,0,1-1.74,12l0.12,5.52c-5,.77-5.7,7.66-9.26,11.1-5.36,5.17-8.64,7.75-5.73,14.6q-7.54,12.37-14.11,25.3c0.15-1.17-2.46-2.18-3.38-.84-1.06,1.55-.31,3.63.06,5.47,1.21,6-2.2,12.12-7,15.89s-10.75,5.65-16.57,7.45l-0.64-4.43c-16,2.56-14.62,15.66-24.91,15-4.22-.26-8.79-1.47-12.81-0.89a7.42,7.42,0,0,0-1.27,1.76c-1,1.95-.89,4.24-1.42,6.35-1.62,6.45-8.59,10-15.08,11.44-2.32.52-4.82,1-7.22,1.61a42.73,42.73,0,0,0-10.77,6.78c-0.11.21-.23,0.41-0.34,0.62a21,21,0,0,1-11.74,11.73l-0.43.49c3.23,2.57,1.6,8-.7,11.59s-5.11,8.45-2.61,12l4.15-2.72c3,1.75,1.34,6.22.24,9.5-1.62,4.82-1.23,10.22-3.39,14.82s-9,7.65-12.23,3.75c-5.38,2.6-5.23,10.09-7,15.8-2.5,8.27-10.09,14.14-13,22.25a53.31,53.31,0,0,1,11.25-.92l-1.2,3.73c5.09,0.37,7.48,6.34,8.72,11.3l4.47,17.82c0.51,2.05,1.07,4.19,2.48,5.77,1.66,1.87,4.22,2.65,6.23,4.14s3.43,4.54,1.79,6.43c7.43-.15,15.46-0.12,21.44,4.3,7.05,5.21,8.83,16.29,3.77,23.45,0.22,1.48,2.21,2.1,3.59,1.5a7.44,7.44,0,0,0,3-3.23l3.91-6.39,5.32,2.73c1.13,10.94-8.31,11.07-.25,18.55a203.56,203.56,0,0,1,14.57,14.8c13.42-2,10.07-6.48,11.2-13.05a25.9,25.9,0,0,1,3.39-9.05c2.84-4.67,8-8.63,13.37-7.7a65.14,65.14,0,0,1-4.48-17.84,42.55,42.55,0,0,1,17.27,2.27l-0.43,3.35q1.2,0.77,2.32,1.64c5,0.77,10.2,2.69,11.06,7.41,0.64,3.51-1.55,7.61.57,10.48q-1.42.5-2.8,1.08a16.26,16.26,0,0,1-6.13,11.47,71.1,71.1,0,0,0,9.91,12.52c-2.15,3.76-4.2,7.54-4.79,11.79-0.92,6.53,1.76,13,4.38,19l7.9,18.27c6.53,15.11,12.3,34.78.49,46.24a248.54,248.54,0,0,1,23.36,97.3c0.25,7.73-1.29,17.48-8.73,19.58,9.39,9.92,9.88,25,9.83,38.7,0,5.29-.34,11.26-4.3,14.76,5,13,8.93,7.47,9.39,13.09a31.44,31.44,0,0,1-1.07,9.22l-2.95,13.54c-1.67,4.68-3.27,9.66-2.86,12.56,0,0.13,0,.26,0,0.39l-0.7,3.22q-0.18.82-.35,1.65c-1.31,2.63-2.95,5,.1,11.08,1.38,3.57,4.38,6.36,6.17,9.73l-17.41,1.18q0,4.07.06,8.15c-10.48,5.85-18.19,15.73-27.73,23.09s-22.34,2.15-33.27,5.84c0.51,10.3-16.45,12.5-19,22.48-1.15,4.53,1.13,9.43,0,14-1.94,7.79-11.67,9.51-18.93,12.61s-12.53,15.12-5.14,17.89a14.71,14.71,0,0,0-8.91,8.34h299.11V1292.24H2122.26Z" transform="translate(-1942.74 -1291.74)" fill="#406ab1" stroke="#1d1d1b" fill-rule="evenodd"></path>
	    </svg>
	    <div data-lat="<?= $latlng[0];?>" data-lng="<?= $latlng[1];?>" data-zoom="<?= $section['UF_CITY_MAP_ZOOM'];?>" data-points='<?= htmlspecialchars(json_encode($city_points), ENT_QUOTES, 'UTF-8');?>' class="contacts-map center-map"></div>
	    <svg viewbox="0 0 264.06 795.32" class="center-map-mask center-map-mask--left">
	      <path d="M1380.79,1381.45c-4.83-.29-9.28-2.62-13.55-4.9l-4.65-2.48c-3.36-1.8-6.84-3.7-9.06-6.79s-2.74-7.77-.13-10.54c-4.56,1.87-9.58-1.46-12.82-5.17s-6.1-8.23-10.76-9.85c3.17-1.36,2.31-6.07.77-9.16a109.7,109.7,0,0,0-20.39-28.39c1-1.28.72-3,.14-4.63a11.65,11.65,0,0,0-8.25,2.23c-0.35-5.14-6.84-7.39-11.77-6.36s-9.46,4-14.5,4.13c-5.69.17-10.64-3.21-14.92-7.29h-142.3v794.32h208c-0.55-10.23.42-20.32,4.1-29.89l-11.57-3,5.24-18.72,15.81-56.48,15.41,11.83a41.09,41.09,0,0,0,13.52-24.72c-11.07-4.36,8.26-3,7.59-12.7-0.45-6.5-1.45-6.19-7.55-8.09s-12.65-1.92-18.7-4c-12.33-4.16-20.55-15.79-27.9-26.73-4.51-6.71-9.19-13.92-9.43-22.06-0.13-4.22.93-8.66-.66-12.56-2.53-6.18-10.16-7.85-15.45-11.8-9.45-7.05-10.7-20.72-11.12-32.68l-1.59-46.13c-0.09-2.58,2.2-5.66,3.86-6-10.84-8.58-6.6-12-20.58-39.26l-1.37,0c-2.77,0-5.65-.2-8.07-1.55s-4.24-4.15-3.61-6.85l-6.19-.49a7.08,7.08,0,0,0-6.2-8.86c-1-2-.48-4.45-0.7-6.71s-1.84-4.83-4.08-4.46c-1.46.24-2.45,1.66-3.85,2.11-2,.66-4.26-1.08-4.77-3.16a8.34,8.34,0,0,1,1.38-6.1,18.6,18.6,0,0,1,10.65-8.21c2.54-.74,5.36-1,7.41-2.66,1.34-1.1,2.18-2.7,3.38-4,1.56-1.64,3.68-2.65,5.22-4.31a17.7,17.7,0,0,0,2.47-3.8l5.76-10.78a25.09,25.09,0,0,0,2.93-7.2c0.37-2,.23-4.15.82-6.13s2.22-3.9,4.28-3.83a8.64,8.64,0,0,0-1.73-9.44c2.46,0.21,4.6-2,5.19-4.39s0-4.91-.51-7.31c-1.81-7.87-4.18-16.55-11-20.83a6.86,6.86,0,0,1-2.75-2.31c-0.87-1.69.15-3.69,1.13-5.31a21,21,0,0,1-12.55-21.23c1.9-1.47,2-4.38,1.16-6.63s-2.46-4.12-3.57-6.25a31.1,31.1,0,0,1-2.47-8c-1.76-8.24-3.52-16.59-3.08-25,3.5,0.59,7,0,10.59-.44a19.9,19.9,0,0,1-2.25-3.32c6.61-2.57,13.93-2.44,20.87-3.92s14.22-5.4,16.09-12.24c0.68,8.4,11.28,12.39,19.58,10.94,1.6-.28,3.49-1,3.76-2.6s-1.48-3.06-1.88-4.75c-0.86-3.61,4.64-6.61,3.52-10.15-0.35-1.1-1.28-1.9-1.82-2.92-1.91-3.6,2-7.87,6-8.54s8.09,0.72,12.16.64a17,17,0,0,0,12.18-5.62c3.7-4.16,5.25-10.07,9.53-13.64,2.25-1.88,5.31-3.2,6.25-6,0.86-2.53-.41-5.33,0-8,0.51-2.91,3-5.06,4.09-7.81,1-2.51.71-5.32,0.4-8-1.29-11.07-7.92-20.61-5.05-33s13.42-10.22,20.76-15.57S1379.75,1389.32,1380.79,1381.45Z" transform="translate(-1118.09 -1291.74)" fill="#406ab1" stroke="#1d1d1b" fill-rule="evenodd"></path>
	    </svg>
	  </div>
	</div>

<?
}
?>