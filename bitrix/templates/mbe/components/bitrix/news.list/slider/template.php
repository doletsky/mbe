<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */

$this->setFrameMode(true);?>

<? //pre($arResult);?>

<?
if (count($arResult['ITEMS'])){?>

  <div data-auto="false" data-prevclass="icon-blue_pointer_left-before" data-nextclass="icon-blue_pointer_right-before" data-loop="true" data-height="470" data-width="100%" data-shadows="false" data-margin="0" data-arrows="always" data-autoplay="5000" data-transitionduration="1500" class="banners-slider banners-slider--nomargin fotorama fotorama--noauto">
    <?foreach($arResult['ITEMS'] as $slide)
    {?>
      <div class="banner-item">
        <div class="page-inner">
          <div class="page-content-inner">
            <div class="banners-item-content">
              <div class="banners-item-title">
                <?= $slide['~NAME'];?>
              </div>
              <div class="banners-item-text">
                <?= $slide['~PREVIEW_TEXT'];?>
              </div>
            </div>
            <div class="banner-item-image"><img src="<?= $slide['PREVIEW_PICTURE']['SRC'];?>" alt="" ></div>
          </div>
        </div>
      </div>
    <?}?>
  </div>
<?}?>
