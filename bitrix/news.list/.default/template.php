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
<div id="barba-wrapper">
	<!-- Start News.list !-->
	<div class="article-section">
		<? if ($arResult["SECTIONS"]): ?>
			<? foreach ($arResult["SECTIONS"] as $sectItem): ?>
				<h4 class="article-section-title"><?=$sectItem["NAME"] ?></h4>
					<? if ($sectItem["ELEMENTS"]): ?>
						<div class="article-list">	
							<? foreach ($sectItem["ELEMENTS"] as $item): ?>	
							<?
							$this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
							?>
							<!-- Start Object of News.list !-->
							<a class="article-item article-list__item" href="<?=$item["DETAIL_PAGE_URL"]?>" data-anim="anim-3" id="<?=$this->GetEditAreaId($item['ID']);?>">
								<div class="article-item__background">
									<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($item["PREVIEW_PICTURE"])):?>
									<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($item["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
								<!-- Start Object's preview picture of News.list !-->
									<img
										class="preview_picture"
										border="0"
										src="<?=$item["PREVIEW_PICTURE"]["SRC"]?>"
										width="<?=$item["PREVIEW_PICTURE"]["WIDTH"]?>"
										height="<?=$item["PREVIEW_PICTURE"]["HEIGHT"]?>"
										alt="<?=$item["PREVIEW_PICTURE"]["ALT"]?>"
										title="<?=$item["PREVIEW_PICTURE"]["TITLE"]?>"
									/>
									<?else:?>
									<img
										class="preview_picture"
										border="0"
										src="<?=$item["PREVIEW_PICTURE"]["SRC"]?>"
										width="<?=$item["PREVIEW_PICTURE"]["WIDTH"]?>"
										height="<?=$item["PREVIEW_PICTURE"]["HEIGHT"]?>"
										alt="<?=$item["PREVIEW_PICTURE"]["ALT"]?>"
										title="<?=$item["PREVIEW_PICTURE"]["TITLE"]?>"
									/>
								<!-- End Object's preview picture of News.list !-->
									<?endif;?>
									<?endif;?>
								</div>
								<div class="article-item__wrapper">
									<?if($arParams["DISPLAY_NAME"]!="N" && $item["NAME"]):?>
									<div class="article-item__title"><?echo $item["NAME"]?></div>
									<?endif;?>

									<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $item["PREVIEW_TEXT"]):?>
								<!-- Start Object's description of News.list !-->
									<div class="article-item__content"><?echo $item["PREVIEW_TEXT"];?>
									<? endif; ?>
									</div>
							<!-- End Object's description of News.list !-->
								</div>
							</a>
							<? endforeach ?>
						</div>
					<? endif; ?>
			<?endforeach ?>
		<? endif; ?>

		<h4 class="article-section-title">Без раздела</h4>
			<div class="article-list">
				<? foreach ($arResult["ITEMS"] as $arItem): ?>
					<? if ($arItem["IBLOCK_SECTION_ID"] == NULL): ?>	
					<?
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
						<!-- Start Object of News.list !-->
						<a class="article-item article-list__item" href="<?=$arItem["DETAIL_PAGE_URL"]?>" data-anim="anim-3" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
							<div class="article-item__background">
								<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
								<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
								<!-- Start Object's preview picture of News.list !-->
								<img
									class="preview_picture"
									border="0"
									src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
									width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
									height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
									alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
									title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
								/>
								<?else:?>
								<img
									class="preview_picture"
									border="0"
									src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
									width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
									height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
									alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
									title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
								/>
								<!-- End Object's preview picture of News.list !-->
								<?endif;?>
								<?endif;?>
							</div>
							<div class="article-item__wrapper">
								<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
								<div class="article-item__title"><?echo $arItem["NAME"]?></div>
								<?endif;?>

								<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
								<!-- Start Object's description of News.list !-->
								<div class="article-item__content"><?echo $arItem["PREVIEW_TEXT"];?>
								<?endif;?>
								</div>
							<!-- End Object's description of News.list !-->
							</div>
						</a>
				<? endif ?>
			<? endforeach ?>	
			</div>
	</div>			
</div> 
<!-- End News.list !-->