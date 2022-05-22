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
<div class="page-detail">
	<?if ($arParams['DISPLAY_NAME'] == 'Y'):?>
	<h2><?=$arResult['NAME'];?></h2>
	<? endif ?>
	<?if ($arResult['DETAIL_PICTURE']):?>
		<div class="page-detail__image col-md-4 col-sm-4 col-xs-12">
			<img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="">
		</div>
	<?endif;?>
	<div class="page-detail__content">
		<?=$arResult['DETAIL_TEXT'];?>
    </div>
	<?
	foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

		<?=$arProperty["NAME"]?>:&nbsp;
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?>
		<?endif?>
		<br />
	<?endforeach;?>
	<div class="back-list">
		<a href="<?=$arResult['LIST_PAGE_URL']?>" class="button"><?=GetMessage("CT_BACK")?></a>
	</div>
</div>