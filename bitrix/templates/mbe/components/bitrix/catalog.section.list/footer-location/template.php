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
<a href="<?=$cityLink;?>" class="footer-location icon-footer-geolocation-before">
  <span class="footer-location-title"><?= $geoCity;?> — <!-- <?= $geoCityCnt . ' ' . morph($geoCityCnt, 'офис', 'офиса', 'офисов');?> --> MBE POST</span>
</a>
