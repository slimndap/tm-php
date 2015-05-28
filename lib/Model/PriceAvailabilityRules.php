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
 * The rules for a priceavailability determine which pricetypes are active for
 * which saleschannels.
 *
 * The `defaultsaleschannelids` propertys lists the saleschannels for which all
 * pricetypes are available.
 *
 * The `exceptions` property can be used to define exceptions. Every pricetype that
 * is listed in an exception is only available for the saleschannels that are
 * listed in that exception. Thus if you add an exception for a specific pricetype
 * and list no saleschannels, it will not be available.
 *
 * ## Help Center
 *
 * Full documentation can be found in the Ticketmatic Help Center
 * (https://apps.ticketmatic.com/#/knowledgebase/api/types/PriceAvailabilityRules).
 */
class PriceAvailabilityRules implements \jsonSerializable
{
    /**
     * Create a new PriceAvailabilityRules
     *
     * @param array $data
     */
    public function __construct(array $data = array()) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * The saleschannels for which all pricetypes (which are not listed in exception)
     * are available.
     *
     * @var int[]
     */
    public $defaultsaleschannelids;

    /**
     * A list of pricetypes which are available for specific saleschannels.
     *
     * @var \Ticketmatic\Model\PriceAvailabilityRuleException[]
     */
    public $exceptions;

    /**
     * Unpack PriceAvailabilityRules from JSON.
     *
     * @param object $obj
     *
     * @return \Ticketmatic\Model\PriceAvailabilityRules
     */
    public static function fromJson($obj) {
        if ($obj === null) {
            return null;
        }

        return new PriceAvailabilityRules(array(
            "defaultsaleschannelids" => isset($obj->defaultsaleschannelids) ? $obj->defaultsaleschannelids : null,
            "exceptions" => isset($obj->exceptions) ? Json::unpackArray("PriceAvailabilityRuleException", $obj->exceptions) : null,
        ));
    }

    /**
     * Serialize PriceAvailabilityRules to JSON.
     *
     * @return array
     */
    public function jsonSerialize() {
        $result = array();
        if (!is_null($this->defaultsaleschannelids)) {
            $result["defaultsaleschannelids"] = $this->defaultsaleschannelids;
        }
        if (!is_null($this->exceptions)) {
            $result["exceptions"] = $this->exceptions;
        }

        return $result;
    }
}
