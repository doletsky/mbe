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

<?if($arParams["USE_RSS"]=="Y"):?>
	<?
	if(method_exists($APPLICATION, 'addheadstring'))
		$APPLICATION->AddHeadString('<link rel="alternate" type="application/rss+xml" title="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" href="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" />');
	?>
	<a href="<?=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"]?>" title="rss" target="_self"><img alt="RSS" src="<?=$templateFolder?>/images/gif-light/feed-icon-16x16.gif" border="0" align="right" /></a>
<?endif?>

<?if($arParams["USE_SEARCH"]=="Y"):?>
<?=GetMessage("SEARCH_LABEL")?><?$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	"flat",
	Array(
		"PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"]
	),
	$component
);?>
<br />
<?endif?>
<?if($arParams["USE_FILTER"]=="Y"):?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.filter",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"FIELD_CODE" => $arParams["FILTER_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
	),
	$component
);
?>
<br />
<?endif?>

<div id="centers-list" class="page-inner page-inner--relative centers-holder centers-holder--active">
  <h1 class="page-heading-title page-heading-title--h1">Центры МБИ</h1>
  <div class="centers-toolbar">
    <!--form(class="centers-search", action="404.html", method="post")
    input(class="centers-search-query", type="text", placeholder="Поиск по городу")
    button(type="submit", class="icon-loop_small_white-before centers-search-submit", title="Найти")

    -->
    <div class="centers-view"><a href="#" data-view="map" class="centers-view-item"><span class="centers-view-item-icon">
          <svg width="25" viewbox="0 0 23.23 18.25">
            <circle cx="11.62" cy="7.5" r="2.04"></circle>
            <path d="M644.83,831.9c0,2.14-3.87,7.53-3.87,7.53s-3.87-5.4-3.87-7.53A3.87,3.87,0,0,1,644.83,831.9Z" transform="translate(-629.35 -824.61)" fill="none" stroke="#000" stroke-miterlimit="10"></path>
            <rect x="0.5" y="0.5" width="22.23" height="17.25" fill="none" stroke="#000" stroke-miterlimit="10"></rect>
          </svg></span><span class="centers-view-item-name">На карте</span></a><a href="#" data-view="list" class="centers-view-item"><span class="centers-view-item-icon">
          <svg width="25" viewbox="0 0 23.23 18.25">
            <rect x="0.5" y="0.5" width="22.23" height="17.25" fill="none" stroke="#000" stroke-miterlimit="10"></rect>
            <line x1="7.79" y1="6.13" x2="19.53" y2="6.13" fill="none" stroke="#000" stroke-miterlimit="10"></line>
            <line x1="3.7" y1="6.13" x2="5.62" y2="6.13" fill="none" stroke="#000" stroke-miterlimit="10"></line>
            <line x1="7.79" y1="9.13" x2="19.53" y2="9.13" fill="none" stroke="#000" stroke-miterlimit="10"></line>
            <line x1="3.7" y1="9.13" x2="5.62" y2="9.13" fill="none" stroke="#000" stroke-miterlimit="10"></line>
            <line x1="7.79" y1="12.13" x2="19.53" y2="12.13" fill="none" stroke="#000" stroke-miterlimit="10"></line>
            <line x1="3.7" y1="12.13" x2="5.62" y2="12.13" fill="none" stroke="#000" stroke-miterlimit="10"></line>
          </svg></span><span class="centers-view-item-name">Списком</span></a></div>
  </div>
  <div class="centers-template-holder">


