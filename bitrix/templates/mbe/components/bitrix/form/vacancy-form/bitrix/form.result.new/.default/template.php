<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="form-heading">
	<div class="form-title">Отправьте ваше резюме</div>
	<?
	if(CModule::IncludeModule("iblock")){
		$res = CIBlockElement::GetByID($arParams["VACANCY_ID"]);
		?>
		<?if($ar_res = $res->GetNext()){?>
		<div class="form-note">Вакансия &mdash; <?= $ar_res['NAME'];?></div>
		<?}?>
	<?}?>
</div>

<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
	#pre($arParams);
?>
	
		
		<?=$arResult["FORM_HEADER"]?>
		<div class="columns">
			<div class="column-item column-item--left column-item--w60">
				<input type="text" name="form_text_1" value="<?=$arResult["arrVALUES"]["form_text_1"]?>" placeholder="ФИО" class="form-element form-element--text form-element--fullwidth">
				<input type="text" name="form_text_2" value="<?=$arResult["arrVALUES"]["form_text_2"]?>" placeholder="Телефон" class="form-element form-element--text form-element--fullwidth">
				<input type="email" name="form_email_3" value="<?=$arResult["arrVALUES"]["form_email_3"]?>" placeholder="E-mail" class="form-element form-element--text form-element--fullwidth">
			</div>
			<div class="column-item column-item--right column-item--w30">
				<input type="file" name="form_file_4" data-jcf="{&quot;buttonText&quot;: &quot;&quot;, &quot;placeholderText&quot;: &quot;Прикрепить резюме&quot;, &quot;activeText&quot;: &quot;Резюме прикреплено к письму&quot;}" class="form-element form-element--file">
			</div>
		</div>
		<div class="button-holder button-holder--left">
			<input type="hidden" name="web_form_apply" value="Y" />
			<button type="submit" class="button button--blue button--small"><span class="button-text">Отправить</span><span class="button-bg"></span></button>
		</div>
	<?=$arResult["FORM_FOOTER"]?>
	<script type="text/javascript">
		window.setTimeout(function(){ jcf.replace(".form-element--file"); },1);
	</script>
<?
} //endif (isFormNote)
?>
