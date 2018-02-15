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
<div class="columns">
  <div class="column-item column-item--left column-item--w90">
    <h1 class="page-heading1 page-heading-title--h1"><?=$arResult["NAME"]?></h1>
    <div class="page-content-inner">
      <?=$arResult["DETAIL_TEXT"]?>
    </div>
  </div>
</div>
