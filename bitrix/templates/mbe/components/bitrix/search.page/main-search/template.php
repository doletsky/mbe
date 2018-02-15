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
<div class="page-inner">
	<div class="search-page">
		<div class="page-heading-holder">
			<h1 class="page-heading-title page-heading-title--h1">Результаты поиска</h1>

			<div class="page-heading-aside">
				<form action="" method="get" class="page-search search-search">
					<input type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" placeholder="Поиск" class="page-search-query">
					<button type="submit" title="Найти" class="icon-loop_small_white-before page-search-submit"></button>
				</form>
			</div>

		</div>
		<div class="page-content-inner">
			<? //pre($_GET);?>
			<? $n = count($arResult["SEARCH"]);?>
			<?if($n>0):?>
				<? //if($arParams["DISPLAY_TOP_PAGER"] != "N") echo $arResult["NAV_STRING"]?>

				<div class="search-count">По вашему запросу <?= morph($n, 'найден', 'найдено', 'найдено') . ' ' . $n . ' ' . morph($n, 'результат', 'результата', 'результатов');?></div>
				<div id="search-list-holder" class="search-list-holder">
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
				</div>




			<?else:?>
				<?ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND"));?>
			<?endif;?>

		</div>
	</div>
</div>
