<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

class ContactRepository
{
    public function __construct(
        protected Contact $contact
    )
    {
    }

    public function getAll(): Collection
    {
        return $this->contact->all();
    }

    public function getAllWithPaginate(int $itemsPerPage)
    {
        return $this->contact->paginate($itemsPerPage);
    }

    public function getById(int $id)
    {
        return $this->contact->findOrFail($id);
    }
}
