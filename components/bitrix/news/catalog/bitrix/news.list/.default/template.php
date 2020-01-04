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


<?
if (!$arResult["ITEMS"]):?>

<div class="col-md-12">
<div class="pt-3 pb-3">
<p style="width:100%;" class="alert alert-danger">Раздел находится в разработке. <a href="javascript:history.back()">Вернуться назад</a></p>
</div>
</div>
<?else:?>

<?
$end = array_pop($arResult['SECTION']['PATH']);?>
<? if ($end['RIGHT_MARGIN']-$end['LEFT_MARGIN']==1):?>
<div class="col-md-12 col-sm-12 col-lg-12">
<?else:?>
<div class="col-md-12 col-sm-12 col-lg-9">
<?endif;?>
<div class="row">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<?$THUMB = CFile::ResizeImageGET($arItem["PREVIEW_PICTURE"]["ID"], Array('width'=>200, 'height'=>160), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);?>

<? if ($end['RIGHT_MARGIN']-$end['LEFT_MARGIN']==1):?>
<div class="col-md-6 col-sm-12 col-lg-3">
<?else:?>
<div class="col-md-6 col-sm-12 col-lg-4">
<?endif;?>

<div class="product__item_catalog" >
<div class="product__position" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
<div class="product__img">
  <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$THUMB['src'];?>" alt="<?echo $arItem["NAME"]?>" /></a>
</div>
<? if ($arItem["DISPLAY_PROPERTIES"]["NEW"]["VALUE_XML_ID"]=='Y'):?>
<div class="product__price">
 <span>Новинка</span>
</div>
<?endif;?>
</div>
<h4 class="product__title"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h4>

<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
<div class="product__text"><?echo $arItem["PREVIEW_TEXT"];?></div>
<?endif;?>
<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>#order" class="product__link">Оставить заявку</a>
</div>
</div>
<?endforeach;?>
</div>
</div>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
<?endif;?>