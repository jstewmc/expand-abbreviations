# expand-abbreviations

A service to expand abbreviations:

```php
namespace Jstewmc\ExpandAbbreviations;

// define replacements (i.e., replace "foo" with "bar")
$replacements = ['foo' => 'bar'];

// instantiate service
$service = new ExpandAbbreviations($replacements);

// expand abbreviations
$service('foo bar baz');   // returns "bar bar baz"
$service('foo. bar baz');  // returns "bar bar baz"
$service('qux');           // returns "qux"
```

Given an array of _replacements_ indexed by _abbreviation_, this library will expand all occurences of an abbreviation in a string to its corresponding replacement. 

Keep in mind, this library is case-sensitive but trailing-period agnostic. 

## Author

[Jack Clayton](mailto:clayjs0@gmail.com)

## Version

### 0.1.0, May 29, 2017

* Initial release

## License

[MIT](https://github.com/jstewmc/expand-abbreviations/blob/master/LICENSE)

