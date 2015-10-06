# Slab Features

The Slab Features component. Feature toggles are a main tenant of Continuous Integration. Slab Features allows you to easily turn parts of your app on and off by providing configuration at runtime.

## Configuration

Your configuration can be stored however you choose, by creating a class which implements `ConfigInterface`. A class to load your configuration from a JSON file is provided out of the box.

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

## Usage

In your app's initialisation, bind the Features Manager as a singleton.

```php
	/**
	 * Initialize the app
	 *
	 * @param Slab\Core\Application
	 * @return void
	 */
	function init($slab) {

		$slab->singleton('Slab\Features\Manager', function(){

			$factory = new Slab\Features\Factory();

			$config = new Slab\Features\Configs\JSONFileConfig($factory);
			$config->setFilename('/path/to/config/file.json');

			$manager = new Slab\Features\Manager($config);

		});

	});
```

In any class you wish to use the feature manager, inject the feature manager:

```php
	/**
	 * Basic Controller
	 */
	 class Controller {

		/**
		 * @var Slab\Features\Manager
		 */
		protected $features;

		/**
		 * Construct
		 *
		 * @param Slab\Features\Manager $features
		 * @return void
		 */
		public function __construct(Slab\Features\Manager $features) {

			$this->features = $features;

		}

		/**
		 * Handle the index route.
		 *
		 * @return Slab\Core\Http\ResponseInterface
		 */
		public function index() {

			if ($this->features->get('feature-name')->active()) {

				// Do something

			}

		}

	}
```

## Todo

- [x] Boolean feature
- [x] Timed feature
- [ ] Variant feature (for use in A/B testing etc.)
- [x] JSON file config
- [ ] Database config
