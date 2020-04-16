<?$xml = simplexml_load_file($base.'/uploads/events.xml'); $eventCnt=0;?>
<div id="indexContent">
<h2>Спортивные события на «АРЕНЕ.СЕВЕР» ( <?=$xml['date']?> )</h2>
<table style="width:100%;">
<?foreach ($xml as $month):?>
    <tr>
        <td colspan="4" style="background-color:#bbccdc;"><h2><?=$month['id']?></h2></td>
    </tr>
    <?foreach ($month as $event): $eventCnt++;?>
        <tr>
            <?if ($event->name['link']):?>
                <td><a href="/event/<?=$event->name['link']?>" >
                    <?=$event->name?>
                </a></td>
            <?else:?>
                <td><?=$event->name?></td>
            <?endif;?>
            <td><?=$event->date?></td>
            <td><?=$event->begining?></td>
            <td><?=$event->place?></td>
        </tr>
    <?endforeach;?>
<?endforeach;?>
</table>
</div>
