<?php

namespace ApiAssess\MsgAssess\Model;

use ApiAssess\MsgAssess\Api\CartApiInterface;
use ApiAssess\MsgAssess\Api\Data\CustomtblInterfaceFactory;
use ApiAssess\MsgAssess\Model\ResourceModel\Customtbl\CollectionFactory;
use ApiAssess\MsgAssess\Model\CustomtblFactory as CartModel;
use ApiAssess\MsgAssess\Model\ResourceModel\Customtbl as CartResource;

class CustomtblRepository implements CartApiInterface
{
    /**
     * @var CustomtblInterfaceFactory
     */

    private $customtblInterfaceFactory;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var CartModel
     */
    private $model;

    /**
     * @var CartResource
     */

    private $resource;

    /**
     * @param CollectionFactory $collectionFactory
     * @param CustomtblInterfaceFactory $customtblInterfaceFactory
     * @param CustomtblFactory $model
     * @param CartResource $resource
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        CustomtblInterfaceFactory $customtblInterfaceFactory,
        CartModel $model,
        CartResource $resource
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->customtblInterfaceFactory = $customtblInterfaceFactory;
        $this->model = $model;
        $this->resource = $resource;
    }

    /**
     * @param int|null $pageId
     * @return \ApiAssess\MsgAssess\Api\Data\CustomtblInterface[]
     */
    public function getCartList(int $pageId = null)
    {
        if ($pageId == null) {
            $pageId = 1;
        }
        $data = [];
        try {
            $cartCollection = $this->collectionFactory->create()->setPageSize(5)->setCurPage($pageId);

            foreach ($cartCollection as $item) {
                $cartInterface = $this->customtblInterfaceFactory->create();
                $cartInterface->setId($item->getId());
                $cartInterface->setSku($item->getSku());
                $cartInterface->setCustomerId($item->getCustomerId());
                $cartInterface->setQuoteId($item->getQuoteId());
                $cartInterface->setCreated($item->getCreated());
                $data[] = $cartInterface;
            }
            return $data;
        } catch (LocalizedException $e) {
            throw LocalizedException(__('No data found'));
        }
    }

    /**
     * @param int $id
     * @return \ApiAssess\MsgAssess\Api\Data\CustomtblInterface[]
     */
    public function deleteCartById(int $id)
    {
        $model = $this->model->create();
        $this->resource->load($model, $id, 'id');

        try {
            $this->resource->delete($model);
            $response = ['success' => 'Deleted Successfully'];
            return $response;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param int $id
     * @return \ApiAssess\MsgAssess\Api\Data\CustomtblInterface[]
     */
    public function getCartById(int $id)
    {
        $model = $this->model->create();
        $this->resource->load($model, $id, 'id');
        $model->getData();
        $cartInterface = $this->customtblInterfaceFactory->create();
        $cartInterface->setId($model->getId());
        $cartInterface->setSku($model->getSku());
        $cartInterface->setCustomerId($model->getCustomerId());
        $cartInterface->setQuoteId($model->getQuoteId());
        $cartInterface->setCreated($model->getCreated());
        $data[] = $cartInterface;
        return $data;
    }

    /**
     * @param string $sku
     * @param int $quoteid
     * @param int $customerid
     * @param $created
     * @return \ApiAssess\MsgAssess\Api\Data\CustomtblInterface[]
     */
    public function saveCart(string $sku, int $quoteid, int $customerid = null, $created = null)
    {
        $model = $this->model->create();
        $model->setSku($sku);
        $model->setQuoteId($quoteid);

        if ($customerid != null) {
            $model->setCustomerId($customerid);
        }

        if ($created != null) {
            $model->setCreated($created);
        }
        try {
            $this->resource->save($model);
            $response = ['success' => 'Saved Successfully'];
            return $response;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param int $id
     * @param string $sku
     * @param int $quoteid
     * @param int $customerid
     * @param $created
     * @return \ApiAssess\MsgAssess\Api\Data\CustomtblInterface[]
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function updateCart($id, string $sku = null, int $quoteid = null, int $customerid = null, $created = null)
    {
        $model = $this->model->create();
        $this->resource->load($model, $id, 'id');

        if ($sku != null) {
            $model->setSku($sku);
        }

        if ($quoteid != null) {
            $model->setQuoteId($quoteid);
        }

        if ($customerid != null) {
            $model->setCustomerId($customerid);
        }

        if ($created != null) {
            $model->setCreated($created);
        }
        try {
            $this->resource->save($model);
            $response = ['success' => 'Updated Successfully'];
            return $response;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
