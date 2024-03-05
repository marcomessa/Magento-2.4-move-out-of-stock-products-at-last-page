# Magento 2.4+ move out of stock products in last position of last pages

This is a fork of https://github.com/majidiyan/magento2-out-of-stock-move-end-category (thanks to @majidiyan) with some improvements.
This module let you move out of stock products in last position of last pages in category pages. You can enable or disable this feature at website scope in the admin panel. You can also change the ElasticSearch sort stack order in which this sorting will be applied.

in order to work you must run a reindex after the installation, because you need to add stock infos in indexes.

## Requirements

- Magento 2.4+
- ElasticSearch

## Composer install

```
composer require marcomessa/module-out-of-stock-at-last

bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento index:reindex
```

## Settings

You can find the settings in the admin panel under Stores > Configuration > OUT OF STOCK AT LAST > Settings
