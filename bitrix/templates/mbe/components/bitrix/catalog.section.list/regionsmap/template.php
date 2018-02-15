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
$this->setFrameMode(false);?>
<? //print_r($arResult);?>
<?
$result = array();
foreach($arResult['SECTIONS'] as $section){
	if ($section['DEPTH_LEVEL'] == 1){
		$okrug = '';
		$okrug->name = $section['NAME'];
		$okrug->code = $section['UF_AREA'];
		$okrug->path = $section['UF_PATH'];

    $cities = array();
    foreach($arResult['SECTIONS'] as $city){

      if ($city['IBLOCK_SECTION_ID'] == $section['ID']){

				//hard code
				$color = $section['UF_CSS_CLASS'];
				switch ($color) {
					case 'salad':
						$color = '#00de9a';
						break;
					case 'fiolet':
						$color = '#9265e5';
						break;
					case 'blue':
						$color = '#009CE0';
						break;
					case 'red':
						$color = '#FF3D22';
						break;
					case 'orange':
						$color = '#FF7A00';
						break;
					case 'pink':
						$color = '#FF4FE0';
						break;
					case 'green':
						$color = '#00B86C';
						break;

				}

        $city_obj = '';
        $city_obj->id = $city['ID'];
        $city_obj->name = $city['NAME'];
        $city_obj->office_morph = morph($city['ELEMENT_CNT'], 'офис', 'офиса', 'офисов');

				if ($city['ELEMENT_CNT'] == 1){
						//переход сразу на страницу центра (элем из $subsection)
						$elSelect = Array("ID", "NAME", "DETAIL_PAGE_URL");
						$elFilter = Array("IBLOCK_ID"=>4, "SECTION_ID" => $city['ID'], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
						$elres = CIBlockElement::GetList(Array(), $elFilter, false, false, $elSelect);
						if($ob = $elres->GetNextElement())
						{
					 		$arFields = $ob->GetFields();
						 	$city_obj->detail = $arFields['DETAIL_PAGE_URL'];
					 	}
				}else{
					$city_obj->detail = $city['SECTION_PAGE_URL'];
				}
        $city_obj->code = $city['CODE'];
        $city_obj->color = $color;
        $city_obj->count = $city['ELEMENT_CNT'];

        $city_obj->position->left = $city['UF_POSITION_LEFT'];
        $city_obj->position->top = $city['UF_POSITION_TOP'];
        $city_obj->icon = '/bitrix/templates/mbe/i/map_point_small_' . $section['UF_CSS_CLASS'] . '.png';
        $city_obj->iconHover = '/bitrix/templates/mbe/i/map_point_large_' . $section['UF_CSS_CLASS'] . '.png';

        $cities[] = $city_obj;
      }
    }

    $okrug->cities = $cities;
    $result[] = $okrug;
	}
}

echo json_encode($result);
?>
