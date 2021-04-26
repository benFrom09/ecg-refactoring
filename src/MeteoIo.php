<?php
declare(strict_types=1);
namespace Ecogolf\Core;
class MeteoIo
{
    protected $lat = 43.0236372;
    protected $long = 1.4659194;

    protected $api_key;

    const base_request = "https://api.darksky.net/forecast";

    protected $request;

    protected $data;

    public function __construct(float $lat = null,float $long = null,string $options = null,string $api_key = null) {
        $latitude = $lat ?? $this->lat;
        $longitude = $long ?? $this->long;
        $key = $api_key ?? $this->api_key;
        $_options = $options ?? "?units=auto&lang=fr";
        $this->request = self::base_request . "/" . $key . "/" . $latitude . ",". $longitude . $_options;
        $data = file_get_contents($this->request);
        $this->data = json_decode($data);
    }

    public function getCurrentWeather() {
        $temperature = $this->data->currently->temperature;
        $weather = $this->data->currently->icon;
        $wind = ($this->data->currently->windSpeed * 3600 / 1000) . " km/h";
        $windGust = ($this->data->currently->windGust * 3600 / 1000) . " km/h";
        $summary = $this->data->currently->summary;
        $precipProba = $this->data->currently->precipProbability * 100;
        $precipInten = $this->data->currently->precipIntensity . " mm/h";
        return [$weather,$temperature,$wind,$windGust,$summary,$precipProba,$precipInten];
    }

    private function toCelcius($temperature){
        $fahrenheit = (float) $temperature;
        $celcius = 5/9 * ($fahrenheit - 32);
        return round($celcius,1);
    }

}