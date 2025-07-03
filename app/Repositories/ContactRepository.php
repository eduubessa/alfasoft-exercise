<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

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

    public function getAllWithPaginate(int $itemsPerPage, string $orderBy = 'id', string $orderDirection = 'asc')
    {
        return $this->contact
            ->orderBy($orderBy, $orderDirection)
            ->paginate($itemsPerPage);
    }

    public function getById(int $id)
    {
        return $this->contact->findOrFail($id);
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            return $this->contact->create($data);
        });
    }

    public function update(int $id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $contact = $this->contact->findOrFail($id);
            $contact->update($data);
            return $contact;
        });
    }

    public function delete(int $id)
    {
        return DB::transaction(function () use ($id) {
            $this->contact->findOrFail($id)->delete();
        });
    }
}
