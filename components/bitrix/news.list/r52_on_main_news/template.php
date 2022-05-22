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
<div class="news">
	<div class="container">
		<h2><?=GetMessage("CT_LAST_NEWS")?></h2>
		<div class="news-content">
			<div class="row">
				<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
					<div class="col-md-3 col-6" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="news-content-block">
							<div class="news-content-block__image">
								<img src="<?if ($arItem['PREVIEW_PICTURE']):?><?=$arItem['PREVIEW_PICTURE']['SRC'];?><?else:?><?=$templateFolder;?>/images/img_no_photo.png<?endif;?>" alt="">
							</div>
							<p class="news-content-block__date"><?=CIBlockFormatProperties::DateFormat("j F Y", MakeTimeStamp($arResult["DATE_ACTIVE_FROM"], CSite::GetDateFormat()))?></p>
							<p class="news-content-block__name"><?=$arItem['NAME']?></p>
						</a>
					</div>
				<?endforeach;?>
			</div>
		</div>
		<div class="more">
			<a href="<?=$arResult['ITEMS']['0']['LIST_PAGE_URL']?>" class="ref"><?=GetMessage("CT_ALL_NEWS")?></a>
		</div>
	</div>
</div>	
