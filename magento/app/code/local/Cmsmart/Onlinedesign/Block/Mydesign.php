<?php
class Cmsmart_Onlinedesign_Block_Mydesign extends Mage_Core_Block_Template
{
	public function __construct()
    {
        parent::__construct();
		$helper = Mage::helper('onlinedesign/data');
		$uid = $helper->get_current_user_id();      
        $collection = Mage::getModel('sales/order')->getCollection()
					->addFieldToFilter('customer_id', $uid)
					->setOrder('created_at', 'DESC')
					;
        $this->setCollection($collection);
    }
	
	public function _prepareLayout()
    {
		parent::_prepareLayout();
		
		$pager = $this->getLayout()->createBlock('page/html_pager', 'custom.pager');
        $pager->setAvailableLimit(array(5=>5,10=>10,20=>20,'all'=>'all'));
        $pager->setCollection($this->getCollection());
        $this->setChild('pager', $pager);
        $this->getCollection()->load();
        return $this;
    }
    
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}