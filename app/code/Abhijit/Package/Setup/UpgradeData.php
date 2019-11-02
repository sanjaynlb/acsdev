<?php
namespace Abhijit\Package\Setup;

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


    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    { 
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        if (version_compare($context->getVersion(), '1.0.8', '<')) {

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
            if (!in_array(\Abhijit\Package\Model\Product\Type\Membership::TYPE_ID, $applyTo)) {
                $applyTo[] = \Abhijit\Package\Model\Product\Type\Membership::TYPE_ID;
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