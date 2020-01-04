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

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
	'LIST' => array(
		'CONT' => 'bx_sitemap',
		'TITLE' => 'bx_sitemap_title',
		'LIST' => 'catalog-section-list-list',
	),
	'LINE' => array(
		'TITLE' => 'catalog-section-list-item-title',
		'LIST' =>  'catalog-section-list-line-list mb-4',
		'EMPTY_IMG' => $this->GetFolder().'/images/line-empty.png'
	),
	'TEXT' => array(
		'TITLE' => 'catalog-section-list-item-title',
		'LIST' =>  'catalog-section-list-text-list mb-4'
	),
	'TILE' => array(
		'TITLE' => 'catalog-section-list-item-title',
		'LIST' =>  'catalog-section-list-tile-list row mb-4',
		'EMPTY_IMG' => $this->GetFolder().'/images/tile-empty.png'
	)
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>
  <div class="background-2">
		<? 
		if (0 < $arResult["SECTIONS_COUNT"])
		{
		?>
		
		<?

			switch ($arParams['VIEW_MODE'])
			{
				
					
				case 'LIST':
					$intCurrentDepth = 1;
					$boolFirst = true;
					
					foreach ($arResult['SECTIONS'] as &$arSection)
					{
						$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
						$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);


						if (false === $arSection['PICTURE'])
							$arSection['PICTURE'] = array(
								'SRC' => $arCurView['EMPTY_IMG'],
								'ALT' => (
									'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
									? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
									: $arSection["NAME"]
								),
								'TITLE' => (
									'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
									? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
									: $arSection["NAME"]
								)
							);
						?>
				
				

                                                 
                              
										
						
						         <div class="col-12 col-sm-12 col-lg-4 col-md-6">
                                 <div class="catalog__item" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
								 
								 <img src="<? echo $arSection['PICTURE']['SRC']; ?>" alt="<? echo $arSection["NAME"];?>" class="catalog__img" title="<? echo $arSection["NAME"];?>" />
								 
                                    <div class="text-container">
                                 
                                    <a href="<?=$arSection["SECTION_PAGE_URL"];?>" class="catalog__head"><? echo $arSection["NAME"];?></a>
									
									
                                           
								
                                          <ul class="catalog_list">
                                             
											 
											 
                                             
                                         
										 
										 <?
										$arFilter = array(		
    'ACTIVE' => 'Y',
    'IBLOCK_ID' => $arParams['IBLOCK_ID'],
    'GLOBAL_ACTIVE'=>'Y',
	'SECTION_ID'=>$arSection["ID"],
);
$arSelect = array('ID','NAME','DEPTH_LEVEL', 'SECTION_PAGE_URL');
$arOrder = array('DEPTH_LEVEL'=>'ASC','SORT'=>'ASC');
$rsSections = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect);
$sectionLinc = array();
$arResult['ROOT'] = array();
//$sectionLinc[0] = &$arResult['ROOT'];
while($arSection2 = $rsSections->GetNext()) {
    $sectionLinc[$arSection2['ID']] = $arSection2;
   // $sectionLinc[$arSection['ID']] = &$sectionLinc[intval($arSection['IBLOCK_SECTION_ID'])]['CHILD'][$arSection['ID']];
}

$i=0;
foreach ($sectionLinc as &$SubSec)
	{
		?>
	<li class="catalog_category "><a href="<? echo $SubSec["SECTION_PAGE_URL"]; ?>" class="catalog__link"><? echo $SubSec["NAME"];?></a></li>
		<?
		if (++$i == 4) break;
	}
	
?>										
<? if (!empty($sectionLinc)):?>
<li class="catalog_category_all"><a href="<?=$arSection["SECTION_PAGE_URL"];?>" class="catalog__link">Смотреть все</a></li>
<?endif;?>
                                          </ul>
                                       </div>
                                    </div>
                               
                              </div>
					
							  
						<?
unset($sectionLinc);


						
					}
					unset($arSection);
					
				
					break;
			}
			
		}
		?>
</div>