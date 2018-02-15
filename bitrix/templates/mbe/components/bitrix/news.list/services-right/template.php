<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(count($arResult["ITEMS"])>0):?>

<nav itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" id="service-menu" class="service-menu service-menu--home">
  <ul class="service-menu-inner">
    <li class="service-menu-item-holder"><a href="<?=$arResult["ITEMS"][0]["DETAIL_PAGE_URL"]?>" itemprop="url" class="service-menu-item service-menu-item--blue"><span itemprop="name" class="service-menu-item-name">Экспресс-доставка</span><span class="service-menu-item-icon">
          <svg width="50" viewbox="0 0 48.98 24.1">
            <polygon points="39.64 23.6 16.54 23.6 25.16 0.5 48.26 0.5 39.64 23.6" fill="none" stroke="#009bdf" stroke-miterlimit="10"></polygon>
            <line x1="19.23" y1="4.82" x2="8.08" y2="4.82" fill="none" stroke="#70706e" stroke-miterlimit="10" stroke-width="0.5"></line>
            <line x1="16.54" y1="9.64" x2="5.39" y2="9.64" fill="none" stroke="#70706e" stroke-miterlimit="10" stroke-width="0.5"></line>
            <line x1="13.85" y1="14.46" x2="2.69" y2="14.46" fill="none" stroke="#70706e" stroke-miterlimit="10" stroke-width="0.5"></line>
            <line x1="11.16" y1="19.28" y2="19.28" fill="none" stroke="#70706e" stroke-miterlimit="10" stroke-width="0.5"></line>
            <line x1="25.16" y1="0.5" x2="39.64" y2="23.6" fill="none" stroke="#009bdf" stroke-miterlimit="10"></line>
            <line x1="48.26" y1="0.5" x2="16.54" y2="23.6" fill="none" stroke="#009bdf" stroke-miterlimit="10"></line>
          </svg></span></a></li>
    <li class="service-menu-item-holder"><a href="<?=$arResult["ITEMS"][1]["DETAIL_PAGE_URL"]?>" itemprop="url" class="service-menu-item service-menu-item--orange"><span itemprop="name" class="service-menu-item-name">Профессиональ&shy;ная упаковка</span><span class="service-menu-item-icon">
          <svg width="30" viewbox="0 0 27.24 33.06">
            <rect x="0.5" y="6.33" width="26.24" height="26.24" fill="none" stroke="#ff7a00" stroke-miterlimit="10"></rect>
            <path d="M479.54,326.16c0,1.53-1.12,2.94-3.37,2.94H472.8c0-1.53.47-5.06,2.76-5.7A3.1,3.1,0,0,1,479.54,326.16Z" transform="translate(-459.18 -322.77)" fill="none" stroke="#70706e" stroke-miterlimit="10"></path>
            <path d="M466.05,326.16c0,1.53,1.12,2.94,3.37,2.94h3.38c0-1.53-.47-5.06-2.76-5.7A3.1,3.1,0,0,0,466.05,326.16Z" transform="translate(-459.18 -322.77)" fill="none" stroke="#70706e" stroke-miterlimit="10"></path>
            <polyline points="10.24 12.1 13.46 6.33 16.99 12.1" fill="none" stroke="#70706e" stroke-miterlimit="10"></polyline>
          </svg></span></a></li>
    <li class="service-menu-item-holder"><a href="<?=$arResult["ITEMS"][2]["DETAIL_PAGE_URL"]?>" itemprop="url" class="service-menu-item service-menu-item--green"><span itemprop="name" class="service-menu-item-name">Полиграфия и копирование</span><span class="service-menu-item-icon">
          <svg width="25" viewbox="0 0 24.33 32.73">
            <polyline points="20.14 4.67 23.83 4.67 23.83 27.91 20.93 32.23 4.2 32.23 4.2 28.06" fill="none" stroke="#70706e" stroke-miterlimit="10"></polyline>
            <polygon points="17.23 28.06 0.5 28.06 0.5 0.5 20.14 0.5 20.14 23.74 17.23 28.06" fill="none" stroke="#00b951" stroke-miterlimit="10"></polygon>
          </svg></span></a></li>
    <li class="service-menu-item-holder"><a href="<?=$arResult["ITEMS"][3]["DETAIL_PAGE_URL"]?>" title="Аренда абонентских ящиков" itemprop="url" class="service-menu-item service-menu-item--purple"><span itemprop="name" class="service-menu-item-name">Аренда абонентских ящиков</span><span class="service-menu-item-icon">
          <svg width="30" viewbox="0 0 25.55 28.06">
            <polyline points="25.05 14.03 25.05 27.56 0.5 27.56 0.5 14.03" fill="none" stroke="#70706e" stroke-miterlimit="10"></polyline>
            <path d="M608.93,352.83" transform="translate(-603.49 -325.27)" fill="none" stroke="#70706e" stroke-miterlimit="10"></path>
            <polyline points="0.5 14.03 3.17 0.5 22.21 0.5 25.05 14.03" fill="none" stroke="#70706e" stroke-miterlimit="10"></polyline>
            <line x1="0.5" y1="14.03" x2="25.05" y2="14.03" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
            <line x1="9.66" y1="17.54" x2="16.01" y2="17.54" fill="none" stroke="#a065e8" stroke-miterlimit="10"></line>
            <rect x="0.5" y="14.03" width="24.55" height="13.53" fill="none" stroke="#a065e8" stroke-miterlimit="10"></rect>
          </svg></span></a></li>
    <li class="service-menu-item-holder"><a href="<?=$arResult["ITEMS"][4]["DETAIL_PAGE_URL"]?>" itemprop="url" class="service-menu-item service-menu-item--turquoise"><span itemprop="name" class="service-menu-item-name">Бизнес-переводы</span><span class="service-menu-item-icon">
          <svg width="35" viewbox="0 0 36.2 34.33">
            <polyline points="18.1 27.88 35.7 27.88 35.7 6.45 18.1 6.45" fill="none" stroke="#0d9" stroke-miterlimit="10"></polyline>
            <polyline points="18.1 27.88 0.5 27.88 0.5 6.45 18.1 6.45" fill="none" stroke="#70706e" stroke-miterlimit="10"></polyline>
            <line x1="18.1" y1="13.54" x2="0.5" y2="13.54" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
            <line x1="18.1" y1="20.48" x2="0.5" y2="20.48" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
            <line x1="18.1" y1="17.16" x2="35.7" y2="17.16" fill="none" stroke="#0d9" stroke-miterlimit="10"></line>
            <line x1="18.1" y1="17.16" x2="35.7" y2="6.45" fill="none" stroke="#0d9" stroke-miterlimit="10"></line>
            <line x1="18.1" y1="17.16" x2="35.7" y2="27.87" fill="none" stroke="#0d9" stroke-miterlimit="10"></line>
            <line x1="18.1" x2="18.1" y2="34.33" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
          </svg></span></a></li>
    <li class="service-menu-item-holder"><a href="<?=$arResult["ITEMS"][5]["DETAIL_PAGE_URL"]?>" itemprop="url" class="service-menu-item service-menu-item--red"><span itemprop="name" class="service-menu-item-name">Пункты выдачи заказов</span><span class="service-menu-item-icon">
          <svg width="20" viewbox="0 0 15.38 34.89">
            <line x1="4.52" y1="34.39" x2="10.86" y2="34.39" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
            <line x1="7.69" y1="21.9" x2="7.69" y2="34.39" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
            <line x1="4.52" y1="17.88" x2="10.86" y2="17.88" fill="none" stroke="#ff4025" stroke-miterlimit="10"></line>
            <path d="M758,322.35a7.19,7.19,0,0,0-7.19,7.19v14.21h14.38V329.54A7.19,7.19,0,0,0,758,322.35Z" transform="translate(-750.35 -321.85)" fill="none" stroke="#ff4025" stroke-miterlimit="10"></path>
          </svg></span></a></li>
    <li class="service-menu-item-holder"><a href="<?=$arResult["ITEMS"][6]["DETAIL_PAGE_URL"]?>" itemprop="url" class="service-menu-item service-menu-item--yellow"><span itemprop="name" class="service-menu-item-name">Канцелярские товары</span><span class="service-menu-item-icon">
          <svg width="25" viewbox="0 0 23.6 35.08">
            <path d="M1036.55,328.23a0.32,0.32,0,0,1-.19-0.24c0-.71,4.85-1.29,10.82-1.29,1,0,2,0,2.92,0" transform="translate(-1034.91 -321.53)" fill="none" stroke="#f9c41c" stroke-miterlimit="10"></path>
            <path d="M1050.11,326.75c4.56,0.15,7.9.65,7.9,1.25" transform="translate(-1034.91 -321.53)" fill="none" stroke="#f9c41c" stroke-miterlimit="10"></path>
            <polygon points="16.95 28.13 17.11 32.47 13.8 29.66 1.59 4.39 4.74 2.86 16.95 28.13" fill="none" stroke="#70706e" stroke-miterlimit="10"></polygon>
            <polyline points="0.22 2.69 4.66 0.54 6.03 1.07 10.19 9.68" fill="none" stroke="#70706e" stroke-miterlimit="10"></polyline>
            <line x1="2.1" y1="4.14" x2="1.17" y2="2.23" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
            <line x1="4.18" y1="3.14" x2="3.26" y2="1.22" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
            <line x1="17.11" y1="32.47" x2="18.01" y2="34.35" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
            <polyline points="1.45 6.47 3.74 34.58 21.08 34.58 23.1 6.47" fill="none" stroke="#f9c41c" stroke-miterlimit="10"></polyline>
            <path d="M1052,326.83c3.56,0.21,6,.65,6,1.16,0,0.71-4.85,1.29-10.82,1.29s-10.82-.58-10.82-1.29" transform="translate(-1034.91 -321.53)" fill="none" stroke="#f9c41c" stroke-miterlimit="10"></path>
          </svg></span></a></li>
    <li class="service-menu-item-holder"><a href="<?=$arResult["ITEMS"][7]["DETAIL_PAGE_URL"]?>" itemprop="url" class="service-menu-item service-menu-item--pink"><span itemprop="name" class="service-menu-item-name">ETC сопутствующие услуги</span><span class="service-menu-item-icon">
          <svg width="30" viewbox="0 0 30.15 35.19">
            <path d="M1197,345" transform="translate(-1180.13 -320.9)" fill="none" stroke="#70706e" stroke-miterlimit="10"></path>
            <polygon points="22.52 34.69 2.96 34.69 1.51 16.39 24.7 16.39 22.52 34.69" fill="none" stroke="#bf3aa5" stroke-miterlimit="10"></polygon>
            <path d="M1204,345.72h3.1a2.71,2.71,0,0,0,0-5.42h-2.28" transform="translate(-1180.13 -320.9)" fill="none" stroke="#bf3aa5" stroke-miterlimit="10"></path>
            <path d="M1190.21,334.41a3.2,3.2,0,0,0,1.77-3.12c0-2.62-4.21-2.68-4.21-5.89s2.15-4,2.15-4" transform="translate(-1180.13 -320.9)" fill="none" stroke="#70706e" stroke-miterlimit="10"></path>
            <path d="M1195.41,329.22a1.2,1.2,0,0,0,.67-1.17c0-1-1.58-1-1.58-2.21a1.51,1.51,0,0,1,.81-1.51" transform="translate(-1180.13 -320.9)" fill="none" stroke="#70706e" stroke-miterlimit="10"></path>
            <line y1="34.69" x2="25.54" y2="34.69" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
          </svg></span></a></li>
  </ul>
</nav>
<?endif?>
