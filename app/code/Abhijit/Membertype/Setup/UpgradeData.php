<?php
namespace Abhijit\Membertype\Setup;

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

        if (version_compare($context->getVersion(), '1.0.2', '<')) {

            $entityType = $eavSetup->getEntityTypeId('catalog_category');            

            // $eavSetup->updateAttribute($entityType, 'news_from_date', 'frontend_label','Package available from ', null);
            $eavSetup->updateAttribute($entityType, 'name', 'frontend_label','Member-type Name', null);
            // $eavSetup->updateAttribute($entityType, 'price_rate', 'is_required',false, null);
            // $eavSetup->updateAttribute($entityType, 'news_from_date', 'is_user_defined','1', null);
            // $eavSetup->updateAttribute($entityType, 'news_to_date', 'is_user_defined','1', null);

        }
    }
}