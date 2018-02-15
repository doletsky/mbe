<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
if(!CModule::IncludeModule("iblock"))
	return;
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:search.page",
	"main-search-ajax",
	Array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "N",
		"COMPONENT_TEMPLATE" => ".default",
		"DEFAULT_SORT" => "rank",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "Y",
    "PAGER_TEMPLATE" => "main-search",
		"FILTER_NAME" => "",
		"NO_WORD_LOGIC" => "N",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGE_RESULT_COUNT" => '5',
		"RESTART" => "N",
		"SHOW_WHEN" => "N",
		"SHOW_WHERE" => "N",
		"USE_LANGUAGE_GUESS" => "Y",
		"USE_SUGGEST" => "N",
		"USE_TITLE_RANK" => "N",
    "arrFILTER" => array(
			0 => "forum",
			1 => "iblock_dir",
			2 => "iblock_news",
			3 => "iblock_center",
			4 => "iblock_reviews",
			5 => "iblock_vacancies",
			6 => "blog",
			7 => "microblog",
		),
		"arrWHERE" => "",
		"arrFILTER_forum" => array(
			0 => "all",
		),
		"arrFILTER_iblock_dir" => array(
			0 => "1",
			1 => "2",
			2 => "3",
			3 => "10",
		),
		"arrFILTER_iblock_news" => array(
			0 => "all",
		),
		"arrFILTER_iblock_center" => array(
			0 => "all",
		),
		"arrFILTER_iblock_reviews" => array(
			0 => "all",
		),
		"arrFILTER_iblock_vacancies" => array(
			0 => "all",
		),
		"arrFILTER_blog" => array(
			0 => "all",
		)
	), false
);?>

<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>
