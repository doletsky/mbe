<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
if(!CModule::IncludeModule("iblock"))
	return;
?>

<?
$_GET['iNumPage'] = (int)$_GET['iNumPage']+1;

if (isset($_GET['city'])){
  $tab = 'news-msk';
  $city_centers = array();
  $arSelect = Array("ID");
  $arFilter = Array("IBLOCK_ID"=>4, 'SECTION_ID' => $_GET['city'], "ACTIVE"=>"Y");
  $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

  while($ob = $res->GetNextElement())
  {
    $arFields = $ob->GetFields();
    $city_centers[] = $arFields['ID'];

  }
  //pre($city_centers);
  if (count($city_centers))
  {
    $arSelect = Array("ID", "NAME", 'PREVIEW_TEXT', 'DETAIL_PAGE_URL', 'PROPERTY_CENTER');
    $arFilter = Array("IBLOCK_ID"=>5, 'PROPERTY_CENTER' => $city_centers, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array('ACTIVE_FROM' => 'DESC', 'ID' => 'DESC'), $arFilter, false, array('nPageSize' => $_GET['n'], 'iNumPage' => $_GET['iNumPage']), $arSelect);
    while($ob = $res->GetNextElement())
    {
      $arFields = $ob->GetFields();
      $newsCityResult[] = $arFields;
      //pre($arFields);
    }
    //pre($_GET['city']);
    //pre(count($newsCityResult));
    //pre($_GET['n']);
  }
}else{
  //RF
  $tab = 'news-region';

  $arSelect = Array("ID", "NAME", 'PREVIEW_TEXT', 'DETAIL_PAGE_URL', 'PROPERTY_CENTER');
  $arFilter = Array("IBLOCK_ID"=>5, "ACTIVE"=>"Y");
  $res = CIBlockElement::GetList(Array('ACTIVE_FROM' => 'DESC', 'ID' => 'DESC'), $arFilter, false, array('nPageSize' => $_GET['n'], 'iNumPage' => $_GET['iNumPage']), $arSelect);
  while($ob = $res->GetNextElement())
  {
    $arFields = $ob->GetFields();
    $newsCityResult[] = $arFields;
    //pre($arFields);
  }
  //pre($newsCityResult);
}
?>
<div class="cols">
  <?foreach($newsCityResult as $new)
  {?>
    <div class="news-item col-item col-item--col3">
      <div class="news-item-title-holder" data="1"><a href="<?= $new['DETAIL_PAGE_URL'];?>" class="news-item-title link link--black"><?= $new['NAME'];?></a>
        <time class="news-item-date"><?= russian_date('j F Y', MakeTimeStamp($new['ACTIVE_FROM'],"DD.MM.YYYY HH:MI:SS"));?></time>
        <div class="news-item-preview"><?= $new['PREVIEW_TEXT'];?></div>
      </div>
    </div>
  <?}?>
</div>

<? if ( $_GET['n']*$_GET['iNumPage'] < $_GET['total'])
{?>
  <a href="/bitrix/templates/mbe/ajax/news_more.php?<?= isset($_GET['city']) ? 'city='.$_GET['city'].'&':'';?>n=<?= $_GET['n'];?>&iNumPage=<?= $_GET['iNumPage'];?>" data-container="#<?= $tab;?>" class="custom-link custom-link--more custom-link--right more-link">
    <span class="custom-link-icon">
      <svg id="Layer_12" data-name="Layer 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44.28 33.75"><title>more</title><path d="M430.85,1103.4a16.38,16.38,0,0,1-32.49-2.9" transform="translate(-392.59 -1083.63)" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><path d="M398.41,1099.12A16.38,16.38,0,0,1,431,1099q0.07,0.74.07,1.5" transform="translate(-392.59 -1083.63)" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><polyline points="0.35 22.34 5.84 16.93 11.17 22.34" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><polyline points="33.1 11.52 38.59 16.93 43.92 11.52" fill="none" stroke="#009ce1" stroke-miterlimit="10"/></svg>
    </span>
    <span class="custom-link-inner"><span class="custom-link-title">Показать еще</span></span>
  </a>
  <?
}?>
