<?php

class Cmsmart_Onlinedesign_Model_Mysql4_Art_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('onlinedesign/art');
    }
}