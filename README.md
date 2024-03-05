# Magento 2.4+ move out of stock products in last position of last pages

This module let you move out of stock products in last position of last pages in category pages. You can enable or disable this feature at website scope in the admin panel. You can also change the ElasticSearch sort stack order in which this sorting will be applied.

This is a fork of https://github.com/majidiyan/magento2-out-of-stock-move-end-category (thanks to @majidiyan) with some improvements.


## Composer install

```
composer require marcomessa/module-out-of-stock-at-last

bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento index:reindex
```