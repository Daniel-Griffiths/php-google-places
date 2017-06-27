# php-google-places
A simple Google Places class

## Installation

Via Composer

```
composer require daniel-griffiths/php-google-places
```


## Usage

```PHP
<?php

require __DIR__.'/vendor/autoload.php';

$places = (new \DanielGriffiths\GooglePlaces('example-api-key'))
->setLongitude(-33.8670522)
->setLatitude(151.1957362)
->getType('shop');

?>

<ul>
	<?php foreach($places as $place): ?>
		<li>
			<div><?= $place->name ?></div>
			<div><?= $place->vicinity ?></div>
			<div><?= $place->rating ?></div>
			
			<?php foreach($place->types as $type): ?>
				<div><?= $type ?></div>
			<?php endforeach; ?>
		</li>
	<?php endforeach; ?>
</ul>

```

