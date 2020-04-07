<?php
require __DIR__ . '/myServiceInterface.php';
require __DIR__ . '/country.php';
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

            $data[] = $country;
        }

        $byGroup = $this->group_by("region", $data);

        $response->getBody()->write(json_encode($byGroup));
        return $response;    
    }

    public function GetCountriesByName($request, $response, $args) {

        if(isset($args['name']))
        {
            $countries = $this->myServiceRepository->getAllCountries();

            $countryName = str_replace('-', ' ', $args['name']);

            $data = array();
    
            foreach($countries as $country)
            {
                if($country['name'] == $countryName)
                {
                    $aux = new country();
                    $aux->name = $country['name'];
                    $aux->region = $country['region'];
                    $aux->subregion = $country['subregion'];
                    $aux->capital = $country['capital'];
                    $aux->languages = array_column($country['languages'], 'name');
                    $aux->data = $country;

                    $data[] = $aux;
                }
            }

            if($data != null) {
    
                $response->getBody()->write(json_encode($data));
                return $response;
            }
        }

        $response->getBody()->write("<p>country not found<p>");
        return $response;
    }

    public function GetCountriesByContinentName($request, $response, $args) {

        if(isset($args['name']))
        {
            $countries = $this->myServiceRepository->getAllCountries();

            $regionName = str_replace('-', ' ', $args['name']);

            $data = array();
    
            foreach($countries as $country)
            {
                if($country['region'] == $regionName)
                {
                    $aux = new country();
                    $aux->name = $country['name'];
                    $aux->region = $country['region'];
                    $aux->subregion = $country['subregion'];
                    $aux->capital = $country['capital'];
                    $aux->languages = array_column($country['languages'], 'name');
                    $aux->data = $country;

                    $data[] = $aux;
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
                    $aux = new country();
                    $aux->name = $country['name'];
                    $aux->region = $country['region'];
                    $aux->subregion = $country['subregion'];
                    $aux->capital = $country['capital'];
                    $aux->languages = array_column($country['languages'], 'name');
                    $aux->data = $country;

                    $data[] = $aux;
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
                    $aux = new country();
                    $aux->name = $country['name'];
                    $aux->region = $country['region'];
                    $aux->subregion = $country['subregion'];
                    $aux->capital = $country['capital'];
                    $aux->languages = array_column($country['languages'], 'name');
                    $aux->data = $country;

                    $data[] = $aux;
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
                            $aux = new country();
                            $aux->name = $country['name'];
                            $aux->region = $country['region'];
                            $aux->subregion = $country['subregion'];
                            $aux->capital = $country['capital'];
                            $aux->languages = array_column($country['languages'], 'name');
                            $aux->data = $country;
        
                            $data[] = $aux;
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