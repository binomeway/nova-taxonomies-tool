<?php


namespace BinomeWay\NovaTaxonomiesTool\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\BooleanFilter;
use Spatie\Tags\Tag;


class MultiTags extends BooleanFilter
{
    private string $tagType;

    public function withTagType(string $type): static
    {
        $this->tagType = $type;

        return $this;
    }

    public function withName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function apply(Request $request, $query, $value)
    {

        $tags = collect($value)->filter()->keys();

        if($tags->isEmpty()){
            return $query;
        }

        return $query->withAnyTags($tags->toArray(), $this->tagType);
    }

    public function options(Request $request)
    {
        return Tag::getWithType($this->tagType)
            ->pluck('name', 'name')
            ->toArray();
    }
}
