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
<div class="reviews">
	<div class="container">
		<h2><?$arResult['NAME']?></h2>
		<div class="reviews-content">
			<div class="row">
				<?foreach ($arResult['ITEMS'] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
					<div class="col-md-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<div class="reviews-content-block">
							<div class="reviews-content-block-image">
								<img src="<?if ($arItem['PREVIEW_PICTURE']['SRC']):?><?=$arItem['PREVIEW_PICTURE']['SRC']?><?else:?><?=$templateFolder;?>/img/img_reviews3.png<?endif;?>" alt="">
								<div class="quotes">
									<img src="<?=$templateFolder;?>/img/img_quotes.png" alt="">
								</div>
							</div>
							<div class="reviews-content-block-content">
								<p class="reviews-content-block-content__company"><?=$arItem['DISPLAY_PROPERTIES']['COMPANY']['VALUE']?></p>
								<p class="reviews-content-block-content__name"><?=$arItem['NAME']?></p>
								<p class="reviews-content-block-content__text"><?=$arItem['PREVIEW_TEXT']?></p>
							</div>
						</div>
					</div>
				<?endforeach;?>
			</div>
		</div>
		<div class="more">
			<a href="<?=$arParams['BTN_URL']?>" class="ref"><?=$arParams['BTN_NAME']?></a>
		</div>
	</div>
</div>
