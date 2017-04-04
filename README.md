# Magento 2 Algolia Wordpress Integration

This Magento 2 module integrates Wordpress pages and posts (with the [Wordpress REST API](https://developer.wordpress.org/rest-api/)) in the [Algolia Magento 2 module](https://github.com/algolia/algoliasearch-magento-2/). This is usefull when you're using the [Fishpig Magento WordPress Integration](https://fishpig.co.uk/magento-2/wordpress-integration/), in our case with the [root](https://github.com/algolia/algoliasearch-magento-2/) extension. Also see [this feature request](https://github.com/algolia/algoliasearch-magento-2/issues/153).

## Installation

- `composer require just-better/magento2-algolia-wordpress-integration`
- `bin/magento module:enable JustBetter_AlgoliaWordpressIntegration`
- `bin/magento setup:upgrade && bin/magento setup:static-content:deploy`

## Compability
The module extends one helper in the [Algolia Magento 2 module](https://github.com/algolia/algoliasearch-magento-2/), is tested on Magento 2.1.5 and the Algolia Magento 2 module version 1.0.10.

## Ideas, bugs or suggestions?
Please create a [issue](https://github.com/just-better/magento2-algolia-wordpress-integration/issues) or a [pull request](https://github.com/just-better/magento2-algolia-wordpress-integration/pulls).

## License
[MIT](LICENSE.txt)

---

[![JustBetter](https://justbetter.nl/app/uploads/2016/01/logo_justbetter_black-2x-new.png)](https://justbetter.nl)
