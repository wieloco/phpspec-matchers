# PhpSpec Matchers
--

## Installation

Install the package via composer:

```bash
composer require karriere/phpspec-matchers
```

Add it to your PhpSpec configuration (`phpspec.yaml` file):

```yaml
extensions:
    WieloCo\PhpSpecMatchers\Extension: ~
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
