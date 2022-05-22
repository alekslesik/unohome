<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
IncludeTemplateLangFile(__FILE__);

$social = array();
if (COption::GetOptionString('r52.corp', "VK_" . SITE_ID)) {
	$social[] = array( 
		'URL' => COption::GetOptionString('r52.corp', "VK_" . SITE_ID),
		'ICON_FOOTER' => SITE_TEMPLATE_PATH . '/img/icon_vk_footer.png',
		'ICON_CONTACT' => SITE_TEMPLATE_PATH . '/img/icon_vk_bg_hover.png',
		'ICON_CONTACT2' => SITE_TEMPLATE_PATH . '/img/icon_vk_footer.png',
		'CLASS' => 'social__vk',
		'CLASS_CONTACT' => 'social_vk',
		'CLASS_HEADER' => 'social-header__vk',
		);
}
if (COption::GetOptionString('r52.corp', "OK" . SITE_ID)) {
	$social[] = array( 
		'URL' => COption::GetOptionString('r52.corp', "OK" . SITE_ID),
		'ICON_FOOTER' => SITE_TEMPLATE_PATH . '/img/icon_class_footer.png',
		'ICON_CONTACT' => SITE_TEMPLATE_PATH . '/img/icon_cl_bg_hover.png',
		'ICON_CONTACT2' => SITE_TEMPLATE_PATH . '/img/icon_class_footer.png',
		'CLASS' => 'social__cl',
		'CLASS_CONTACT' => 'social_cl',
		'CLASS_HEADER' => 'social-header__cl',
		);
}
if (COption::GetOptionString('r52.corp', "INST" . SITE_ID)) {
	$social[] = array( 
		'URL' => COption::GetOptionString('r52.corp', "INST" . SITE_ID),
		'ICON_FOOTER' => SITE_TEMPLATE_PATH . '/img/icon_inst_footer.png',
		'ICON_CONTACT' => SITE_TEMPLATE_PATH . '/img/icon_inst_bg_hover.png',
		'ICON_CONTACT2' => SITE_TEMPLATE_PATH . '/img/icon_inst_footer.png',
		'CLASS' => 'social__inst',
		'CLASS_CONTACT' => 'social_inst',
		'CLASS_HEADER' => 'social-header__inst',
		);
}
if (COption::GetOptionString('r52.corp', "YT" . SITE_ID)) {
	$social[] = array( 
		'URL' => COption::GetOptionString('r52.corp', "YT" . SITE_ID),
		'ICON_FOOTER' => SITE_TEMPLATE_PATH . '/img/icon_youtube.svg',
		'ICON_CONTACT' => SITE_TEMPLATE_PATH . '/img/icon_youtube_bg_hover.jpg',
		'ICON_CONTACT2' => SITE_TEMPLATE_PATH . '/img/icon_youtube.svg',
		'CLASS' => 'social__youtube',
		'CLASS_CONTACT' => 'social_youtube',
		'CLASS_HEADER' => 'social-header__yt',
		);
}
if (COption::GetOptionString('r52.corp', "TW" . SITE_ID)) {
	$social[] = array( 
		'URL' => COption::GetOptionString('r52.corp', "TW" . SITE_ID),
		'ICON_FOOTER' => SITE_TEMPLATE_PATH . '/img/icon_twitter.svg',
		'ICON_CONTACT' => SITE_TEMPLATE_PATH . '/img/icon_tw_bg_hover.jpg',
		'ICON_CONTACT2' => SITE_TEMPLATE_PATH . '/img/icon_twitter.svg',
		'CLASS' => 'social__tw',
		'CLASS_CONTACT' => 'social_tw',
		'CLASS_HEADER' => 'social-header__tw',
		);
}
if (COption::GetOptionString('r52.corp', "FB" . SITE_ID)) {
	$social[] = array( 
		'URL' => COption::GetOptionString('r52.corp', "FB" . SITE_ID),
		'ICON_FOOTER' => SITE_TEMPLATE_PATH . '/img/icon_fb_footer.png',
		'ICON_CONTACT' => SITE_TEMPLATE_PATH . '/img/icon_fb_bg_hover.png',
		'ICON_CONTACT2' => SITE_TEMPLATE_PATH . '/img/icon_fb_footer.png',
		'CLASS' => 'social__fb',
		'CLASS_CONTACT' => 'social_fb',
		'CLASS_HEADER' => 'social-header__fb',
		);
}
function tel($phone) {
	$phone = preg_replace('![^0-9]+!', '', $phone);
	return $phone;
}
function file_info($file_url) {
	$arFile = array();
	$name = array_pop(explode('/', $file_url));
	
	$arFile['SIZE'] = getSize(filesize($file_url));
	$pathInfo = pathinfo($name);
	$arFile['NAME'] = array_shift(explode('.', $name));//$pathInfo['filename'];
	$arFile['TYPE'] = $pathInfo['extension'];
	$arFile['ICON'] = getIcon($arFile['TYPE']);
	return $arFile;
}

