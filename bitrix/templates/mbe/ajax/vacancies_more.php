<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
if(!CModule::IncludeModule("iblock"))
	return;
?>

<?
$_GET['iNumPage'] = (int)$_GET['iNumPage'] + 1;

if (isset($_GET['city'])){
	$tab = 'jobs-msk';
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
    $arSelect = Array("ID", "NAME", 'PREVIEW_TEXT', 'DETAIL_PAGE_URL', 'PROPERTY_CENTER', 'PROPERTY_ICON', 'PROPERTY_SCHEDULE', 'PROPERTY_SALARY');
    $arFilter = Array("IBLOCK_ID"=>7, 'PROPERTY_CENTER' => $city_centers, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, array('nPageSize' => $_GET['n'], 'iNumPage' => $_GET['iNumPage']), $arSelect);
    while($ob = $res->GetNextElement())
    {
      $arFields = $ob->GetFields();
      $jobCityResult[] = $arFields;
      //pre($arFields);
    }
    //pre($_GET['iNumPage']);
  }
}else{
	$tab = 'jobs-region';

  $arSelect = Array("ID", "NAME", 'PREVIEW_TEXT', 'DETAIL_PAGE_URL', 'PROPERTY_CENTER', 'PROPERTY_ICON', 'PROPERTY_SCHEDULE', 'PROPERTY_SALARY');
  $arFilter = Array("IBLOCK_ID"=>7, "ACTIVE"=>"Y");
  $res = CIBlockElement::GetList(Array(), $arFilter, false, array('nPageSize' => $_GET['n'], 'iNumPage' => $_GET['iNumPage']), $arSelect);
  while($ob = $res->GetNextElement())
  {
    $arFields = $ob->GetFields();
    $jobCityResult[] = $arFields;
    //pre($arFields);
  }
}

?>

<?
foreach($jobCityResult as $job){?>
  <div class="job-item col-item col-item--col3">
    <div class="job-item-inner">
      <div class="job-item-title-holder">
        <a href="<?= $job['DETAIL_PAGE_URL'];?>" class="job-item-title link link--blue">

          <?= $job['NAME'];?>
          <div class="job-item-icon-holder">
            <?= $job['~PROPERTY_ICON_VALUE'];?>
          </div>
        </a>
      </div>
      <div class="job-item-region"><?= $city_name;?></div>
      <div class="job-item-description page-text">
        <div><?= $job['PROPERTY_SCHEDULE_VALUE'] != '' ? 'Тип занятости: ' . $job['PROPERTY_SCHEDULE_VALUE'] : '';?></div>
        <div><?= $job['PROPERTY_SALARY_VALUE'] != '' ? 'Зарплата: ' . $job['PROPERTY_SALARY_VALUE'] : '';?></div>
      </div>
    </div>
  </div>
  <?
}?>

<? if ( $_GET['n']*$_GET['iNumPage'] < $_GET['total']){?>
  <a href="/bitrix/templates/mbe/ajax/vacancies_more.php?<?= isset($_GET['city']) ? 'city='.$_GET['city'].'&':'';?>n=<?= $_GET['n'];?>&iNumPage=<?= $_GET['iNumPage'];?>"  data-container="#<?= $tab?>" class="custom-link custom-link--more more-link col-item col-item--col3">
    <span class="custom-link-icon">
      <svg id="Layer_12" data-name="Layer 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44.28 33.75"><title>more</title><path d="M430.85,1103.4a16.38,16.38,0,0,1-32.49-2.9" transform="translate(-392.59 -1083.63)" fill="none" stroke="#009ce1" stroke-miterlimit="10"></path><path d="M398.41,1099.12A16.38,16.38,0,0,1,431,1099q0.07,0.74.07,1.5" transform="translate(-392.59 -1083.63)" fill="none" stroke="#009ce1" stroke-miterlimit="10"></path><polyline points="0.35 22.34 5.84 16.93 11.17 22.34" fill="none" stroke="#009ce1" stroke-miterlimit="10"></polyline><polyline points="33.1 11.52 38.59 16.93 43.92 11.52" fill="none" stroke="#009ce1" stroke-miterlimit="10"></polyline></svg>
    </span>
    <span class="custom-link-inner">
    <span class="custom-link-title">Показать еще</span>
    <span class="custom-link-note">Всего <?= $_GET['total'] . ' ' . morph($_GET['total'], 'вакансия', 'вакансии', 'вакансий');?></span></span>
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
