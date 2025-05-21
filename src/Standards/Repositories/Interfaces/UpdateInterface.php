<?php

namespace TeaAroma\Lexicon\Standards\Repositories\Interfaces;


use TeaAroma\Lexicon\Standards\Data\Interfaces\HasAttributesInterface;


/**
 * Interface for updating records.
 */
interface UpdateInterface
{
    /**
     * Updates a record by the specified values.
     *
     * @param HasAttributesInterface $values
     *
     * @return int
     */
    public function update(HasAttributesInterface $values): int;
}
