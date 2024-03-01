<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)) { ?>
    <div class="menu-block popup-wrap">
        <a href="" class="btn-menu btn-toggle"></a>
        <div class="menu popup-block">
            <ul class="">
                <li class="main-page">
                    <a href="<?=SITE_DIR?>"> <?=GetMessage("MAIN")?></a>
                </li>
                <?
                $previousLevel = 0;
                foreach($arResult as $arItem) { ?>
                    <?
                    $classStyle = '';
                    if (!empty($arItem['PARAMS']['CLASS_STYLE'])){
                        $classStyle = $arItem['PARAMS']['CLASS_STYLE'];
                    }
                    ?>

                    <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel) { ?>
                        <?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
                    <? } ?>

                    <?if ($arItem["IS_PARENT"]) { ?>

                        <?if ($arItem["DEPTH_LEVEL"] == 1) { ?>
                            <li><a href="<?=$arItem["LINK"]?>" class="<?=$classStyle?> <?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
                            <ul>
                        <? } else { ?>
                            <li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
                            <ul>
                        <? }?>

                            <? if(!empty($arItem['PARAMS']['DESCRIPION'])) {  ?>
                                <div class="menu-text"> <?=$arItem['PARAMS']['DESCRIPION']?> </div>
                            <? } ?>
                    <? } else { ?>
                        <?if ($arItem["PERMISSION"] > "D") {?>
                            <?if ($arItem["DEPTH_LEVEL"] == 1) { ?>
                                <li><a href="<?=$arItem["LINK"]?>" class="<?=$classStyle?> <?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
                            <? } else { ?>
                                <li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                            <? } ?>
                        <? } else { ?>
                            <?if ($arItem["DEPTH_LEVEL"] == 1) { ?>
                                <li><a href="<?=$arItem["LINK"]?>" class="<?=$classStyle?> <?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
                            <? } else { ?>
                                <li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
                            <? } ?>
                        <? } ?>
                    <? } ?>

                    <?$previousLevel = $arItem["DEPTH_LEVEL"];?>
                <? } ?>
                </ul>
            <a href="" class="btn-close"></a>
            </div>
        <div class="menu-overlay"></div>
    </div>
<? } ?>