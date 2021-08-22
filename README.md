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

## Usage


### Tag Types

Add your tag types using the Nova Panel or register them from a ServiceProvider.

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

### Actions

#### Update multiple tags


```php
use BinomeWay\NovaTaxonomiesTool\Nova\Actions\UpdateTag;

function actions(Request $request) {

    return [
        // This will result in have the default button Update Tag
        UpdateTag::make('categories'),  // Update Tag
        
        // You can Override the label using the constructor or the 'withLabel' method
        UpdateTag::make('categories', 'Categories')  // Update Categories
       
         // alternative
        ->withLabel('Categories'), // Will produce same result: Update Categories
        
        // If you want to override the name entirely use the 'withName' method
        UpdateTag::make('categories')->withName('My Action Name')
    ];
}

```

#### Update a single tag

Force a single tag selection. This will show a select field instead.

```php
use BinomeWay\NovaTaxonomiesTool\Nova\Actions\UpdateSingleTag;

public function actions(Request $request) {

    return [
        UpdateSingleTag::make('status', 'Status'), 
    ];
}
```

*You can use the same methods as above to customise the displayed name.*

### Filters

#### Filter by a single tag

Filter resources by a single tag.

```php
use BinomeWay\NovaTaxonomiesTool\Nova\Filters\SingleTag;

public function filters(Request $request)
    {
        return [
            SingleTag::make()
                ->withName(__('By Status')) // Override the displayed name
                ->withTagType('status')
        ];
    }
```

#### Filter by multiple tags

Filter resources by a multiple tags at once.

```php
use BinomeWay\NovaTaxonomiesTool\Nova\Filters\MultiTags;

public function filters(Request $request)
    {
        return [
              MultiTags::make()
                ->withName(__('By Position'))
                ->withTagType('page-position'),
        ];
    }
```
