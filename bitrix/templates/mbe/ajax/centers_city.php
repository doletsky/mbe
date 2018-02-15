<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
if(!CModule::IncludeModule("iblock"))
	return;

?>

<?$APPLICATION->IncludeComponent("bitrix:news.list", "centers-city",
  Array(
    'IBLOCK_ID' => 4,
    'PARENT_SECTION' => $_REQUEST['id'],
    "INCLUDE_SUBSECTIONS" => "Y",
    "PROPERTY_CODE" => Array("DESCRIPTION"),
  ), false);?>



<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>
