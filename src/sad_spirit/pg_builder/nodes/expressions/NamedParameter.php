<?php

/**
 * Query builder for Postgres backed by SQL parser
 *
 * LICENSE
 *
 * This source file is subject to BSD 2-Clause License that is bundled
 * with this package in the file LICENSE and available at the URL
 * https://raw.githubusercontent.com/sad-spirit/pg-builder/master/LICENSE
 *
 * @package   sad_spirit\pg_builder
 * @copyright 2014-2021 Alexey Borzov
 * @author    Alexey Borzov <avb@php.net>
 * @license   https://opensource.org/licenses/BSD-2-Clause BSD 2-Clause license
 * @link      https://github.com/sad-spirit/pg-builder
 */

declare(strict_types=1);

namespace sad_spirit\pg_builder\nodes\expressions;

use sad_spirit\pg_builder\TreeWalker;

/**
 * Represents a named ':foo' query parameter
 *
 * @property-read string $name
 */
class NamedParameter extends Parameter
{
    /** @var string */
    protected $p_name;

    protected $propertyNames = [
        'name' => 'p_name'
    ];

    public function __construct(string $name)
    {
        $this->p_name = $name;
    }

    public function dispatch(TreeWalker $walker)
    {
        return $walker->walkNamedParameter($this);
    }

    public function serialize(): string
    {
        return $this->p_name;
    }

    public function __serialize(): array
    {
        return [$this->p_name];
    }

    public function unserialize($serialized)
    {
        $this->p_name = $serialized;
    }

    public function __unserialize(array $data): void
    {
        [$this->p_name] = $data;
    }
}
