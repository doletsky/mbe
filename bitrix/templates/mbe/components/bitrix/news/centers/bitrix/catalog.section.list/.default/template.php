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

<?
$arCol = array();
$cnt = 0;
//print_r($arResult);
?>

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

							<? $cnt++; ?>
						<?}
					}
					?>
				<?}
			}

			$oneCol = (int)($cnt / 4);
			$rest = $cnt % 4;
			$i = 0;
			?>
			<div>
			<?
			foreach($arResult['SECTIONS'] as $section){
				if ($section['DEPTH_LEVEL'] == 1){
					foreach($arResult['SECTIONS'] as $subsection){
						if ($subsection['IBLOCK_SECTION_ID'] == $section['ID']){ ?>

							<?
							$i++;
							if (($i-1) % ($oneCol + $rest ) == 0){
								?>
								</div>
								<div style="width: 25%; display: inline-block; vertical-align: top;">
								<?
								//$rest = $rest>0 ? $rest-1 : 0;
							}

							if ($subsection['ELEMENT_CNT'] == 1){
								//переход сразу на страницу центра (элем из $subsection)
								$elSelect = Array("ID", "NAME", "DETAIL_PAGE_URL");
								$elFilter = Array("IBLOCK_ID"=>4, "SECTION_ID" => $subsection['ID'], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
								$elres = CIBlockElement::GetList(Array(), $elFilter, false, false, $elSelect);
								if($ob = $elres->GetNextElement())
								{
								 $arFields = $ob->GetFields();
								 ?>
								 	<a href="<?= $arFields['DETAIL_PAGE_URL'];?>" class="centers-point-item-holder centers-point-item-holder--col" style="color: black;">
	 									<span data-area="<?= $section['UF_AREA'];?>" data-city="<?= $subsection['ID'];?>" class="centers-point-item centers-point-item--<?= $section['UF_CSS_CLASS'];?> icon-map_label_small_<?= $section['UF_CSS_CLASS'];?>-before list-city-item">
	 										<span class="centers-point-item-name"><?= $subsection['NAME'];?></span>
	 									</span>
	 								</a>
								 <?
								}
							}else{
							?>
								<div class="centers-point-item-holder centers-point-item-holder--col">
									<span data-area="<?= $section['UF_AREA'];?>" data-city="<?= $subsection['ID'];?>" class="centers-point-item centers-point-item--<?= $section['UF_CSS_CLASS'];?> icon-map_label_small_<?= $section['UF_CSS_CLASS'];?>-before list-city-item show-city">
										<span class="centers-point-item-name"><?= $subsection['NAME'];?></span>
									</span>
								</div>
							<?
							}

						}
					}
					?>
				<?}
			}?>
			</div>
		</div>
	</div>
</div>
