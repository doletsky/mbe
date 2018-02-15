<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<div class="form-heading">
	<div class="form-title">Вызвать курьера</div>
</div>

<?if ($arResult["isFormErrors"] == "Y"):?>

	<div style="color: red">
		<?=$arResult["FORM_ERRORS_TEXT"];?>
	</div>

	<script type="text/javascript">
		jcf.replace(".form-element--select");
	</script>

<?endif;?>

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
	#pre($arParams);
	/*
	<input type="text" name="form_text_2" value="<?=$arResult["arrVALUES"]["form_text_2"]?>" placeholder="Телефон" class="form-element form-element--text form-element--fullwidth">
	<input type="email" name="form_email_3" value="<?=$arResult["arrVALUES"]["form_email_3"]?>" placeholder="E-mail" class="form-element form-element--text form-element--fullwidth">
	<input type="hidden" name="web_form_apply" value="Y" />

	form_text_34

	*/

	//city list
	$city_list = array();
	$city_list[0] = 'Москва';
	$arSecSelect = Array('ID', 'NAME');
	$arSecFilter = Array("IBLOCK_ID"=>4, "DEPTH_LEVEL"=>2, "ACTIVE"=>"Y");

	$resSec = CIBlockSection::GetList(Array('NAME'=>'ASC'), $arSecFilter, false, $arSecSelect);

	while ($section = $resSec->GetNext())
	{
		if ($section['NAME'] != 'Москва'){
			$city_list[] = $section['NAME'];
		}
	}
