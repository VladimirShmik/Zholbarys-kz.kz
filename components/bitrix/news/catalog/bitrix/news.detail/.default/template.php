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


<div class="background-2 pt-5">

<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
<?$THUMB = CFile::ResizeImageGET($arResult["DETAIL_PICTURE"]["ID"], Array('width'=>250, 'height'=>250), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);?>
<div class="col-md-5 col-lg-5 col-sm-12 col-12">
	<div class="img_cont">
	  <a href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" data-fancybox><img src="<?=$THUMB["src"];?>" alt="<?=$arResult["NAME"]?>" class="item__img"></a>
	</div>
  </div>
<?endif?>

  <div class="<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>col-md-7<?else:?>col-md-12<?endif;?>">
	<div class="item__container">
	  <!--<h4 class="item__head"></h4>-->
	  
	  <? if ($arResult["DISPLAY_PROPERTIES"]["MANUFACTURE"]["VALUE"]):?>
	<div class="item__id">
<b>Производитель</b>: <?echo $arResult["DISPLAY_PROPERTIES"]["MANUFACTURE"]["DISPLAY_VALUE"];?>
	</div>
<?endif;?>
  
	  <p class="item__p"><?echo $arResult["PREVIEW_TEXT"];?></p>
	  <!--<div class="item__price"></div>-->
	  <a href="#order" data-fancybox class="item__link">Оставить заявку</a>
	</div>
  </div>
	<div class="col-12 pt-5">
	
	
<div class="tabs">

	<ul class="tabs__caption">
		<li class="active">Описание</li>
		
		<? if ($arResult["DISPLAY_PROPERTIES"]["TEXT"]["VALUE"]):?>
		<li>Характеристики</li>
		<?endif;?>
			<? if ($arResult["DISPLAY_PROPERTIES"]["FILE"]):?>
					<li>
						<?=$arResult["DISPLAY_PROPERTIES"]["FILE"]["NAME"];?>
					</li>
					<?endif;?>		

	</ul>

	<div class="tabs__content  active">
<?echo $arResult["DETAIL_TEXT"];?>
	</div>
	
	
<? if ($arResult["DISPLAY_PROPERTIES"]["TEXT"]["VALUE"]):?>
	<div class="tabs__content">
<?echo $arResult["DISPLAY_PROPERTIES"]["TEXT"]["DISPLAY_VALUE"];?>
	</div>
<?endif;?>


<? if ($arResult["DISPLAY_PROPERTIES"]["FILE"]):?>
<div class="tabs__content">
<i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?=$arResult["DISPLAY_PROPERTIES"]["FILE"]["DISPLAY_VALUE"];?>
</div><!-- /.panel -->
<?endif;?>




</div><!-- .tabs -->

	  
	</div>
  </div>
<script>
(function($) {
$(function() {

	$('ul.tabs__caption').on('click', 'li:not(.active)', function() {
		$(this)
			.addClass('active').siblings().removeClass('active')
			.closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
	});

});
})(jQuery);
</script>





                        <div  id="order" class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="text-center py-2">
                                    <h3><i class="fa fa-envelope"></i> Форма заказа</h3>
                                    <p class="m-0"><?=$arResult["NAME"];?></p>
									
                                </div>
                            </div>
                            <div class="card-body p-3">

<form name="sentMessage" id="contactForm" >
 <input type="hidden" name="item" value="<?=$arResult["NAME"];?>">
  <div class="form-group">
    <label for="name">Ваше имя <span class="red">*</span></label>
    <input type="text" class="form-control"  name="name" placeholder="Ваше имя" required data-validation-required-message="Введите ваше имя">
	<p class="help-block text-danger"></p>
  </div>

  <div class="form-group">
    <label for="email">Ваш email </label>
    <input type="email" class="form-control" name="email"  placeholder="Ваш email">
	<p class="help-block text-danger"></p>
  </div>
  
  <div class="form-group">
    <label for="phone">Ваш телефон <span class="red">*</span></label>
    <input type="text" class="form-control" name="phone" placeholder="Ваш телефон" required data-validation-required-message="Введите ваш телефон">
	<p class="help-block text-danger"></p>
  </div>

  <div class="form-group">
    <label for="city">Город</label>
    <input type="text" class="form-control"  name="city" placeholder="Город">
	<p class="help-block text-danger"></p>
  </div>
  
  
  <div class="form-group">
    <label for="message">Комментарий к заказу</label>
	<textarea class="form-control" name="message" cols="40" rows="5"></textarea>
	<p class="help-block text-danger"></p>
  </div>
  
  
  
  <div class="result"></div>
 
  <div id="success"></div>


<button type="submit" id="submit" class="btn btn-primary">ОТПРАВИТЬ</button>

</form>
								 
								 
								 
                            </div>

                        </div>
						
						