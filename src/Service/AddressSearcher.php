<?php

namespace App\Service;

use GuzzleHttp\Client;

class AddressSearcher
{

    public function getJsonAddress(string $search)
    {
      // Call ADRESSE API from GOUV.FR
      $client = new Client(['base_uri' => 'https://api-adresse.data.gouv.fr/']);
      $guzzleResponse = $client->request('GET', 'search', [
        'query' => [
          'q' => $search,
          'limit' => 50
        ]
      ]);


      // Check response code
      if ($guzzleResponse->getStatusCode() == 200) {
        $guzzleResponse = json_decode($guzzleResponse->getBody());

        foreach ($guzzleResponse->features as $feature) {
          $addresses[] = [
            'adresse' => $feature->properties->label,
            'ville' =>  strtoupper($feature->properties->city)
          ];
        }
      }
      else {
        $addresses['addresse'] = 'Communication error with API Adresse from gouv.fr';
      }

      return $addresses;
    }


}