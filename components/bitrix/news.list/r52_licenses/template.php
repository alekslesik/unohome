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
<link rel="stylesheet" href="<?=$templateFolder?>/tobii.min.css">
<script src="<?=$templateFolder?>/tobii.min.js"></script>
<?foreach ($arResult['SECTIONS'] as $arSection):?>
<div class="licenses">
	<h2><?=$arSection['NAME'];?></h2>
	<?if ($arSection['DESCRIPTION']):?><p><?=$arSection['DESCRIPTION'];?></p><?endif;?>
	<div class="licenses-content">
		<div class="row">
			<?foreach ($arSection['ITEMS'] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div class="col-md-4 col-6" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<a href="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" class="licenses-content-block lightbox">
						<div class="licenses-content-block__image">
							<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="">
						</div>
						<p class="licenses-content-block__name"><?=$arItem['NAME']?></p>
					</a>
				</div>
			<?endforeach;?>
		</div>
	</div>
</div>
<?endforeach;?>
