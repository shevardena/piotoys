<?php

namespace App\Interfaces;

interface PermissionRepositoryInterface
{
    public function getAll();

    public function getByIds(array $ids);

    public function find(int $id);
    public function store(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);
}

