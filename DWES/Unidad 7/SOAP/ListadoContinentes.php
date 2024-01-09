<?php

$continentes = [];

$client = new SoapClient("http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL");

$continentes = $client->ListOfContinentsByName();
var_dump($continentes);
$continentes = $continentes->ListOfContinentsByNameResult->tContinent;

//for ($i=0; $i < count($continentes->ListOfCountryNamesByNameResult->tCountryCodeAndName); $i++) { 
//    echo $continentes->ListOfCountryNamesByNameResult->tCountryCodeAndName[$i]->sName."<br>";
//}

foreach ($continentes as $continente) {
    echo('<a href="'.$continente->sCode.'">'.$continente->sName.'</a>');
}
?>