<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
die();
?>
<!DOCTYPE html>
<html>
<head>
<? $currentPage = $APPLICATION->GetCurPage();
 $is_main_page = $APPLICATION->getCurPage(false) == SITE_DIR;
 $cur_dir = ltrim($APPLICATION->GetCurDir(), SITE_DIR);
 ?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<?$APPLICATION->ShowHead();?>
<title><?$APPLICATION->ShowTitle();?></title>
<link rel="shortcut icon" type="image/x-icon" href="/local/templates/zholbarys/img/favicon.png" /> 	
<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&display=swap&subset=cyrillic" rel="stylesheet">
  <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/bootstrap.min.css"); ?>
  <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/fonts.css"); ?>
<? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/style.css"); ?>
<? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/jquery.fancybox.min.css"); ?>

</head>
<body>
<div id="panel">
	<?$APPLICATION->ShowPanel();?>
</div>

 <header>


    <div class="container">
	<div class="row">
	    <div class="d-block d-lg-none">
                <div class="nav__social">
                  <span class="nav__phone">
                    <a href="tel:+7(7213)73-25-52" class="nav__phone-link"><img src="<?=SITE_TEMPLATE_PATH;?>/img/phone.png" alt="">
                      <span>
					  <?$APPLICATION->IncludeComponent(
                           "bitrix:main.include",
                           "",
                           Array(
                           	"AREA_FILE_SHOW" => "file",
                           	"AREA_FILE_SUFFIX" => "inc",
                           	"EDIT_TEMPLATE" => "",
                           	"PATH" => SITE_TEMPLATE_PATH."/include/phones.php"
                           )
                           );?>
						   
					  </span>
                    </a>
                  </span>
				  
				  
				        <span class="nav__phone">
                    <a href="tel:+77757323067" class="nav__phone-link"><img src="<?=SITE_TEMPLATE_PATH;?>/img/phone.png" alt="">
                      <span>
					 +7-775-732-30-67
						   
					  </span>
					  
                    </a>
                  </span>
				  
				  
                  <span class="nav__facebook">
                    <a href="#"><img src="<?=SITE_TEMPLATE_PATH;?>/img/facebook.png" alt="">
                      <span></span>
                    </a>
                  </span>
                  <span class="nav__inst">
                    <a href="#"><img src="<?=SITE_TEMPLATE_PATH;?>/img/inst.png" alt="">
                      <span></span>
                    </a>
                  </span>
                </div>
              </div>
			  </div>
      <div class="row">
        <div class="col-sm-12 col-md-12 col-12">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/"> <img src="<?=SITE_TEMPLATE_PATH;?>/img/logo.png" alt="" class="navbar-img"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="row w-100">
              <div class="col-12 d-none d-lg-block">
                <div class="nav__social">
                  <span class="nav__phone">
                    <a href="tel:+7(7213)73-25-52" class="nav__phone-link"><img src="<?=SITE_TEMPLATE_PATH;?>/img/phone.png" alt="">
                      <span>
					  <?$APPLICATION->IncludeComponent(
                           "bitrix:main.include",
                           "",
                           Array(
                           	"AREA_FILE_SHOW" => "file",
                           	"AREA_FILE_SUFFIX" => "inc",
                           	"EDIT_TEMPLATE" => "",
                           	"PATH" => SITE_TEMPLATE_PATH."/include/phones.php"
                           )
                           );?>
						   
					  </span>
					  <b>(Оксана)</b>
                    </a>
                  </span>
				  
				    <span class="nav__phone">
                    <a href="tel:+77757323067" class="nav__phone-link"><img src="<?=SITE_TEMPLATE_PATH;?>/img/phone.png" alt="">
                      <span>
					+7-775-732-30-67
						   
					  </span>
					  <b>(Кристина)</b>
                    </a>
                  </span>
				  
				  
                  <span class="nav__facebook">
                    <a href="#"><img src="<?=SITE_TEMPLATE_PATH;?>/img/facebook.png" alt="">
                      <span></span>
                    </a>
                  </span>
                  <span class="nav__inst">
                    <a href="#"><img src="<?=SITE_TEMPLATE_PATH;?>/img/inst.png" alt="">
                      <span></span>
                    </a>
                  </span>
                </div>
              </div>
              <div class="col-12">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
				
				 <?$APPLICATION->IncludeComponent(
               "bitrix:menu", 
               "topmenu", 
               array(
               	"ALLOW_MULTI_SELECT" => "N",
               	"CHILD_MENU_TYPE" => "left",
               	"COMPONENT_TEMPLATE" => "topmenu",
               	"DELAY" => "N",
               	"MAX_LEVEL" => "2",
               	"MENU_CACHE_GET_VARS" => array(
               	),
               	"MENU_CACHE_TIME" => "360000",
               	"MENU_CACHE_TYPE" => "Y",
               	"MENU_CACHE_USE_GROUPS" => "Y",
               	"ROOT_MENU_TYPE" => "top",
               	"USE_EXT" => "Y",
               	"MENU_THEME" => "site"
               ),
               false
               );?>
                
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </header>
  
  

		<?$APPLICATION->IncludeComponent("bitrix:news.list", "slider", Array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
		"DISPLAY_DATE" => "N",	// Выводить дату элемента
		"DISPLAY_NAME" => "Y",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "2",	// Код информационного блока
		"IBLOCK_TYPE" => "info",	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "8",	// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Новости",	// Название категорий
		"PARENT_SECTION" => "",	// ID раздела
		"PARENT_SECTION_CODE" => "",	// Код раздела
		"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE" => array(	// Свойства
			0 => "LINK",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
	),
	false
);?>

<main>
    <div class="container-fluid background">
        <? if ($is_main_page):?>
		<div class="container">
          <div class="row ">
              <div class="col-12">
			  
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"catalog", 
	array(
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "info",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_ID" => "",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "1",
		"VIEW_MODE" => "LINE",
		"COMPONENT_TEMPLATE" => "catalog"
	),
	false
);?>

          </div>
        </div>
      </div>
	  <?endif;?>
	  
        <div class="container">
<? if (!$is_main_page):?>		
<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"",
	Array(
		"PATH" => "",
		"SITE_ID" => "s1",
		"START_FROM" => "0"
	)
);?>
<?endif;?>

<? if ($is_main_page):?>
 <h3 class="head__title"><?$APPLICATION->ShowTitle(false)?></h3>
 <?else:?>
 <h1 class="head__title"><?$APPLICATION->ShowTitle(false)?></h1>
 <?endif;?>
	  <div class="row <? if (!$is_main_page):?>	mb-5<?endif;?>">
		  <div class="col-md-12">
		 
	<? if (!$is_main_page):?>
	 <?
 $class="";

	 $ar_res=explode("/",$currentPage);
   //$end_element = array_pop($ar_res);
   
   if ($ar_res[1]<>'catalog') {
        
      $class="content";

   } else {

	 $class="";
   }
 
 ?>
 <div class="<?=$class;?>">
 <?endif;?>