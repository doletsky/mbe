<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
if(!CModule::IncludeModule("iblock"))
	return;
?>

<?
$reviews = array();
$_GET['iNumPage'] = (int)$_GET['iNumPage'] + 1;

$arSelect = Array("ID", "NAME", 'PREVIEW_TEXT', 'ACTIVE_FROM');
$arFilter = Array("IBLOCK_ID"=>8, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array('ACTIVE_FROM'=>'DESC', 'SORT'=>'DESC'), $arFilter, false, array('nPageSize' => $_GET['n'], 'iNumPage' => $_GET['iNumPage']), $arSelect);
while($ob = $res->GetNextElement())
{
  $arFields = $ob->GetFields();
  $reviews[] = $arFields;
  //pre($arFields);
}

?>

<?foreach($reviews as $arItem){?>
  <div class="review-item col-item col-item--col2">
    <div class="review-item-text page-text"><?= $arItem['PREVIEW_TEXT'];?></div>
    <div class="review-item-author"><?= $arItem['NAME'];?></div>
    <time class="review-item-date"><?= date('d.m.Y H:i', MakeTimeStamp($arItem['ACTIVE_FROM'],"DD.MM.YYYY HH:MI:SS"));?></time>
  </div>
<?}?>

<? if ( $_GET['n']*$_GET['iNumPage'] < $_GET['total']){?>
  <a href="/bitrix/templates/mbe/ajax/reviews_more.php?n=<?= $_GET['n'];?>&iNumPage=<?= $_GET['iNumPage'];?>&total=<?= $_GET['total'];?>" data-container="#reviews" class="col-item col-item--col2 custom-link custom-link--right custom-link--more more-link">
    <span class="custom-link-icon">
      <svg id="Layer_12" data-name="Layer 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44.28 33.75"><title>more</title><path d="M430.85,1103.4a16.38,16.38,0,0,1-32.49-2.9" transform="translate(-392.59 -1083.63)" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><path d="M398.41,1099.12A16.38,16.38,0,0,1,431,1099q0.07,0.74.07,1.5" transform="translate(-392.59 -1083.63)" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><polyline points="0.35 22.34 5.84 16.93 11.17 22.34" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><polyline points="33.1 11.52 38.59 16.93 43.92 11.52" fill="none" stroke="#009ce1" stroke-miterlimit="10"/></svg>
    </span>
    <span class="custom-link-inner">
      <span class="custom-link-title">Показать еще</span>
      <span class="custom-link-note">Всего <?= $_GET['total'] . ' ' . morph($_GET['total'], 'отзыв', 'отзыва', 'отзывов');?></span>
    </span>
  </a>
<? }?>

<?

/*
$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "regionsmap",
  Array(
    'IBLOCK_ID' => 4,
    "SECTION_USER_FIELDS" => array('SECTION_PAGE_URL','UF_AREA', 'UF_CSS_CLASS','UF_PATH', 'UF_CITY_MAP', 'UF_POSITION_LEFT', 'UF_POSITION_TOP' ),
    "AJAX"=>"N",
    "SORT_BY1"=>"PROPERTY_UF_POSITION_TOP",
    "SORT_ORDER1"=>"ASC",
  ), false);*/
?>
<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>
