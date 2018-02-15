<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */

$this->setFrameMode(true);?>

<? //pre($arResult);?>

<?
if (count($arResult['ITEMS'])){?>

  <div id="timeline-holder" class="page-text-block timeline-holder">
    <div class="page-inner">
      <h2 class="page-heading2 page-heading-title--h2">История компании</h2>
      <div class="page-content-inner">
        <div class="columns">
          <div class="column-item column-item--left column-item--w40 page-text timeline-text">
            <? $i = 1;?>
            <?foreach($arResult['ITEMS'] as $item)
            {?>
              <div id="h<?= $i;?>" class="timeline-text-item">
                <p><b><?= $item['NAME'];?></b>
                  <p> <small><?= $item['PREVIEW_TEXT'];?></small></p>
                </p>
              </div>
              <?
              $i++;
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <div id="timeline" class="timeline">
      <? $i = 1;?>
      <?foreach($arResult['ITEMS'] as $item)
      {?>
        <div data-info="h<?= $i;?>" title="" data-tooltipcontent=".timeline-item-hover" data-tooltiparrow="false" data-tooltiptheme="page-tooltip page-tooltip--small" data-tooltipposition="right" data-tooltipoffsetx="-78" class="timeline-item has-tooltip"><span class="timeline-item-inner"><span class="timeline-item-title"><?= $item['PROPERTIES']['YEAR']['VALUE'];?></span><span class="timeline-item-hover"><b><?= $item['PROPERTIES']['YEAR']['VALUE'];?>:</b> <?= $item['NAME'];?></span></span></div>
        <?
        $i++;
      }
      ?>
    </div>
  </div>
<?
}
?>
