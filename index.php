<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetTitle("МБИ - Евразия");
$APPLICATION->SetPageProperty("body_class","no-padding-bottom home-page");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_after.php");
?>



<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"index-services",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "top",
		"COMPONENT_TEMPLATE" => "services",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "N",
		"ROOT_MENU_TYPE" => "services",
		"USE_EXT" => "Y"
	)
);?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"services-right",
	Array(
		"IBLOCK_ID" => 1,
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"NEWS_COUNT" => "100",
		"PROPERTY_CODE" => Array("DESCRIPTION"),
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC"
	)
);?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"slider",
	Array(
		"IBLOCK_ID" => 9,
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"NEWS_COUNT" => "100",
		"PROPERTY_CODE" => Array("DESCRIPTION"),
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC"
	)
);?> <?
$moscowCenters = array();
$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_MAP");
$arFilter = Array("IBLOCK_ID"=>4, 'SECTION_ID' => 8, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement())
{
  $arFields = $ob->GetFields();
  $moscowCenters[] = $arFields['ID'];
}
?>

<div class="page-inner">
	<div class="page-content-inner home-news">
		<h2 class="page-heading-title page-heading-title--h2 page-heading-title--center page-heading-title--largemargin"> <a href="/about/news-and-promotion/">Новости и акции</a> </h2>
		<div class="news-list-holder">
			<div class="cols news-list-toolbar-holder">
				<div class="news-list-toolbar col-item col-item--col2 col-item--middle">
					<div class="page-tabs news-tabs">
 						<a href="#" data-tab="#news-msk" data-tabs="news-tabs" class="page-tab-item page-tab-item--active">Москва</a><a href="#" data-tab="#news-region" data-tabs="news-tabs" class="page-tab-item">РФ</a>
					</div>
				</div>
			</div>
			<div id="news-msk" class="news-list page-tab-content active">
				<div class="cols">
					 <? $GLOBALS['filterNews'] = array('PROPERTY_CENTER' => $moscowCenters); ?>
					 <?$APPLICATION->IncludeComponent(
						"bitrix:news.list",
						"news-on-main",
						Array(
							"DETAIL_URL" => "/about/news-and-promotion/#ELEMENT_CODE#/",
							"FILTER_NAME" => "filterNews",
							"IBLOCK_ID" => 5,
							"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
							"NEWS_COUNT" => "2",
							"PROPERTY_CODE" => Array("DESCRIPTION"),
							"SORT_BY1" => "ACTIVE_FROM",
							"SORT_ORDER1" => "DESC"
						)
					);?>

				<? $GLOBALS['filterPromo'] = array('PROPERTY_CENTER' => $moscowCenters); ?>
				<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"promotions-center", 
	array(
		"DETAIL_URL" => "/about/promotions/#ELEMENT_CODE#/",
		"FILTER_NAME" => "filterPromo",
		"IBLOCK_ID" => "6",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"NEWS_COUNT" => "5",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "DESCRIPTION",
			2 => "",
		),
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"COMPONENT_TEMPLATE" => "promotions-center",
		"IBLOCK_TYPE" => "news",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "undefined",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "Y",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);?>
				</div>
			</div>

			<div id="news-region" class="news-list page-tab-content">
				<div class="cols">
					 <? $GLOBALS['filterNews'] = array('!=PROPERTY_CENTER' => $moscowCenters); ?>
					 <?$APPLICATION->IncludeComponent(
							"bitrix:news.list",
							"news-on-main",
							Array(
								"DETAIL_URL" => "/about/news-and-promotion/#ELEMENT_CODE#/",
								"FILTER_NAME" => "filterNews",
								"IBLOCK_ID" => 5,
								"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
								"NEWS_COUNT" => "2",
								"PROPERTY_CODE" => Array("DESCRIPTION"),
								"SORT_BY1" => "ACTIVE_FROM",
								"SORT_ORDER1" => "DESC"
							)
						);?>

					<? $GLOBALS['filterPromo'] = array('PROPERTY_CENTER' => $moscowCenters); ?>
					<?$APPLICATION->IncludeComponent(
						"bitrix:news.list",
						"promotions-center",
						Array(
							"DETAIL_URL" => "/about/news-and-promotion/#ELEMENT_CODE#/",
							"FILTER_NAME" => "filterPromo",
							"IBLOCK_ID" => 6,
							"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
							"NEWS_COUNT" => "5",
							"PROPERTY_CODE" => Array("DESCRIPTION"),
							"SORT_BY1" => "ACTIVE_FROM",
							"SORT_ORDER1" => "DESC"
						)
					);?>
				</div>
			</div>
		</div>
	</div>
</div>



<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"cabinet-possibilities",
	Array(
		"IBLOCK_ID" => 12,
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"NEWS_COUNT" => "100",
		"PROPERTY_CODE" => Array("DESCRIPTION"),
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC"
	)
);?>

 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"partners",
	Array(
		"IBLOCK_ID" => 11,
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"NEWS_COUNT" => "10000",
		"PROPERTY_CODE" => Array("DESCRIPTION"),
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC"
	)
);?>

<?$APPLICATION->IncludeComponent('bitrix:catalog.section.list', 'footer-map', array(
	"VIEW_MODE" => "TEXT",
	"SHOW_PARENT_NAME" => "Y",
	//"IBLOCK_TYPE" => "",
	"IBLOCK_ID" => "4",
	//"SECTION_ID" => $_REQUEST["SECTION_ID"],
	"SECTION_CODE" => "",
	"SECTION_URL" => "",
	"COUNT_ELEMENTS" => "Y",
	"TOP_DEPTH" => "3",
	"SECTION_FIELDS" => "",
	"SECTION_USER_FIELDS" => "",
	"ADD_SECTIONS_CHAIN" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_NOTES" => "",
	"CACHE_GROUPS" => "Y",
	"SHOW_TITLE" => "Y"
), false);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
