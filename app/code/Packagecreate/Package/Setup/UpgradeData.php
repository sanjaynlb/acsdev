<?php
namespace Packagecreate\Package\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
       $this->eavSetupFactory = $eavSetupFactory;
    }

    public function customAttributes(){
        $fields = [
            'allow_partial_shipment' => [
                'type'         => 'int',
                'label'        => 'Allow Partial Shipment',
                'input'        => 'boolean',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => 1,
                'visible'      => true,
                'required'     => false,
                'user_defined' => true,
                'default'      => null,
                'group'        => 'General',
                'backend'      => '',
                'apply_to'     => 'simple',
                'used_in_product_listing' => true,
            ],
            'allow_backorders' => [
                'type'         => 'int',
                'label'        => 'Allow Backorders',
                'input'        => 'boolean',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => 1,
                'visible'      => true,
                'required'     => false,
                'user_defined' => true,
                'default'      => null,
                'group'        => 'General',
                'backend'      => '',
                'apply_to'     => 'simple',
                'used_in_product_listing' => true,
            ],
            'send_via_web' => [
                'type'         => 'int',
                'label'        => 'Send Via Web',
                'input'        => 'boolean',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => 1,
                'visible'      => true,
                'required'     => false,
                'user_defined' => true,
                'default'      => null,
                'group'        => 'General',
                'backend'      => '',
                'apply_to'     => 'simple',
                'used_in_product_listing' => true,
            ],
            'product_form' => [
                'group' => 'General',
                'label' => 'Product Form',
                'type'  => 'text',
                'input' => 'text',     
                'user_defined' => true,                       
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to' => 'simple',  
                'visible_on_front' => false
            ],
            'taxable_flag' => [
                'type'         => 'int',
                'label'        => 'Taxable Flag',
                'input'        => 'boolean',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => 1,
                'visible'      => true,
                'required'     => false,
                'user_defined' => true,
                'default'      => null,
                'group'        => 'General',
                'backend'      => '',
                'apply_to'     => 'simple',
                'used_in_product_listing' => true,
            ],
            'sell_product_online' => [
                'type'         => 'int',
                'label'        => 'Sell Online',
                'input'        => 'boolean',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => 1,
                'visible'      => true,
                'required'     => false,
                'user_defined' => true,
                'default'      => null,
                'group'        => 'General',
                'backend'      => '',
                'apply_to'     => 'simple',
                'used_in_product_listing' => true,
            ],
            'featured_product' => [
                'type'         => 'int',
                'label'        => 'Featured Product',
                'input'        => 'boolean',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => 1,
                'visible'      => true,
                'required'     => false,
                'user_defined' => true,
                'default'      => null,
                'group'        => 'General',
                'backend'      => '',
                'apply_to'     => 'simple',
                'used_in_product_listing' => true,
            ],
            'online_abstract' => [
                'group' => 'General',
                'label' => 'Online Abstract',
                'type'  => 'text',
                'input' => 'text',     
                'user_defined' => true,                       
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to' => 'simple',  
                'visible_on_front' => false
            ],
            'post_to_web_date' => [
                'group' => 'General',
                'type' => 'datetime',
                'backend' => '',
                'frontend' => '',
                'label' => 'Post to Web (Date)',
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
                'apply_to' => 'simple'
                // 'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
            ],
            'remove_from_web_date' => [
                'group' => 'General',
                'type' => 'datetime',
                'backend' => '',
                'frontend' => '',
                'label' => 'Remove from Web (Date)',
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
                'apply_to' => 'simple'
                // 'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
            ],
            'show_as_new_until' => [
                'group' => 'General',
                'type' => 'datetime',
                'backend' => '',
                'frontend' => '',
                'label' => 'Show as New Until (Date)',
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
                'apply_to' => 'simple'
                // 'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
            ],
            'term_length' => [
                'group' => 'General',
                'label' => 'Term Length',
                'type'  => 'text',
                'input' => 'text',     
                'user_defined' => true,                       
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to' => 'membership',  
                'visible_on_front' => false
            ],
            'ar_account' => [
                'group' => 'General',
                'label' => 'Ar_Account',
                'type'  => 'text',
                'input' => 'text',     
                'user_defined' => true,                       
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to' => 'membership',  
                'visible_on_front' => false
            ],
            'revenue' => [
                'group' => 'General',
                'label' => 'Revenue',
                'type'  => 'text',
                'input' => 'text',     
                'user_defined' => true,                       
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to' => 'membership',  
                'visible_on_front' => false
            ],
            'return' => [
                'group' => 'General',
                'label' => 'Return',
                'type'  => 'text',
                'input' => 'text',     
                'user_defined' => true,                       
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to' => 'membership',  
                'visible_on_front' => false
            ],
            'liability' => [
                'group' => 'General',
                'label' => 'Liability',
                'type'  => 'text',
                'input' => 'text',     
                'user_defined' => true,                       
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to' => 'membership',  
                'visible_on_front' => false
            ],
            'writeoff' => [
                'group' => 'General',
                'label' => 'Write Off',
                'type'  => 'text',
                'input' => 'text',     
                'user_defined' => true,                       
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to' => 'membership',  
                'visible_on_front' => false
            ],
            'deferred' => [
                'group' => 'General',
                'label' => 'Deferred',
                'type'  => 'text',
                'input' => 'text',     
                'user_defined' => true,                       
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to' => 'membership',  
                'visible_on_front' => false
            ],
            'year' => [
                'group' => 'General',
                'label' => 'Year',
                'type'  => 'text',
                'input' => 'text',     
                'user_defined' => true,                       
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to' => 'membership',  
                'visible_on_front' => false
            ],
            'discount_percent' => [
                'group' => 'General',
                'label' => 'Discount Percent',
                'type'  => 'text',
                'input' => 'text',     
                'user_defined' => true,                       
                'required' => true,
                'sort_order' => 1,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'apply_to' => 'membership',  
                'visible_on_front' => false
            ],
            'active' => [
                'type'         => 'int',
                'label'        => 'Active',
                'input'        => 'boolean',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => 1,
                'visible'      => true,
                'required'     => false,
                'user_defined' => true,
                'default'      => null,
                'group'        => 'General',
                'backend'      => '',
                'apply_to'     => 'membership',
                'used_in_product_listing' => true,
            ],
        ];
        return $fields;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    { 
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        if (version_compare($context->getVersion(), '1.0.9', '<')) {
            $attribs = $this->customAttributes();

            foreach($attribs as $key => $val){
                $eavSetup->addAttribute(
                    \Magento\Catalog\Model\Product::ENTITY,
                    $key,
                    $val
                );
            }

            $entityType = $eavSetup->getEntityTypeId('catalog_product');

            // $eavSetup->updateAttribute($entityType, 'news_from_date', 'frontend_label','Package available from ', null);
            $eavSetup->updateAttribute($entityType, 'category_ids', 'frontend_label','Member Types', null);
            $eavSetup->updateAttribute($entityType, 'price_rate', 'is_required',false, null);
            // $eavSetup->updateAttribute($entityType, 'news_from_date', 'is_user_defined','1', null);
            // $eavSetup->updateAttribute($entityType, 'news_to_date', 'is_user_defined','1', null);

            $attributes = [
                // 'association',
                // 'sell_online',
                // 'price_lookup_code',
                // 'price_rate',
                // 'product_ids',
                // 'show_on_invoice',
                // 'optional' ,
                // 'start_date',
                // 'end_date',
                // 'custom_calculation' 
            ];

            foreach($attributes as $attribute){
             $eavSetup->removeAttribute( \Magento\Catalog\Model\Product::ENTITY,$attribute);
            }
          
            $fieldList = [
                'name',
                'sku',
                'description',
                'quantity_and_stock_status',
                'price',
                'special_price',
                'special_from_date',
                'special_to_date',
                'minimal_price',
                'cost',
                'tier_price',
                'weight',
                'weight_type'
            ];
 
        // make these attributes applicable to new product type
        foreach ($fieldList as $field) {
            $applyTo = explode(
                ',',
                $eavSetup->getAttribute(\Magento\Catalog\Model\Product::ENTITY, $field, 'apply_to')
            );
            if (!in_array(\Packagecreate\Package\Model\Product\Type\Membership::TYPE_ID, $applyTo)) {
                $applyTo[] = \Packagecreate\Package\Model\Product\Type\Membership::TYPE_ID;
                array_push($applyTo,'simple','grouped');
                $eavSetup->updateAttribute(
                    \Magento\Catalog\Model\Product::ENTITY,
                    $field,
                    'apply_to',
                    // implode(',', $applyTo)
                    null
                );
            }
        }
       

        $remove_fields = ['news_from_date','news_to_date','quantity_and_stock_status','weight','weight_type'];

        foreach($remove_fields as $f){
            $eavSetup->updateAttribute(
                    \Magento\Catalog\Model\Product::ENTITY,
                    $f,
                    'apply_to',
                    // implode(',', $applyTo)
                    null
                );
        }
        }
    }
}