<?php

namespace ApiAssess\MsgAssess\Model\ResourceModel;

class Customtbl extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('cart_customtbl', 'id');   // "cart_customtbl" is table name and "id" is the primary key of custom table
    }
}
