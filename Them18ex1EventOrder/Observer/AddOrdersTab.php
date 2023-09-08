<?php

namespace Perspective\Them18ex1EventOrder\Observer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
class AddOrdersTab implements \Magento\Framework\Event\ObserverInterface
{
    protected $layout;

    public function __construct(
        \Magento\Framework\View\LayoutInterface $layout
    ) {
        $this->layout = $layout;
    }

    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();

        // Check if the loaded entity is a product
        if ($product instanceof \Magento\Catalog\Model\Product) {
            // Create a new block for the Orders tab
            $block = $this->layout->createBlock(
                \Magento\Framework\View\Element\Template::class
            );
            $block->setTemplate('Custom_Module::orders_tab.phtml');

            // Add the Orders tab to the product view page
            $product->setCustomOrdersTabBlock($block);
        }
    }
}
