<?php

namespace ApiAssess\MsgAssess\Api;

interface CartApiInterface
{

    /**
     * @param int $pageId
     * @return \ApiAssess\MsgAssess\Api\Data\CustomtblInterface[]
     */
    public function getCartList(int $pageId = null);

    /**
     * @param int $id
     * @return \ApiAssess\MsgAssess\Api\Data\CustomtblInterface[]
     */
    public function deleteCartById(int $id);

    /**
     * @param int $id
     * @return \ApiAssess\MsgAssess\Api\Data\CustomtblInterface[]
     */
    public function getCartById(int $id);

    /**
     * @param string $sku
     * @param int $quoteid
     * @param int $customerid
     * @param $created
     * @return \ApiAssess\MsgAssess\Api\Data\CustomtblInterface[]
     */
    public function saveCart(string $sku, int $quoteid, int $customerid = null, $created = null);

    /**
     * @param int $id
     * @param string $sku
     * @param int $quoteid
     * @param int $customerid
     * @param $created
     * @return \ApiAssess\MsgAssess\Api\Data\CustomtblInterface[]
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function updateCart($id, string $sku = null, int $quoteid = null, int $customerid = null, $created = null);
}
