<?php


namespace BinomeWay\NovaTaxonomiesTool\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;
use Spatie\Tags\Tag;

class SingleTag extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

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
        return $query->withAnyTags([$value], $this->tagType);
    }

    public function options(Request $request)
    {
        return Tag::getWithType($this->tagType)
            ->pluck('name', 'name')
            ->toArray();
    }
}
