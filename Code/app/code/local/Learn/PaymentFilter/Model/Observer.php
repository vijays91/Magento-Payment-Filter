<?php
/**
 * Customer Group Payment Filter 
 *
 * @category   Payment Filter
 * @package    Learn_PaymentFilter
 * @author     Payment Filter
 *
 */

class Learn_PaymentFilter_Model_Observer
{
    const PAYMENT_METHOD_CCSAVE_CODE 	= 'ccsave';
    const PAYMENT_METHOD_CHECKMO_CODE 	= 'checkmo';
    const PAYMENT_METHOD_FREE_CODE 		= 'free';
    const PAYMENT_METHOD_PO_CODE 		= 'purchaseorder';
    const PAYMENT_METHOD_COD_CODE 		= 'cashondelivery';
    const PAYMENT_METHOD_BANKTRANSFER_CODE = 'banktransfer';
    
	protected $payment_codes = array('ccsave', 'checkmo', 'free', 'purchaseorder', 'cashondelivery', 'banktransfer');

	public function payment_method_filter(Varien_Event_Observer $observer) {

		/* Helper Initi*/
		$_helper = Mage::helper('paymentfilter');

		$c_groups = "";

		$method = $observer->getEvent()->getMethodInstance();
		if(Mage::getSingleton('customer/session')->isLoggedIn()) {
			/*- CUSTOMER ROLE -*/
			$roleId = Mage::getSingleton('customer/session')->getCustomerGroupId();
			$role = Mage::getSingleton('customer/group')->load($roleId)->getData('customer_group_code');
			foreach($this->payment_codes as $payment_code) {	
				if($method->getCode() == $payment_code) {
					$quote = $observer->getEvent()->getQuote();
					/*- CHECK helper FUNCTION EXIST -*/
					$function = "get". $payment_code . "CustomerGroup";

					/* check method exist or not */
					if (!method_exists($_helper, $function)) {
						continue;
					}

					$c_groups = $_helper->$function();
					if($c_groups) {
						if(in_array($roleId, explode(",", $c_groups))) {
							$result = $observer->getEvent()->getResult();   
							$result->isAvailable = true;
							return;
						} else {
							$result = $observer->getEvent()->getResult();   
							$result->isAvailable = false;
						}
					}
				}
			}

			// /*- CC SAVE -*/
			// if($method->getCode() == $ccsave_code) {
			// 	$quote = $observer->getEvent()->getQuote();
			// 	if($ccsave) {
			// 		if(in_array($roleId, explode(",", $ccsave))) {
			// 			$result = $observer->getEvent()->getResult();   
			// 			$result->isAvailable = true;
			// 			return;
			// 		} else {
			// 			$result = $observer->getEvent()->getResult();   
			// 			$result->isAvailable = false;
			// 		}
			// 	}
			// }

			// /*- CHECKMO -*/
			// if($method->getCode() == $checkmo_code) {
			// 	$quote = $observer->getEvent()->getQuote();
			// 	if($checkmo) {
			// 		if(in_array($roleId, explode(",", $checkmo))) {
			// 			$result = $observer->getEvent()->getResult();   
			// 			$result->isAvailable = true;
			// 			return;
			// 		} else {
			// 			$result = $observer->getEvent()->getResult();   
			// 			$result->isAvailable = false;
			// 		}
			// 	}
			// }

			// /*- FREE -*/
			// if($method->getCode() == $free_code) {
			// 	$quote = $observer->getEvent()->getQuote();
			// 	if($free) {
			// 		if(in_array($roleId, explode(",", $free))) {
			// 			$result = $observer->getEvent()->getResult();   
			// 			$result->isAvailable = true;
			// 			return;
			// 		} else {
			// 			$result = $observer->getEvent()->getResult();   
			// 			$result->isAvailable = false;
			// 		}
			// 	}
			// }

			// /*- PO -*/
			// if($method->getCode() == $banktransfer_code) {
			// 	$quote = $observer->getEvent()->getQuote();
			// 	if($purchaseorder) {
			// 		if(in_array($roleId, explode(",", $purchaseorder))) {
			// 			$result = $observer->getEvent()->getResult();   
			// 			$result->isAvailable = true;
			// 			return;
			// 		} else {
			// 			$result = $observer->getEvent()->getResult();   
			// 			$result->isAvailable = false;
			// 		}
			// 	}
			// }

			// /*- BANK TRANSFER -*/
			// if($method->getCode() == $purchaseorder_code) {
			// 	$quote = $observer->getEvent()->getQuote();
			// 	if($banktransfer) {
			// 		if(in_array($roleId, explode(",", $banktransfer))) {
			// 			$result = $observer->getEvent()->getResult();   
			// 			$result->isAvailable = true;
			// 			return;
			// 		} else {
			// 			$result = $observer->getEvent()->getResult();   
			// 			$result->isAvailable = false;
			// 		}
			// 	}
			// }

			// /*- COD -*/
			// if($method->getCode() == $cashondelivery_code) {
			// 	$quote = $observer->getEvent()->getQuote();
			// 	if($cashondelivery) {
			// 		if(in_array($roleId, explode(",", $cashondelivery))) {
			// 			$result = $observer->getEvent()->getResult();   
			// 			$result->isAvailable = true;
			// 			return;
			// 		} else {
			// 			$result = $observer->getEvent()->getResult();   
			// 			$result->isAvailable = false;
			// 		}
			// 	}
			// }

		}
	}
}