<?php

interface myServiceInterface {

    function GroupCountriesByContinent($request, $response, $args);
    function GetCountriesByContinentName($request, $response, $args);
    function GetCountriesBySubregionName($request, $response, $args);
    function GetCountriesByCapitalName($request, $response, $args);
    function GetCountriesByLanguageName($request, $response, $args);
}