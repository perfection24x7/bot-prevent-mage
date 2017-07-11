<?php

class Perfection_PreventBot_Model_Observer extends Varien_Object {

    public function checkForBotUserRestriction(Varien_Event_Observer $observer) {
        $isValid = true; // Default assuming it is not a bot registration.
        $helper = Mage::helper('preventbot');
        $isActive = $helper->isEnabled();
        if ($isActive) {
            $postData = Mage::app()->getRequest()->getPost();
            //echo "<pre>"; print_r($postData); die;
            if (isset($postData['blank-entry'])) {
                if (trim($postData['blank-entry']) != "") {
                    Mage::getSingleton('core/session')->addError("Sorry! Something wrong with registration. Please contact to support team.");
                    $isValid = false;
                }
            }
        } else {
            //echo "Not Active"; die;
        }
        if (!$isValid) {
            $previousUrl = Mage::getUrl('customer/account/create/');
            Mage::app()->getResponse()->setRedirect($previousUrl)->sendResponse();
            exit();
        }
    }
}