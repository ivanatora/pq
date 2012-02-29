<? echo '<?xml version="1.0" encoding="UTF-8" ?>' ?>

<rss version="2.0" >  
    <channel>  
        <title><?= $sFeedName; ?></title>
        <description><?= $sChannelDescription; ?></description>
        <link><?= $sFeedUrl; ?></link>
        <? foreach ($aItems as $aItem): ?>
        <item>
            <title><?= $aItem['sTitle']; ?></title>
            <description><?= $aItem['sDescription']; ?></description>
            <link><?= $aItem['sLink']; ?></link>
        </item>
        <? endforeach; ?>
    </channel>
</rss>  