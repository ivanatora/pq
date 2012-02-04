<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>PhotoQuest - today's topic: <?= $sTodayQuest; ?></title>
    <meta name="keywords" content="photoquest" />
    <meta name="description" content="A photo shooting game!" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    
    <link rel="alternate" type="application/rss+xml" title="RSS feed for quests" href="/index.php?type=rss&amp;module=rss&amp;action=viewQuests" />
    <link rel="alternate" type="application/rss+xml" title="RSS feed for new photos" href="/index.php?type=rss&amp;module=rss&amp;action=viewPhotos" />
    
    <link href="/media/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/media/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="/media/css/fileuploader.css" rel="stylesheet" type="text/css" />
    <script>
        // setting some constants

        var iUserId = <?= $iMemberId; ?>;
        var sUsername = '<? if ($iMemberId != 0) echo $oMember->u_username; ?>';
    </script>
    <script type="text/javascript" src="/media/js/jquery-1.6.2.js"></script>
    <script type="text/javascript" src="/media/js/json2.js"></script>
    <script type="text/javascript" src="/media/js/fileuploader.js"></script>
    <script type="text/javascript" src="/media/js/functions.js"></script>
    <script type="text/javascript" src="/media/js/sprintf.js"></script>
    <script type="text/javascript" src="/media/js/scripts.js"></script>
</head>
<body>
<!--
<div id="fb-root"></div>
<script type="text/javascript" src="/media/js/facebook_init.js"></script>
-->
    <div id="header">
        <a href="#"><img id="logo" src="/media/images/logo.gif" alt="" /></a>
        <div id="menu">
            <ul>
                <li><a href="/">Home</a></li>
                <li>|<a href="/faq">FAQ</a></li>
                <? if ($iMemberId == 0): ?>
                    <li>|<a href="/member/login">Login</a></li>
                    <li>|<a href="/member/register">Register</a></li>
                <? else: ?>
                    <li>|<a href="/member/settings">Settings</a></li>
                    <li>|<a href="/member/logout">Logout</a></li>
                <? endif; ?>
            </ul>
        </div>

        <h1><a href="/">PhotoQuest</a></h1>
        <!--<p id="subtitle">A phun photography game!</p>-->
        <p id="subtitle">
                <?= date("d.m.Y"); ?>, letter: 
                <b><?= $sTodayLetter;?></b>
                , topic: "<?= $sTodayQuest;?>"
        </p>
        
        <? if ($iMemberId != 0): ?>
                <span id="greeting">Hello, <?= $oMember->u_username; ?></span>
        <? endif; ?>
        
        
        
        <? if (!empty($sTomorrowQuest)): ?>
        <span id="infoQuest">
            Tomorrow topic: <i><?= $sTomorrowQuest; ?></i>
        </span>
        <? endif; ?>
            
        <form id="search" method="get" action="#">
            <input type="text" class="text" value="Suggest topic" id="fldSuggestText"/>
            <input type="submit" class="submit" value="Suggest" id="btnSuggest"/>
        </form>
    </div><!-- header -->


<div id="main"><div id="main2">


        <div id="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="/do/quest/viewPreviousQuests">Previous quests</a></li>
                <li><a href="/do/user/viewListAllUsers">All users</a></li>
                <li><a href="/do/quest/viewUploadForm">Upload</a></li>
            </ul>

            <!--
            <h2>Integer rhoncus</h2>
            <div class="box">
                <p>Mauris sollicitudin tincidunt magna vitae semper. Curabitur ut pharetra quam. Integer rhoncus convallis urna vitae mattis. Sed pharetra massa ac metus fermentum et iaculis enim accumsan.</p>
            </div>

            <h2>Mauris sagittis</h2>
            <ul>
                <li><a href="#">Suspendisse faucibus purus</a></li>
                <li><a href="#">Tincidunt nec accumsan</a></li>
                <li><a href="#">Fusce laoreet, ligula et rhoncus</a></li>
                <li><a href="#">Adipiscing gravida pulvinar eget</a></li>
                <li><a href="#">Cras consectetur commodo</a></li>
            </ul>
            -->
        </div><!-- sidebar -->