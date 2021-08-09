<?php


namespace BinomeWay\NovaTaxonomiesTool\Models;


use BinomeWay\NovaTaxonomiesTool\Facades\Taxonomies;
use Illuminate\Database\Eloquent\Model;

class TaxonomyType extends Model
{
    public $timestamps = false;

    protected static function booting()
    {
        $clearCache = function() {
            Taxonomies::flushTypesCache();
        };

        self::created($clearCache);
        self::updated($clearCache);
        self::deleted($clearCache);
    }
}
