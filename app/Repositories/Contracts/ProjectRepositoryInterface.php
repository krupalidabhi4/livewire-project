<?php
namespace App\Repositories\Contracts;

interface ProjectRepositoryInterface
{
    public function paginate(int $perPage);
    public function findOrFail(int $id);
    public function create(array $data);
    public function delete(int $id);
    public function edit(int $id);
    public function update(int $id, array $data);
    public function count(): int;
    public function countByStatus(string $status): int;
}