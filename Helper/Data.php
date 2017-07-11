<?php

class Perfection_PreventBot_Helper_data extends Mage_Core_Helper_Abstract
{
    public function isEnabled() {
        return $value = Mage::getStoreConfig('preventbot/general/enabled');
    }
}