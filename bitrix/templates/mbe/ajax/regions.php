<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
if(!CModule::IncludeModule("iblock"))
	return;
?>
<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "regionsmap",
  Array(
    'IBLOCK_ID' => 4,
    "SECTION_USER_FIELDS" => array('SECTION_PAGE_URL','UF_AREA', 'UF_CSS_CLASS','UF_PATH', 'UF_CITY_MAP', 'UF_POSITION_LEFT', 'UF_POSITION_TOP' ),
    "AJAX"=>"N",
    "SORT_BY1"=>"PROPERTY_UF_POSITION_TOP",
    "SORT_ORDER1"=>"ASC",
  ), false);?>
<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>
