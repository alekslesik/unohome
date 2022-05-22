<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$site = ($_REQUEST["site"] <> ''? $_REQUEST["site"] : ($_REQUEST["src_site"] <> ''? $_REQUEST["src_site"] : false));
$arMenu = GetMenuTypes($site);

$arComponentParameters = array(
	"GROUPS" => array(
		"CACHE_SETTINGS" => array(
			"NAME" => GetMessage("COMP_GROUP_CACHE_SETTINGS"),
			"SORT" => 600
		),
	),
	"PARAMETERS" => array(

		

		"MAX_LEVEL2" => Array(
			"NAME"=>GetMessage("MAX_LEVEL_NAME").'111',
			"TYPE" => "LIST",
			"DEFAULT"=>'1',
			"PARENT" => "CACHE_SETTINGS",
			"VALUES" => Array(
				1 => "1",
				
			),
			"ADDITIONAL_VALUES"	=> "N",
		),

		
	)
);
?>
