<?php

namespace Perspective\SampleEvent\Controller\Index;


class TestEvent extends \Magento\Framework\App\Action\Action

{

    public function execute()

    {

        $textDisplay = new \Magento\Framework\DataObject(array('text' => 'Perspective'));

               $this->_eventManager->dispatch('perspective_display_text', ['mp_text' => $textDisplay]);

               echo $textDisplay->getText();

               exit;

    }

}
