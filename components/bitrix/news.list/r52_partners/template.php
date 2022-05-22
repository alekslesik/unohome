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
<?foreach ($arResult['SECTIONS'] as $arSection):?>
<div class="partners-content">
	<h2><?=$arSection['NAME'];?></h2>
	<?if ($arSection['DESCRIPTION']):?><p><?=$arSection['DESCRIPTION'];?></p><?endif;?>
	<div class="row">
		<?foreach ($arSection['ITEMS'] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="col-md-4 col-6" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="partners-content-block">
					<div class="partners-content-block__image">
						<img src="<?if ($arItem['PREVIEW_PICTURE']):?><?=$arItem['PREVIEW_PICTURE']['SRC'];?><?else:?><?=$templateFolder;?>/images/img_no_photo.png<?endif;?>" alt="">
					</div>
					<p class="partners-content-block__name"><?=$arItem['NAME']?></p>
				</div>
			</div>
		<?endforeach;?>
	</div>
</div>
<?endforeach;?>
