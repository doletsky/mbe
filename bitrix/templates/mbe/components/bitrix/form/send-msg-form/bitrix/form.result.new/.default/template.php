<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="form-heading">
	<?if ($arResult["isFormNote"] != "Y"){?>
		<div class="form-title">Отправить сообщение</div>
	<? }else{?>
		<div class="form-title">Сообщение отправлено!</div>
	<?}?>
</div>


<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<? //Спасибо за обращение, в ближайшее время наш менеджер свяжется с вами.?>

<?if ($arResult["isFormNote"] != "Y")
{
	#pre($arParams);
?>

		<?=$arResult["FORM_HEADER"]?>
		<div class="columns">
			<div class="column-item column-item--left column-item--w47">
				<input type="text" name="form_text_13" value="<?=$arResult["arrVALUES"]["form_text_13"]?>" placeholder="ФИО" required class="form-element form-element--text form-element--fullwidth">
				<input type="email" name="form_text_14" value="<?=$arResult["arrVALUES"]["form_text_14"]?>" placeholder="E-mail" class="form-element form-element--text form-element--fullwidth">
			</div>
			<div class="column-item column-item--right column-item--w47">
				<textarea  name="form_textarea_15"  value="<?=$arResult["arrVALUES"]["form_textarea_15"]?>" placeholder="Сообщение" class="form-element form-element--textarea form-element--fullwidth"></textarea>
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
