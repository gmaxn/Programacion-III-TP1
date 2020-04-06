<?php
require __DIR__ . '/myServiceInterface.php';
use DI\Container;
use \Psr\Http\Message\RequestInterface;
use \Psr\Http\Message\ResponseInterface;

class myService implements myServiceInterface {

    public $myServiceRepository;

    public function __construct(myServiceRepositoryInterface $myServiceRepository)
    {
        $this->myServiceRepository = $myServiceRepository;
    }

    public function GroupCountriesByContinent($request, $response, $args) {

        $countries = $this->myServiceRepository->getAllCountries();
        
        $data = array();

        foreach($countries as $country)
        {
            $data[] = array(
                "name" => $country['name'],
                "region" => $country['region'],
                "subregion" => $country['subregion'],
                "capital" => $country['capital'],
                "languages" => array_column($country['languages'], 'name'),
            );
        }

        $byGroup = $this->group_by("region", $data);

        $response->getBody()->write(json_encode($byGroup));
        return $response;    
    }

    public function GetCountriesByContinentName($request, $response, $args) {

        if(isset($args['name']))
        {
            $countries = $this->myServiceRepository->getAllCountries();

            $countryName = str_replace('-', ' ', $args['name']);

            $data = array();
    
            foreach($countries as $country)
            {
                if($country['region'] == $countryName)
                {
                    $data[] = $country;
                }
            }

            if($data != null) {
    
                $response->getBody()->write(json_encode($data));
                return $response;
            }
        }

        $response->getBody()->write("<p>continent not found<p>");
        return $response;
    }

    public function GetCountriesBySubregionName($request, $response, $args) {

        if(isset($args['name']))
        {

            $countries = $this->myServiceRepository->getAllCountries();
            
            $data = array();

            $subregionName = str_replace('-', ' ', $args['name']);

            echo $subregionName;
    
            foreach($countries as $country)
            {
                if($country['subregion'] == $subregionName)
                {
                    $data[] = $country;
                }
            }

            if($data != null) {
    
                $response->getBody()->write(json_encode($data));
                return $response;
            }
        }

        $response->getBody()->write("<p>subregion not found<p>");
        return $response;
    }

    public function GetCountriesByCapitalName($request, $response, $args) {

        if(isset($args['name']))
        {

            $countries = $this->myServiceRepository->getAllCountries();
            
            $data = array();

            $capitalName = str_replace('-', ' ', $args['name']);

            echo $capitalName;
    
            foreach($countries as $country)
            {
                if($country['capital'] == $capitalName)
                {
                    $data[] = $country;
                }
            }

            if($data != null) {
    
                $response->getBody()->write(json_encode($data));
                return $response;
            }
        }

        $response->getBody()->write("<p>capital not found<p>");
        return $response;
    }

    public function GetCountriesByLanguageName($request, $response, $args) {

        if(isset($args['name']))
        {

            $countries = $this->myServiceRepository->getAllCountries();
            
            $data = array();

            $languageName = str_replace('-', ' ', $args['name']);

    
            foreach($countries as $country)
            {
                if(is_array($country['languages']))
                {

                    foreach($country['languages'] as $language)
                    {
                        if($language['name'] == $languageName)
                        {
                            $data[] = $country;
                        }
                    }
                }
            }

            if($data != null) {
    
                $response->getBody()->write(json_encode($data));
                return $response;
            }
        }

        $response->getBody()->write("<p>language not found<p>");
        return $response;
    }

    function group_by($key, $data) {
        $result = array();
    
        foreach($data as $val) {

            if(array_key_exists($key, $val)) {
                
                $result[$val[$key]][] = $val;

            } else {

                $result[""][] = $val;
            }
        }
    
        return $result;
    }
}