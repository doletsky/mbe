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
?>

<?
$nPageSize = 5;
$_GET['iNumPage'] = 1;
$total = CIBlockElement::GetList(Array(), array('IBLOCK_ID'=>5, 'ACTIVE' => 'Y'), array(), false, array('ID', 'NAME'));
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
        {
          if(isset($arResult['ITEMS'][$i])){
          ?>
          <div class="news-item col-item col-item--col2">
						<div class="news-item-title-holder"><a href="<?= $arResult['ITEMS'][$i]['DETAIL_PAGE_URL'];?>" class="news-item-title link link--black"><?= $arResult['ITEMS'][$i]['NAME'];?></a>
							<time class="news-item-date"><?= ( isset($arResult['ITEMS'][$i]['ACTIVE_FROM'])&&$arResult['ITEMS'][$i]['NAME'] ? russian_date('j F Y', MakeTimeStamp($arResult['ITEMS'][$i]['ACTIVE_FROM'],"DD.MM.YYYY HH:MI:SS")) : '');?></time>
							<div class="news-item-preview"><?= $arResult['ITEMS'][$i]['PREVIEW_TEXT'];?></div>
						</div>
					</div>
        <?
          }
        }
        ?>
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
      <? if (count($arResult['ITEMS']) >= $nPageSize)
      {?>
        <a href="/bitrix/templates/mbe/ajax/news_more.php?n=<?= $nPageSize;?>&iNumPage=<?= $_GET['iNumPage'];?>&total=<?= $total;?>" data-container="#news-region" class="custom-link custom-link--more custom-link--right more-link">
          <span class="custom-link-icon">
            <svg id="Layer_12" data-name="Layer 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44.28 33.75"><title>more</title><path d="M430.85,1103.4a16.38,16.38,0,0,1-32.49-2.9" transform="translate(-392.59 -1083.63)" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><path d="M398.41,1099.12A16.38,16.38,0,0,1,431,1099q0.07,0.74.07,1.5" transform="translate(-392.59 -1083.63)" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><polyline points="0.35 22.34 5.84 16.93 11.17 22.34" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><polyline points="33.1 11.52 38.59 16.93 43.92 11.52" fill="none" stroke="#009ce1" stroke-miterlimit="10"/></svg>
          </span>
          <span class="custom-link-inner"><span class="custom-link-title">Показать еще</span></span>
        </a>
        <?
      }?>
      <?
    }
    ?>

  <?}else
  {
    //если нет акций
    ?>
    <div class="cols" style="padding-top: 80px;">
      <?for($i=0; $i<count($arResult['ITEMS'])-1; $i++)
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
