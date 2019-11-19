<?php
namespace Packagecreate\Package\Model\Config\Product;
 
use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
 
 
class Listofproducts extends AbstractSource
{
    protected $optionFactory;
    protected $_productCollectionFactory;

    public function __construct(        
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory        
    )
    {
        $this->_productCollectionFactory = $productCollectionFactory;        
    }

    public function getAllOptions()
    {    	
        $this->_options = [];
        $products = $this->products();

        foreach($products as $prod){
        	$this->_options[] = ['label' => $prod->getName(), 'value' => $prod->getId()];
        }

        // echo "<pre>";
        // print_r($this->options);
        // exit;
        // $this->_options[] = ['label' => 'Label 1', 'value' => 'value 1'];
        // $this->_options[] = ['label' => 'Label 2', 'value' => 'value 2'];
    
        return $this->_options;
    }

    public function products(){
    	$collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addAttributeToFilter('type_id', \Magento\Catalog\Model\Product\Type::TYPE_SIMPLE);
        $collection->getSelect()->order('created_at', \Magento\Framework\DB\Select::SQL_DESC);
        // $collection->getSelect()->limit(10);
        return $collection;
    }
}