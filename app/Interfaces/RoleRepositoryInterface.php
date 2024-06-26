<?php

namespace App\Interfaces;

interface RoleRepositoryInterface
{
    public function getAll();

    public function getByIds(array $ids);

    public function find(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id): void;
}
