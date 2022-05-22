<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"DISPLAY_DATE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_DATE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_NAME" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_NAME"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PICTURE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_PICTURE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PREVIEW_TEXT" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_TEXT"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"H1" => Array(
		"NAME" => 'Заголовок',
		"TYPE" => "STRING",
		"DEFAULT" => "",
	),
	"TEXT" => Array(
		"NAME" => 'Текст',
		"TYPE" => "STRING",
		"DEFAULT" => "",
	),
	"BTN_NAME" => Array(
		"NAME" => 'Название кнопки',
		"TYPE" => "STRING",
		"DEFAULT" => "",
	),
	"BTN_URL" => Array(
		"NAME" => 'Url кнопки',
		"TYPE" => "STRING",
		"DEFAULT" => "",
	),
);
?>
