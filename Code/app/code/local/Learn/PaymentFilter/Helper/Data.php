<?php
/**
 * Customer Group Payment Filter 
 *
 * @category   Payment Filter
 * @package    Learn_PaymentFilter
 * @author     Payment Filter
 *
 */

class Learn_PaymentFilter_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_PAYMENT_FILTER_CCSAVE_CUSTOMER_GROUP   		= 'payment/ccsave/customer_group';
    const XML_PATH_PAYMENT_FILTER_CHECKMO_CUSTOMER_GROUP   		= 'payment/checkmo/customer_group';
    const XML_PATH_PAYMENT_FILTER_FREE_CUSTOMER_GROUP   		= 'payment/free/customer_group';
    const XML_PATH_PAYMENT_FILTER_PO_CUSTOMER_GROUP   			= 'payment/purchaseorder/customer_group';
    const XML_PATH_PAYMENT_FILTER_BANK_TRANSFER_CUSTOMER_GROUP	= 'payment/banktransfer/customer_group';  
    const XML_PATH_PAYMENT_FILTER_COD_CUSTOMER_GROUP   			= 'payment/cashondelivery/customer_group';

	public function conf($code, $store = null) {
        return Mage::getStoreConfig($code, $store);
    }
	
	public function getccsaveCustomerGroup($store = null) {
		return $this->conf(self::XML_PATH_PAYMENT_FILTER_CCSAVE_CUSTOMER_GROUP, $store);
	}

	public function getcheckmoCustomerGroup($store = null) {
		return $this->conf(self::XML_PATH_PAYMENT_FILTER_CHECKMO_CUSTOMER_GROUP, $store);
	}

	public function getfreeCustomerGroup($store = null) {
		return $this->conf(self::XML_PATH_PAYMENT_FILTER_FREE_CUSTOMER_GROUP, $store);
	}

	public function getpurchaseorderCustomerGroup($store = null) {
		return $this->conf(self::XML_PATH_PAYMENT_FILTER_PO_CUSTOMER_GROUP, $store);
	}

	public function getbanktransferCustomerGroup($store = null) {
		return $this->conf(self::XML_PATH_PAYMENT_FILTER_BANK_TRANSFER_CUSTOMER_GROUP, $store);
	}

	public function getcashondeliveryCustomerGroup($store = null) {
		return $this->conf(self::XML_PATH_PAYMENT_FILTER_COD_CUSTOMER_GROUP, $store);
	}
}