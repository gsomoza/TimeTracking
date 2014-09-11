<?php
/**
 * CollectionIds.php
 * @author      Gabriel Somoza <gabriel@usestrategery.com>
 * @date        8/26/2014 12:18 AM
 * @copyright   Copyright (c) 2014
 */

namespace DbApi\Hydrator\Strategy;


use Doctrine\Common\Collections\Collection;
use Doctrine\Entity;
use DoctrineModule\Stdlib\Hydrator\Strategy\AbstractCollectionStrategy;

class CollectionIds extends AbstractCollectionStrategy {

    /**
     * Converts collections into an array if IDs.
     *
     * @param Collection $value The original value.
     *
     * @return mixed Returns the value that should be extracted.
     */
	public function extract( $value ) {
		$ids = [];
		foreach($value as $element) {
			$ids[] = $element->getId();
		};
		return $ids;
	}

	/**
	 * Converts the given value so that it can be hydrated by the hydrator.
	 *
	 * @param mixed $value The original value.
	 * @param array $data (optional) The original data for context.
	 *
	 * @return mixed Returns the value that should be hydrated.
	 */
	public function hydrate( $value ) {
		// TODO: Implement hydrate() method.
	}

}
