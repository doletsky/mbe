<!DOCTYPE html><!--[if IE 7]><html lang="ru" prefix="og: http://ogp.me/ns#" class="ie8 no-js"><![endif]-->
<!--[if IE 8]><html lang="ru" prefix="og: http://ogp.me/ns#" class="ie8 no-js"><![endif]-->
<!--[if IE 9]><html lang="ru" prefix="og: http://ogp.me/ns#" class="ie9 no-js"><![endif]-->
<!--[if !IE]><!-->
<html lang="ru" prefix="og: http://ogp.me/ns#" class="no-js"><!--<![endif]-->
  <head>
    <!--Meta-->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?$APPLICATION->ShowTitle()?></title>
    <?/*?><meta name="description" content="MBE мировой — лидер в области экспресс-доставки"/><?*/?>
    <meta name="robots" content="index, follow"/>
    <!--//Meta-->


    <!--Open graph-->
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Mail Boxes ETC"/>
    <meta property="og:site_name" content="MailBoxesETC"/>
    <meta property="og:description" content="MBE мировой — лидер в области экспресс-доставки"/>
    <meta property="og:url" content="http://mbepost.ru"/>
    <meta property="og:image:type" content="jpg"/>
    <meta property="og:image:width" content="440"/>
    <meta property="og:image:height" content="610"/>
    <!--//Open graph-->


    <!--Icons-->
    <link href="<?=SITE_TEMPLATE_PATH?>/i/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <link href="<?=SITE_TEMPLATE_PATH?>/i/icons/apple-touch-icon-57.jpg" rel="apple-touch-icon" sizes="57x57"/>
    <link href="<?=SITE_TEMPLATE_PATH?>/i/icons/apple-touch-icon-72.jpg" rel="apple-touch-icon" sizes="72x72"/>
    <link href="<?=SITE_TEMPLATE_PATH?>/i/icons/apple-touch-icon-114.jpg" rel="apple-touch-icon" sizes="114x114"/>
    <link href="<?=SITE_TEMPLATE_PATH?>/i/icons/apple-touch-icon-144.jpg" rel="apple-touch-icon" sizes="144x144"/>
    <!--//Icons-->


    <!--CSS-->
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700&amp;subset=latin,cyrillic,cyrillic-ext"/>
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.min.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/css/tooltipster.min.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=SITE_TEMPLATE_PATH?>/css/slick.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?=SITE_TEMPLATE_PATH?>/css/sprite.css?v=158953"/>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=SITE_TEMPLATE_PATH?>/css/mbe.css?v=431757"/>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=SITE_TEMPLATE_PATH?>/css/mbe-responsive.css?v=214757"/>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=SITE_TEMPLATE_PATH?>/css/redisign.css"/>
    <!--//CSS-->

    <?$APPLICATION->ShowHead();?>
  </head>
  <body itemscope itemtype="http://schema.org/WebPage" class="<?=$APPLICATION->ShowProperty("body_class")?>">
  <?$APPLICATION->ShowPanel();?>
    <div class="page">
      <header class="page-header">
        <div id="page-header-main" class="page-header-main">
          <div class="page-inner">
            <!-- Logo-->
            <a class="header-logo" href="/"><img data-src="<?=SITE_TEMPLATE_PATH?>/i/svg/logo2.svg" alt="logo2.svg" class="svg scroll"></a>

            <?$APPLICATION->IncludeComponent("bitrix:menu", "main-menu", Array(
            	    "COMPONENT_TEMPLATE" => ".default",
            		"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
            		"MENU_CACHE_TYPE" => "A",	// Тип кеширования
            		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
            		"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
            		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
            		"MAX_LEVEL" => "1",	// Уровень вложенности меню
            		"CHILD_MENU_TYPE" => "top",	// Тип меню для остальных уровней
            		"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
            		"DELAY" => "N",	// Откладывать выполнение шаблона меню
            		"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
            	),
            	false
            );?>
            <div class="mobile-menu-toggler"><span class="mobile-menu-toggler-top"></span><span class="mobile-menu-toggler-middle"></span><span class="mobile-menu-toggler-bottom"></span></div>
          </div>

          <?if($APPLICATION->GetCurPage()=='/'){?>
          <div id="home-header" class="home-header">
            <div class="home-header-bg">
              <div style="background-image: url(<?=SITE_TEMPLATE_PATH?>/i/1.jpg);"></div>
              <div style="background-image: url(<?=SITE_TEMPLATE_PATH?>/i/2.jpg);"></div>
              <div style="background-image: url(<?=SITE_TEMPLATE_PATH?>/i/3.jpg);"></div>
              <div style="background-image: url(<?=SITE_TEMPLATE_PATH?>/i/main_bg.jpg);"></div>
            </div>
          </div>

          <div  id="header-form" class="header-form">
            <?$APPLICATION->IncludeComponent(
	"bitrix:form", 
	"cost-calculation-form", 
	array(
		"COMPONENT_TEMPLATE" => "cost-calculation-form",
		"START_PAGE" => "new",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_VIEW_PAGE" => "Y",
		"SUCCESS_URL" => "",
		"WEB_FORM_ID" => "7",
		"RESULT_ID" => $_REQUEST[RESULT_ID],
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_ADDITIONAL" => "Y",
		"SHOW_STATUS" => "N",
		"EDIT_ADDITIONAL" => "N",
		"EDIT_STATUS" => "Y",
		"NOT_SHOW_FILTER" => array(
			0 => "",
			1 => "",
		),
		"NOT_SHOW_TABLE" => array(
			0 => "",
			1 => "",
		),
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "Y",
		"SEF_MODE" => "N",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"VARIABLE_ALIASES" => array(
			"action" => "action",
		)
	),
	false
);?>
          </div>

          <?}?>

        </div>
        <div class="page-header-service">
          <div class="page-inner page-inner--overflowed">
            <!-- Breadcrumbs-->
            <?if($APPLICATION->GetCurPage()!='/'){?>
                <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "tree", Array(
                	),
                	false
                );?>
            <?}else{?>
                <?$APPLICATION->IncludeComponent('bitrix:catalog.section.list', 'header-toolbar-location', array(
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
                  "SHOW_COURIER" => "Y"
                ), false);?>
              <?}?>
          </div>
        </div>
      </header>

      <main class="page-content">
        <?if($APPLICATION->GetPageProperty("is_text")){?>
        <div class="page-inner">
          <h1 class="page-heading1 page-heading-title--h1"><?=$APPLICATION->ShowTitle(true);?></h1>
          <div class="page-text-block">
        <?
        }
        elseif(CSite::inDir('/about/') && !CSite::inDir('/about/news-and-promotion/') && !CSite::inDir('/about/jobs/')
          && !CSite::inDir('/about/promotions/') && !CSite::inDir('/about/reviews/') ){
        ?>
        <div class="page-inner">
          <h2 class="page-heading1 page-heading-title--h1"><?=$APPLICATION->ShowTitle(true);?></h2>
          <?$APPLICATION->IncludeComponent("bitrix:menu", "submenu", Array(
          	  "COMPONENT_TEMPLATE" => ".default",
          		"ROOT_MENU_TYPE" => "subtop",	// Тип меню для первого уровня
          		"MENU_CACHE_TYPE" => "A",	// Тип кеширования
          		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
          		"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
          		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
          		"MAX_LEVEL" => "1",	// Уровень вложенности меню
          		"CHILD_MENU_TYPE" => "subtop",	// Тип меню для остальных уровней
          		"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
          		"DELAY" => "N",	// Откладывать выполнение шаблона меню
          		"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
          	),
          	false
          );?>

        <?}?>
