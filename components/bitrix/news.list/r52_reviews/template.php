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
<div class="give-feedback">
	<div class="give-feedback-block">
		<div class="give-feedback-block-left">
			<p class="give-feedback-block-left__title"><?=GetMessage("CT_LEFT_TITLE")?></p>
			<p class="give-feedback-block-left__text"><?=GetMessage("CT_LEFT_TEXT")?></p>
		</div>
		<div class="give-feedback-block-right">
			<button type="button" class="button button-give-feedback"><?=GetMessage("CT_FEEDBACK")?></button>
		</div>
	</div>
</div>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="wrapper-reviews-block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="reviews-content-block">
			<div class="reviews-content-block-image">
				<img src="<?if ($arItem['PREVIEW_PICTURE']):?><?=$arItem['PREVIEW_PICTURE']['SRC']?><?else:?><?=$templateFolder;?>/img/img_reviews3.png<?endif;?>" alt="">
				<div class="quotes">
					<img src="<?=$templateFolder;?>/img/img_quotes.png" alt="">
				</div>
			</div>
			<div class="reviews-content-block-content">
				<p class="reviews-content-block-content__company"><?=$arItem['DISPLAY_PROPERTIES']['COMPANY']['VALUE']?></p>
				<p class="reviews-content-block-content__name"><?=$arItem['NAME']?></p>
				<p class="reviews-content-block-content__text"><?if ($arItem['DETAIL_TEXT']):?><?=$arItem['DETAIL_TEXT']?><?else:?><?=$arItem['PREVIEW_TEXT']?><?endif?></p>
			</div>
		</div>
	</div>
<?endforeach;?>
