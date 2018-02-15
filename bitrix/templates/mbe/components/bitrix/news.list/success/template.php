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
<div class="success">
	<?foreach($arResult["ITEMS"] as $i => $arItem){?>
  <div class="success-item success-item--h<?=($i+1)?> icon-step<?=($i+1)?>-before"><span class="success-item-info"><span class="success-item-info-inner"><span class="success-item-num"><?=($i+1)?></span><span class="success-item-name"><?=$arItem["NAME"]?></span></span></span><span class="success-item-description page-text"><span class="success-item-description-inner"><?=$arItem["PREVIEW_TEXT"]?></span></span></div>
  <?}?>
</div>