<?

$IBLOCK_ID = $arParams['IBLOCK_ID'];
$arFilter = Array('IBLOCK_ID'=>$IBLOCK_ID);
$arSelect = Array('ID', 'NAME', 'DESCRIPTION');

$db_list = CIBlockSection::GetList(Array('SORT' => 'ASC'), $arFilter, true, $arSelect);
$arSection = array();
while($ar_result = $db_list->GetNext())
{
	$id = $ar_result['ID'];
	$arSection[$id] = $ar_result;
	
}

foreach ($arResult['ITEMS'] as $arItem) {
	
	$id = $arItem['IBLOCK_SECTION_ID'];
	$arSection[$id]['ITEMS'][] = $arItem;
}

$arResult['SECTIONS'] = $arSection;

