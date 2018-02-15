<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<!-- Main menu-->
<nav itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" class="header-menu ">
  <ul class="header-menu-inner">
    <?
    foreach($arResult as $arItem){
      if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
        continue;
    ?>
    <li class="header-menu-item-holder">
      <?if($arItem["SELECTED"]){?>
      <span title="<?=$arItem["TEXT"]?>" class="header-menu-item header-menu-item header-menu-item--current">
        <span itemprop="name" class="header-menu-item-name"><?=$arItem["TEXT"]?></span>
      </span>
      <?}else{?>
      <a href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>" itemprop="url" class="header-menu-item ">
        <span itemprop="name" class="header-menu-item-name"><?=$arItem["TEXT"]?></span>
      </a>
      <?}?>
    </li>
    <?}?>
  </ul>
</nav>
<?endif?>