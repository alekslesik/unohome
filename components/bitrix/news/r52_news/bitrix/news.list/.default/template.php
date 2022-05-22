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

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="news-block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="row justify-content-between">
			<div class="col-auto">
				<div class="news-block__image">
					<img src="<?if ($arItem['PREVIEW_PICTURE']):?><?=$arItem['PREVIEW_PICTURE']['SRC'];?><?else:?><?=$templateFolder;?>/images/img_no_photo.png<?endif;?>" alt="">
				</div>
			</div>
			<div class="col">
				<div class="news-block__content">
					<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
						<p class="news-block__date"><?=CIBlockFormatProperties::DateFormat("j F Y", MakeTimeStamp($arResult["DATE_ACTIVE_FROM"], CSite::GetDateFormat()))?></p>
					<?endif?>
					<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
						<p class="news-block__name"><?=$arItem['NAME']?></p>
					<?endif;?>
					<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
						<p class="news-block__text"><?=$arItem["PREVIEW_TEXT"];?></p>
					<?endif;?>
				</div>
			</div>
		</div>
	</a>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>