# Nova Taxonomies

This package uses [spatie/laravel-tags](https://spatie.be/docs/laravel-tags/v4/introduction) and [spatie/nova-tags-field](https://github.com/spatie/nova-tags-field).

# Installation

Refer to the [spatie/laravel-tags](https://spatie.be/docs/laravel-tags/v4/introduction) documentation to prepare your
model and publish the migrations needed.

Register the tool in your `NovaServiceProvider.php`

```php
public function tools(){
    return [
        \BinomeWay\NovaTaxonomiesTool\NovaTaxonomiesTool::make(),
    ];
}
```

Adding types from your package.

```php
    use  \BinomeWay\NovaTaxonomiesTool\Facades\Taxonomies;
    
    public function boot() {
        Taxonomies::addType('categories', 'Categories');
        
        // or multiple
        
        Taxonomies::addTypes([
            'name' => 'Display Name',
            'colors' => 'Colors',
            'types' => 'Types',
        ]);
    }
```

That's it for now.
