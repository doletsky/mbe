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
//pre($arResult);
?>
<? if(count($arResult['ITEMS']))
{
  ?>
  <div class="news-item col-item col-item--col2 col-item--middle" style="margin-bottom:10px;">
    <div data-margin="0" data-arrows="false" data-shadows="false" data-transition="crossfade" data-navposiiton="bottom" data-width="100%" data-height="260" data-loop="true" data-autoplay="5000" data-transitionduration="1000" class="fotorama news-actions">
      <? foreach($arResult['ITEMS'] as $item){?>
        <div style="background-image: url(<?= $item['PREVIEW_PICTURE']['SRC'];?>)" class="news-action-item"><span class="news-action-title">Акция</span>
          <div class="news-action-name"><?= $item['PREVIEW_TEXT'];?></div>
          <div class="news-action-note">
            <a href="<?= $item['DETAIL_PAGE_URL'];?>" class="news-action-note-link">Условия акции</a>
            <a href="<?= $item['DETAIL_PAGE_URL'];?>" class="news-action-note-go">
              <svg width="20" height="10" viewBox="0 0 12.69 11.57">
                <polyline points="6.08 10.84 11.26 6.03 6.08 0.7" fill="none" stroke="#FFF" stroke-miterlimit="10" stroke-width="2"></polyline>
                <line x1="10.25" y1="5.77" y2="5.77" fill="none" stroke="#FFF" stroke-miterlimit="10" stroke-width="2"></line>
              </svg></a></div>
        </div>
      <? }?>
    </div>
  </div>
  <?
}?>
