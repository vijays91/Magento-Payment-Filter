<?php
/**
 * Customer Group Payment Filter 
 *
 * @category   Payment Filter
 * @package    Learn_PaymentFilter
 * @author     Payment Filter
 *
 */

class Learn_PaymentFilter_Model_Dropdown_PaymentMethod
{
	/**
	* Options getter
	*
	* @return array
	*/
	public function toOptionArray() {
		$store_id = $this->getStoreId();
		$payments = Mage::getSingleton('payment/config')->getAllMethods($store_id); // All payment methods
		// $payments = Mage::getSingleton("payment/config")->getActiveMethods($store_id); // Only Active payment methods
		foreach ($payments as $paymentCode => $paymentModel) {
			$paymentTitle = Mage::getStoreConfig('payment/'.$paymentCode.'/title');
			$payment_methods[] = array(
				'value'	=> $paymentCode,
				'label'	=> $paymentTitle,
			);
		}
		return $payment_methods;
	}

	/**
	* Get store Id
	*
	* @return integer ($store_id)
	*/
	public function getStoreId() {
		if (strlen($code = Mage::getSingleton('adminhtml/config_data')->getStore())) {
			$store_id = Mage::getModel('core/store')->load($code)->getId();
		} elseif (strlen($code = Mage::getSingleton('adminhtml/config_data')->getWebsite())) {
			$website_id = Mage::getModel('core/website')->load($code)->getId();
			$store_id = Mage::app()->getWebsite($website_id)->getDefaultStore()->getId();
		} else {
			$store_id = 0;
		}
		
		return $store_id;
	}
}