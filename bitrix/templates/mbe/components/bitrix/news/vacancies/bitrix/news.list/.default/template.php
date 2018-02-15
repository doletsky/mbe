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
$this->setFrameMode(true);

  $city_id = 8;
  $city_name = 'Москва';
  $nPageSize = 5;
  $_GET['iNumPage'] = 1;

  $city_centers = array();
  $arSelect = Array("ID");
  $arFilter = Array("IBLOCK_ID"=>4, 'SECTION_ID' => $city_id, "ACTIVE"=>"Y");
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
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement())
    {
      $arFields = $ob->GetFields();
      $jobCityResult[] = $arFields;
      //pre($arFields);
    }
    //pre($jobCityResult);
  }

  //$arResult['ITEMS']
  $jobCityCount = count($jobCityResult);
  if ($jobCityCount){
    $city_active = 'active';
    $rf_active = '';
  }else{
    $city_active = '';
    $rf_active = 'active';
  }

?>

<div class="page-content-inner">
  <div id="jobs-msk" class="jobs cols page-tab-content <?= $city_active;?>">
    <? $i = 0;
    foreach($jobCityResult as $job){
      if ($i < $nPageSize){
      ?>
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
      $i++;
      }
    }?>

    <? if ($jobCityCount > $nPageSize){?>
      <a href="/bitrix/templates/mbe/ajax/vacancies_more.php?city=<?= $city_id;?>&n=<?= $nPageSize;?>&iNumPage=<?= $_GET['iNumPage'];?>&total=<?= $jobCityCount?>"  data-container="#jobs-msk" class="custom-link custom-link--more more-link col-item col-item--col3">
        <span class="custom-link-icon">
          <svg id="Layer_12" data-name="Layer 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44.28 33.75"><title>more</title><path d="M430.85,1103.4a16.38,16.38,0,0,1-32.49-2.9" transform="translate(-392.59 -1083.63)" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><path d="M398.41,1099.12A16.38,16.38,0,0,1,431,1099q0.07,0.74.07,1.5" transform="translate(-392.59 -1083.63)" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><polyline points="0.35 22.34 5.84 16.93 11.17 22.34" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><polyline points="33.1 11.52 38.59 16.93 43.92 11.52" fill="none" stroke="#009ce1" stroke-miterlimit="10"/></svg>
        </span>
        <span class="custom-link-inner">
          <span class="custom-link-title">Показать еще</span>
          <span class="custom-link-note">Всего <?= $jobCityCount . ' ' . morph($jobCityCount, 'вакансия', 'вакансии', 'вакансий');?></span>
        </span>
      </a>
    <?}?>
  </div>

  <div id="jobs-region" class="jobs cols page-tab-content <?= $rf_active;?>">

    <?
    $i = 0;
    foreach($arResult['ITEMS'] as $job){
      if ($i < $nPageSize){
        ?>
        <div class="job-item col-item col-item--col3">
          <div class="job-item-inner">
            <div class="job-item-title-holder">
              <a href="<?= $job['DETAIL_PAGE_URL'];?>" class="job-item-title link link--blue">

                <?= $job['NAME'];?>
                <div class="job-item-icon-holder">
                  <?= $job['PROPERTIES']['ICON']['~VALUE'];?>
                </div>
              </a>
            </div>
            <div class="job-item-region"><?= $city_name;?></div>
            <div class="job-item-description page-text">
              <div><?= $job['PROPERTIES']['SCHEDULE']['VALUE'] != '' ? 'Тип занятости: ' . $job['PROPERTIES']['SCHEDULE']['VALUE'] : '';?></div>
              <div><?= $job['PROPERTIES']['SALARY']['VALUE'] != '' ? 'Зарплата: ' . $job['PROPERTIES']['SALARY']['VALUE'] : '';?></div>
            </div>
          </div>
        </div>
        <?
        $i++;
      }
    }?>
    <? if (count($arResult['ITEMS']) > $nPageSize){?>
      <a href="/bitrix/templates/mbe/ajax/vacancies_more.php?n=<?= $nPageSize;?>&iNumPage=<?= $_GET['iNumPage'];?>&total=<?= count($arResult['ITEMS']);?>" data-container="#jobs-region" class="custom-link custom-link--more more-link col-item col-item--col3">
        <span class="custom-link-icon">
          <svg id="Layer_12" data-name="Layer 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44.28 33.75"><title>more</title><path d="M430.85,1103.4a16.38,16.38,0,0,1-32.49-2.9" transform="translate(-392.59 -1083.63)" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><path d="M398.41,1099.12A16.38,16.38,0,0,1,431,1099q0.07,0.74.07,1.5" transform="translate(-392.59 -1083.63)" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><polyline points="0.35 22.34 5.84 16.93 11.17 22.34" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><polyline points="33.1 11.52 38.59 16.93 43.92 11.52" fill="none" stroke="#009ce1" stroke-miterlimit="10"/></svg>
        </span>
        <span class="custom-link-inner">
          <span class="custom-link-title">Показать еще</span>
          <span class="custom-link-note">Всего <?= count($arResult['ITEMS']) . ' ' . morph(count($arResult['ITEMS']), 'вакансия', 'вакансии', 'вакансий');?></span>
        </span>
      </a>
    <?}?>
  </div>
</div>
