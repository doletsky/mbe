<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */

$this->setFrameMode(true);?>

<? //pre($arResult);?>

<?
if (count($arResult['ITEMS'])){?>

  <div class="page-inner page-text-block">
    <h2 class="page-heading2 page-heading-title--h2"><a href="/about/reviews/">Отзывы</a></h2>
  </div>
  <div id="reviews-slider" class="reviews reviews--slider">
    <div class="page-inner">
      <div class="reviews-inner">
        <?foreach($arResult['ITEMS'] as $review)
        {?>
          <div class="review-item">
            <div class="review-item-text page-text"><?= $review['PREVIEW_TEXT'];?></div>
            <div class="review-item-author"><?= $review['NAME'];?></div>
            <time class="review-item-date"><?= date('d.m.Y H:i', MakeTimeStamp($review['ACTIVE_FROM'],"DD.MM.YYYY HH:MI:SS"));?></time>
          </div>
        <?
        }
        ?>
      </div>
    </div>
    <span class="reviews-slider-control reviews-slider-control--prev"></span><span class="reviews-slider-control reviews-slider-control--next"></span>
  </div>
  <?
}
?>
