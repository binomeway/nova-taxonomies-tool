<?php


namespace BinomeWay\NovaTaxonomiesTool\Nova\Filters;

use BinomeWay\NovaTaxonomiesTool\Facades\Taxonomies;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;
use Spatie\Tags\Tag;

class TypeFilter extends Filter
{

    public function apply(Request $request, $query, $value)
    {
        return $query->withType($value, $value);
    }

    public function options(Request $request)
    {
        return Taxonomies::asSelectOptionsReversed();
    }
}
