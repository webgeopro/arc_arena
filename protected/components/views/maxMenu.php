<?if ($innerMenu):$bool=true;?>
<ul id="ulSubMenu">
<?foreach ($menu as $m):
    if (!$bool) echo '<li>|</li>';
    else $bool=false;?>

    <li>
        <a href="/<?=$m['label']?>" name="<?=$m['label']?>">
            <?=$m['name']?>
        </a>
    </li>

<?endforeach;?>
</ul>
<?else: //Вывод основного меню?>
<ul id="ulMenu">
<?foreach ($menu as $m):?>
    <li>
        <?if ( $m['label'] == $pageLabel ):?>
        <a href="/<?=$m['label']?>" name="<?=$m['label']?>" class="active">
            <img src="/images/<?=$m['label']?>_i.png" alt="<?=$m['name']?>">
        <?else:?>
        <a href="/<?=$m['label']?>" name="<?=$m['label']?>">
            <img src="/images/<?=$m['label']?>.png" alt="<?=$m['name']?>">
        <?endif;?>
        </a>
    </li>
<?endforeach;?>
</ul>
<?endif?>
