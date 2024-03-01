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

$img = SITE_TEMPLATE_PATH .  '/img/rew/no_photo.jpg';

if(isset($arResult['DETAIL_PICTURE']['SRC'])){
    $img = $arResult['DETAIL_PICTURE']['SRC'];
}
?>
<div class="review-block">
    <div class="review-text">
        <div class="review-text-cont">
            <?=$arResult['DETAIL_TEXT']?>
        </div>
        <div class="review-autor">
            <?=$arResult['NAME']?>, <?=$arResult['ACTIVE_FROM']?>, <?=$arResult['PROPERTIES']['POSITION']['VALUE']?>, <?=$arResult['PROPERTIES']['COMPANY']['VALUE']?>.
        </div>
    </div>
    <? if(!empty($img)) { ?>
        <div style="clear: both;" class="review-img-wrap">
            <img src="<?=$img?>" alt="img">
        </div>
    <? } ?>
</div>
<? if(!empty($arResult['PROPERTIES']['DOCUMENTS']['VALUE'])) { ?>
    <div class="exam-review-doc">
        <p> <?=GetMessage('DOCUMENTS')?> </p>
        <? foreach ($arResult['PROPERTIES']['DOCUMENTS']['VALUE'] as $fileID) { ?>
            <?php
            $arFile = CFile::GetFileArray($fileID);
            ?>
            <div  class="exam-review-item-doc">
                <img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH?>/img/icons/pdf_ico_40.png">
                <a href="<?=$arFile['SRC']?>"><?=$arFile['ORIGINAL_NAME']?></a>
            </div>
        <? } ?>
    </div>
<? } ?>
<hr>
<a href="<?=$arResult['IBLOCK']['LIST_PAGE_URL']?>" class="review-block_back_link"> <?=GetMessage('RETURN_TO_LIST')?></a>
