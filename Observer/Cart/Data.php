<?php

namespace ApiAssess\MsgAssess\Observer\Cart;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Quote\Api\CartRepositoryInterface;
use ApiAssess\MsgAssess\Publisher\CartQueue;
use Magento\Quote\Model\Quote;

class Data implements ObserverInterface
{
    /**
     * @var CheckoutSession
     * @var CustomerSession
     * @var CartRepositoryInterface
     * @var CartQueue
     */
    protected CheckoutSession $checkoutSession;
    protected CustomerSession $customerSession;
    protected CartRepositoryInterface $quoteRepository;
    protected CartQueue $publisher;

    /**
    * @param CheckoutSession $checkoutSession
    * @param CustomerSession $customerSession
    * @param CartRepositoryInterface $quoteRepository
    * @param CartQueue $publisher
    */
    public function __construct(
        CheckoutSession $checkoutSession,
        CustomerSession $customerSession,
        CartRepositoryInterface $quoteRepository,
        CartQueue $publisher
    ) {
        $this->checkoutSession = $checkoutSession;
        $this->customerSession = $customerSession;
        $this->quoteRepository = $quoteRepository;
        $this->publisher = $publisher;
    }

    /**
     * Below is the method that will fire whenever the event runs!
     *
     * @param Observer $observer
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function execute(Observer $observer)
    {
        $customerid = ($this->customerSession->isLoggedIn()) ? $this->customerSession->getCustomerId():null;
        $product = $observer->getProduct();
        $sku = $product->getSKU();
        /** @var Quote  */
        $quote = $this->checkoutSession->getQuote();
        $quoteId = $quote->getId();

        $data = ['sku'=>$sku,
                 'customer_id'=>$customerid,
                 'quote_id'=>$quoteId
                ];
        $this->publisher->publish($data);
    }
}
