<?php
/**
 * Shopware 5
 * Copyright (c) shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 */

namespace Shopware\Bundle\CartBundle\Domain\Price;

use Shopware\Framework\Struct\Collection;

class PriceDefinitionCollection extends Collection
{
    /**
     * @var PriceDefinition[]
     */
    protected $elements = [];

    /**
     * @param PriceDefinition[] $elements
     */
    public function fill(array $elements): void
    {
        foreach ($elements as $key => $element) {
            $this->add($element, $key);
        }
    }

    public function add(PriceDefinition $priceDefinition, $key = null): void
    {
        if ($key) {
            $this->elements[$key] = $priceDefinition;
        } else {
            $this->elements[] = $priceDefinition;
        }
    }

    public function remove($key): void
    {
        parent::doRemoveByKey($key);
    }

    public function get($key): ? PriceDefinition
    {
        if ($this->has($key)) {
            return $this->elements[$key];
        }

        return null;
    }
}
