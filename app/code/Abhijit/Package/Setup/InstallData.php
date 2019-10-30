<?php

namespace Abhijit\Package\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function getAttributes(){
        $attributes = [
            'association' => [
                'group' => 'General',
                'label' => 'Association',
                'type'  => 'text',
                'input' => 'select',
                'user_defined' => true,
                'source' => 'Abhijit\Package\Model\Config\Source\Options',                
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to'                => 'membership',  
                'visible_on_front' => false
            ],
            'sell_online' => [
                'group' => 'General',
                'label' => 'Sell Online',
                'type'  => 'text',
                'input' => 'select',
                'user_defined' => true,
                'source' => 'Abhijit\Package\Model\Config\Source\YesNo',                
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to'                => 'membership',  
                'visible_on_front' => false
            ],
            'price_lookup_code' => [
                'group' => 'General',
                'label' => 'Price Lookup Code',
                'type'  => 'text',
                'input' => 'text',     
                'user_defined' => true,                       
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to'                => 'membership',  
                'visible_on_front' => false
            ],
            'price_rate' => [
                'group' => 'General',
                'label' => 'Price Rate',
                'type'  => 'text',
                'input' => 'text',    
                'user_defined' => true,                       
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to'                => 'membership',  
                'visible_on_front' => false
            ],
            'product_ids' => [
                'group' => 'General',
                'label' => 'Add Products',
                'type'  => 'text',
                'input' => 'multiselect',
                'user_defined' => true,
                'source' => 'Abhijit\Package\Model\Config\Product\Listofproducts',
                'required' => false,
                'sort_order' => 30,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to'                => 'membership', 
                'visible_on_front' => false
            ],
            'show_on_invoice' => [
                'group' => 'General',
                'label' => 'Show on Invoice?',
                'type'  => 'text',
                'input' => 'select',
                // 'default' => '1',
                'user_defined' => true,
                'source' => 'Abhijit\Package\Model\Config\Source\OverrideYesNo',                
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to' => 'membership',  
                'visible_on_front' => false
            ],
            'optional' => [
                'group' => 'General',
                'label' => 'Optional',
                'type'  => 'text',
                'input' => 'select',
                // 'default' => '1',
                'user_defined' => true,
                'source' => 'Abhijit\Package\Model\Config\Source\OverrideYesNo',                
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to' => 'membership',  
                'visible_on_front' => false
            ],
            'start_date' => [
                'group' => 'General',
                'type' => 'datetime',
                'backend' => '',
                'frontend' => '',
                'label' => 'Start Date',
                'input' => 'date',
                'class' => '',
                'source' => '',
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => 'simple,membership'
            ],
            'end_date' => [
                'group' => 'General',
                'type' => 'datetime',
                'backend' => '',
                'frontend' => '',
                'label' => 'End Date',
                'input' => 'date',
                'class' => '',
                'source' => '',
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => 'simple,membership'
                // 'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
            ],
            'custom_calculation' => [
                'group' => 'General',
                'label' => 'Custom Calculation',
                'type'  => 'text',
                'input' => 'text',    
                'user_defined' => true,                       
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to'                => 'membership',  
                'visible_on_front' => false
            ],

        ];

        return $attributes;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $attribs = $this->getAttributes();

        foreach($attribs as $key => $val){
            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                $key,
                $val
            );
        }

        $setup->endSetup();
    }
} 