<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */

$this->setFrameMode(true);?>

<?
  //pre($arParams);
?>

<div id="news-region" class="news-list cols page-tab-content <?= $arParams['RF_ACTIVE'];?>">
<? if(count($arResult['ITEMS'])){?>
  <? //if exists promotions
  if (1)
  {?>
    <div class="cols">
			<div class="col-item col-item--col2 col-item--middle">

        <?
        for($i=0; $i<2; $i++)
        {?>
          <div class="news-item col-item col-item--col2">
						<div class="news-item-title-holder"><a href="<?= $arResult['ITEMS'][$i]['DETAIL_PAGE_URL'];?>" class="news-item-title link link--black"><?= $arResult['ITEMS'][$i]['NAME'];?></a>
							<time class="news-item-date"><?= russian_date('j F Y', MakeTimeStamp($arResult['ITEMS'][$i]['ACTIVE_FROM'],"DD.MM.YYYY HH:MI:SS"));?></time>
							<div class="news-item-preview"><?= $arResult['ITEMS'][$i]['PREVIEW_TEXT'];?></div>
						</div>
					</div>
        <?}?>
			</div>

      <?$APPLICATION->IncludeComponent("bitrix:news.list", "promotions-center",
        Array(
          'IBLOCK_ID' => 6,
          "SORT_BY1" => "ACTIVE_FROM",
          "SORT_ORDER1" => "DESC",
          "PROPERTY_CODE" => Array("DESCRIPTION"),
          "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
           "NEWS_COUNT" => "7",
        ), false);?>
		</div>

    <?
    if (count($arResult['ITEMS']) > 2)
    {
      //если больше двух - выводим в отдельном ряду
      ?>
      <div class="cols" style="margin-top: 40px;">
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
<? }?>
</div>
