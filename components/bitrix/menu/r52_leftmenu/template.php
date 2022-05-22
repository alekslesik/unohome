<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav class="sidebar-nav">
	<ul class="sidebar-nav-list">
<?
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
			<li class="sidebar-nav__item">
				<span class="button-inner-services <?if ($arItem["SELECTED"]):?>button-inner-services_active<?endif?>"><img src="<?=SITE_TEMPLATE_PATH?>/img/arrow_page_handout.svg" class="img-svg" alt=""></span>
				<a href="<?=$arItem["LINK"]?>" class="sidebar-nav__link sidebar-nav__link_handout <?if ($arItem["SELECTED"]):?>sidebar-nav__link_active<?endif?>">
					<?=$arItem["TEXT"]?>
				</a>
				<ul class="list-inner-services <?if ($arItem["SELECTED"]):?>list-inner-services_active<?endif?>">
		<?else:?>
			<li>
				<a class="list-inner-services__link <?if ($arItem["SELECTED"]):?>list-inner-services__link_active<?endif?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
			</li>
		<?endif?>

	<?else:?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
		<?$additional_services .= '<li><a href="' . $arItem["LINK"] . '">' . $arItem["TEXT"] . '</a></li>';?>
			<li class="sidebar-nav__item">
				<a href="<?=$arItem["LINK"]?>" class="sidebar-nav__link <?if ($arItem["SELECTED"]):?>sidebar-nav__link_active<?endif?>"><?=$arItem["TEXT"]?></a>
			</li>
		<?else:?>
			<li>
				<a class="list-inner-services__link <?if ($arItem["SELECTED"]):?>list-inner-services__link_active<?endif?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
			</li>
		<?endif?>


	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

	</ul>
</nav>
<?endif?>