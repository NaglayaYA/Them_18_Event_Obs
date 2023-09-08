<?php
namespace Perspective\Them18ex2EventPrice\Observer;

class Price implements \Magento\Framework\Event\ObserverInterface
{
    
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
      
        $products = $observer->getCollection();
        foreach( $products as $product )
        {
            $originalprice = $product->getPrice();
            $customprice = $originalprice * 1.20;
            $product->setPrice($customprice);
            $product->setCustomPrice($customprice);
            $product->setOriginalCustomPrice($customprice);
        }
        
    }
}