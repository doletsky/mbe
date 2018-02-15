<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */

$this->setFrameMode(true);?>

<?
  //pre($arResult);

  if (!count($arResult['ITEMS']))
  {
    $city_centers = array();
    $arSelect = Array("ID");
    $arFilter = Array("IBLOCK_ID"=>4, 'SECTION_ID' => $arParams['CITY'], "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    while($ob = $res->GetNextElement())
    {
      $arFields = $ob->GetFields();
      $city_centers[] = $arFields['ID'];

    }
    //pre($city_centers);
    if (count($city_centers))
    {
      $arSelect = Array("ID", "NAME", 'PREVIEW_TEXT', 'PROPERTY_CENTER');
      $arFilter = Array("IBLOCK_ID"=>5, 'PROPERTY_CENTER' => $city_centers, "ACTIVE"=>"Y");
      $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
      while($ob = $res->GetNextElement())
      {
        $arFields = $ob->GetFields();
        $cityResult[] = $arFields;
        //pre($arFields);
      }
      //pre($cityResult);
    }

    $arResult['ITEMS'] = $cityResult;
  }

  if (count($arResult['ITEMS'])){
    $city_active = 'active';
    $rf_active = '';
  }else{
    $city_active = '';
    $rf_active = 'active';
  }
?>


<div class="page-inner">
	<div class="news-list-holder">
		<div class="cols news-list-toolbar-holder">
			<div class="news-list-toolbar news-list-toolbar--title col-item col-item--col2 col-item--middle">
				<h2 class="page-heading-title page-heading-title--h2" style="pointer-events: none;">Новости и акции</h2>
				<div class="page-tabs news-tabs">
					<a href="#" data-tab="#news-msk" data-tabs="news-tabs" class="page-tab-item page-tab-item--<?= $city_active;?>"><?= $arParams['CITY_NAME'];?></a>
					<a href="#" data-tab="#news-region" data-tabs="news-tabs" class="page-tab-item page-tab-item--<?= $rf_active;?>">РФ</a>
				</div>
			</div>
		</div>

    <div id="news-msk" class="news-list page-tab-content <?= $city_active;?>" style="min-height: 200px;">
      <? //if exists promotions
      if (1)
      {?>
        <div class="cols">
    			<div class="col-item col-item--col2 col-item--middle" style="margin-top:60px;">

            <?
            if(count($arResult['ITEMS'])){
              for($i=0; $i<2; $i++)
              {
                if (isset($arResult['ITEMS'][$i])){?>
                  <div class="news-item col-item col-item--col2">
        						<div class="news-item-title-holder"><a href="<?= $arResult['ITEMS'][$i]['DETAIL_PAGE_URL'];?>" class="news-item-title link link--black"><?= $arResult['ITEMS'][$i]['NAME'];?></a>
        							<time class="news-item-date"><?= russian_date('j F Y', MakeTimeStamp($arResult['ITEMS'][$i]['ACTIVE_FROM'],"DD.MM.YYYY HH:MI:SS"));?></time>
        							<div class="news-item-preview"><?= $arResult['ITEMS'][$i]['PREVIEW_TEXT'];?></div>
        						</div>
        					</div>
                <?}
              }
            }?>
    			</div>

          <? $GLOBALS['promo_filter'] = array('PROPERTY_CENTER' => $arParams['CENTER']); ?>
          <?$APPLICATION->IncludeComponent("bitrix:news.list", "promotions-center",
            Array(
              'IBLOCK_ID' => 6,
              "SORT_BY1" => "ACTIVE_FROM",
              "SORT_ORDER1" => "DESC",
              "PROPERTY_CODE" => Array("DESCRIPTION"),
              "FILTER_NAME" => "promo_filter",
              "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            ), false);?>


    		</div>

        <?
        if (count($arResult['ITEMS']) > 2)
        {
          //если больше двух - выводим в отдельном ряду
          ?>
          <div class="cols">
            <?for($i=2; $i<count($arResult['ITEMS']); $i++)
            {?>
              <div class="news-item col-item col-item--col3">
                <div class="news-item-title-holder"><a href="<?= $arResult['ITEMS'][$i]['DETAIL_PAGE_URL'];?>" class="news-item-title link link--black"><?= $arResult['ITEMS'][$i]['NAME'];?></a>
                  <time class="news-item-date"><?= russian_date('j F Y', MakeTimeStamp($arResult['ITEMS'][$i]['ACTIVE_FROM'],"DD.MM.YYYY HH:MI:SS"));?></time>
                  <div class="news-item-preview"><?= $arResult['ITEMS'][$i]['PREVIEW_TEXT'];?></div>
                </div>
              </div>
            <?}?>
          </div>
          <?
        }
        ?>

      <?}else
      {
        //если нет акций
        ?>
        <div class="cols" style="padding-top: 80px;">
          <?for($i=0; $i<count($arResult['ITEMS']); $i++)
          {?>
            <div class="news-item col-item col-item--col3">
              <div class="news-item-title-holder"><a href="<?= $arResult['ITEMS'][$i]['DETAIL_PAGE_URL'];?>" class="news-item-title link link--black"><?= $arResult['ITEMS'][$i]['NAME'];?></a>
                <time class="news-item-date"><?= russian_date('j F Y', MakeTimeStamp($arResult['ITEMS'][$i]['ACTIVE_FROM'],"DD.MM.YYYY HH:MI:SS"));?></time>
                <div class="news-item-preview"><?= $arResult['ITEMS'][$i]['PREVIEW_TEXT'];?></div>
              </div>
            </div>
          <?}?>
        </div>
        <?
      }?>
    </div>


    <?$APPLICATION->IncludeComponent("bitrix:news.list", "news-center-rf",
      Array(
        'IBLOCK_ID' => 5,
        'CENTER' => $arResult['ID'],
        "NEWS_COUNT" => "5",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "PROPERTY_CODE" => Array("DESCRIPTION"),
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "DETAIL_URL" => "/about/news-and-promotion/#ELEMENT_CODE#/",
        "RF_ACTIVE" => $rf_active
      ), false);?>

    </div>
  </div>
