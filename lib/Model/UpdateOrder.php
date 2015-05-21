<?php
/**
 * Copyright (C) 2014-2015 by Ticketmatic BVBA <developers@ticketmatic.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @license     MIT X11 http://opensource.org/licenses/MIT
 * @author      Ticketmatic BVBA <developers@ticketmatic.com>
 * @copyright   Ticketmatic BVBA
 * @link        http://www.ticketmatic.com/
 */

namespace Ticketmatic\Model;

use Ticketmatic\Json;

/**
 * Used to update an order. Each of the fields is optional. Omitting a field will
 * leave it unchanged.
 *
 * ## Help Center
 *
 * Full documentation can be found in the Ticketmatic Help Center
 * (https://apps.ticketmatic.com/#/knowledgebase/api/types/UpdateOrder).
 */
class UpdateOrder implements \jsonSerializable
{
    /**
     * Create a new UpdateOrder
     *
     * @param array $data
     */
    public function __construct(array $data = array()) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * New delivery scenario ID
     *
     * @var int
     */
    public $deliveryscenarioid;

    /**
     * Delivery address
     *
     * @var \Ticketmatic\Model\Address
     */
    public $deliveryaddress;

    /**
     * New payment scenario ID
     *
     * @var int
     */
    public $paymentscenarioid;

    /**
     * New customer ID
     *
     * @var int
     */
    public $customerid;

    /**
     * Change custom field values
     *
     * @var object[]
     */
    public $customfields;

    /**
     * Unpack UpdateOrder from JSON.
     *
     * @param object $obj
     *
     * @return \Ticketmatic\Model\UpdateOrder
     */
    public static function fromJson($obj) {
        if ($obj === null) {
            return null;
        }

        return new UpdateOrder(array(
            "deliveryscenarioid" => isset($obj->deliveryscenarioid) ? $obj->deliveryscenarioid : null,
            "deliveryaddress" => isset($obj->deliveryaddress) ? Address::fromJson($obj->deliveryaddress) : null,
            "paymentscenarioid" => isset($obj->paymentscenarioid) ? $obj->paymentscenarioid : null,
            "customerid" => isset($obj->customerid) ? $obj->customerid : null,
            "customfields" => isset($obj->customfields) ? $obj->customfields : null,
        ));
    }

    /**
     * Serialize UpdateOrder to JSON.
     *
     * @return array
     */
    public function jsonSerialize() {
        $result = array();
        if (!is_null($this->deliveryscenarioid)) {
            $result["deliveryscenarioid"] = intval($this->deliveryscenarioid);
        }
        if (!is_null($this->deliveryaddress)) {
            $result["deliveryaddress"] = $this->deliveryaddress;
        }
        if (!is_null($this->paymentscenarioid)) {
            $result["paymentscenarioid"] = intval($this->paymentscenarioid);
        }
        if (!is_null($this->customerid)) {
            $result["customerid"] = intval($this->customerid);
        }
        if (!is_null($this->customfields)) {
            $result["customfields"] = $this->customfields;
        }

        return $result;
    }
}