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
 * A set of fields to create a filter definition. More info: see the create
 * operation
 * (https://apps.ticketmatic.com/#/knowledgebase/api/settings_system_filterdefinitions/create)
 * and the filter definitions endpoint
 * (https://apps.ticketmatic.com/#/knowledgebase/api/settings_system_filterdefinitions).
 */
class CreateFilterDefinition implements \jsonSerializable
{
    /**
     * Create a new CreateFilterDefinition
     *
     * @param array $data
     */
    public function __construct(array $data = array()) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Type ID
     *
     * @var int
     */
    public $typeid;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $sqlclause;

    /**
     * @var int
     */
    public $filtertype;

    /**
     * @var string
     */
    public $checklistquery;

    /**
     * Unpack CreateFilterDefinition from JSON.
     *
     * @param object $obj
     *
     * @return \Ticketmatic\Model\CreateFilterDefinition
     */
    public static function fromJson($obj) {
        return new CreateFilterDefinition(array(
            "typeid" => $obj->typeid,
            "description" => $obj->description,
            "sqlclause" => $obj->sqlclause,
            "filtertype" => $obj->filtertype,
            "checklistquery" => $obj->checklistquery,
        ));
    }

    /**
     * Serialize CreateFilterDefinition to JSON.
     *
     * @return array
     */
    public function jsonSerialize() {
        $result = array();
        foreach ($fields as $field) {
            if (!is_null($this->typeid)) {
                $result["typeid"] = intval($this->typeid);
            }
            if (!is_null($this->description)) {
                $result["description"] = strval($this->description);
            }
            if (!is_null($this->sqlclause)) {
                $result["sqlclause"] = strval($this->sqlclause);
            }
            if (!is_null($this->filtertype)) {
                $result["filtertype"] = intval($this->filtertype);
            }
            if (!is_null($this->checklistquery)) {
                $result["checklistquery"] = strval($this->checklistquery);
            }

        }
        return $result;
    }
}
