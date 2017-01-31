<?php

//
// Magento 2 create category programmatically
//
// Source  : https://github.com/coresh/magento2awesome/blob/master/magento2_create_category_programmatically.php
// Purpose : testing
// Tested  : magento EE 2.1.3
// Usage:
// $ cd magento2 root directory
// $ php /path/to/magento2_create_category_programmatically.php
//
include('./app/bootstrap.php');
use \Magento\Framework\App\Bootstrap;

$bootstrap     = Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();
$storeManager  = $objectManager->create('\Magento\Store\Model\StoreManagerInterface');
$store         = $storeManager->getStore();

// Get Root Category ID
$rootCategoryId = $store->getRootCategoryId();
echo "rootCategoryId: ". $rootCategoryId . "\n";

// Load root category
$rootCategory     = $objectManager->create('\Magento\Catalog\Model\CategoryFactory')->create()->load($rootCategoryId);
$rootCategoryPath = $rootCategory->getPath();

echo "rootCategoryPath: ". $rootCategoryPath . "\n";

$storeId  = $store->getStoreId();
$category = $objectManager->create('\Magento\Catalog\Model\CategoryFactory')->create();

$data = [
    'store_id'           => $storeId,
    'path'               => $rootCategoryPath,
    'parent_id'          => $rootCategoryId,
    'updated_at'         => '2017-01-11 11:17:19',
    'position'           => '1',
    'is_active'          => '1',
    'is_anchor'          => '1',
    'name'               => 'name' . rand(1111111, 9999999),
    'custom_design_from' => '',
    'custom_design_to'   => '',
    'include_in_menu'    => '1',
    'default_sort_by'    => '',
    'meta_title'         => 'meta_title' . rand(1111111, 9999999),
    'url_key'            => 'url_key' . rand(1111111, 9999999),
];

$category->addData($data);
$createdCategoryId = $category->save()->getId();

echo 'Category: Created. Category Id: '. $createdCategoryId . "\n";








