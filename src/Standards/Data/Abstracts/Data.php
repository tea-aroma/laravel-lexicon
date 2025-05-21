<?php

namespace TeaAroma\Lexicon\Standards\Data\Abstracts;


/**
 * Provides the abstract logic for working with data properties.
 */
abstract class Data
{
    /**
     * @param array $values
     */
    protected function __construct(array $values)
    {
        $this->fill($values);
    }

    /**
     * Gets the all properties by the specified filter.
     *
     * @param int|null $filter
     *
     * @return \ReflectionProperty[]
     */
    public function getProperties(?int $filter = \ReflectionProperty::IS_PUBLIC): array
    {
        return (new \ReflectionClass($this))->getProperties($filter);
    }

    /**
     * Merges a specified instance to current.
     *
     * @param Data $target
     *
     * @return Data
     */
    public function merge(Data $target): Data
    {
        $this->fill($target->toArray());

        return $this;
    }

    /**
     * Converts this instance to array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $array = [];

        foreach ($this->getProperties() as $property)
        {
            $array[ $property->getName() ] = $property->getValue($this);
        }

        return $array;
    }

    /**
     * Fills this instance by the specified values.
     *
     * @param array $values
     *
     * @return $this
     */
    public function fill(array $values): static
    {
        foreach ($this->getProperties() as $property)
        {
            if (!array_key_exists($property->getName(), $values))
            {
                continue;
            }

            $property->setValue($this, $values[ $property->getName() ]);
        }

        return $this;
    }
}
