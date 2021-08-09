<?php


namespace BinomeWay\NovaTaxonomiesTool;


use BinomeWay\NovaTaxonomiesTool\Models\TaxonomyType;
use Illuminate\Support\Facades\Cache;

class Taxonomies
{
    private array $types = [];
    private int $cacheSecondsTTL = 30;
    private string $cacheKey = 'nova-taxonomies-types';

    public function addType(string|array $name, string $label = null): static
    {
        if (is_array($name)) {
            return $this->addTypes($name);
        }

        $this->types[$name] = $label;

        return $this;
    }

    public function addTypes(array $names): static
    {
        foreach ($names as $type => $label) {
            $this->types[$type] = $label;
        }

        return $this;
    }

    public function flushTypesCache(): static
    {
        Cache::forget($this->cacheKey);

        return $this;
    }

    public function types()
    {
        return Cache::remember($this->cacheKey, $this->cacheSecondsTTL,
            fn() => TaxonomyType::all()->pluck('display', 'name')->merge($this->types)
        );
    }
}
