<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="form-heading">
	<div class="form-title">Заявка на покупку франшизы</div>
</div>

<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?if ($arResult["isFormNote"] == "Y"):?>Ваша заявка успешно отправлена. Спасибо!<?endif;?>

<?//=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
	#pre($arParams);
	/*
	fio - form_text_20
	compan - form_text_21
	phone - form_text_22
	emal - form_email_23
	when - form_text_24
	city - form_text_33
	money - form_text_28
	откуда - form_checkbox_SIMPLE_QUESTION_493[]   value 29 30 31 32

	<input type="text" name="form_text_2" value="<?=$arResult["arrVALUES"]["form_text_2"]?>" placeholder="Телефон" class="form-element form-element--text form-element--fullwidth">
	<input type="email" name="form_email_3" value="<?=$arResult["arrVALUES"]["form_email_3"]?>" placeholder="E-mail" class="form-element form-element--text form-element--fullwidth">

	<div class="button-holder button-holder--left">
	<input type="hidden" name="web_form_apply" value="Y" />
	<button type="submit" class="button button--blue button--small"><span class="button-text">Отправить</span><span class="button-bg"></span></button>
	</div>

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

	<div class="columns">
		<div class="column-item column-item--left column-item--w35">
			<input type="text" name="form_text_20" value="<?=$arResult["arrVALUES"]["form_text_20"]?>" placeholder="ФИО заявителя" required class="form-element form-element--text form-element--fullwidth">
			<input type="text" name="form_text_21" value="<?=$arResult["arrVALUES"]["form_text_21"]?>" placeholder="Название компании" class="form-element form-element--text form-element--fullwidth">
			<input type="text" name="form_text_22" value="<?=$arResult["arrVALUES"]["form_text_22"]?>" placeholder="Телефон" required class="form-element form-element--text form-element--fullwidth">
			<input type="email" name="form_email_23" value="<?=$arResult["arrVALUES"]["form_email_23"]?>" placeholder="E-mail" class="form-element form-element--text form-element--fullwidth">
			<input type="text" name="form_text_24" value="<?=$arResult["arrVALUES"]["form_text_24"]?>" placeholder="Когда с Вами связаться?" class="form-element form-element--text form-element--fullwidth">
		</div>
		<div class="column-item column-item--right column-item--w60">
			<div class="columns">
				<div class="column-item column-item--left column-item--w40">
					<div class="form-element-title">В каком городе хотите открыть бизнес?</div>
					<select name="form_text_33" data-jcf="{&quot;fakeDropInBody&quot;: false}" class="form-element form-element--select">
						<? foreach($city_list as $city){?>
							<option value="<?= $city;?>"><?= $city;?></option>
						<?}?>
					</select>
				</div>
				<div class="column-item column-item--right column-item--w40">
					<div class="form-element-title">Сколько Вы готовы инвестировать?</div>
					<div class="form-element-holder">
						<input type="text" name="form_text_28" value="<?=$arResult["arrVALUES"]["form_text_28"]?>" class="form-element form-element--text form-element--fullwidth"><span class="form-element-note">Р</span>
					</div>
				</div>
			</div>
			<div class="checkbox-list">
				<div class="checkbox-list-title">Откуда Вы узнали о MBE?</div>
				<label class="checkbox-item"><span class="checkbox-item-icon">
						<svg width="45" viewbox="0 0 46.07 29.38">
							<line x1="3.68" y1="3.47" x2="42.39" y2="3.47" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
							<path d="M940.9,212.49V188.63a2.15,2.15,0,0,1,2.15-2.15h34.41a2.15,2.15,0,0,1,2.15,2.15v23.86" transform="translate(-937.22 -185.98)" fill="none" stroke="#b047f4" stroke-miterlimit="10"></path>
							<path d="M960.26,214.85c-11.26,0-16.9.1-19.71-.49s-2.82-1.88-2.82-1.88h45.07s0,1.27-3.18,1.88C976.68,214.93,971.06,214.85,960.26,214.85Z" transform="translate(-937.22 -185.98)" fill="none" stroke="#b047f4" stroke-miterlimit="10"></path>
						</svg></span><span class="checkbox-item-title">Интернет</span>
					<input type="checkbox" name="form_checkbox_SIMPLE_QUESTION_493[]" value="29" class="checkbox-item-element"><span class="checkbox-item-checked"></span>
				</label>
				<label class="checkbox-item"><span class="checkbox-item-icon">
						<svg width="26" viewbox="0 0 23.79 34.74">
							<polyline points="23.29 8.16 23.29 31.48 19.41 31.48" fill="none" stroke="#70706e" stroke-miterlimit="10"></polyline>
							<line x1="19.41" y1="16.99" x2="23.29" y2="16.99" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
							<line x1="19.41" y1="24.55" x2="23.29" y2="24.55" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
							<path d="M1027.67,190.62h3.88v-7a1.26,1.26,0,0,0-1.17-1.32h-21.62V216h18.91v-25.4Z" transform="translate(-1008.26 -181.78)" fill="none" stroke="#00b951" stroke-miterlimit="10"></path>
							<line x1="5.64" y1="9.91" x2="15.05" y2="9.91" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
							<line x1="5.64" y1="12.72" x2="15.05" y2="12.72" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
						</svg></span><span class="checkbox-item-title">От друзей</span>
					<input type="checkbox" name="form_checkbox_SIMPLE_QUESTION_493[]" value="30" class="checkbox-item-element"><span class="checkbox-item-checked"></span>
				</label>
				<label class="checkbox-item"><span class="checkbox-item-icon">
						<svg width="26" viewbox="0 0 25 34.39">
							<rect x="0.5" y="0.5" width="24" height="33.39" fill="none" stroke="#ff7a00" stroke-miterlimit="10"></rect>
							<path d="M1086.87,191.05a18.32,18.32,0,0,0-.25,3c0,6,2.93,11.11,7,12.93l-1.66,4.38-7.12,1.36" transform="translate(-1084.3 -182.29)" fill="none" stroke="#ff7a00" stroke-miterlimit="10"></path>
							<path d="M1086.87,191.05" transform="translate(-1084.3 -182.29)" fill="none" stroke="#ff7a00" stroke-miterlimit="10"></path>
							<path d="M1091,182.79a12,12,0,0,0-1.78,2.1" transform="translate(-1084.3 -182.29)" fill="none" stroke="#ff7a00" stroke-miterlimit="10"></path>
							<path d="M1104.31,184.85a11.93,11.93,0,0,0-1.75-2.06" transform="translate(-1084.3 -182.29)" fill="none" stroke="#ff7a00" stroke-miterlimit="10"></path>
							<path d="M1104.31,184.85" transform="translate(-1084.3 -182.29)" fill="none" stroke="#ff7a00" stroke-miterlimit="10"></path>
							<path d="M1106.72,191.05" transform="translate(-1084.3 -182.29)" fill="none" stroke="#ff7a00" stroke-miterlimit="10"></path>
							<path d="M1108.8,212.75l-7.82-1.49-0.62-4.39c3.86-1.95,6.62-6.92,6.62-12.79a18.32,18.32,0,0,0-.25-3" transform="translate(-1084.3 -182.29)" fill="none" stroke="#ff7a00" stroke-miterlimit="10"></path>
							<path d="M1089.27,186.89h-0.2a1.37,1.37,0,0,0-.23-0.45,0.58,0.58,0,0,0-.34-0.27l-0.2,0h-0.9v1.53h0.44a0.91,0.91,0,0,0,.31,0,0.48,0.48,0,0,0,.19-0.13,0.56,0.56,0,0,0,.1-0.18,1.1,1.1,0,0,0,.06-0.27h0.2v1.49h-0.2a1.18,1.18,0,0,0-.05-0.27,0.7,0.7,0,0,0-.1-0.22,0.4,0.4,0,0,0-.2-0.14,1,1,0,0,0-.29,0h-0.44v1.31a0.35,0.35,0,0,0,0,.16,0.25,0.25,0,0,0,.12.11l0.17,0,0.2,0v0.19h-1.65v-0.19l0.21,0,0.17,0a0.23,0.23,0,0,0,.12-0.1,0.35,0.35,0,0,0,0-.16V186.5a0.39,0.39,0,0,0,0-.16,0.23,0.23,0,0,0-.12-0.11l-0.19-.06-0.19,0v-0.19h3v1Z" transform="translate(-1084.3 -182.29)" fill="#676767"></path>
							<path d="M1092.68,186.39a1.86,1.86,0,0,1,.39.63,2.28,2.28,0,0,1,.14.82,2.24,2.24,0,0,1-.14.82,1.83,1.83,0,0,1-.4.63,1.74,1.74,0,0,1-.58.4,1.86,1.86,0,0,1-1.43,0,1.7,1.7,0,0,1-.58-0.41,1.88,1.88,0,0,1-.38-0.63,2.26,2.26,0,0,1-.14-0.79,2.22,2.22,0,0,1,.14-0.83,1.92,1.92,0,0,1,.4-0.63,1.72,1.72,0,0,1,.59-0.4,1.84,1.84,0,0,1,1.41,0A1.7,1.7,0,0,1,1092.68,186.39Zm-0.4,2.69a1.78,1.78,0,0,0,.22-0.55,3.19,3.19,0,0,0,.07-0.69,3.15,3.15,0,0,0-.08-0.72,1.78,1.78,0,0,0-.22-0.56,1.07,1.07,0,0,0-.37-0.35,1,1,0,0,0-.51-0.13,1,1,0,0,0-.55.15,1.14,1.14,0,0,0-.37.39,1.89,1.89,0,0,0-.2.55,3.26,3.26,0,0,0-.07.66,3.19,3.19,0,0,0,.07.7,1.77,1.77,0,0,0,.22.55,1.08,1.08,0,0,0,.36.37,1,1,0,0,0,.52.13,1,1,0,0,0,.52-0.13A1,1,0,0,0,1092.28,189.09Z" transform="translate(-1084.3 -182.29)" fill="#676767"></path>
							<path d="M1097.39,189.74h-1q-0.34-.53-0.61-0.92t-0.6-.8h-0.39v1.2a0.43,0.43,0,0,0,0,.16,0.21,0.21,0,0,0,.13.11l0.17,0,0.2,0v0.19h-1.61v-0.19l0.19,0,0.17,0a0.23,0.23,0,0,0,.12-0.1,0.36,0.36,0,0,0,0-.17v-2.75a0.48,0.48,0,0,0,0-.17,0.2,0.2,0,0,0-.13-0.11l-0.17,0-0.18,0v-0.19h1.75a2,2,0,0,1,.45,0,1.22,1.22,0,0,1,.38.16,0.8,0.8,0,0,1,.27.28,0.82,0.82,0,0,1,.1.42,1,1,0,0,1-.07.39,0.8,0.8,0,0,1-.2.29,1.18,1.18,0,0,1-.29.2,2.2,2.2,0,0,1-.37.14l0.47,0.63,0.46,0.62a1.27,1.27,0,0,0,.21.24l0.19,0.12,0.17,0.05,0.17,0v0.19Zm-1.41-2.83a0.69,0.69,0,0,0-.76-0.75h-0.46v1.63h0.35A0.83,0.83,0,0,0,1096,186.91Z" transform="translate(-1084.3 -182.29)" fill="#676767"></path>
							<path d="M1100.23,188a0.93,0.93,0,0,1,.28.29,0.84,0.84,0,0,1,.11.44,0.89,0.89,0,0,1-.12.46,1,1,0,0,1-.3.32,1.37,1.37,0,0,1-.41.19,1.7,1.7,0,0,1-.47.06h-1.8v-0.19l0.19,0,0.18,0a0.24,0.24,0,0,0,.12-0.1,0.33,0.33,0,0,0,0-.16V186.5a0.39,0.39,0,0,0,0-.16,0.23,0.23,0,0,0-.12-0.11l-0.18-.06-0.17,0v-0.19h1.75a1.84,1.84,0,0,1,.39,0,1.15,1.15,0,0,1,.35.14,0.77,0.77,0,0,1,.26.25,0.72,0.72,0,0,1,.1.39,0.84,0.84,0,0,1-.07.36,0.78,0.78,0,0,1-.2.27,1.18,1.18,0,0,1-.28.18,1.66,1.66,0,0,1-.34.11v0a2,2,0,0,1,.37.08A1.26,1.26,0,0,1,1100.23,188Zm-0.65-.57a0.67,0.67,0,0,0,.14-0.25,1.2,1.2,0,0,0,0-.32,0.68,0.68,0,0,0-.17-0.49,0.72,0.72,0,0,0-.54-0.18h-0.43v1.46H1099a1.11,1.11,0,0,0,.38-0.06A0.59,0.59,0,0,0,1099.58,187.4Zm0.37,1.21a0.73,0.73,0,0,0-.23-0.55,0.9,0.9,0,0,0-.65-0.22h-0.47v1.34a0.28,0.28,0,0,0,.14.25,0.71,0.71,0,0,0,.38.09,0.78,0.78,0,0,0,.61-0.23A1,1,0,0,0,1100,188.61Z" transform="translate(-1084.3 -182.29)" fill="#676767"></path>
							<path d="M1104.31,188.62l-0.07,1.12h-3.15v-0.19l0.21,0,0.17,0a0.24,0.24,0,0,0,.12-0.1,0.35,0.35,0,0,0,0-.16V186.5a0.39,0.39,0,0,0,0-.16,0.23,0.23,0,0,0-.12-0.11l-0.19-.06-0.19,0v-0.19H1104v0.92h-0.2a1.23,1.23,0,0,0-.23-0.43,0.57,0.57,0,0,0-.34-0.25l-0.2,0h-0.86v1.51h0.43a0.86,0.86,0,0,0,.3,0,0.41,0.41,0,0,0,.17-0.13,0.69,0.69,0,0,0,.1-0.21,1.3,1.3,0,0,0,.05-0.24h0.2v1.49h-0.2a1.2,1.2,0,0,0-.06-0.27,0.69,0.69,0,0,0-.1-0.21,0.39,0.39,0,0,0-.19-0.14,1,1,0,0,0-.28,0h-0.43V189a1.19,1.19,0,0,0,0,.27,0.25,0.25,0,0,0,.09.15,0.4,0.4,0,0,0,.19.07h0.82l0.21,0a0.32,0.32,0,0,0,.15-0.08,1.71,1.71,0,0,0,.26-0.39,2.62,2.62,0,0,0,.17-0.38h0.19Z" transform="translate(-1084.3 -182.29)" fill="#676767"></path>
							<path d="M1107.07,188a0.89,0.89,0,0,1,.18.29,1.09,1.09,0,0,1,.06.37,1.06,1.06,0,0,1-.37.83,1.35,1.35,0,0,1-.92.33,1.71,1.71,0,0,1-.51-0.08,2,2,0,0,1-.44-0.19l-0.12.2h-0.21l0-1.3h0.22a2.87,2.87,0,0,0,.16.44,1.52,1.52,0,0,0,.24.36,1.07,1.07,0,0,0,.33.25,1,1,0,0,0,.43.09,1,1,0,0,0,.32,0,0.54,0.54,0,0,0,.35-0.34,0.84,0.84,0,0,0,0-.27,0.76,0.76,0,0,0-.13-0.42,0.79,0.79,0,0,0-.38-0.3l-0.4-.15-0.39-.16a1.26,1.26,0,0,1-.5-0.38,1,1,0,0,1-.18-0.61,0.93,0.93,0,0,1,.09-0.4,1.05,1.05,0,0,1,.25-0.33,1.14,1.14,0,0,1,.37-0.22,1.25,1.25,0,0,1,.44-0.08,1.29,1.29,0,0,1,.47.08,2.24,2.24,0,0,1,.38.19l0.11-.18h0.21l0,1.26h-0.22q-0.06-.22-0.13-0.41a1.47,1.47,0,0,0-.19-0.36,0.88,0.88,0,0,0-.28-0.25,0.83,0.83,0,0,0-.41-0.09,0.62,0.62,0,0,0-.43.16,0.52,0.52,0,0,0-.18.4,0.69,0.69,0,0,0,.12.41,0.84,0.84,0,0,0,.33.27l0.38,0.16,0.37,0.15,0.31,0.16A1.16,1.16,0,0,1,1107.07,188Z" transform="translate(-1084.3 -182.29)" fill="#676767"></path>
						</svg></span><span class="checkbox-item-title">Из журнала Forbes</span>
					<input type="checkbox" name="form_checkbox_SIMPLE_QUESTION_493[]" value="31" class="checkbox-item-element"><span class="checkbox-item-checked"></span>
				</label>
				<label class="checkbox-item"><span class="checkbox-item-icon">
						<svg width="40" viewbox="0 0 41.53 29.79">
							<line x1="30.61" y1="0.5" x2="30.61" y2="28.06" fill="none" stroke="#0d9" stroke-miterlimit="10"></line>
							<line x1="3.78" y1="28.06" x2="3.37" y2="29.67" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
							<line x1="37.67" y1="29.67" x2="37.26" y2="28.06" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
							<rect x="0.5" y="0.5" width="40.53" height="27.56" rx="1.13" ry="1.13" fill="none" stroke="#0d9" stroke-miterlimit="10"></rect>
							<circle cx="35.83" cy="23.03" r="2.46" fill="none" stroke="#70706e" stroke-miterlimit="10"></circle>
							<line x1="32.75" y1="5.1" x2="34.14" y2="5.1" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
							<line x1="35.13" y1="5.1" x2="36.52" y2="5.1" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
							<line x1="37.51" y1="5.1" x2="38.91" y2="5.1" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
							<line x1="32.75" y1="7.15" x2="34.14" y2="7.15" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
							<line x1="35.13" y1="7.15" x2="36.52" y2="7.15" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
							<line x1="37.51" y1="7.15" x2="38.91" y2="7.15" fill="none" stroke="#70706e" stroke-miterlimit="10"></line>
						</svg></span><span class="checkbox-item-title">ТВ</span>
					<input type="checkbox" name="form_checkbox_SIMPLE_QUESTION_493[]" value="32" class="checkbox-item-element"><span class="checkbox-item-checked"></span>
				</label>
			</div>
		</div>
	</div>
	<div class="button-holder">
		<input type="hidden" name="web_form_apply" value="Y" />
		<button type="submit" class="button button--blue button--small"><span class="button-text">Отправить</span><span class="button-bg"></span></button>
	</div>

	<?=$arResult["FORM_FOOTER"]?>

<?
} //endif (isFormNote)
?>
