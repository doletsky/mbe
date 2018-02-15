<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<!-- Footer menu-->
<nav itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" class="footer-menu">
  <ul class="footer-menu-inner">
    <?
    foreach($arResult as $arItem){
      if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
        continue;
    ?>
    <li class="footer-menu-item-holder">
      <?if($arItem["SELECTED"]){?>
      <span title="<?=$arItem["TEXT"]?>" class="footer-menu-item footer-menu-item footer-menu-item--current">
        <span itemprop="name" class="footer-menu-item-name"><?=$arItem["TEXT"]?></span>
      </span>
      <?}else{?>
      <a href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>" itemprop="url" class="footer-menu-item">
        <span itemprop="name" class="footer-menu-item-name"><?=$arItem["TEXT"]?></span>
      </a>
      <?}?>
    </li>
    <?}?>
  </ul>
</nav>
<?endif?>