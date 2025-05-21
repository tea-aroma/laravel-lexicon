<?php

namespace TeaAroma\Lexicon\Standards\Repositories\Interfaces;


use Illuminate\Database\Eloquent\Model;
use TeaAroma\Lexicon\Standards\Data\Interfaces\HasAttributesInterface;


/**
 * Interface for writing records.
 */
interface WriteInterface
{
    /**
     * Writes a record by the specified attributes.
     *
     * @param HasAttributesInterface $attributes
     *
     * @return Model
     */
    public function write(HasAttributesInterface $attributes): Model;
}
