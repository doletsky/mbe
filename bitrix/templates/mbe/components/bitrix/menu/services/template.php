<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" class="footer-services-menu ">
  <ul class="footer-services-menu-inner ">
    <?
    $colors=array(
      "footer-services-menu-item--blue",
      "footer-services-menu-item--orange",
      "footer-services-menu-item--green",
      "footer-services-menu-item--purple",
      "footer-services-menu-item--turquoise",
      "footer-services-menu-item--red",
      "footer-services-menu-item--yellow",
      "footer-services-menu-item--pink"
    );
    $coCount=count($colors);
    $i=0;
    foreach($arResult as $arItem){
      if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
        continue;
      ?>
      <li class="footer-services-menu-item-holder">
        <?if($arItem["SELECTED"]){?>
        <span title="<?=$arItem["TEXT"]?>" class="footer-services-menu-item <?=$colors[$i%$coCount]?> footer-services-menu-item--current">
          <span itemprop="name" class="footer-services-menu-item-name"><?=$arItem["TEXT"]?></span>
        </span>
        <?}else{?>
        <a href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>" itemprop="url" class="footer-services-menu-item <?=$colors[$i%$coCount]?>">
          <span itemprop="name" class="footer-services-menu-item-name"><?=$arItem["TEXT"]?></span>
        </a>
        <?}?>
      </li>
      <?
      $i++;
    }?>
  </ul>
</nav>
<?endif?>