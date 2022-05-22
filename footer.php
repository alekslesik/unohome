<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

IncludeTemplateLangFile(__FILE__);
?>
	
	<?if ($APPLICATION->GetCurPage() != SITE_DIR):?>
		<?if (!($APPLICATION->GetCurPage() == SITE_DIR . 'search/' or $APPLICATION->GetCurPage() == SITE_DIR . 'contacts/')):?>
				</div>
			</div>
		</div>
		<?endif;?>
		</div>
	</div>
	<?endif;?>
</div>
        <footer class="footer">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-3 footer-left">
                        <div class="footer-main">
                            <a href="<?=SITE_DIR?>" class="logo">
								<img src="<?=COption::GetOptionString('r52.corp', "LOGO_DARK" . SITE_ID)?>" alt="">
                            </a>
								<?$APPLICATION->IncludeComponent(
									"bitrix:main.include",
									"",
									Array(
										"AREA_FILE_SHOW" => "file",
										"AREA_FILE_SUFFIX" => "inc",
										"EDIT_TEMPLATE" => "",
										"PATH" => SITE_DIR."include/footer_text.php"
									)
								);?>
                        </div>
                        <div class="social">
							<?foreach ($social as $vSocial):?>
								<a href="<?=$vSocial['URL'];?>" target="_blank" class="<?=$vSocial['CLASS'];?>">
									<img src="<?=$vSocial['ICON_FOOTER'];?>" alt="">
								</a>
							<?endforeach;?>
                        </div>
                    </div>
                    <div class="col-md-8 footer-right">
                        <div class="footer-content">
                            <div class="row">
                                <div class="col-8 pr-0">
                                    <div class="footer-content-block">
                                        <p class="footer-content-block__title"><?=GetMessage("T_INFORMATION")?></p>
                                        <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"r52_bottommenu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "bottom",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "Y",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "bottom",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "r52_bottommenu"
	),
	false
);?>
                                    </div>
                                </div>
                                <div class="col-4 p-0">
                                    <div class="footer-content-block">
                                        <p class="footer-content-block__title"><?=GetMessage("T_CONTACTS")?></p>
                                        <div class="footer-contacts">
                                            <div class="footer-contacts-block">
                                                <p class="footer-contacts-block__name"><?=GetMessage("T_ADDRESS")?></p>
                                                <span class="footer-contacts-block__text">
												<?=COption::GetOptionString('r52.corp', "ADDRESS" . SITE_ID)?></span>
                                            </div>
                                            <div class="footer-contacts-block">
                                                <p class="footer-contacts-block__name"><?=GetMessage("T_PHONE")?></p>
                                                <span class="footer-contacts-block__text">
												<a href="tel:<?=tel(COption::GetOptionString('r52.corp', "PHONE" . SITE_ID))?>"><?=COption::GetOptionString('r52.corp', "PHONE" . SITE_ID)?></a></span>
                                            </div>
                                            <div class="footer-contacts-block">
                                                <p class="footer-contacts-block__name"><?=GetMessage("T_EMAIL")?></p>
                                                <span class="footer-contacts-block__text">
												<a href="mailto:<?=COption::GetOptionString('r52.corp', "MAIL" . SITE_ID)?>"><?=COption::GetOptionString('r52.corp', "MAIL" . SITE_ID)?></a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copy">
                    <p class="footer__text"><?=COption::GetOptionString('unohome.store', "COPYRIGHT" . SITE_ID)?></p>
                </div>
            </div>
        </footer>
        <a href="#" id="up">
            <img src="<?=SITE_TEMPLATE_PATH?>/img/arrow_right_main_slider.svg" class="img-svg" alt="">
        </a>
        <div class="wrapper-shadow"></div>
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => SITE_DIR."include/form/ask_question.php"
			)
		);?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => SITE_DIR."include/form/contact_us.php"
			)
		);?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => SITE_DIR."include/form/order_call.php"
			)
		);?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => SITE_DIR."include/form/form_review.php"
			)
		);?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => SITE_DIR."include/form/form_catalog.php"
			)
		);?>
        <div class="successful-sending">
            <div class="close-modal">
                <a href="#">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/close_modal.png" alt="">
                </a>
            </div>
            <div class="successful-sending-content">
                <div class="successful-sending-content__image">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/icon_send_success.png" alt="">
                </div>
                <p class="successful-sending-content__title"><?=GetMessage("T_MESS_THANK")?></p>
            </div>
		</div>
		<div class="error-sending">
            <div class="close-modal">
                <a href="#">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/close_modal.png" alt="">
                </a>
            </div>
            <div class="error-sending-content">
                <p class="error-sending-content__title"><?=GetMessage("T_MESS_ERROR")?></p>
            </div>
        </div>
    </div>
	<?
	$APPLICATION->AddHeadScript("https://polyfill.io/v3/polyfill.min.js?features=Array.from%2Ces5%2Ces6%2CSymbol%2CSymbol.iterator%2CDOMTokenList%2CObject.assign%2CCustomEvent%2CElement.prototype.classList%2CElement.prototype.closest%2CElement.prototype.dataset%2CArray.prototype.find%2CArray.prototype.includes" );
	$APPLICATION->AddHeadScript("https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js" );
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/main.js" );
	?>
	<?=COption::GetOptionString('r52.corp', "YA_COUNTER" . SITE_ID)?>
	<?=COption::GetOptionString('r52.corp', "GOOGLE_COUNTER" . SITE_ID)?>
</body>
</html>