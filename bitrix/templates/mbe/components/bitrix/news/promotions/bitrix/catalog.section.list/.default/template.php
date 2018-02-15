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

<? //print_r($arResult);?>

<div id="map" class="centers-map-holder centers-template-item centers-template-item--active"><!--centers-template-item--ready-->
	<div class="centers-points-list">
		<?
		foreach($arResult['SECTIONS'] as $section){
			if ($section['DEPTH_LEVEL'] == 1){ ?>
				<div class="centers-point-item-holder"><span data-area="<?= $section['UF_AREA'];?>" class="centers-point-item centers-point-item--<?= $section['UF_CSS_CLASS'];?> icon-map_label_small_<?= $section['UF_CSS_CLASS'];?>-before map-point-item"><span class="centers-point-item-name"><?= $section['NAME'];?></span><span class="centers-point-item-count"><?= $section['ELEMENT_CNT'];?></span></span></div>
			<?}
		}?>
	</div>
	<div id="centers-map" class="centers-map"></div>
</div>
<div id="list" class="centers-list-holder centers-template-item centers-template-item--ready">
	<div class="page-content-inner">
		<div class="centers-points-list">
			<?
			foreach($arResult['SECTIONS'] as $section){
				if ($section['DEPTH_LEVEL'] == 1){ ?>
					<div class="centers-point-item-holder"><span data-area="<?= $section['UF_AREA'];?>" class="centers-point-item centers-point-item--<?= $section['UF_CSS_CLASS'];?> icon-map_label_small_<?= $section['UF_CSS_CLASS'];?>-before list-point-item"><span class="centers-point-item-name"><?= $section['NAME'];?></span><span class="centers-point-item-count"><?= $section['ELEMENT_CNT'];?></span></span></div>
				<?}
			}?>
		</div>
		<div class="centers-points-list">
			<div class="centers-points-list-title">Центры обслуживания в городах РФ</div>
			<?
			foreach($arResult['SECTIONS'] as $section){
				if ($section['DEPTH_LEVEL'] == 1){
					foreach($arResult['SECTIONS'] as $subsection){
						if ($subsection['IBLOCK_SECTION_ID'] == $section['ID']){ ?>
							<div class="centers-point-item-holder centers-point-item-holder--col4"><span data-area="<?= $section['UF_AREA'];?>" data-city="<?= $subsection['ID'];?>" class="centers-point-item centers-point-item--<?= $section['UF_CSS_CLASS'];?> icon-map_label_small_<?= $section['UF_CSS_CLASS'];?>-before list-city-item show-city"><span class="centers-point-item-name"><?= $subsection['NAME'];?></span></span></div>
						<?}
					}
					?>
				<?}
			}?>
		</div>
	</div>
</div>
