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
<div class="other-services">
	<div class="container">
		<div class="row align-items-center">
			<?foreach ($arResult['ITEMS'] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
			<div class="col-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="other-services-block">
					<div class="other-services-block__image">
						<img src="<?if ($arItem['PREVIEW_PICTURE']):?><?=$arItem['PREVIEW_PICTURE']['SRC'];?><?else:?><?=$templateFolder;?>/images/img_no_photo.png<?endif;?>" alt="">
					</div>
					<div class="other-services-block-content">
						<p class="other-services-block-content__title"><?=$arItem['NAME']?></p>
						<p class="other-services-block-content__text"><?=$arItem['PREVIEW_TEXT']?></p>
						<p class="other-services-block-content__price"><?=$arItem['DISPLAY_PROPERTIES']['TEXT_ON_MAIN']['VALUE']?></p>
					</div>
				</a>
			</div>
			<?endforeach;?>
		</div>
	</div>
</div>
