<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<h2><?=GetMessage("HEADER")?></h2>
<div class="faq">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="faq-block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="faq-block-question">
			<button type="button" class="faq-block-question__button">
				<span></span>
				<span></span>
			</button>
			<p class="faq-block-question__text"><?=$arItem['NAME'];?></p>
		</div>
		<div class="faq-block__answer"><?=$arItem['PREVIEW_TEXT'];?></div>
	</div>
<?endforeach;?>
</div>
