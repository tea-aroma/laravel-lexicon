<?php

namespace TeaAroma\Lexicon\Standards\Repositories\Interfaces;


/**
 * Interface for deleting records.
 */
interface DeleteInterface
{
    /**
     * Deletes a record by the specified id.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function delete(int $id): mixed;
}
