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
<div id="slider" class="carousel slide" data-ride="carousel" data-interval="50000">
<div class="carousel-inner">
<?$i=0;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	
	  <div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="carousel-item <? if ($i==0):?>active<?endif;?>">
              <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="d-block w-100 img__slider" alt="<?echo $arItem["NAME"]?>">
			  <div class="container">
			  <div class="row">
              <div class="carousel-caption   сol-12">
                <!--<div class="d-none d-lg-block">  <img src="<?=SITE_TEMPLATE_PATH;?>/img/sliderimg.png" alt="" class="d-lg-block "></div>-->
                <h5 class="slider__h"><?echo $arItem["NAME"]?></h5>
        <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<p class="slider__p"><?echo $arItem["PREVIEW_TEXT"];?></p>
		<?endif;?>
		
                <a href="<?=$arItem["DISPLAY_PROPERTIES"]["LINK"]["DISPLAY_VALUE"]?>" class="slider__a">Перейти к каталогу</a>
              </div>
</div>
</div>

			
	<?$i++;?>
<?endforeach;?>

 <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
			
  </div>
  </div>