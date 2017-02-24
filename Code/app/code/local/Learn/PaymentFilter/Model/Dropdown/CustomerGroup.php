<?php
/**
 * Customer Group Payment Filter 
 *
 * @category   Payment Filter
 * @package    Learn_PaymentFilter
 * @author     Payment Filter
 *
 */

class Learn_PaymentFilter_Model_Dropdown_CustomerGroup
{
	/**
	* Options getter
	*
	* @return array
	*/
	public function toOptionArray() {
		$customerGroups = Mage::getModel('customer/group')->getCollection();
		foreach ($customerGroups as $group) {
			// $tax_class_id => $group->getTaxClassId();
			$c_gropus[] = array(
				'value' => $group->getCustomerGroupId(),
				'label' => $group->getCustomerGroupCode(),
			);
		}
		return $c_gropus;
	}
}