<?
//Navigation chain template
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arChainBody = array();
foreach($arCHAIN as $item)
{
	if(strlen($item["LINK"])<strlen(SITE_DIR))
		continue;
	if($item["LINK"] <> "")
		$arChainBody = '&laquo;<a href="'.$item["LINK"].'" class="link link--gray link--gray--inverse">'.htmlspecialcharsex($item["TITLE"]).'</a>&raquo;';
	else{
		//$arChainBody = htmlspecialcharsex($item["TITLE"]);
	}
}
//return implode('&nbsp;/&nbsp;', $arChainBody);
return $arChainBody;
?>
