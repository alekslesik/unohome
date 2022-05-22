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
<div class="partners">
	<div class="container">
		<div class="partners-slider">
			<div class="partners-slider-wrapper">
				<?foreach ($arResult['ITEMS'] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div class="partners-slider-block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<img src="<?if ($arItem['PREVIEW_PICTURE']):?><?=$arItem['PREVIEW_PICTURE']['SRC'];?><?else:?><?=$templateFolder;?>/images/img_no_photo.png<?endif;?>" alt="">
				</div>
				<?endforeach;?>
			</div>
			<div class="partners-slider-controls">
				<div class="arrows-partners-slider">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/arrow_left_partners_slider.svg" alt="">
				</div>
				<div class="arrows-partners-slider">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/arrow_right_partners_slider.svg" alt="">
				</div>
			</div>
		</div>
	</div>
</div>
