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
<div class="page-text-block">
  <div class="page-inner">
    <h2 class="page-heading2 page-heading-title--h2"><a href="/about/mbe-worldwide/">МБИ в мире</a></h2>
  </div>
</div>
<div id="world-slider" class="world-list world-list--slider">
  <div class="world-list-inner">
  	<?foreach($arResult["ITEMS"] as $arItem){?>
    <div data-country="<?=$arItem["PROPERTIES"]["CLASS"]["VALUE"]?>" class="world-item"><span class="world-item-name icon-<?=$arItem["PROPERTIES"]["CLASS"]["VALUE"]?>-before"><?=$arItem["NAME"]?></span><a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>" targer="_blank" class="world-item-link"><?=trim(str_replace("http://","",$arItem["PROPERTIES"]["LINK"]["VALUE"]),"/")?></a></div>
    <?}?>
  </div>
<span class="world-slider-control world-slider-control--prev"></span><span class="world-slider-control world-slider-control--next"></span>