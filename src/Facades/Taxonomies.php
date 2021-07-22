<?php


namespace BinomeWay\NovaTaxonomiesTool\Facades;


use Illuminate\Support\Facades\Facade;

class Taxonomies extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \BinomeWay\NovaTaxonomiesTool\Taxonomies::class;
    }

}
