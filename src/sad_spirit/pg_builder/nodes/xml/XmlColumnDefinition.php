<?php

/**
 * Query builder for PostgreSQL backed by a query parser
 *
 * LICENSE
 *
 * This source file is subject to BSD 2-Clause License that is bundled
 * with this package in the file LICENSE and available at the URL
 * https://raw.githubusercontent.com/sad-spirit/pg-builder/master/LICENSE
 *
 * @package   sad_spirit\pg_builder
 * @copyright 2014-2020 Alexey Borzov
 * @author    Alexey Borzov <avb@php.net>
 * @license   http://opensource.org/licenses/BSD-2-Clause BSD 2-Clause license
 * @link      https://github.com/sad-spirit/pg-builder
 */

declare(strict_types=1);

namespace sad_spirit\pg_builder\nodes\xml;

use sad_spirit\pg_builder\nodes\GenericNode;
use sad_spirit\pg_builder\nodes\Identifier;

/**
 * Base class for column definitions in XMLTABLE clause
 *
 * @property Identifier $name
 */
abstract class XmlColumnDefinition extends GenericNode
{
    /** @var Identifier */
    protected $p_name;

    public function __construct(Identifier $name)
    {
        $this->generatePropertyNames();
        $this->setName($name);
    }

    public function setName(Identifier $name): void
    {
        $this->setProperty($this->p_name, $name);
    }
}
