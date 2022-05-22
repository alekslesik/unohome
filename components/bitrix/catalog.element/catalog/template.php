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
<div class="product-info">
	<div class="row">
		<div class="col-md-6">
			<div class="product-info-image">
				<div class="product-slider">
					<div class="product-slider-wrapper">
						<?if ($arResult['PROPERTIES']['GALLERY']['VALUE']):?>
							<?foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $idPicture):?>
							<div class="product-slider__block">
								<a href="<?=CFile::GetPath($idPicture);?>" class="lightbox">
									<img src="<?=CFile::GetPath($idPicture);?>"  data-product-image="true" alt="">
								</a>
							</div>
							<?endforeach;?>
						<?else:?>
							<div class="product-slider__block">
								<a href="<?=$arResult['PREVIEW_PICTURE']['SRC'];?>" class="lightbox">
									<img src="<?=$arResult['PREVIEW_PICTURE']['SRC'];?>"  data-product-image="true" alt="">
								</a>
							</div>
						<?endif;?>
					</div>
					<div class="product-slider-controls">
						<div class="arrows-main-slider"><img class="img-svg" src="<?=$templateFolder;?>/images/arrow_left_main_slider.svg"></div>
						<div class="arrows-main-slider"><img class="img-svg" src="<?=$templateFolder;?>/images/arrow_right_main_slider.svg"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="product-info-content">
				<?if ($arParams['DISPLAY_NAME'] === 'Y'):?><p class="product-info-content__name" data-product-name="true"><?=$arResult['NAME']?></p><?endif;?>
				<div class="block-price">
					<p class="current-price" data-product-price="true"><?=$arResult['PROPERTIES']['PRICE']['VALUE']?> <?=GetMessage('CT_BCS_RUBLES');?></p>
					<?if ($arResult['PROPERTIES']['PRICE_DISCOUNT']['VALUE']):?><p class="old-price"><?=$arResult['PROPERTIES']['PRICE_DISCOUNT']['VALUE']?> <?=GetMessage('CT_BCS_RUBLES');?></p><?endif;?>
				</div>
				<?if ($arResult['PREVIEW_TEXT']):?>
					<div class="brief-characteristics">
						<?=$arResult['PREVIEW_TEXT']?>
					</div>
				<?endif;?>
				<button type="button" class="button button-order-product"><?=GetMessage('CT_BCE_CATALOG_BUY');?></button>
			</div>
		</div>
	</div>
</div>
<div class="tabs">
	<div class="tabs-items">
		<a href="#" class="tabs-item tabs-item_active" data-tab="tab-info1">
			<?=GetMessage('CT_BCE_CATALOG_PROPERTIES_TAB');?>
		</a>
		<?if ($arResult['DETAIL_TEXT']):?>
		<a href="#" class="tabs-item" data-tab="tab-info2">
			<?=GetMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');?>
		</a>
		<?endif;?>
	</div>
	<div class="tabs-content">
		<div class="tabs-content-block tabs-content-block_active" data-tab="tab-info1">
			<table>
				<tbody>
					<?foreach ($arResult['DISPLAY_PROPERTIES'] as $arProp):?>
						<tr>
							<td><?=$arProp['NAME']?></td>
							<td><?=$arProp['VALUE']?></td>
						</tr>
					<?endforeach;?>
				</tbody>
			</table>
		</div>
		<?if ($arResult['DETAIL_TEXT']):?>
			<div class="tabs-content-block" data-tab="tab-info2">
				<?=$arResult['DETAIL_TEXT'];?>
			</div>
		<?endif;?>
	</div>
</div>
<?if ($arResult['PROPERTIES']['FILE']['VALUE']):?>
<div class="product-documents">
	<h2><?=GetMessage('CT_BCE_DOCUMENTS');?></h2>
	<div class="row">
		<?foreach ($arResult['PROPERTIES']['FILE']['VALUE'] as $files):?>
		<?
			$file_url = $_SERVER["DOCUMENT_ROOT"] . CFile::GetPath($files);
			$arFile = file_info($file_url);
		?>
			<div class="col-md-4">
				<a href="<?=$file_url?>" download class="block-doc">
					<div class="block-doc__image">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/<?=$arFile['ICON']?>" alt="">
					</div>
					<div class="block-doc__text">
						<p><?=$arFile['NAME']?></p>
						<span>(<?=strtoupper($arFile['TYPE'])?>, <?=$arFile['SIZE']?>)</span>
					</div>
				</a>
			</div>
		<?endforeach;?>
	</div>
</div>
<?endif;?><?
if ($arResult['PROPERTIES']['RECOMMEND']['VALUE']):
	global $arrFilter;
	$arrFilter = array( 'ID' => $arResult['PROPERTIES']['RECOMMEND']['VALUE']);

	$APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"r52_recommend",
		Array(
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"ADD_SECTIONS_CHAIN" => "N",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"DISPLAY_DATE" => "N",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "N",
			"DISPLAY_TOP_PAGER" => "N",
			"FIELD_CODE" => array("", ""),
			"FILTER_NAME" => 'arrFilter',
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"IBLOCK_ID" => "15",
			"IBLOCK_TYPE" => "catalog",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"INCLUDE_SUBSECTIONS" => "Y",
			"MESSAGE_404" => "",
			"NEWS_COUNT" => "20",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "Новости",
			"PARENT_SECTION" => "",
			"PARENT_SECTION_CODE" => "",
			"PREVIEW_TRUNCATE_LEN" => "",
			"PROPERTY_CODE" => array("PRICE", "PRICE_DISCOUNT", ""),
			"SET_BROWSER_TITLE" => "N",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "N",
			"SET_META_KEYWORDS" => "N",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "N",
			"SHOW_404" => "N",
			"SORT_BY1" => "SORT",
			"SORT_BY2" => "",
			"SORT_ORDER1" => "ASC",
			"SORT_ORDER2" => "",
			"STRICT_SECTION_CHECK" => "N"
		)
	);?>
<?endif;?>