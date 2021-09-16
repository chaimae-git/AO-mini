<?php


namespace App\Classes;


use Illuminate\Support\Facades\DB;

class Location
{
    public $adresse;
    public $location;

    public $listLocations = [];

    public function __construct($strigofadresse, $stringofgeom){
        //$this->type = $stringoftype;
        $this->adresse = $strigofadresse;
        $this->location = $stringofgeom;
    }

    public function buildQuery(){
        return DB::raw("public.ST_SetSRID(public.ST_GeomFromGeoJSON('$this->location'), 27700)");
    }

    public function storeLocation($location){

    }

    public function clearSession(){

    }

    public function getLocations(){

    }

    public function reset(){

    }

}
