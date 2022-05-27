<?php
declare(strict_types=1);

namespace ApiAssess\MsgAssess\Model\Data;

use Magento\Framework\DataObject;
use ApiAssess\MsgAssess\Api\Data\CustomtblInterface;

class Customtbl extends DataObject implements CustomtblInterface
{
    /**
     * Get id
     * @return int
     */
    public function getId()
    {
        return $this->getData('id');
    }

    /**
     * Set id
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData('id', $id);
    }

    /**
     * Get sku
     * @return string
     */
    public function getSku(): ?string
    {
        return $this->getData('sku');
    }

    /**
     * Set sku
     * @param string $sku
     * @return $this
     */
    public function setSku($sku)
    {
        return $this->setData('sku', $sku);
    }

    /**
     * Get customer_id
     * @return string|null
     */
    public function getCustomerId(): ?string
    {
        return $this->getData('customer_id');
    }

    /**
     * Set customer_id
     * @param string $customerid
     * @return $this
     */
    public function setCustomerId($customerid)
    {
        return $this->setData('customer_id', $customerid);
    }

    /**
     * Get quote_id
     * @return string
     */
    public function getQuoteId(): ?string
    {
        return $this->getData('quote_id');
    }

    /**
     * Set quote_id
     * @param string $quoteid
     * @return $this
     */
    public function setQuoteId($quoteid)
    {
        return $this->setData('quote_id', $quoteid);
    }

    /**
    * Get created
    * @return string|null
    */
    public function getCreated(): ?string
    {
        return $this->getData('created');
    }

    /**
     * Set created
     * @param string $created
     * @return $this
     */
    public function setCreated($created)
    {
        return $this->setData('created', $created);
    }
}
