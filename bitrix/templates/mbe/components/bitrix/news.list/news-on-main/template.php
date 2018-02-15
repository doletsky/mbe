<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */

$this->setFrameMode(true);?>

<div class="col-item col-item--col2 col-item--middle">
  <?
  if(count($arResult['ITEMS'])){
    foreach($arResult['ITEMS'] as $item)
    {?>
      <div class="news-item col-item col-item--col2">
        <div class="news-item-title-holder"><a href="<?= $item['DETAIL_PAGE_URL'];?>" class="news-item-title link link--black"><?= $item['NAME'];?></a>
          <time class="news-item-date"><?= russian_date('j F Y', MakeTimeStamp($item['ACTIVE_FROM'],"DD.MM.YYYY HH:MI:SS"));?></time>
          <div class="news-item-preview"><?= $item['PREVIEW_TEXT'];?></div>
        </div>
      </div>
  <?}
  }?>
</div>
