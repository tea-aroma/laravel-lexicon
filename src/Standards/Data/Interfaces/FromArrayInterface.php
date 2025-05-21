<?php

namespace TeaAroma\Lexicon\Standards\Data\Interfaces;


/**
 * Interface for providing creation an instance from an array.
 */
interface FromArrayInterface
{
    /**
     * Creates a new instance from the specified array.
     *
     * @param array $array
     *
     * @return static
     */
    public function fromArray(array $array): static;
}