<?
/*
$APPLICATION->IncludeComponent("bitrix:catalog.section.list","",	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"NEWS_COUNT" => $arParams["NEWS_COUNT"],
		"SORT_BY1" => $arParams["SORT_BY1"],
		"SORT_ORDER1" => $arParams["SORT_ORDER1"],
		"SORT_BY2" => $arParams["SORT_BY2"],

		"SECTION_SORT_FIELD" => "name",
    "SECTION_SORT_ORDER" => "ASC",

		"SORT_ORDER2" => $arParams["SORT_ORDER2"],
		"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
		"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"SECTION_USER_FIELDS" => array("UF_CSS_CLASS","UF_PATH", "UF_AREA")
	),
	$component)
*/
?>

	<?
		//catalog.section.list не сортируется
		//поэтому сделал так
		$arSecSelect = array('ID', 'NAME', 'DEPTH_LEVEL', 'UF_AREA', 'UF_CSS_CLASS', 'ELEMENT_CNT', 'IBLOCK_SECTION_ID');
		$arSectOrder = array('NAME'=>'ASC');
		$resSec = CIBLockSection::GetList($arSectOrder, array('IBLOCK_ID'=>$arParams["IBLOCK_ID"], 'ELEMENT_SUBSECTIONS'=>'Y', 'CNT_ACTIVE' => 'Y'), true, $arSecSelect, false);

		$sections = array();
		$moscow = array();
		while($section = $resSec->GetNext()){
			//pre($section);
			if (mb_strtolower($section['NAME']) == 'москва'){
				$moscow = $section;
			}else{
				$sections[] = $section;
			}
		}

	$arCol = array();
	$cnt = 0;
	?>

	<div id="map" class="centers-map-holder centers-template-item centers-template-item--active"><!--centers-template-item--ready-->
		<div class="centers-points-list">
			<?
			foreach($sections as $section){
				if ($section['DEPTH_LEVEL'] == 1){ ?>
					<div class="centers-point-item-holder">
						<span data-area="<?= $section['UF_AREA'];?>" class="centers-point-item centers-point-item--<?= $section['UF_CSS_CLASS'];?> icon-map_label_small_<?= $section['UF_CSS_CLASS'];?>-before map-point-item"><span class="centers-point-item-name"><?= $section['NAME'];?></span><span class="centers-point-item-count"><?= $section['ELEMENT_CNT'];?></span></span>
					</div>
				<?}
			}?>
		</div>
		<div id="centers-map" class="centers-map"></div>
	</div>

	<div id="list" class="centers-list-holder centers-template-item centers-template-item--ready">
		<div class="page-content-inner">
			<div class="centers-points-list" style="margin-top: 0;">
				<?
				#$sections0=array();
				foreach($sections as $i => $section){
					if ($section['DEPTH_LEVEL'] == 1){ 
						#$sections0[$section['ID']]=$section;
					}
					else{ // DEPTH_LEVEL != 1
						if ($section['ELEMENT_CNT'] == 1){
							$elSelect = Array("ID", "NAME", "DETAIL_PAGE_URL");
							$elFilter = Array("IBLOCK_ID"=>4, "SECTION_ID" => $section['ID'], "ACTIVE"=>"Y");
							$elres = CIBlockElement::GetList(Array(), $elFilter, false, false, $elSelect);
							if($arFields = $elres->GetNext()){
								$sections[$i]["URL"] = $arFields['DETAIL_PAGE_URL'];
							}
						}
					}
				}
				foreach($sections as $section){
					if ($section['DEPTH_LEVEL'] == 1){
						foreach($sections as $key => $subsection){
							if ($subsection['IBLOCK_SECTION_ID'] == $section['ID']){
								$cnt++;
								$sections[$key]['UF_AREA'] = $section['UF_AREA'];
							}
						}
					}
				}
				foreach($sections as $i => $section){
					if ($section['DEPTH_LEVEL'] == 1){
						?>
						<div class="centers-point-item-holder">
							<span data-area="<?= $section['UF_AREA'];?>" class="centers-point-item centers-point-item--<?= $section['UF_CSS_CLASS'];?> icon-map_label_small_<?= $section['UF_CSS_CLASS'];?>-before list-point-item"><span class="centers-point-item-name"><?= $section['NAME'];?></span><span class="centers-point-item-count"><?= $section['ELEMENT_CNT'];?></span></span>
							<div class="centers-points-list-inner">
								<?foreach($sections as $section1){
									if ($section1['DEPTH_LEVEL'] != 1 && $section1["UF_AREA"]==$section["UF_AREA"]){
										if ($section1['ELEMENT_CNT'] == 0){
											/* do nothing */
										}else
										if ($section1['ELEMENT_CNT'] == 1){
											//переход сразу на страницу центра (элем из $subsection)
											if(isset($section1["URL"])){?>
			 									<a href="<?= $section1["URL"];?>" data-area="<?= $section1['UF_AREA'];?>" data-city="<?= $section1['ID'];?>" class="centers-point-item list-city-item">
			 										<span class="centers-point-item-name"><?= $section1['NAME'];?></span>
			 									</a>
											<?
											}else{
											?>
												<span data-area="<?= $section1['UF_AREA'];?>" data-city="<?= $section1['ID'];?>" class="centers-point-item list-city-item show-city">
													<span class="centers-point-item-name"><?= $section1['NAME'];?></span>
												</span>
											<?
											}
										}else{
										?>
											<span data-area="<?= $section1['UF_AREA'];?>" data-city="<?= $section1['ID'];?>" class="centers-point-item list-city-item show-city">
												<span class="centers-point-item-name"><?= $section1['NAME'];?></span>
											</span>
										<?
										}
									}
								}?>
							</div>
						</div>
						<?
					}
				}
				?>
			</div>
			<div class="centers-points-list">
				<div class="centers-points-list-title">Центры обслуживания в городах РФ</div>

				<!-- <div class="centers-point-item-holder centers-point-item-holder--col"> -->
					<span data-area="central" data-city="<?= $moscow['ID'];?>" class="centers-point-item centers-point-item--<?= $moscow['UF_CSS_CLASS'];?> icon-map_label_small_<?= $moscow['UF_CSS_CLASS'];?>-before list-city-item show-city">
						<span class="centers-point-item-name"><?= $moscow['NAME'];?></span>
					</span>
				<!-- </div> -->

				<div class="centers-points-list-inner">
					<?foreach($sections as $section){
						if ($section['DEPTH_LEVEL'] != 1){
							if ($section['ELEMENT_CNT'] == 0){
								/* do nothing */
							}else
							if ($section['ELEMENT_CNT'] == 1){
								//переход сразу на страницу центра (элем из $subsection)
								if(isset($section["URL"])){?>
 									<a href="<?= $section["URL"];?>" data-area="<?= $section['UF_AREA'];?>" data-city="<?= $section['ID'];?>" class="centers-point-item centers-point-item--<?= $section['UF_CSS_CLASS'];?> icon-map_label_small_<?= $section['UF_CSS_CLASS'];?>-before list-city-item">
 										<span class="centers-point-item-name"><?= $section['NAME'];?></span>
 									</a>
								<?
								}else{
								?>
									<span data-area="<?= $section['UF_AREA'];?>" data-city="<?= $section['ID'];?>" class="centers-point-item centers-point-item--<?= $section['UF_CSS_CLASS'];?> icon-map_label_small_<?= $section['UF_CSS_CLASS'];?>-before list-city-item show-city">
										<span class="centers-point-item-name"><?= $section['NAME'];?></span>
									</span>
								<?
								}
							}else{
							?>
								<span data-area="<?= $section['UF_AREA'];?>" data-city="<?= $section['ID'];?>" class="centers-point-item centers-point-item--<?= $section['UF_CSS_CLASS'];?> icon-map_label_small_<?= $section['UF_CSS_CLASS'];?>-before list-city-item show-city">
									<span class="centers-point-item-name"><?= $section['NAME'];?></span>
								</span>
							<?
							}
						}
					}?>
				</div>
			</div>
		</div>
	</div>

</div>

</div>

<div id="center-item" class="page-inner page-inner--relative centers-holder"></div>

<?/*$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"NEWS_COUNT" => $arParams["NEWS_COUNT"],
		"SORT_BY1" => $arParams["SORT_BY1"],
		"SORT_ORDER1" => $arParams["SORT_ORDER1"],
		"SORT_BY2" => $arParams["SORT_BY2"],
		"SORT_ORDER2" => $arParams["SORT_ORDER2"],
		"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
		"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
	),
	$component
);*/?>
