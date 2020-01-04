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
      <div class="col-md-12">
            <div class="flex-container-4">
              
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<?$THUMB = CFile::ResizeImageGET($arItem["PREVIEW_PICTURE"]["ID"], Array('width'=>150, 'height'=>220), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
<div class="sert-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
  <a href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" data-fancybox="cert"><img src="<?=$THUMB['src'];?>" alt="<?echo $arItem["NAME"]?>"></a>
</div>

<?endforeach;?>
</div>
</div>