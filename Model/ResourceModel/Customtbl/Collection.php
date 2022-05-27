<?php
declare(strict_types=1);

namespace ApiAssess\MsgAssess\Model\ResourceModel\Customtbl;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    protected function _construct()
    {
        $this->_init(
            \ApiAssess\MsgAssess\Model\Customtbl::class,
            \ApiAssess\MsgAssess\Model\ResourceModel\Customtbl::class
        );
    }
}
