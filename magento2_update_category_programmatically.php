<?php

//
// Magento 2 update category programmatically
// Magento 2 Update existed category for specified store (store view) programmatically
//
// Source  : https://github.com/coresh/magento2awesome/blob/master/magento2_update_category_programmatically.php
// Purpose : testing
// Tested  : magento EE 2.1.3
// Usage:
// $ cd magento2 root directory
// $ php /path/to/magento2_update_category_programmatically.php
//

include('./app/bootstrap.php');
use \Magento\Framework\App\Bootstrap;

$existedCategoryId = 109;
$storeId           = 4;
$bootstrap         = Bootstrap::create(BP, $_SERVER);
$objectManager     = $bootstrap->getObjectManager();
$category          = $objectManager->create('\Magento\Catalog\Model\CategoryFactory')->create()->load($existedCategoryId);

$data = [
    'updated_at'         => '2017-01-15 11:11:40',
    'entity_id'          => $existedCategoryId,
    'row_id'             => $existedCategoryId,
    'position'           => '1',
    'is_active'          => '1',
    'store_id'           => $storeId,
    'is_anchor'          => '1',
    'name'               => 'name' . rand(1111111, 9999999),
    'custom_design_from' => '',
    'custom_design_to'   => '',
    'include_in_menu'    => '1',
    'default_sort_by'    => '',
    'meta_title'         => 'meta_title'       . rand(1111111, 9999999),
    'meta_keywords'      => 'meta_keywords'    . rand(1111111, 9999999),
    'meta_description'   => 'meta_description' . rand(1111111, 9999999),
    'description'        => 'description'      . rand(1111111, 9999999),
    'url_key'            => 'url_key'          . rand(1111111, 9999999),
    'path'               => '1/2/'             . $existedCategoryId,
    'level'              => '2',
];

$category->addData($data)->save();

echo 'Category: Updated' . "\n";
