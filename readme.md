# Venice - Multivariate Test Bed [![Build Status](https://travis-ci.org/heldtogether/venice-php.svg)](https://travis-ci.org/heldtogether/venice-php)

Feature toggles are a main tenet of Continuous Integration. Venice allows you to easily turn parts of your app on and off by providing configuration at runtime.

## Configuration

Your configuration can be stored however you choose, by creating a class which implements `ConfigInterface`. A class to load your configuration from a JSON file is provided out of the box.

## Usage

In your app's initialisation, bind the Venice Manager and Bucketer as a singleton and bind the session interface to your chosen concrete session class.

```php

	$container->singleton('Venice\Manager', function(){
		$factory = new Venice\Factory();
		$config = new Venice\Configs\JSONFileConfig($factory);
		$config->setFilename('/path/to/config/file.json');
		$manager = new Venice\Manager();
		$manager->addConfig($config);
		return $manager;
	});

	$container->singleton('Venice\Bucketer', function(){
		$session = new Venice\Sessions\CookieSession();
		$return new Venice\Bucketer($session);
	});

	$container->bind(
		'Venice\Interfaces\SessionInterface',
		'Venice\Sessions\CookieSession'
	);

```

In any class you wish to use the feature manager, inject the feature manager:

```php
	/**
	 * Basic Controller
	 */
	 class Controller {

		/**
		 * @var Venice\Manager
		 */
		protected $features;

		/**
		 * Construct
		 *
		 * @param Venice\Manager $features
		 * @return void
		 */
		public function __construct(Venice\Manager $features) {

			$this->features = $features;

		}

		/**
		 * Handle the index route.
		 */
		public function index() {

			if ($this->features->get('feature-name')->active()) {

				// Do something

			}

		}

	}
```

### Boolean Features

Boolean features are either on or off, obviously.

```javascript
	{
		'feature-name': true
	}
```

#### Methods

```php
	/**
	 * Check if the Feature is active
	 *
	 * @return bool
	 */
	public function active();

	/**
	 * Set the active state of the feature
	 *
	 * @param bool $active
	 * @return void
	 */
	public function setActive($active)
```

### Timed Features

Timed features are configured to switch on and off according to a schedule. A start time and/or end time can optionally be provided in the config.

```javascript
	{
		'feature-name': {
			'type': 'timed',
			'start_time': '2015-10-06 12:30:20',
			'end_time': '2015-10-10 12:30:20'
		}
	}
```

#### Methods

```php
	/**
	 * Check if the Feature is active
	 *
	 * @return bool
	 */
	public function active();

	/**
	 * Get the start time of the Feature
	 *
	 * @return Carbon\Carbon
	 */
	public function startTime();

	/**
	 * Set the time the Feature should be active
	 *
	 * @param string $start_time
	 * @return void
	 */
	public function setStartTime($start_time);

	/**
	 * Get the end time of the Feature
	 *
	 * @return Carbon\Carbon
	 */
	public function endTime();

	/**
	 * Set the time the Feature should become inactive
	 *
	 * @param string $end_time
	 * @return void
	 */
	public function setEndTime($end_time);
```

### Variant Features

Variant features are configured to bucket each session into a certain variant and persist that information between sessions.

```javascript
	{
		'feature-name': {
			'type': 'variant',
			'variants': [
				'control',
				'variant-1',
				'variant-2'
			]
		}
	}
```

#### Methods

```php
	/**
	 * Check if the Feature is active
	 *
	 * @return bool
	 */
	public function active();

	/**
	 * Get the variant for the current session
	 *
	 * @return string
	 */
	public function variant();
```

## Todo

- [x] Boolean feature
- [x] Timed feature
- [x] Variant feature (for use in A/B testing etc.)
- [x] JSON file config
- [ ] Database config
