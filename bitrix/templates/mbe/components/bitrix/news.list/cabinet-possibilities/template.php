<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */

$this->setFrameMode(true);?>

<?
//pre($arResult);
$i = 0;
?>

<?
if (count($arResult['ITEMS'])){?>

  <div class="page-inner">
  	<div class="page-content-inner">
  		<div id="personal-features" class="personal-features">
         <div class="personal-features-list">
            <h2 class="personal-features-title">Возможности</h2>
            <?foreach($arResult['ITEMS'] as $slide)
            {
              $i++;
              ?>
              <div class="personal-feature-item-holder">
                <span data-screen="<?= $i;?>" class="personal-feature-item icon-bullet_right_orange-before"><?= $slide['NAME'];?></span>
              </div>
            <?}?>
          </div>

          <div class="personal-features-demo">
    				<div class="personal-features-demo-notebook icon-notebook-inner">
    					<div data-width="398" data-height="243" data-arrows="false" data-shadows="false" data-margin="0" data-nav="false" data-swipe="false" data-click="false" class="personal-features-demo-screen fotorama">
                <?foreach($arResult['ITEMS'] as $slide)
                {?>
                  <div data-img="<?= $slide['PREVIEW_PICTURE']['SRC'];?>" class="personal-features-demo-screen-item">
      						</div>
                <?}?>
              </div>
    				</div>
    			</div>
      </div>
    </div>
  </div>
<?}?>
