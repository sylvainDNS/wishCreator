<<<<<<< HEAD
<?php
	error_reporting(E_ALL & ~E_NOTICE);

    require_once("CAS-1.3.4/CAS.php");

    $confCas = array(
        'host' => "cas-ha.univ-nantes.fr",
        'port' => 443,
        'url' => "/esup-cas-server/"
    );

    phpCAS::client(CAS_VERSION_2_0, $confCas['host'], $confCas['port'], $confCas['url']);

    //configuration du proxy étudiant pour le cas des projets
    // phpCAS::setExtraCurlOption(CURLOPT_PROXYTYPE, 'URLPROXY_HTTP');
    // phpCAS::setExtraCurlOption(CURLOPT_RETURNTRANSFER, TRUE);
    // phpCAS::setExtraCurlOption(CURLOPT_PROXY, 'proxyetu.iut-nantes.univ-nantes.prive:3128');

    phpCAS::setNoCasServerValidation();

    echo "...";
    phpCAS::logoutWithRedirectService("http://infoweb.iut-nantes.univ-nantes.prive/~carte-voeux/");
    echo "done";
=======
<?php
    require_once("CAS-1.3.4/CAS.php");

    $confCas = array(
        'host' => "cas-ha.univ-nantes.fr",
        'port' => 443,
        'url' => "/esup-cas-server/"
    );

    phpCAS::client(CAS_VERSION_2_0, $confCas['host'], $confCas['port'], $confCas['url']);

    //configuration du proxy étudiant pour le cas des projets
    // phpCAS::setExtraCurlOption(CURLOPT_PROXYTYPE, 'URLPROXY_HTTP');
    // phpCAS::setExtraCurlOption(CURLOPT_RETURNTRANSFER, TRUE);
    // phpCAS::setExtraCurlOption(CURLOPT_PROXY, 'proxyetu.iut-nantes.univ-nantes.prive:3128');

    phpCAS::setNoCasServerValidation();

    echo "...";
    phpCAS::logoutWithRedirectService("http://infoweb.iut-nantes.univ-nantes.prive/~carte-voeux/");
    echo "done";
>>>>>>> e1c0585d2172ac002ab38a0597d42ac94024a827
