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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>
<?if ($arResult['SECTIONS']):?>
	<div class="row row-catalog">
	<?

		foreach ($arResult['SECTIONS'] as &$arSection) {
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

			?>
			<div class="col-md-6" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
				<a href="<? echo $arSection['SECTION_PAGE_URL']; ?>" class="category-block">
					<div class="category-block__image">
						<img src="<? echo $arSection['PICTURE']['SRC']; ?>" alt="">
					</div>
					<p class="category-block__name"><? echo $arSection['NAME']; ?></p>
					<p class="category-block__text"><? echo $arSection['DESCRIPTION']; ?></p>
				</a>
			</div>
			<?
		}
		?>
	</div>
<?endif;?>