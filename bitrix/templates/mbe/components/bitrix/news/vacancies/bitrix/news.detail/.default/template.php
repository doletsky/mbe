<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>

<? //pre($arResult);?>

<?
$center_res = CIBlockElement::GetByID($arResult['PROPERTIES']['CENTER']['VALUE']);
if($center = $center_res->GetNext()){
	$city_id = $center['IBLOCK_SECTION_ID'];

	$city_res = CIBlockSection::GetByID($city_id);
	$city = $city_res->GetNext();

	//pre($city);
}

?>

<div class="page-inner">
	<div class="page-heading-holder">
		<h1 class="page-heading-title page-heading-title--h1">Вакансия &laquo;<?= $arResult['NAME'];?>&raquo;</h1>
	</div>
	<div class="page-content-inner">
		<div class="columns">
			<div class="column-item column-item--left column-item--w30">
				<dl class="job-features">
					<dt class="job-feature-name">Уровень заработной платы</dt>
					<dd class="job-feature-value"><?= $arResult['PROPERTIES']['SALARY']['VALUE'];?></dd>
					<dt class="job-feature-name">Город</dt>
					<dd class="job-feature-value"><?= $city['NAME'];?></dd>
					<dt class="job-feature-name">Тип занятости</dt>
					<dd class="job-feature-value"><?= $arResult['PROPERTIES']['SCHEDULE']['VALUE'];?></dd>
					<dt class="job-feature-name">Опыт</dt>
					<dd class="job-feature-value"><?= $arResult['PROPERTIES']['EXPERINCE']['VALUE'];?></dd>
				</dl>
			</div>
			<div class="column-item column-item--right column-item--w60">
				<dl class="job-info">
					<dt class="job-info-title">Обязанности</dt>
					<dd class="job-info-value page-text">
						<?= $arResult['PROPERTIES']['DUTIES']['~VALUE']['TEXT'];?>
					</dd>
				</dl>
				<dl class="job-info">
					<dt class="job-info-title">Требования</dt>
					<dd class="job-info-value page-text">
						<?= $arResult['PROPERTIES']['DEMANDS']['~VALUE']['TEXT'];?>
					</dd>
				</dl>
			</div>
		</div>
		<div class="job-toolbar columns">
			<div class="column-item column-item--left column-item--w30 column-item--m5">
				<a href="#job-form" class="ajax-form custom-link custom-link--job">
					<span class="custom-link-icon">
						<svg id="Layer_12" data-name="Layer 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.6 37.63"><title>armchair</title><path d="M483.93,1100.56s1.59-14.73,0-16.53-5.46,1.59-10.41,1.59-8.89-2.84-10.41-1.59,0,16.53,0,16.53" transform="translate(-459.22 -1083)" fill="none" stroke="#70706e" stroke-miterlimit="10"/><path d="M467.76,1115.64a5.74,5.74,0,0,0-.38,2.24v2.24h-2.15v-2.24a5.88,5.88,0,0,1,.38-2.24" transform="translate(-459.22 -1083)" fill="none" stroke="#70706e" stroke-miterlimit="10"/><path d="M479.3,1115.64a5.74,5.74,0,0,1,.38,2.24v2.24h2.15v-2.24a5.88,5.88,0,0,0-.38-2.24" transform="translate(-459.22 -1083)" fill="none" stroke="#70706e" stroke-miterlimit="10"/><path d="M483.93,1100.56a3.39,3.39,0,0,0-3.39,3.39v8.3h-14v-8.3a3.39,3.39,0,1,0-3.39,3.39v8.3h20.82v-8.3A3.39,3.39,0,1,0,483.93,1100.56Z" transform="translate(-459.22 -1083)" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><line x1="7.28" y1="24.55" x2="21.35" y2="24.55" fill="none" stroke="#009ce1" stroke-miterlimit="10"/><polygon class="armchair-arrow" points="17.58 15.88 18.35 7.51 11.51 7.51 12.13 15.88 10.54 15.88 14.93 20.28 19.33 15.88 17.58 15.88" fill="none" stroke="#ff4025" stroke-miterlimit="10"/></svg>
					</span><span class="custom-link-title">Откликнуться на вакансию</span>
				</a>
			</div>
			<div class="column-item column-item--left column-item--w30 column-item--m5">
				<div class="job-toolbar-title">HR-отдел компании МБИ</div>
				<div class="link-holder"><a href="tel:<?= $arResult['PROPERTIES']['HR_PHONE']['VALUE'];?>" title="Позвоните нам" class="link link--black link--black--inverse"><span><?= $arResult['PROPERTIES']['HR_PHONE']['VALUE'];?></span></a></div>
				<div class="link-holder"><a href="<?= $arResult['PROPERTIES']['HR_EMAIL']['VALUE'];?>" title="Напишите нам" class="link link--black link--black--inverse"><span><?= $arResult['PROPERTIES']['HR_EMAIL']['VALUE'];?></span></a></div>
			</div>
			<div class="column-item column-item--left column-item--w30">
				<a href="/about/jobs/" class="custom-link custom-link--right custom-link--back">
					<span class="custom-link-icon">
						<svg id="Layer_16" data-name="Layer 16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.23 20.28"><title>svg</title><polyline points="7.16 4.63 4.03 2.72 7.16 0.4" fill="none" stroke="#000" stroke-miterlimit="10"/><polyline points="4.66 2.53 22.73 2.53 22.73 19.78 0.5 19.78 0.5 2.53" fill="none" stroke="#000" stroke-miterlimit="10"/></svg>
					</span>
					<span class="custom-link-title">Все вакансии МБИ</span></a></div>
		</div>
	</div>
</div>
