<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" class="page-menu <?= $arParams['CSS_CLASS'];?>">
  <ul class="page-menu-inner ">
    <?
    foreach($arResult as $arItem){
    	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
    		continue;
        ?>
      	<li class="page-menu-item-holder">
          <?if($arItem["SELECTED"]){?>
          <span title="<?=$arItem["TEXT"]?>" class="page-menu-item page-menu-item page-menu-item--current">
            <span itemprop="name" class="page-menu-item-name"><?=$arItem["TEXT"]?></span>
          </span>
          <?}else{?>
          <a href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>" itemprop="url" class="page-menu-item">
            <span itemprop="name" class="page-menu-item-name"><?=$arItem["TEXT"]?></span>
          </a>
          <?}?>
        </li>
      <?}?>
  </ul>
</nav>
<?endif?>
