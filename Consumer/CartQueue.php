<?php

namespace ApiAssess\MsgAssess\Consumer;

use Magento\Framework\Serialize\SerializerInterface;
use ApiAssess\MsgAssess\Model\CustomtblFactory as CartModel;
use ApiAssess\MsgAssess\Model\ResourceModel\Customtbl as CartResource;

class CartQueue
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var CartModel
     */
    protected $model;

    /**
     * @var CartResource
     */
    protected $resource;
    protected $_logger;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(
        SerializerInterface $serializer,
        CartModel $model,
        CartResource $resource,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->serializer = $serializer;
        $this->model = $model;
        $this->resource = $resource;
        $this->_logger = $logger;
    }

    /**
     * @param $data
     * @return void
     */
    public function consume($data)
    {
        $model = $this->model->create();
        $this->_logger->info($data);
        $unserialarr = $this->serializer->unserialize($data);
        $model->setData($unserialarr);
        try {
            $this->resource->save($model);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
