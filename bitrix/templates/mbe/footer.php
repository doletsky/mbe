        <?if($APPLICATION->GetPageProperty("is_text")){?>
          </div>
        </div>
        <?}
        elseif(CSite::inDir('/about/')){?>
        </div>
        <?}?>
      </main>
    </div>
    <footer class="page-footer">
      <?
        if(CSite::inDir('/about/news-and-promotion/') || CSite::inDir('/about/jobs/')
        || CSite::inDir('/about/promotions/') || CSite::inDir('/about/reviews/') ){
          $APPLICATION->IncludeComponent("bitrix:menu", "submenu", Array(
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
              "CSS_CLASS" => "page-menu--bordered",
            ),
            false
          );
        }
      ?>
      <div class="page-footer-inner">
        <div class="page-footer-nav">
          <div class="page-inner page-inner--overflowed">
            <?$APPLICATION->IncludeComponent("bitrix:menu", "footer", Array(
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
            <!-- Search form-->
            <form action="/search/" method="get" class="footer-search">
              <input type="text" name="q" placeholder="Поиск по сайту" class="footer-search-query">
              <button type="submit" title="Найти" class="footer-search-submit icon-bullet_right_black-before"></button>
            </form>
            <!-- Footer social-->
            <div class="footer-social"><a href="#" target="_blank" title="Наша страница на Facebook" class="footer-social-item"><span class="footer-social-item-icon transition-icons"><span class="transition-icon-item icon-fb_white-inner transition-icon-item--out"></span><span class="transition-icon-item icon-fb_blue-inner transition-icon-item--over"></span></span></a><a href="#" target="_blank" title="Наша группа вКонтакте" class="footer-social-item"><span class="footer-social-item-icon transition-icons"><span class="transition-icon-item icon-vk_white-inner transition-icon-item--out"></span><span class="transition-icon-item icon-vk_blue-inner transition-icon-item--over"></span></span></a><a href="#" target="_blank" title="Наш Twitter" class="footer-social-item"><span class="footer-social-item-icon transition-icons"><span class="transition-icon-item icon-twitter_white-inner transition-icon-item--out"></span><span class="transition-icon-item icon-twitter_blue-inner transition-icon-item--over"></span></span></a></div>

            <!-- Footer location-->

            <?$APPLICATION->IncludeComponent('bitrix:catalog.section.list', 'footer-location', array(
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
              "CACHE_GROUPS" => "Y"
            ), false);?>
            <div class="clear"></div>
          </div>
          <div class="page-inner">
            <?$APPLICATION->IncludeComponent(
            	"bitrix:menu",
            	"services",
            	array(
            		"COMPONENT_TEMPLATE" => "services",
            		"ROOT_MENU_TYPE" => "services",
            		"MENU_CACHE_TYPE" => "A",
            		"MENU_CACHE_TIME" => "3600",
            		"MENU_CACHE_USE_GROUPS" => "N",
            		"MENU_CACHE_GET_VARS" => array(
            		),
            		"MAX_LEVEL" => "1",
            		"CHILD_MENU_TYPE" => "top",
            		"USE_EXT" => "Y",
            		"DELAY" => "N",
            		"ALLOW_MULTI_SELECT" => "N"
            	),
            	false
            );?>
          </div>
        </div>
        <div class="page-footer-copyrights">
          <div class="page-inner">
            <!-- Copyrights-->
            <div class="footer-copyrights">MBE POST &copy; <?=date("Y")?>. Все права защищены.</div>
            <!-- Creators--><a href="http://www.studio-v.ru" target="_blank" class="footer-creators icon-studio-v-after"><span class="footer-creators-name">Сайт создан в студии &laquo;Восхождение&raquo;</span></a>
            
          </div>
        </div>

      </div>
    </footer>

    <div id="callback-form" style="display: none;" class="form">

      <?$APPLICATION->IncludeComponent(
    	"bitrix:form",
    	"callback-form",
    	array(
    		"COMPONENT_TEMPLATE" => "callback-form",
    		"START_PAGE" => "new",
    		"SHOW_LIST_PAGE" => "N",
    		"SHOW_EDIT_PAGE" => "N",
    		"SHOW_VIEW_PAGE" => "Y",
    		"SUCCESS_URL" => "",
    		"WEB_FORM_ID" => "2",
    		"RESULT_ID" => $_REQUEST[RESULT_ID],
    		"SHOW_ANSWER_VALUE" => "N",
    		"SHOW_ADDITIONAL" => "Y",
    		"SHOW_STATUS" => "Y",
    		"EDIT_ADDITIONAL" => "N",
    		"EDIT_STATUS" => "N",
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
    		//"CENTER_ID" => $ElementID,
    		"VARIABLE_ALIASES" => array(
    			"action" => "action",
    		)
    	),
    	false
    );?>
    </div>
    <?/*
    <div id="callback-form" style="display: none;">
      <form action="franchise.html" method="post" class="form">
        <div class="form-title">Обратный звонок</div>
        <input type="text" placeholder="ФИО" required class="form-element form-element--text form-element--fullwidth">
        <input type="text" placeholder="Телефон" class="form-element form-element--text form-element--fullwidth">
        <div class="button-holder"><a href="#callback-ok" class="button button--blue button--small ajax-form"><span class="button-text">Отправить</span><span class="button-bg"></span></a></div>
      </form>
    </div>*/
    ?>
    <?/*
    <div id="callback-ok" style="display: none;">
      <form action="franchise.html" method="post" class="form">
        <div class="form-title">Мы вам перезвоним</div>
        <div class="form-text">Спасибо за обращение, в ближайшее время наш менеджер свяжется с вами.</div>
      </form>
    </div>
    */?>

    <div id="feedback-form" style="display: none;">

      <?$APPLICATION->IncludeComponent(
      "bitrix:form",
      "send-msg-form",
      array(
        "COMPONENT_TEMPLATE" => "send-msg-form",
        "START_PAGE" => "new",
        "SHOW_LIST_PAGE" => "N",
        "SHOW_EDIT_PAGE" => "N",
        "SHOW_VIEW_PAGE" => "Y",
        "SUCCESS_URL" => "",
        "WEB_FORM_ID" => "3",
        "RESULT_ID" => $_REQUEST[RESULT_ID],
        "SHOW_ANSWER_VALUE" => "N",
        "SHOW_ADDITIONAL" => "Y",
        "SHOW_STATUS" => "Y",
        "EDIT_ADDITIONAL" => "N",
        "EDIT_STATUS" => "N",
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
        //"CENTER_ID" => $ElementID,
        "VARIABLE_ALIASES" => array(
          "action" => "action",
        )
      ),
      false
    );?>
    </div>

    <div id="courier-form" style="display: none;  padding-bottom: 20px;" class="form">
      <?$APPLICATION->IncludeComponent(
        "bitrix:form",
        "call-courier-form",
        array(
          "COMPONENT_TEMPLATE" => "call-courier-form",
          "START_PAGE" => "new",
          "SHOW_LIST_PAGE" => "N",
          "SHOW_EDIT_PAGE" => "N",
          "SHOW_VIEW_PAGE" => "Y",
          "SUCCESS_URL" => "",
          "WEB_FORM_ID" => "6",
          "RESULT_ID" => $_REQUEST[RESULT_ID],
          "SHOW_ANSWER_VALUE" => "N",
          "SHOW_ADDITIONAL" => "Y",
          "SHOW_STATUS" => "Y",
          "EDIT_ADDITIONAL" => "N",
          "EDIT_STATUS" => "N",
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
          //"CENTER_ID" => $ElementID,
          "VARIABLE_ALIASES" => array(
            "action" => "action",
          )
        ),
        false
      );?>
    </div>


    <div id="status-form" style="display: none;">
      <form action="index.html" method="post" class="form">
        <div class="form-heading">
          <div class="form-title">Статус отправления</div>
        </div>
        <div class="page-tabs status-tabs"><a href="#" data-tab="#status-doc" data-tabs="status-tabs" class="page-tab-item page-tab-item--active">По номеру накладной</a><a href="#" data-tab="#status-order" data-tabs="status-tabs" class="page-tab-item">По номеру заказа</a></div>
        <div id="status-doc" class="columns page-tab-content active">
          <div class="columns-item column-item--left column-item--w50 column-item--m5">
            <input type="text" placeholder="Номер накладной" class="form-element form-element--text form-element--fullwidth">
          </div><a href="#status-result-form" class="button button--blue button--small ajax-form"><span class="button-text">Узнать статус</span><span class="button-bg"></span></a>
        </div>
        <div id="status-order" class="columns page-tab-content">
          <div class="columns-item column-item--left column-item--w50 column-item--m5">
            <input type="text" placeholder="Номер заказа" class="form-element form-element--text form-element--fullwidth">
          </div><a href="#status-result-form" class="button button--blue button--small ajax-form"><span class="button-text">Узнать статус</span><span class="button-bg"></span></a>
        </div>
      </form>
    </div>
    <div id="status-result-form" style="display: none;">
      <form action="index.html" method="post" class="form">
        <div class="form-heading">
          <div class="form-title">Статус отправления вашего заказа</div>
          <div class="form-note">Номер накладной 34343433434</div>
        </div>
        <div class="status-info"><span class="status-info-icon"><svg id="Layer_12" data-name="Layer 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.11 38"><title>large-battery</title><polygon points="13.86 4.28 13.86 0.5 5.25 0.5 5.25 4.28 0.5 4.28 0.5 37.5 18.61 37.5 18.61 4.28 13.86 4.28" fill="none" stroke="#717170" stroke-miterlimit="10"/><line x1="3.94" y1="32.97" x2="15.16" y2="32.97" fill="none" stroke="#f3a713" stroke-miterlimit="10"/><line x1="3.94" y1="28.35" x2="15.16" y2="28.35" fill="none" stroke="#f3a713" stroke-miterlimit="10"/><line x1="3.94" y1="23.72" x2="15.16" y2="23.72" fill="none" stroke="#f3a713" stroke-miterlimit="10"/><line x1="3.94" y1="19.1" x2="15.16" y2="19.1" fill="none" stroke="#f3a713" stroke-miterlimit="10"/></svg></span><span class="status-info-note">В доставке</span></div>
      </form>
    </div>

    <!--Scripts-->
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/slick.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDOtcx9Sm_hunFMGzh4eqe_XRkFUYMWIao&amp;sensor=true"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/plugins/jquery.sticky-kit.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/jquery.tooltipster.min.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/plugins/jcf/jcf.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/plugins/jcf/jcf.select.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/plugins/jcf/jcf.scrollable.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/plugins/jcf/jcf.file.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/plugins/CustomGoogleMapMarker.js"></script>
    <script type="text/javascript" src="http://d3js.org/d3.v3.min.js"></script>
    <script type="text/javascript" src="http://d3js.org/queue.v1.min.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/mbe.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/mbe-responsive.js"></script>
    <!--//Sripts-->

    <script type="text/javascript">
      if ($('.center-page-addresses.city').length)
    		jcf.replace($('.center-page-addresses.city').find(".jcf-scrollable"));
    </script>

  </body>
</html>
