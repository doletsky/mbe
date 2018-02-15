<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */

$this->setFrameMode(true);?>

<? //pre($arResult);?>

<?
if (count($arResult['ITEMS'])){?>

  <div id="partners-slider" class="partners-slider"><span class="partners-slider-control partners-slider-control--prev"></span>
    <div class="partners-slider-inner">
      <div class="partners-slider-item">
        <div class="partners-slider-item-text">Партнеры МБИ<br>в России и мире</div>
      </div>
      <?foreach($arResult['ITEMS'] as $partner)
      {?>
        <div class="partners-slider-item">
          <div class="partners-slider-item-image"><img src="<?= $partner['PREVIEW_PICTURE']['SRC'];?>" alt=""></div>
        </div>
      <?}?>
    </div><span class="partners-slider-control partners-slider-control--next"></span>
  </div>
<?}?>
