# Magento 2 Algolia Wordpress Integration

This Magento 2 module integrates Wordpress pages and posts (with the [Wordpress REST API](https://developer.wordpress.org/rest-api/)) in the [Algolia Magento 2 module](https://github.com/algolia/algoliasearch-magento-2/). This is usefull when you're using the [Fishpig Magento WordPress Integration](https://fishpig.co.uk/magento-2/wordpress-integration/), in our case with the [root](https://fishpig.co.uk/magento/wordpress-integration/root/) extension. Also see [this feature request](https://github.com/algolia/algoliasearch-magento-2/issues/153).

## Installation

- `composer require justbetter/magento2-algolia-wordpress-integration`
- `bin/magento module:enable JustBetter_AlgoliaWordpressIntegration`
- `bin/magento setup:upgrade && bin/magento setup:static-content:deploy`
- Make sure you've set the base url, the `{{base_url}}` placeholder won't work

## Compability
The module extends one helper in the [Algolia Magento 2 module](https://github.com/algolia/algoliasearch-magento-2/), is tested on Magento >= 2.1.5, 2.2.x and the Algolia Magento 2 module version > 1.0.10

## Ideas, bugs or suggestions?
Please create a [issue](https://github.com/justbetter/magento2-algolia-wordpress-integration/issues) or a [pull request](https://github.com/justbetter/magento2-algolia-wordpress-integration/pulls).

## License
[MIT](LICENSE)

## About us
We’re a innovative development agency from The Netherlands building awesome websites, webshops and web applications with Laravel and Magento. Check out our website [justbetter.nl](https://justbetter.nl) and our [open source projects](https://github.com/justbetter).

---

<a href="https://justbetter.nl" title="JustBetter"><img src="https://raw.githubusercontent.com/justbetter/art/master/justbetter-logo.png" width="200px" alt="JustBetter logo"></a>
