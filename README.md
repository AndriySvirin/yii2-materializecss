[![license](https://img.shields.io/badge/LICENCE-BSD--3--Clause-blue.svg)](https://packagist.org/packages/macgyer/yii2-materializecss)
[![Github Release](https://img.shields.io/github/release/macgyer/yii2-materializecss.svg)](https://packagist.org/packages/macgyer/yii2-materializecss)
[![Packagist](https://img.shields.io/packagist/dt/macgyer/yii2-materializecss.svg)](https://packagist.org/packages/macgyer/yii2-materializecss)

# Materialize for Yii2

----

fetch of https://packagist.org/packages/macgyer/yii2-materializecss


## Installation

The preferred way of installation is through Composer.
If you don't have Composer you can get it here: https://getcomposer.org/

You also should install the Composer Asset Plugin to handle NPM and Bower assets:
```
$ composer global require "fxp/composer-asset-plugin:~1.2"
```

To install the package add the following to the ```require``` section of your composer.json:
```
"require": {
    "ukrinsoft/yii2-materializecss": "*"
},
```

## Usage

To load the Materialize CSS files integrate the MaterializeAsset into your app.
Two ways to achieve this is to register the asset in the main layout:

```php
// @app/views/layouts/main.php

\ukrinsoft\yii2materializecss\assets\MaterializeAsset::register($this);
// further code
```

or as a dependency in your app wide AppAsset.php

```php
// @app/assets/AppAsset.php

public $depends = [
    'ukrinsoft\yii2materializecss\assets\MaterializeAsset',
    // more dependencies
];
```

## Widgets

The following widgets are currently available:

* ActiveField
* ActiveForm
* Alert
* Breadcrumbs
* Button
* Carousel
* Chip
* Collapsible
* DatePicker
* DetailView
* Dropdown
* Fixed Action Button
* GridView with ActionColumn
* Icon
* LinkPager
* MaterialBox
* Modal
* Nav
* NavBar
* Parallax
* Progress
* RangeInput
* Select
* SideNav
* Slider
* Spinner
* SubmitButton
* SwitchButton
* TimePicker
