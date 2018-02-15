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
$this->setFrameMode(true); ?>

<?

$nPageSize = $arParams['NEWS_COUNT'];
$_GET['iNumPage'] = 1;
$total = CIBlockElement::GetList(Array(), array('IBLOCK_ID'=>8, 'ACTIVE' => 'Y'), array(), false, array('ID', 'NAME'));

?>

<div class="page-content-inner">
	<div id="reviews" class="reviews cols">

		<?foreach($arResult["ITEMS"] as $arItem){?>
			<div class="review-item col-item col-item--col2">
				<div class="review-item-text page-text"><?= $arItem['PREVIEW_TEXT'];?></div>
				<div class="review-item-author"><?= $arItem['NAME'];?></div>
				<time class="review-item-date"><?= date('d.m.Y H:i', MakeTimeStamp($arItem['ACTIVE_FROM'],"DD.MM.YYYY HH:MI:SS"));?></time>
			</div>
		<?}?>
		<a href="/bitrix/templates/mbe/ajax/reviews_more.php?n=<?= $nPageSize;?>&iNumPage=<?= $_GET['iNumPage'];?>&total=<?= $total?>" data-container="#reviews" class="col-item col-item--col2 custom-link custom-link--right custom-link--more more-link">
			<span class="custom-link-icon">
				<svg id="Layer_12" data-name="Layer 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44.28 33.75"><title>more</title><path d="M430.85,1103.4a16.38,16.38,0,0,1-32.49-2.9" transform="translate(-392.59 -1083.63)" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><path d="M398.41,1099.12A16.38,16.38,0,0,1,431,1099q0.07,0.74.07,1.5" transform="translate(-392.59 -1083.63)" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><polyline points="0.35 22.34 5.84 16.93 11.17 22.34" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><polyline points="33.1 11.52 38.59 16.93 43.92 11.52" fill="none" stroke="#009ce1" stroke-miterlimit="10"/></svg>
			</span>
			<span class="custom-link-inner">
				<span class="custom-link-title">Показать еще</span>
				<span class="custom-link-note">Всего <?= $total . ' ' . morph($total, 'отзыв', 'отзыва', 'отзывов');?></span>
			</span>
		</a>
	</div>
</div>
