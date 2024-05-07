<?php declare(strict_types=1);
/**
 * @author     Osiozekhai Aliu
 * @package    Osio_AssemblyService
 * @copyright  Copyright (c) 2024 Osiozekhai Aliu (https://github.com/aliuosio)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BIWAC\ProductClassToPostcode\Api\Data;

interface ProductClassInterface
{

    const ENTITY_ID = 'id';
    const CLASS_ID = 'class_id';
    const POSTCODE = 'postcode';
    const PRICE = 'price';

    public function getEntityId(): ?int;

    public function setEntityId($entityId): ProductClassInterface;

    public function getClassId(): int;

    public function setClassId(int $classId): ProductClassInterface;

    public function getPostcode(): int;

    public function setPostcode(int $postcode): ProductClassInterface;

    public function getPrice(): float;

    public function setPrice(float $price): ProductClassInterface;
}
