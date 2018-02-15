<!DOCTYPE html><!--[if IE 7]><html lang="ru" prefix="og: http://ogp.me/ns#" class="ie8 no-js"><![endif]-->
<!--[if IE 8]><html lang="ru" prefix="og: http://ogp.me/ns#" class="ie8 no-js"><![endif]-->
<!--[if IE 9]><html lang="ru" prefix="og: http://ogp.me/ns#" class="ie9 no-js"><![endif]-->
<!--[if !IE]><!-->
<html lang="ru" prefix="og: http://ogp.me/ns#" class="no-js"><!--<![endif]-->
  <head>
    <!--Meta-->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Mail Boxes ETC</title>
    <meta name="description" content="MBE мировой — лидер в области экспресс-доставки"/>
    <meta name="robots" content="index, follow"/>
    <!--//Meta-->


    <!--Open graph-->
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Mail Boxes ETC"/>
    <meta property="og:site_name" content="MailBoxesETC"/>
    <meta property="og:description" content="MBE мировой — лидер в области экспресс-доставки"/>
    <meta property="og:url" content="http://wemakesites.ru/projects/mbe/"/>
    <meta property="og:image" content="http://wemakesites.ru/projects/mbe/i/.jpg"/>
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
    <link rel="stylesheet" type="text/css" media="screen" href="<?=SITE_TEMPLATE_PATH?>/css/sprite.css?v=374570"/>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=SITE_TEMPLATE_PATH?>/css/mbe-empty.css?v=295009"/>
    <!--//CSS-->

    <?$APPLICATION->ShowHead();?>
  </head>

  <body itemscope itemtype="http://schema.org/WebPage">
  <?$APPLICATION->ShowPanel();?>

    <div class="page">
      <header class="page-header">

          <div class="page-inner">
            <!-- Logo-->
            <a class="header-logo" href="/">Mail Boxes ETC</a>

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
          </div>

      </header>
    </div>
