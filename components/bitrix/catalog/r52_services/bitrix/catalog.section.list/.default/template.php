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
<div class="row">
	<?foreach ($arResult['SECTIONS'] as &$arSection):
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
	?>
	
		<div class="col-md-4" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
			<a href="<?=$arSection['SECTION_PAGE_URL']?>" class="service-block">
				<div class="service-block__image">
					<img src="<?if ($arSection['PICTURE']):?><?=$arSection['PICTURE']['SRC'];?><?else:?><?=$templateFolder;?>/images/img_no_photo.png<?endif;?>" alt="">
				</div>
				<p class="service-block__name"><?=$arSection['NAME']?></p>
			</a>
		</div>
	<?endforeach;?>
</div>