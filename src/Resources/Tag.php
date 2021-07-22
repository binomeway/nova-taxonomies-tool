<?php


namespace BinomeWay\NovaTaxonomiesTool\Resources;


use BinomeWay\NovaTaxonomiesTool\Taxonomies;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;

class Tag extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \Spatie\Tags\Tag::class;

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
        'type',
    ];


    public function fields(Request $request)
    {
        return [
            Text::make(__('Name'), 'name')->required(),
            Slug::make(__('Slug'), 'slug')->from('name')->nullable(),
            Select::make(__('Type'), 'type')->options(function () {
                return app(Taxonomies::class)->types();
            })
                ->displayUsingLabels()
                ->nullable(),
            Number::make(__('Order'), 'order_column')->nullable(),

            // MorphMany::make('Taggable')->types([])->nullable(),
        ];
    }
}