?>


		<?=$arResult["FORM_HEADER"]?>

			<fieldset data-step="c1" class="step step--active">
				<div class="columns form-element-holder">
					<div class="column-item column-item--left column-item--w46">
						<select name="form_text_34" value="<?=$arResult["arrVALUES"]["form_text_34"]?>" data-jcf="{&quot;fakeDropInBody&quot;: false}" data-bval="cfrom" class="form-element form-element--select">
							<option value="c0" class="hideme">Откуда</option>
							<? foreach($city_list as $city){?>
								<option <?= $arResult["arrVALUES"]["form_text_34"] == $city ? 'selected' : '';?> value="<?= $city;?>"><?= $city;?></option>
							<?}?>
						</select>
					</div>
					<div class="column-item column-item--right column-item--w46">
						<select name="form_text_35" value="<?=$arResult["arrVALUES"]["form_text_35"]?>" data-jcf="{&quot;fakeDropInBody&quot;: false}" data-bval="cto" class="form-element form-element--select">
							<option value="c0" class="hideme">Куда</option>
							<? foreach($city_list as $city){?>
								<option <?= $arResult["arrVALUES"]["form_text_35"] == $city ? 'selected' : '';?> value="<?= $city;?>"><?= $city;?></option>
							<?}?>
						</select>
					</div>
				</div>
				<div class="form-element-holder">
					<label class="form-element-label">Тип груза</label>
					<div class="form-element-wrapper">
						<select name="form_text_36" value="<?=$arResult["arrVALUES"]["form_text_36"]?>" data-jcf="{&quot;fakeDropInBody&quot;: false}" data-bval="ctype" class="form-element form-element--select form-element--bold">
							<option <?= $arResult["arrVALUES"]["form_text_36"] == 'Документы' ? 'selected' : '';?>  value="Документы">Документы</option>
							<option <?= $arResult["arrVALUES"]["form_text_36"] == 'Корреспонденция' ? 'selected' : '';?> value="Корреспонденция">Корреспонденция</option>
							<option <?= $arResult["arrVALUES"]["form_text_36"] == 'Другое' ? 'selected' : '';?> value="Другое">Другое</option>
						</select>
					</div>
				</div>
				<div class="form-element-holder">
					<label for="csize1" class="form-element-label">

						Габариты <span class="form-element-label-note">(см)</span>
					</label>
					<div class="form-element-wrapper">
						<input type="text" name="form_text_37" value="<?=$arResult["arrVALUES"]["form_text_37"]?>" required id="csize1" data-bval="clength" class="form-element form-element--text form-element--small form-element--bold form-element--inline form-element--center"><span class="form-element-spacer">&times;</span>
						<input type="text" name="form_text_38" value="<?=$arResult["arrVALUES"]["form_text_38"]?>" required data-bval="cwidth" class="form-element form-element--text form-element--small form-element--bold form-element--inline form-element--center"><span class="form-element-spacer">&times;</span>
						<input type="text" name="form_text_39" value="<?=$arResult["arrVALUES"]["form_text_39"]?>" required data-bval="cheight" class="form-element form-element--text form-element--small form-element--bold form-element--inline form-element--center">
					</div>
				</div>
				<div class="form-element-holder">
					<label for="cweight" class="form-element-label">

						Вес <span class="form-element-label-note">(кг)</span>
					</label>
					<div class="form-element-wrapper">
						<input type="text" name="form_text_40" value="<?=$arResult["arrVALUES"]["form_text_40"]?>" data-bval="cweight" id="cweight" class="form-element form-element--text form-element--bold form-element--small2 form-element--center">
					</div>
				</div>
				<div class="button-holder" style="margin-top: 40px;">
					<button data-targetstep="c2" class="button button--blue button--small"><span class="button-text">Далее</span><span class="button-bg"></span></button>
				</div>
			</fieldset>
			<fieldset data-step="c2" class="columns step">
				<div class="column-item column-item--left column-item--w40">
					<input type="text" name="form_text_41" value="<?=$arResult["arrVALUES"]["form_text_41"]?>" placeholder="ФИО" required class="form-element form-element--text form-element--fullwidth">
					<input type="text" name="form_text_42" value="<?=$arResult["arrVALUES"]["form_text_42"]?>" placeholder="Телефон" required class="form-element form-element--text form-element--fullwidth">
					<input type="email" name="form_email_43" value="<?=$arResult["arrVALUES"]["form_email_43"]?>" placeholder="E-mail" class="form-element form-element--text form-element--fullwidth">
					<div class="button-holder">
						<input type="hidden" name="web_form_apply" value="Y" />
						<button type="submit" class="button button--blue button--small button--fullwidth"><span class="button-text">Узнать стоимость</span><span class="button-bg"></span></button>
					</div><a href="#" data-targetstep="c1" class="button button--back button--left courier-back">Назад</a>
				</div>
				<div class="column-item column-item--right column-item--w50">
					<div class="check-line">
						<div class="check-line-top"></div>
						<div class="check-line-inner">
							<div class="check-line-title">Детали заказа</div>
							<div class="check-line-item"><span class="check-line-item-icon"><svg id="Layer_12" data-name="Layer 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.76 33.42"><title>large-pointer</title><circle cx="11.38" cy="11.96" r="5.73" fill="none" stroke="#34a3e0" stroke-miterlimit="10"/><path d="M725,838c0,6-10.88,21.18-10.88,21.18S703.23,844,703.23,838A10.88,10.88,0,0,1,725,838Z" transform="translate(-702.73 -826.66)" fill="none" stroke="#717170" stroke-miterlimit="10"/></svg></span><span class="check-line-item-inner"><span class="check-line-item-name">Откуда</span><span data-btext="cfrom" class="check-line-item-value"> </span></span></div>
							<div class="check-line-item"><span class="check-line-item-icon"><svg id="Layer_12" data-name="Layer 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.76 33.42"><title>large-pointer</title><circle cx="11.38" cy="11.96" r="5.73" fill="none" stroke="#34a3e0" stroke-miterlimit="10"/><path d="M725,838c0,6-10.88,21.18-10.88,21.18S703.23,844,703.23,838A10.88,10.88,0,0,1,725,838Z" transform="translate(-702.73 -826.66)" fill="none" stroke="#717170" stroke-miterlimit="10"/></svg></span><span class="check-line-item-inner"><span class="check-line-item-name">Куда</span><span data-btext="cto" class="check-line-item-value"> </span></span></div>
							<div class="check-line-item"><span class="check-line-item-icon"><svg id="Layer_12" data-name="Layer 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.89 30.77"><title>document</title><polyline points="18.92 4.41 22.39 4.41 22.39 26.22 19.67 30.27 3.97 30.27 3.97 26.36" fill="none" stroke="#00dd9c" stroke-miterlimit="10"/><polygon points="16.2 26.36 0.5 26.36 0.5 0.5 18.92 0.5 18.92 22.31 16.2 26.36" fill="none" stroke="#717170" stroke-miterlimit="10"/></svg></span><span class="check-line-item-inner"><span class="check-line-item-name">Тип груза</span><span data-btext="ctype" class="check-line-item-value"> </span></span></div>
							<div class="check-line-item"><span class="check-line-item-icon"><svg id="Layer_12" data-name="Layer 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.22 27.22"><title>rulers</title><polyline points="13.57 8.89 21.76 0.71 26.52 5.47 18.41 13.57" fill="none" stroke="#f3a713" stroke-miterlimit="10"/><polyline points="13.57 18.41 5.47 26.52 0.71 21.76 8.82 13.57" fill="none" stroke="#f3a713" stroke-miterlimit="10"/><line x1="7.46" y1="24.52" x2="3.93" y2="20.98" fill="none" stroke="#f3a713" stroke-miterlimit="10"/><line x1="9.23" y1="22.75" x2="7.46" y2="20.98" fill="none" stroke="#f3a713" stroke-miterlimit="10"/><line x1="10.88" y1="21.1" x2="9.11" y2="19.33" fill="none" stroke="#f3a713" stroke-miterlimit="10"/><line x1="12.53" y1="19.45" x2="10.76" y2="17.68" fill="none" stroke="#f3a713" stroke-miterlimit="10"/><line x1="19.29" y1="12.69" x2="17.52" y2="10.92" fill="none" stroke="#f3a713" stroke-miterlimit="10"/><line x1="20.9" y1="11.08" x2="17.36" y2="7.55" fill="none" stroke="#f3a713" stroke-miterlimit="10"/><line x1="22.67" y1="9.32" x2="20.9" y2="7.55" fill="none" stroke="#f3a713" stroke-miterlimit="10"/><line x1="24.32" y1="7.67" x2="22.55" y2="5.9" fill="none" stroke="#f3a713" stroke-miterlimit="10"/><rect x="710.3" y="912.64" width="6.73" height="29.77" transform="translate(-1146.89 -137.61) rotate(-45)" fill="none" stroke="#717170" stroke-miterlimit="10"/><line x1="2.7" y1="7.46" x2="6.24" y2="3.93" fill="none" stroke="#717170" stroke-miterlimit="10"/><line x1="4.47" y1="9.23" x2="6.24" y2="7.46" fill="none" stroke="#717170" stroke-miterlimit="10"/><line x1="6.12" y1="10.88" x2="7.89" y2="9.11" fill="none" stroke="#717170" stroke-miterlimit="10"/><line x1="7.77" y1="12.53" x2="9.54" y2="10.76" fill="none" stroke="#717170" stroke-miterlimit="10"/><line x1="9.46" y1="14.22" x2="13" y2="10.69" fill="none" stroke="#717170" stroke-miterlimit="10"/><line x1="11.23" y1="15.99" x2="13" y2="14.22" fill="none" stroke="#717170" stroke-miterlimit="10"/><line x1="12.88" y1="17.64" x2="14.65" y2="15.87" fill="none" stroke="#717170" stroke-miterlimit="10"/><line x1="14.53" y1="19.29" x2="16.3" y2="17.52" fill="none" stroke="#717170" stroke-miterlimit="10"/><line x1="16.14" y1="20.9" x2="19.67" y2="17.36" fill="none" stroke="#717170" stroke-miterlimit="10"/><line x1="17.91" y1="22.67" x2="19.67" y2="20.9" fill="none" stroke="#717170" stroke-miterlimit="10"/><line x1="19.56" y1="24.32" x2="21.32" y2="22.55" fill="none" stroke="#717170" stroke-miterlimit="10"/></svg></span><span class="check-line-item-inner"><span class="check-line-item-name">Габариты</span><span class="check-line-item-value"><span data-btext="clength"> </span>&times;<span data-btext="cwidth"> </span>&times;<span data-btext="cheight"> </span>см; <span data-btext="cweight"> </span>кг</span></span></div>
						</div>
					</div>
				</div>
			</fieldset>
	<?=$arResult["FORM_FOOTER"]?>

<?
} //endif (isFormNote)
?>
