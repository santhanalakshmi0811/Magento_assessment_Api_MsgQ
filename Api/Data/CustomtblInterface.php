<?php
declare(strict_types=1);

namespace ApiAssess\MsgAssess\Api\Data;

interface CustomtblInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

     /**
     * Get id
     * @return int
     */
    public function getId();

    /**
     * Set id
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get sku
     * @return string
     */
    public function getSku();

    /**
     * Set sku
     * @param string $sku
     * @return $this
     */
    public function setSku($sku);

    /**
     * Get customer_id
     * @return string
     */
    public function getCustomerId();

    /**
     * Set customer_id
     * @param string $customerid
     * @return $this
     */
    public function setCustomerId($customerid);

    /**
     * Get quote_id
     * @return string
     */
    public function getQuoteId();

    /**
     * Set quote_id
     * @param string $quoteid
     * @return $this
     */
    public function setQuoteId($quoteid);

    /**
     * Get created
     * @return string
     */
    public function getCreated();

    /**
     * Set created
     * @param string $created
     * @return $this
     */
    public function setCreated($created);
}
