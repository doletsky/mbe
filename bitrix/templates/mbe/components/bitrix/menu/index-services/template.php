<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<div id="service-slider-holder" class="service-slider-holder"><span class="service-slider-control service-slider-control--square service-slider-control--prev"></span>
  <nav itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" class="service-slider ">
    <ul class="service-slider-inner ">
    <?
    $colors=array(
      "service-slider-item--blue",
      "service-slider-item--orange",
      "service-slider-item--green",
      "service-slider-item--purple",
      "service-slider-item--turquoise",
      "service-slider-item--red",
      "service-slider-item--yellow",
      "service-slider-item--pink"
    );
    $coCount=count($colors);
    $i=0;
    foreach($arResult as $arItem){
      if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
        continue;
      ?>
      <li class="service-slider-item-holder">
        <?if($arItem["SELECTED"]){?>
        <span title="<?=$arItem["TEXT"]?>" class="service-slider-item <?=$colors[$i%$coCount]?> service-slider-item--current">
          <span itemprop="name" class="service-slider-item-name icon-service<?=($i+1)?>_white-before"><?=$arItem["TEXT"]?></span>
        </span>
        <?}else{?>
        <a href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>" itemprop="url" class="service-slider-item <?=$colors[$i%$coCount]?>">
          <span itemprop="name" class="service-slider-item-name icon-service<?=($i+1)?>_white-before"><?=$arItem["TEXT"]?></span>
        </a>
        <?}?>
      </li>
      <?
      $i++;
    }?>
    </ul>
  </nav><span class="service-slider-control service-slider-control--square service-slider-control--next"></span>
</div>
<?endif?>
