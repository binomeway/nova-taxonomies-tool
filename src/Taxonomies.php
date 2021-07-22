<?php


namespace BinomeWay\NovaTaxonomiesTool;


class Taxonomies
{
    private array $types = [];

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

    public function types()
    {
        // TODO: Add the possibility to retrieve them from a database
        return $this->types;
    }
}
