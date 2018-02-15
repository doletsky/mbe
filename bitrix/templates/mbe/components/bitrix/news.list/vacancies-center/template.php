<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */

$this->setFrameMode(true);?>

<? //pre($arResult);?>
<?
$n = count($arResult['ITEMS']);
if ($n)
{
  ?>
  <div class="page-inner">

    <div class="page-text-block">
      <div class="page-heading-holder">
        <h2 class="page-heading-title page-heading-title--h2"><a href="/about/jobs/">Вакансии</a><sup class="page-heading-title-note"><?= $n;?></sup></h2>
      </div>
      <div class="jobs cols">
        <?
        foreach($arResult['ITEMS'] as $job)
        {
          ?>
          <div class="job-item col-item col-item--col4">
            <div class="job-item-inner">
              <div class="job-item-title-holder">
                <a href="<?= $job['DETAIL_PAGE_URL'];?>" class="job-item-title link link--blue">
                  <?= $job['NAME'];?>
                  <div class="job-item-icon-holder"><?= $job['PROPERTIES']['ICON']['~VALUE'];?></div>
                </a>
              </div>
              <div class="job-item-description page-text">
                <div><?= $job['PROPERTIES']['SCHEDULE']['VALUE'] != '' ? 'Тип занятости: ' . $job['PROPERTIES']['SCHEDULE']['VALUE'] : '';?></div>
                <div><?= $job['PROPERTIES']['SALARY']['VALUE'] != '' ? 'Зарплата: ' . $job['PROPERTIES']['SALARY']['VALUE'] : '';?></div>
              </div>
            </div>
          </div>
          <?
        }
        ?>
        <div class="job-item col-item col-item--col4">
          <div class="job-item-inner">
            <div class="job-item-title-holder"><a href="/about/jobs/" class="job-item-title link link--blue">Вакансии других офисов МБИ в Москве</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?
}
?>
