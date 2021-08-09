<?php


namespace BinomeWay\NovaTaxonomiesTool\Resources;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;

class TaxonomyType extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \BinomeWay\NovaTaxonomiesTool\Models\TaxonomyType::class;

    public static $displayInNavigation = false;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'display';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
        'display',
    ];

    public function fields(Request $request)
    {
        return [
            Text::make(__('Display'), 'display')
                ->required()
                ->sortable(),

            Slug::make(__('Name'), 'name')
                ->from('display')
                ->sortable()
                ->required(),
        ];
    }
}
