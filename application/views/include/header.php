<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>PhotoQuest - today's topic: <?= $sTodayQuest; ?></title>
    <meta name="keywords" content="photoquest" />
    <meta name="description" content="A photo shooting game!" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    
    <link rel="alternate" type="application/rss+xml" title="RSS feed for quests" href="/rss/quests" />
    <link rel="alternate" type="application/rss+xml" title="RSS feed for new photos" href="/rss/photos" />
    
    <link href="/media/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/media/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="/media/css/fileuploader.css" rel="stylesheet" type="text/css" />
    <link href="/media/css/jquery-ui.css" rel="stylesheet" type="text/css" />
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
    <script type="text/javascript" src="/media/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/media/js/dragslider.js"></script>
    <script type="text/javascript" src="/media/js/scripts.js"></script>
    
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-30381972-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
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


<? $this->load->view('include/sidebar'); ?>