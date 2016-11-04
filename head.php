<head>
    <title>JoGoVEREIN</title>
    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

    <meta name="language" content="de"/>
    <meta name="keywords" content="JoGoVEREIN, Vereinsverwaltung, Vereinsprogramm, Vereinssoftware, Access, MySQL, Datenbank, SEPA, Lastschriftverfahren, Mitgliederverwaltung, Kassenbuch, Kassenf&uuml;hrung"/>
    <meta name="description" content="JoGoVEREIN das flexible Datenbankprogramm f&uuml;r Vereinsarbeit im Microsoft-Access und MySQL-Format."/>
    <meta name="robots" content="all"/>
    <meta name="page-topic" content="Vereinsverwaltung, Vereinsprogramm"/>
    <meta name="revisit-after" content="14 days"/>
    <meta name="author" content="Joachim G&ouml;ldenitz"/>
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="cache-control" content="no-store">

    <?php
    
    // set text domain to 'messages'
    $domain = 'messages';
    $folder = 'locale';

    $result = bindtextdomain($domain, $folder); 
    //echo 'new text domain is set: ' . $result . "<br>";

    $result = textdomain($domain);
    //echo 'current message domain is set: ' . $result . "<br>";

    bind_textdomain_codeset($domain, 'UTF-8');

    // I18N support
    $language = 'de_DE.utf8';
    
    // get the language set in the url
    if (isset($_GET['lang'])) $language = $_GET['lang'];
    
    $result = putenv("LANG=$language"); 
    if (!$result) exit('putenv failed');
    
    var_dump(setlocale(LC_ALL, $language));  
    $result = setlocale(LC_ALL, $language);
    //echo "locale: " . $result . "<br>";
    if (!$result) exit('setlocale failed: locale function is not available on this platform, or the given local does not exist in this environment');

    
    ?>
    
</head>