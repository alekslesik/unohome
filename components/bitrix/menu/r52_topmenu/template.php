<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="header-bottom-left">
<?if (!empty($arResult)):?>

	<nav class="header-menu">
	<ul class="header-menu-list">
<?
$additional_services = '<li class="additional-services">
                            <a href="#" class="header-menu__link">...</a>
                                <ul class="submenu">';

$previousLevel = 0;
foreach($arResult as $arItem):
	if( $arItem["DEPTH_LEVEL"] > 2) 
		continue;
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
		<?$additional_services .= '<li><a href="' . $arItem["LINK"] . '">' . $arItem["TEXT"] . '</a></li>';?>
			<li class="header-menu__item">
				<a href="<?=$arItem["LINK"]?>" class="header-menu__link"><?=$arItem["TEXT"]?>
					<img src="<?=SITE_TEMPLATE_PATH?>/img/arrow_menu.png" alt="">
				</a>
				<ul class="submenu">
		<?else:?>
			<li>
				<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
			</li>
		<?endif?>

	<?else:?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
		<?$additional_services .= '<li><a href="' . $arItem["LINK"] . '">' . $arItem["TEXT"] . '</a></li>';?>
			<li class="header-menu__item">
				<a href="<?=$arItem["LINK"]?>" class="header-menu__link <?if ($arItem["SELECTED"]):?>header-menu__link_active<?endif?>"><?=$arItem["TEXT"]?></a>
			</li>
		<?else:?>
			<li>
				<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
			</li>
		<?endif?>


	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

<?$additional_services .= '</ul></li>';
echo $additional_services;
?></ul></nav>
<?endif?>
</div>