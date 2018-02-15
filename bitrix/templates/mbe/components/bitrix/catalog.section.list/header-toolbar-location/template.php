<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */

$this->setFrameMode(true);

if(CModule::IncludeModule("altasib.geoip"))
{
	$arData = ALX_GeoIP::GetAddr();
	if ($arData['city'] != ''){
		$geoCity = $arData['city'];
	}else{
		$geoCity = 'Москва';
	}
}else{
	$geoCity = 'Москва';
}

//pre($arResult);
$geoCityID = 8; //Moscow
$geoCityCnt = 0;
$cityLink = '#';
foreach($arResult['SECTIONS'] as $city){
	if ($city['NAME'] == $geoCity){
		$geoCityID = $city['ID'];
		$geoCityCnt = $city['ELEMENT_CNT'];
		$cityLink = $city['SECTION_PAGE_URL'];
	}
}

?>

<div class="header-toolbar">
	<!-- <a href="<?=$cityLink;?>" class="header-toolbar-item">
    <span class="header-toolbar-item-icon">
      <svg id="Layer_12" data-name="Layer 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 24.93"><title>location</title><circle cx="8.5" cy="8.93" r="4.21" fill="none" stroke="#000" stroke-miterlimit="10"></circle><path d="M306.18,833.29c0,4.42-8,15.57-8,15.57s-8-11.16-8-15.57A8,8,0,1,1,306.18,833.29Z" transform="translate(-289.68 -824.79)" fill="none" stroke="#000" stroke-miterlimit="10"></path></svg>
    </span>
    <span class="header-toolbar-item-name"><?= $geoCity . ' — ' . $geoCityCnt . ' ' . morph($geoCityCnt, 'офис', 'офиса', 'офисов');?> MBE POST</span>
  </a> -->
  <!-- <a href="" class="header-toolbar-item">Проверить статус</a> -->
  <a href="http://lk.mbepost.ru/" class="header-toolbar-item lk">Личный кабинет</a>
<? /*?>
  <a href="#status-form" class="ajax-form header-toolbar-item">
    <span class="header-toolbar-item-icon">
      <svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="13px" height="24px" viewBox="0 0 13 24" enable-background="new 0 0 13 24" xml:space="preserve">
        <polygon id="XMLID_23_" fill="none" stroke="#0D0F0F" stroke-miterlimit="10" points="9.5,2.5 9.5,0.5 3.5,0.5 3.5,2.5 0.5,2.5 0.5,23.5 12.5,23.5 12.5,2.5 "></polygon>
        <line id="XMLID_22_" fill="none" stroke="#0D0F0F" stroke-miterlimit="10" x1="3" y1="20.5" x2="10" y2="20.5"></line>
        <line id="XMLID_21_" fill="none" stroke="#0D0F0F" stroke-miterlimit="10" x1="3" y1="18.5" x2="10" y2="18.5"></line>
        <line id="XMLID_20_" fill="none" stroke="#0D0F0F" stroke-miterlimit="10" x1="3" y1="15.5" x2="10" y2="15.5"></line>
        <line id="XMLID_19_" fill="none" stroke="#0D0F0F" stroke-miterlimit="10" x1="3" y1="12.5" x2="10" y2="12.5"></line>
      </svg>
    </span>
    <span class="header-toolbar-item-name">Проверить статус</span>
  </a>

  <a href="#" class="header-toolbar-item">
    <span class="header-toolbar-item-icon">
      <svg id="Layer_12" data-name="Layer 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20.26 24.31"><title>lock</title><rect x="0.5" y="8.66" width="19.26" height="15.15" fill="none" stroke="#000" stroke-miterlimit="10"></rect><path d="M223.92,833.71v-4.16a4,4,0,0,1,4-4h6.33a4,4,0,0,1,4,4V834" transform="translate(-220.95 -825.05)" fill="none" stroke="#000" stroke-miterlimit="10"></path><path d="M226.58,833.71v-3.89a1.74,1.74,0,0,1,1.73-1.73h5.54a1.74,1.74,0,0,1,1.73,1.73v3.89" transform="translate(-220.95 -825.05)" fill="none" stroke="#000" stroke-miterlimit="10"></path><circle cx="10.13" cy="14.21" r="2.33" fill="none" stroke="#000" stroke-miterlimit="10"></circle><line x1="10.13" y1="20.36" x2="10.13" y2="16.82" fill="none" stroke="#000" stroke-miterlimit="10"></line></svg>
    </span>
    <span class="header-toolbar-item-name">Личный кабинет</span>
  </a>
<? */?>

<? if ($arParams['SHOW_COURIER'] != 'N'){?>

  <a href="#courier-form" class="ajax-form header-toolbar-item">
    <span class="header-toolbar-item-icon">
      <svg id="Layer_19" data-name="Layer 19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.08 18.08"><title>accum</title><rect x="0.5" y="0.5" width="17.08" height="17.08" fill="none" stroke="#171714" stroke-miterlimit="10"></rect><line x1="10.08" y1="12.74" x2="15.75" y2="12.74" fill="none" stroke="#171714" stroke-miterlimit="10"></line><line x1="2.25" y1="5.16" x2="7.92" y2="5.16" fill="none" stroke="#171714" stroke-miterlimit="10"></line><line x1="5.08" y1="2.32" x2="5.08" y2="7.99" fill="none" stroke="#171714" stroke-miterlimit="10"></line></svg>
    </span>
    <span class="header-toolbar-item-name">Вызвать курьера</span>
  </a>

<? }?>

  </div>
