<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
?>

		<? $n = count($arResult["SEARCH"]);?>
		<?if($n>0){?>
			<? //if($arParams["DISPLAY_TOP_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
        <? //pre();?>
				<ol class="search-list">
					<? //результаты поиска ?>
					<?foreach($arResult["SEARCH"] as $arItem):?>
						<li class="search-item">
							<div class="search-item-inner">
								<div class="search-item-name-holder">
									<a href="<?= $arItem["URL"]?>" class="search-item-name link link--black link--black--inverse"><?= $arItem["TITLE_FORMATED"]?></a></div>
								<div class="search-item-note-holder">
									Раздел
									<!-- &laquo;<a href="/about/jobs/" class="link link--gray link--gray--inverse">Вакансии</a>&raquo; -->
									<?=$arItem["CHAIN_PATH"]?>
								</div>
							</div>
						</li>
					<?endforeach;?>
				</ol>
        <? if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
    <?}?>
