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
<div class="main-slider">
	<div class="main-slider-wrapper">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="main-slider-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>"  style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC'];?>);">
				<div class="container">
					<div class="main-slider-block">
						<p class="main-slider-block__title"><?=$arItem["NAME"]?></p>
						<?if ($arItem["PREVIEW_TEXT"]):?><p class="main-slider-block__text"><?=$arItem["PREVIEW_TEXT"];?></p><?endif;?>
						<div class="main-slider-block-buttons">
							<?if ($arItem['DISPLAY_PROPERTIES']['BTN']['VALUE'] == 'Y'):?><a href="#" class="button button-ask-question"><?=GetMessage("CT_QUESTION")?></a><?endif;?>
							<a href="<?=$arItem['DISPLAY_PROPERTIES']['BTN_2']['VALUE']?>" onclick="" class="additional-button"><?=$arItem['DISPLAY_PROPERTIES']['BTN_2']['DESCRIPTION']?></a>
						</div>
					</div>
				</div>
			</div>
		<?endforeach;?>
	</div>
	<div class="main-slider-controls">
		<div class="arrows-main-slider"><img class="img-svg" src="<?=SITE_TEMPLATE_PATH?>/img/arrow_left_main_slider.svg"></div>
		<div class="arrows-main-slider"><img class="img-svg" src="<?=SITE_TEMPLATE_PATH?>/img/arrow_right_main_slider.svg"></div>
	</div>
</div>
