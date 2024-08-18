<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="article-card">
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<div class="article-card__title"><?=$arResult["NAME"]?></div>
	<?endif;?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<div class="article-card__date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div>
	<?endif;?>
	<div class="article-card__content">
		<div class="article-card__image sticky">
			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
			<img 
                src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" 
				data-object-fit="cover"  
				width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" 
				height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" 
				alt="<?=$arResult["NAME"]?>"  
				title="<?=$arResult["NAME"]?>"/>
            <?endif?>
        </div>
        <div class="article-card__text">
        	<div class="block-content" data-anim="anim-3">
        		<p><?echo $arResult["DETAIL_TEXT"];?></p>
        	</div>
			<a class="article-card__button" href="<?=$_SERVER['HTTP_REFERER']?>">Назад к новостям</a>
        </div>
	</div>
</div>