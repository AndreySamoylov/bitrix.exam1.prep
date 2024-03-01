<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if (!empty($arResult)) {?>
    <?if (!function_exists('exam1TopMenu')) {
        function exam1TopMenu (&$items, $lvl = 1, &$n = 0) {
            $item = current($items);
            $nextItem = next($items);
            $n++;
            if ($nextItem && $nextItem['DEPTH_LEVEL'] > $lvl) {
                ?>
                <li>
                    <a href="<?=$item['LINK']?>"> <?=trim($item['TEXT'])?> </a>
                    <ul>
                        <div class="menu-text"> <?=trim($item['TEXT'])?> </div>
                        <?while(true) { ?>
                            <?
                            $nextItem = exam1TopMenu($items, $lvl+1, $n);
                            if (!$nextItem || $nextItem['DEPTH_LEVEL'] < $lvl+1) {
                                break;
                            }
                            ?>
                        <? } ?>
                    </ul>
                </li>
                <?
            }
            else {
                ?>
                <? if ($lvl > 1 && $nextItem && $nextItem['DEPTH_LEVEL'] > $lvl) { ?>
                    <li>
                        <a href="<?=$item['LINK']?>"><?=trim($item['TEXT'])?></a>
                        <ul>
                            <div class="menu-text"><?=trim($item['TEXT'])?></div>
                            <?while(true) { ?>
                                <?
                                $nextItem = exam1TopMenu($items, $lvl+1, $n);
                                if (!$nextItem || $nextItem['DEPTH_LEVEL'] < $lvl+1) {
                                    break;
                                }
                                ?>
                            <? } ?>
                        </ul>
                    </li>
                <? } elseif($lvl > 1) { ?>
                    <li>
                        <a href="<?=$item['LINK']?>"><?=trim($item['TEXT'])?></a>
                    </li>
                <? } else { ?>
                    <li class="<? echo (!empty($item['PARAMS']['li_class']) ? $item['PARAMS']['li_class'] : '') ?>">
                        <a href="<?=$item['LINK']?>"> <?=trim($item['TEXT'])?> </a>
                    </li>
                <? } ?>
                <?
            }

            return $nextItem;
        }
        ?>
    <? } ?>
    <div class="menu-block popup-wrap">
        <a href="" class="btn-menu btn-toggle"></a>
        <div class="menu popup-block">
            <ul class="">
            <?
            while (true){
                if(! exam1TopMenu($arResult)){
                    break;
                }
            }
            ?>
            </ul>
            <a href="" class="btn-close"></a>
        </div>
        <div class="menu-overlay"></div>
    </div>
<? } ?>
