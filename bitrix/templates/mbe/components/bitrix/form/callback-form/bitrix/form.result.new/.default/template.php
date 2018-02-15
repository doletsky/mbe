<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
	<div class="form-title">Обратный звонок</div>
	<? /*
	if(CModule::IncludeModule("iblock")){
		$res = CIBlockElement::GetByID($arParams["VACANCY_ID"]);
		?>
		<?if($ar_res = $res->GetNext()){?>
		<div class="form-note">Вакансия &mdash; <?= $ar_res['NAME'];?></div>
		<?}?>
	<?}
	*/?>

<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?if ($arResult["isFormNote"] == "Y"):?>Спасибо за обращение, в ближайшее время наш менеджер свяжется с вами.<?endif;?>

<?if ($arResult["isFormNote"] != "Y")
{
	#pre($arParams);
?>


		<?=$arResult["FORM_HEADER"]?>

		<input type="text" name="form_text_11" value="<?=$arResult["arrVALUES"]["form_text_11"]?>" placeholder="ФИО" required class="form-element form-element--text form-element--fullwidth">
		<input type="text" name="form_text_12" value="<?=$arResult["arrVALUES"]["form_text_12"]?>" placeholder="Телефон" required class="form-element form-element--text form-element--fullwidth">

		<div class="button-holder">
			<input type="hidden" name="web_form_apply" value="Y" />
			<button type="submit" class="button button--blue button--small">
				<span class="button-text">Отправить</span><span class="button-bg"></span>
			</button>
		</div>

	<?=$arResult["FORM_FOOTER"]?>

<?
} //endif (isFormNote)
?>
