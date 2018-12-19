# :tea: Matcha - PhpSpec Matcher(s)
--

## Installation

Install the package via composer:

```bash
composer require karriere/phpspec-matchers
```

Add it to your PhpSpec configuration (`phpspec.yaml` file):

```yaml
extensions:
    WieloCo\Matcha\Extension: ~
```

## Usage

Use it in Specs like this

```php
$this->uuid->shouldBeAnUuid();
```
or

```php
$this->uuid->shouldNotBeAnUuid();
```

## License

Apache License 2.0 Please see [LICENSE](LICENSE) for more information.
