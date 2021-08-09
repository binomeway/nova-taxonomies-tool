<?php

namespace BinomeWay\NovaTaxonomiesTool;

use BinomeWay\NovaTaxonomiesTool\Resources\Tag;
use BinomeWay\NovaTaxonomiesTool\Resources\TaxonomyType;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class NovaTaxonomiesTool extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        //Nova::script('nova-taxonomies-tool', __DIR__.'/../dist/js/tool.js');
        //Nova::style('nova-taxonomies-tool', __DIR__.'/../dist/css/tool.css');

        Nova::resources([
            TaxonomyType::class,
            Tag::class,
        ]);
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('nova-taxonomies-tool::navigation');
    }
}
