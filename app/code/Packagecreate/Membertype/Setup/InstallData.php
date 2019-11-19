<?php
namespace Packagecreate\Membertype\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetupFactory;

class InstallData implements InstallDataInterface
{

	private $eavSetupFactory;

	public function __construct(EavSetupFactory $eavSetupFactory)
	{
		$this->eavSetupFactory = $eavSetupFactory;
	}

	public function getFields(){
		$fields = [
			'chapter_type' => [
				'type'         => 'int',
				'label'        => 'Chapter Type',
				'input'        => 'boolean',
				'sort_order'   => 100,
				'source'       => '',
				'global'       => 1,
				'visible'      => true,
				'required'     => false,
				'user_defined' => true,
				'default'      => null,
				'group'        => 'General',
				'backend'      => ''
			],
			'invoice_type' => [
				'type'         => 'varchar',
				'label'        => 'Invoice Type',
				'input'        => 'select',
				'sort_order'   => 100,
				'source'       => 'Packagecreate\Membertype\Model\Config\Invoicetype',
				'global'       => 1,
				'visible'      => true,
				'required'     => false,
				'user_defined' => true,
				'default'      => null,
				'group'        => 'General',
				'backend'      => ''
			],
			'percent_paid' => [
				'type'         => 'varchar',
				'label'        => 'Percent Paid',
				'input'        => 'text',
				'sort_order'   => 100,
				'source'       => '',
				'global'       => 1,
				'visible'      => true,
				'required'     => false,
				'user_defined' => true,
				'default'      => null,
				'group'        => 'General',
				'backend'      => ''
			],
			'membertype_status' => [
				'type'         => 'varchar',
				'label'        => 'Membertype Status',
				'input'        => 'select',
				'sort_order'   => 100,
				'source'       => 'Packagecreate\Membertype\Model\Config\Membertypestatus',
				'global'       => 1,
				'visible'      => true,
				'required'     => false,
				'user_defined' => true,
				'default'      => null,
				'group'        => 'General',
				'backend'      => ''
			],
			'customer_type' => [
				'type'         => 'varchar',
				'label'        => 'Customer Type',
				'input'        => 'select',
				'sort_order'   => 100,
				'source'       => 'Packagecreate\Membertype\Model\Config\Customertype',
				'global'       => 1,
				'visible'      => true,
				'required'     => false,
				'user_defined' => true,
				'default'      => null,
				'group'        => 'General',
				'backend'      => ''
			],
			'exclude_from_yos' => [
				'type'         => 'int',
				'label'        => 'Exclude from YOS',
				'input'        => 'boolean',
				'sort_order'   => 100,
				'source'       => '',
				'global'       => 1,
				'visible'      => true,
				'required'     => false,
				'user_defined' => true,
				'default'      => null,
				'group'        => 'General',
				'backend'      => ''
			],
			'receive_member_benefits' => [
				'type'         => 'int',
				'label'        => 'Receive Member Benefits',
				'input'        => 'boolean',
				'sort_order'   => 100,
				'source'       => '',
				'global'       => 1,
				'visible'      => true,
				'required'     => false,
				'user_defined' => true,
				'default'      => null,
				'group'        => 'General',
				'backend'      => ''
			],
			'membership_category' => [
				'type'         => 'int',
				'label'        => 'Membership Category',
				'input'        => 'select',
				'sort_order'   => 100,
				'source'       => 'Packagecreate\Membertype\Model\Config\Membershipcategory',
				'global'       => 1,
				'visible'      => true,
				'required'     => false,
				'user_defined' => true,
				'default'      => null,
				'group'        => 'General',
				'backend'      => ''
			],

		];

		return $fields;
	}

	public function install(
		ModuleDataSetupInterface $setup,
		ModuleContextInterface $context
	)
	{
		$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

		foreach($this->getFields() as $key => $val){
			$eavSetup->addAttribute(
				\Magento\Catalog\Model\Category::ENTITY,
				$key,
				$val
			);
		}

		
	}
}