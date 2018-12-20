# :tea: Matcha - PhpSpec Matcher(s)
--

## Installation

Install the package via composer:

```bash
composer require wieloco/ps-matcha
```

Add it to your PhpSpec configuration (`phpspec.yaml` file):

```yaml
extensions:
    WieloCo\Matcha\Extension: ~
```

## Usage

Use it in Specs like this

```php
$this->uuid->shouldBeUuid();
```
or

```php
$this->uuid->shouldNotBeUuid();
```

## License

Apache License 2.0 Please see [LICENSE](LICENSE) for more information.