function getSize($filesize) {
	$formats = array('B','Kb','Mb','Gb','Tb');// варианты размера файла
	$format = 0;// формат размера по-умолчанию
	
	// прогоняем цикл
	while ($filesize > 1024 && count($formats) != ++$format)
	{
		$filesize = round($filesize / 1024, 2);
	}
	
	// если число большое, мы выходим из цикла с
	// форматом превышающим максимальное значение
	// поэтому нужно добавить последний возможный
	// размер файла в массив еще раз
	$formats[] = 'Tb';
	
	return $filesize.' '.$formats[$format];
}

function getIcon ($fileType) {
	if ($fileType == 'docx' or $fileType == 'doc') return 'icon_doc.png';
	if ($fileType == 'xlsx') return 'icon_excel.png';
	return 'icon_pres_company.svg';
}
?>
	
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
<head>
	<?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle();?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?
	
	$APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH . '/css/bootstrap.min.css');
	$APPLICATION->SetAdditionalCss('https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css');
	$APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH . '/css/style.css');
	$APPLICATION->SetAdditionalCss('/bitrix/templates/.default/css/theme' . SITE_ID . '.css');
	
	?>
</head>
<body>
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>
    <div class="wrapper">
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto pr-0">
                            <div class="header-top-left">
                                <p><?=COption::GetOptionString('r52.corp', "TEXT_HEADER" . SITE_ID)?></p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="header-top-right">
								<a href="mailto:<?=COption::GetOptionString('r52.corp', "MAIL" . SITE_ID)?>"><?=COption::GetOptionString('r52.corp', "MAIL" . SITE_ID)?></a>
								
                                <div class="social">
									<?foreach ($social as $vSocial):?>
										<a href="<?=$vSocial['URL'];?>" class="<?=$vSocial['CLASS_HEADER'];?>" target="_blank"></a>
									<?endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-3 pr-0">
                            <a href="<?=SITE_DIR?>" class="logo">
								<img src="<?=COption::GetOptionString('r52.corp', "LOGO_LIGHT" . SITE_ID)?>" alt="">
                            </a>
                        </div>
                        <div class="col-9 pl-0">
                            <div class="row justify-content-between align-items-center">
                                <div class="col pl-0">
                                    <div class="header-middle-contacts">
                                        <div class="header-middle-contacts-image">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/img/icon_phone.svg" class="img-svg" alt="">
                                        </div>
                                        <div class="header-middle-contacts-content">
											<a href="tel:<?=tel(COption::GetOptionString('r52.corp', "PHONE" . SITE_ID))?>"><?=COption::GetOptionString('r52.corp', "PHONE" . SITE_ID)?></a>
											<p><?=COption::GetOptionString('r52.corp', "WORK_MODE" . SITE_ID)?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5 pl-0">
                                    <div class="header-middle-contacts">
                                        <div class="header-middle-contacts-image">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/img/icon_address.svg" class="img-svg" alt="">
                                        </div>
                                        <div class="header-middle-contacts-content">
											<p><?=COption::GetOptionString('r52.corp', "ADDRESS" . SITE_ID)?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto pl-0">
                                    <a href="#" class="ref button-order-call"><?=GetMessage("T_REQUEST_A_CALL")?></a>
                                    <a href="#" class="burger-menu">
                                        <div class="burger-menu__button">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                        <p><?=GetMessage("T_MENU")?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        
						<div class="col-9 pr-0">
                                <?$APPLICATION->IncludeComponent(
									"bitrix:menu", 
									"r52_topmenu", 
									array(
										"ALLOW_MULTI_SELECT" => "N",
										"CHILD_MENU_TYPE" => "left",
										"DELAY" => "N",
										"MAX_LEVEL" => "2",
										"MENU_CACHE_GET_VARS" => array(
										),
										"MENU_CACHE_TIME" => "3600",
										"MENU_CACHE_TYPE" => "N",
										"MENU_CACHE_USE_GROUPS" => "N",
										"ROOT_MENU_TYPE" => "top",
										"USE_EXT" => "Y",
										"COMPONENT_TEMPLATE" => "r52_topmenu"
									),
									false
								);?>
								</div>
                        <div class="col-auto pl-0">
                            <div class="header-bottom-right">
                                <div class="choice-lang">
                                    <a href="#" class="active"><?=GetMessage("T_RU")?></a>
                                    <span>|</span>
                                    <a href="#"><?=GetMessage("T_EN")?></a>
                                </div>
                                <a href="#" class="button-search">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/icon_search.svg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="search">
					<div class="container">
						<p class="search__title"><?=GetMessage("T_SEARCH_ON_SITE")?></p>
						<form class="form-search" name="form-search" action="<?=SITE_DIR?>search/">
							<input class="custom-input" type="text" name="q" placeholder="<?=GetMessage("T_SEARCH")?>">
							<input type="submit" value="<?=GetMessage("T_SEARCH")?>" class="button">
						</form>
						<a href="#" class="search__close">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/close_modal.png" alt="">
						</a>
					</div>
				</div>
            </div>
        </header>
        <div class="dropdown">
            <div class="dropdown-menu-block">
                <?$APPLICATION->IncludeComponent(
					"bitrix:menu",
					"r52_burgermenu",
					Array(
						"ALLOW_MULTI_SELECT" => "N",
						"CHILD_MENU_TYPE" => "",
						"DELAY" => "N",
						"MAX_LEVEL" => "1",
						"MENU_CACHE_GET_VARS" => array(""),
						"MENU_CACHE_TIME" => "3600",
						"MENU_CACHE_TYPE" => "Y",
						"MENU_CACHE_USE_GROUPS" => "Y",
						"ROOT_MENU_TYPE" => "top",
						"USE_EXT" => "N"
					)
				);?>
                <form class="form-search" id="form-search" action="<?=SITE_DIR?>search/">
                    <input class="custom-input" type="text" name="q" placeholder="<?=GetMessage("T_SEARCH")?>">
                    <input type="submit" value="<?=GetMessage("T_SEARCH")?>" class="button">
                </form>
                <div class="choice-lang">
                    <a href="#" class="active"><?=GetMessage("T_RU")?></a>
                    <span>|</span>
                    <a href="#"><?=GetMessage("T_EN")?></a>
                </div>
            </div>
        </div>
        <div class="wrapper-content">
			<?if ($APPLICATION->GetCurPage() != SITE_DIR):?>
            <div class="current-page">
                <div class="container">
                    <h1><?$APPLICATION->ShowTitle(false);?></h1>
                    <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "r52_breadcrumb", Array(
						"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
						"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
						"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
					),
					false
				);?>
                </div>
            </div>
            <div class="page-content">
                <div class="container">
					<?if (!($APPLICATION->GetCurPage() == SITE_DIR . 'search/' or $APPLICATION->GetCurPage() == SITE_DIR . 'contacts/')):?>
                    <div class="row page-content-row justify-content-between">
                        <div class="col-md-3 pr-0">
                            <div class="sidebar">
                                <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"r52_leftmenu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "2",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "Y",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => "r52_leftmenu"
	),
	false
);?>
                                <div class="contact-us">
								<p class="contact-us__title"><?$APPLICATION->IncludeComponent(
												"bitrix:main.include",
												"",
												Array(
													"AREA_FILE_SHOW" => "file",
													"AREA_FILE_SUFFIX" => "inc",
													"EDIT_TEMPLATE" => "",
													"PATH" => SITE_DIR."include/inner/contact_us_title.php"
												)
									);?></p>
								<p class="contact-us__text"><?$APPLICATION->IncludeComponent(
												"bitrix:main.include",
												"",
												Array(
													"AREA_FILE_SHOW" => "file",
													"AREA_FILE_SUFFIX" => "inc",
													"EDIT_TEMPLATE" => "",
													"PATH" => SITE_DIR."include/inner/contact_us_text.php"
												)
									);?></p>
								<a href="#" class="contact-us__button ref"><?$APPLICATION->IncludeComponent(
												"bitrix:main.include",
												"",
												Array(
													"AREA_FILE_SHOW" => "file",
													"AREA_FILE_SUFFIX" => "inc",
													"EDIT_TEMPLATE" => "",
													"PATH" => SITE_DIR."include/inner/contact_us_btn.php"
												)
									);?></a>
                                </div>	
<?	
	$file_url = $_SERVER["DOCUMENT_ROOT"] . COption::GetOptionString('r52.corp', "FILE_LEFT" . SITE_ID);
	$arFile = file_info($file_url);
?>
                                <a href="<?=COption::GetOptionString('r52.corp', "FILE_LEFT" . SITE_ID);?>" download  class="block-doc">
                                    <div class="block-doc__image">
                                        <img src="<?=SITE_TEMPLATE_PATH?>/img/<?=$arFile['ICON']?>" alt="">
                                    </div>
							
                                    <div class="block-doc__text">
                                        <p><?=$arFile['NAME']?></p>
                                        <span>(<?=strtoupper($arFile['TYPE'])?>, <?=$arFile['SIZE']?>)</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9 pl-0">
                            <div class="content-page">		
						<?endif;?>						
			<?endif;?>				