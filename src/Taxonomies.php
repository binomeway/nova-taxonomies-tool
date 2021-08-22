<?php


namespace BinomeWay\NovaTaxonomiesTool;


use BinomeWay\NovaTaxonomiesTool\Models\TaxonomyType;
use Illuminate\Support\Facades\Cache;
use Spatie\Tags\Tag;

class Taxonomies
{
    private array $types = [];
    private int $cacheSecondsTTL;
    private string $cacheKey;

    /**
     * Taxonomies constructor.
     * @param int $cacheSecondsTTL
     * @param string $cacheKey
     */
    public function __construct(string $cacheKey, int $cacheSecondsTTL)
    {
        $this->cacheSecondsTTL = $cacheSecondsTTL;
        $this->cacheKey = $cacheKey;
    }


    public function addType(string|array $name, string $display = null): static
    {
        if (is_array($name)) {
            return $this->addTypes($name);
        }

        $this->types[$name] = compact('name', 'display');

        return $this;
    }

    public function addTypes(array $names): static
    {
        foreach ($names as $name => $display) {
            $this->types[] = compact('name', 'display');
        }

        return $this;
    }

    public function flushTypesCache(): static
    {
        Cache::forget($this->cacheKey);

        return $this;
    }

    public function asSelectOptions(): \Illuminate\Support\Collection
    {
        return $this->types()->pluck('display', 'name');
    }

    public function types()
    {
        $callback = fn() => $this->getDynamicTypes()->merge($this->getDatabaseTypes());

        if (config('app.debug')) {
            return $callback();
        }

        return Cache::remember($this->cacheKey, $this->cacheSecondsTTL, $callback);
    }

    public function getDynamicTypes(): \Illuminate\Support\Collection
    {
        return collect($this->types)->map(fn($data) => new Tag($data));
    }

    public function getDatabaseTypes(): \Illuminate\Database\Eloquent\Collection
    {
        return TaxonomyType::all();
    }

    public function asSelectOptionsReversed(): \Illuminate\Support\Collection
    {
        return $this->types()->pluck('name', 'display');
    }
}
