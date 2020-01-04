<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

  
<?if (!empty($arResult)):?>
    <ul class="navbar-nav ml-auto">
<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li class="<?if ($arItem["SELECTED"]):?>nav-item dropdown active<?else:?>nav-item dropdown<?endif?>"><a class="nav-link dropdown-toggle" href="<?=$arItem["LINK"]?>" id="topmenu><?=$arItem["ID"]?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span><?=$arItem["TEXT"]?></span></a>
				<ul class="dropdown-menu" aria-labelledby="topmenu><?=$arItem["ID"]?>">
		<?else:?>
			<li<?if ($arItem["SELECTED"]):?> class="active"<?endif?>><a href="<?=$arItem["LINK"]?>" class="dropdown-item"><span><?=$arItem["TEXT"]?></span></a>
				<ul>
		<?endif?>

	<?else:?> 

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="<?if ($arItem["SELECTED"]):?>nav-item active<?else:?>nav-item<?endif?>"><a class="nav-link" href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span></a></li>
			<?else:?>
				<li><a class="<?if ($arItem["SELECTED"]):?>active <?endif?>dropdown-item" href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="<?if ($arItem["SELECTED"]):?>nav-item active<?else:?>nav-item<?endif?>"><a class="nav-link" href="" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><span><?=$arItem["TEXT"]?></span></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><span><?=$arItem["TEXT"]?></span></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

    </ul>

 
<?endif?>