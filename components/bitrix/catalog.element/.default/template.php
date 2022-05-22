<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);
?>

<div class="page-detail">
	<?if ($arResult['DETAIL_PICTURE']):?>
		<div class="page-detail__image col-md-4 col-sm-4 col-xs-12">
			<img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="">
		</div>
	<?endif;?>
    <div class="page-detail__content">
		<?=$arResult['DETAIL_TEXT'];?>

		<?if ($arResult['DISPLAY_PROPERTIES']['TABS']):?>
		<div class="tabs">
			<div class="tabs-items">
				<?$i = 0;?>
				<?foreach ($arResult['DISPLAY_PROPERTIES']['TABS']['DESCRIPTION'] as $vDesc):?>
				<a href="#" class="tabs-item <?if ($i == 0):?>tabs-item_active<?endif;?>" data-tab="tab-service<?=$i++;?>">
					<?=$vDesc;?>
				</a>
				<?endforeach;?>
			</div>
			<div class="tabs-content">
				<?$i = 0;?>
				<?foreach ($arResult['DISPLAY_PROPERTIES']['TABS']['~VALUE'] as $v):?>
				<div class="tabs-content-block <?if ($i == 0):?>tabs-content-block_active<?endif;?>" data-tab="tab-service<?=$i++;?>">
					<p><?=$v['TEXT'];?></p>
				</div>
				<?endforeach;?>
			</div>
		</div>
		<?endif;?>
		<?=$arResult['DISPLAY_PROPERTIES']['ADDITIONAL']['~VALUE']['TEXT']?>
		<?
		global $id_for_form_ask_question;
		$id_for_form_ask_question = $arResult['ID'];
		$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => SITE_DIR."include/services/ask_question.php"
			)
		);?>
	</div>
	<div class="back-list">
		<a href="<?=$arResult['LIST_PAGE_URL']?>" class="button"><?=GetMessage("CT_BACK")?></a>
	</div>
</div>