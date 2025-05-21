<?php

namespace TeaAroma\Lexicon\Standards\Repositories\Interfaces;


use Illuminate\Database\Eloquent\Collection;
use TeaAroma\Lexicon\Standards\Data\Interfaces\HasOptionsInterface;


/**
 * Interface for reading records.
 */
interface ReadInterface
{
    /**
     * Gets all records by the specified options.
     *
     * @param HasOptionsInterface $options
     *
     * @return Collection
     */
    public function records(HasOptionsInterface $options): Collection;
}
