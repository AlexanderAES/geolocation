<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Contracts\GeolocationServiceInterface;

class GeolocationService implements GeolocationServiceInterface
{
    public function geoLocationAddress($apiKey, $geocode, $lang, $kind, $rspn, $results)
    {
        $client = new Client([
            'verify' => false, // Отключение проверки SSL
        ]);

        $response = $client->get("https://geocode-maps.yandex.ru/1.x?apikey=$apiKey&geocode=$geocode&lang=$lang&kind=$kind&rspn=$rspn&results=$results&format=json");

        $obj = json_decode($response->getBody()->getContents(), true);

        $coordinates = str_replace(" ", ",", $obj['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['Point']['pos']);

        $district = $this->getKind($apiKey, $coordinates, 'district');
        $metroArr = $this->getKind($apiKey, $coordinates, 'metro');

        $result = [];

        $localityName = $obj['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['metaDataProperty']['GeocoderMetaData']['Address']['Components'][3]['name'];

        if ($localityName === "Москва") {
            $result["city"] = $localityName;
            $result["address"] = $obj['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['name'];
            $result["district"] = $this->reverseGeoCoding($district);
            $result["metro"] = $this->reverseGeoCoding($metroArr);
        }

        return $result;


    }

    public function reverseGeoCoding($parameters): array
    {
        $response = file_get_contents('https://geocode-maps.yandex.ru/1.x/?' . http_build_query($parameters));
        $obj = json_decode($response, true);

        $metroNames = [];

        foreach ($obj['response']['GeoObjectCollection']['featureMember'] as $feature) {
            $name = $feature['GeoObject']['name']; // получаем имя
            $metroNames[] = $name; // добавляем в список
        }

        return $metroNames;
    }

    /**
     * @param $apiKey
     * @param array|string $coordinates
     * @param $kindValue
     * @return array
     */
    public function getKind($apiKey, array|string $coordinates, $kindValue): array
    {
        $parameters = array(
            'apikey' => $apiKey,
            'geocode' => $coordinates,
            'kind' => $kindValue,
            'format' => 'json'
        );
        return $parameters;
    }

}
