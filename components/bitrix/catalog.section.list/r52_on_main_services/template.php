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
<div class="services">
	<div class="container">
		<h2><?=$arParams['H1']?></h2>
		<p class="text"><?=$arParams['TEXT']?></p>
		<div class="services-content">
			<div class="row align-items-center">
				<?foreach ($arResult['SECTIONS'] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
					<div class="col-md-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<a href="<?=$arItem['SECTION_PAGE_URL'];?>" class="services-content-block">
							<p class="services-content-block__title"><?=$arItem['NAME']?></p>
							<p class="services-content-block__text"><?=$arItem['PREVIEW_TEXT']?></p>
							<p class="services-content-block__price"><?=$arItem['UF_ON_MAIN_TEXT']?></p>
						</a>
					</div>
				<?endforeach;?>
			</div>
		</div>
		<div class="more">
			<a href="<?=$arParams['BTN_URL']?>" class="ref"><?=$arParams['BTN_NAME']?></a>
		</div>
	</div>
</div>