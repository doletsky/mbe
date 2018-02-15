<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="form-heading">
	<div class="form-title">Оставить отзыв</div>
</div>

<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?if ($arResult["isFormNote"] == "Y"):?>Спасибо! Ваш отзыв отправлен на модерацию.<?endif;?>

<?//=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
	#pre($arParams);
?>

		<?=$arResult["FORM_HEADER"]?>
		<div class="columns">
			<div class="column-item column-item--left column-item--w47">
				<input type="text" name="form_text_16" value="<?=$arResult["arrVALUES"]["form_text_16"]?>" placeholder="ФИО" required class="form-element form-element--text form-element--fullwidth">
				<input type="text" name="form_text_17" value="<?=$arResult["arrVALUES"]["form_text_17"]?>" placeholder="Телефон" class="form-element form-element--text form-element--fullwidth">
				<input type="email" name="form_email_18" value="<?=$arResult["arrVALUES"]["form_email_18"]?>" placeholder="E-mail" class="form-element form-element--text form-element--fullwidth">
			</div>
			<div class="column-item column-item--right column-item--w47">
				<textarea name="form_textarea_19" value="<?=$arResult["arrVALUES"]["form_textarea_19"]?>" placeholder="Ваш отзыв" class="form-element form-element--textarea form-element--fullwidth"></textarea>
			</div>
		</div>
		<div class="button-holder button-holder--left">
			<input type="hidden" name="web_form_apply" value="Y" />
			<button type="submit" class="button button--blue button--small"><span class="button-text">Отправить</span><span class="button-bg"></span></button>
		</div>
	<?=$arResult["FORM_FOOTER"]?>

<?
} //endif (isFormNote)
?>
