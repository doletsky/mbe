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
//$geoCity = 'Санкт-Петербург';
$geoCityID = 8; //Moscow
$geoCityCnt = 0;
foreach($arResult['SECTIONS'] as $city){
	if ($city['NAME'] == $geoCity){
		$geoCityID = $city['ID'];
		$geoCityCnt = $city['ELEMENT_CNT'];
	}
}

//для карты Города
$arSecSelect = Array('ID', 'NAME', 'UF_CITY_TITLE', 'UF_CITY_MAP', 'UF_CITY_MAP_ZOOM', 'UF_CSS_CLASS');
$arSecFilter = Array('IBLOCK_ID' => 4, "ID"=> $geoCityID, "ACTIVE"=>"Y");

$resSec = CIBlockSection::GetList(Array('SORT'=>'ASC'), $arSecFilter, false, $arSecSelect);

if ($section = $resSec->GetNext()){
   //print_r($section);
   $city_points = array();
   $latlng = explode(',', $section['UF_CITY_MAP']);

   $arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_MAP");
   $arFilter = Array("IBLOCK_ID"=>4, 'SECTION_ID' => $section['ID'], "ACTIVE"=>"Y");
   $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
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
  <div class="contacts-map-holder">
    <div class="page-inner">
      <div class="contacts-map-title">
       <? if ($arParams['SHOW_TITLE'] != 'N'){
         echo 'Наш офис в г. ' . $geoCity;
       }?>
     </div>
    </div>
   <div class="contacts-map-inner">
     <div data-lat="<?= $latlng[0];?>" data-lng="<?= $latlng[1];?>" data-zoom="<?= $section['UF_CITY_MAP_ZOOM'];?>" data-points="<?= htmlspecialchars(json_encode($city_points), ENT_QUOTES, 'UTF-8');?>" class="contacts-map">
     </div>
   </div>
  </div>
<?}?>
