<?php


namespace BinomeWay\NovaTaxonomiesTool\Resources;


use BinomeWay\NovaTaxonomiesTool\Facades\Taxonomies;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

class Tag extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \Spatie\Tags\Tag::class;

    public static $displayInNavigation = false;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
        'slug',
        'type',
    ];


    public function fields(Request $request)
    {
        return [
            Text::make(__('Name'), 'name')
                ->required()
                ->sortable(),

            Slug::make(__('Slug'), 'slug')
                ->from('name')
                ->sortable()
                ->nullable(),

            Select::make(__('Type'), 'type')
                ->options(fn() => Taxonomies::types())
                ->searchable(fn() => Taxonomies::types()->count() > 10)
                ->displayUsingLabels()
                ->sortable()
                ->nullable(),

            Number::make(__('Order'), 'order_column')
                ->nullable()
                ->hideFromIndex(),
        ];
    }
}
