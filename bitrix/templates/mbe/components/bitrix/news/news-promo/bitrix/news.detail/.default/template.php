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
$this->setFrameMode(true);?>

<? //pre($arResult);?>

<?
$center = CIBlockElement::GetByID($arResult['PROPERTIES']['CENTER']['VALUE']);
?>

<div class="page-inner">
	<div class="page-heading-holder">
		<h1 class="page-heading-title page-heading-title--h1"><?= $arResult['NAME']?></h1>
		<div class="page-heading-aside">
			<a href="/about/news-and-promotion/" class="custom-link custom-link--back">
				<span class="custom-link-icon">
					<svg id="Layer_16" data-name="Layer 16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.23 20.28"><title>svg</title><polyline points="7.16 4.63 4.03 2.72 7.16 0.4" fill="none" stroke="#000" stroke-miterlimit="10"/><polyline points="4.66 2.53 22.73 2.53 22.73 19.78 0.5 19.78 0.5 2.53" fill="none" stroke="#000" stroke-miterlimit="10"/></svg>
				</span>
				<span class="custom-link-title">Все новости МБИ </span>
			</a>
		</div>
	</div>
	<?
	//если есть фотки
	//pre($arResult);
	if (count($arResult['PROPERTIES']['IMAGES']['VALUE']) && ($arResult['PROPERTIES']['IMAGES']['VALUE'] != '')){
	?>
	<div class="page-content-inner">
		<div class="article">
			<div class="columns">
				<div class="column-item column-item--left column-item--w50">
					<time datetime="2015-04-12" class="article-date"><?= russian_date('j F Y', MakeTimeStamp($arResult['ACTIVE_FROM'],"DD.MM.YYYY HH:MI:SS"));?></time>
					<div class="artcile-text page-text">
						<?= $arResult['DETAIL_TEXT'];?>
						<br><br>
						<?
						if($ar_res = $center->GetNext())
						{
							?>
							<a href="<?= $ar_res['DETAIL_PAGE_URL']?>" class="custom-link custom-link--map">
								<span class="custom-link-icon">
									<svg id="Layer_12" data-name="Layer 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.56 18.11"><title>msp-pointers</title><path d="M601.93,857.82a4,4,0,0,1,4,4c0,2.23-4,7.88-4,7.88a46.77,46.77,0,0,1-2.85-4.56" transform="translate(-589.92 -852.48)" fill="none" stroke="#70706e" stroke-miterlimit="10"/><circle cx="6.19" cy="6.49" r="2.99" fill="none" stroke="#009bdf" stroke-miterlimit="10"/><path d="M601.79,858.67c0,3.14-5.69,11.07-5.69,11.07s-5.69-7.93-5.69-11.07A5.69,5.69,0,1,1,601.79,858.67Z" transform="translate(-589.92 -852.48)" fill="none" stroke="#009bdf" stroke-miterlimit="10"/></svg>
								</span>
								<span class="custom-link-title">Адрес офиса на карте</span>
							</a>
							<?
						}?>
					</div>
				</div>
				<div class="column-item column-item--right column-item--w45">
					<div data-nav="false" data-allowfullscreen="true" data-loop="true" data-auto="false" data-loopclass="icon-loop_blue-before" data-prevclass="icon-blue_pointer_left-before" data-nextclass="icon-blue_pointer_right-before" data-width="100%" data-shadows="false" data-margin="0" data-arrows="always" data-autoplay="5000" data-transitionduration="1500" class="fotorama fotorama--noauto content-slider">
						<?
						foreach($arResult['PROPERTIES']['IMAGES']['VALUE'] as $image)
						{
							?>
							<img src="<?= MakeImage($image,array("w"=>2*576,"h"=>2*320,"zc"=>1));?>">
							<?
						}?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?}else{
		//без фоток
		?>
		<div class="page-content-inner">
			<div class="article">
				<time datetime="<?= russian_date('j F Y', MakeTimeStamp($arResult['ACTIVE_FROM'],"DD.MM.YYYY"));?>" class="article-date"><?= russian_date('j F Y', MakeTimeStamp($arResult['ACTIVE_FROM'],"DD.MM.YYYY"));?></time>
				<div class="artcile-text page-text">
					<?= $arResult['DETAIL_TEXT'];?>
					<br><br>
					<?
					if($ar_res = $center->GetNext())
					{
						?>
						<a href="<?= $ar_res['DETAIL_PAGE_URL']?>" class="custom-link custom-link--map">
							<span class="custom-link-icon">
								<svg id="Layer_12" data-name="Layer 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.56 18.11"><title>msp-pointers</title><path d="M601.93,857.82a4,4,0,0,1,4,4c0,2.23-4,7.88-4,7.88a46.77,46.77,0,0,1-2.85-4.56" transform="translate(-589.92 -852.48)" fill="none" stroke="#70706e" stroke-miterlimit="10"/><circle cx="6.19" cy="6.49" r="2.99" fill="none" stroke="#009bdf" stroke-miterlimit="10"/><path d="M601.79,858.67c0,3.14-5.69,11.07-5.69,11.07s-5.69-7.93-5.69-11.07A5.69,5.69,0,1,1,601.79,858.67Z" transform="translate(-589.92 -852.48)" fill="none" stroke="#009bdf" stroke-miterlimit="10"/></svg>
							</span>
							<span class="custom-link-title">Адрес офиса на карте</span>
						</a>
						<?
					}?>
				</div>
			</div>
		</div>
	<?}?>
</div>
