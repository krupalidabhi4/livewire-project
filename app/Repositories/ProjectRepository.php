<?php
namespace App\Repositories;

use App\Models\ProjectModel;
use App\Repositories\Contracts\ProjectRepositoryInterface;

class ProjectRepository implements ProjectRepositoryInterface
{

    public function findOrFail($id)
    {
        return ProjectModel::with(['category', 'subCategory'])->findOrFail($id);
    }

    public function paginate(int $perPage = 10) {
        return ProjectModel::query()
                ->with(['category', 'subCategory'])
                ->latest()
                ->paginate($perPage);
    }

    public function create(array $data) {
        return ProjectModel::create($data);
    }

    public function delete(int $id) {
        return ProjectModel::findOrFail($id)->delete();
    }

    public function edit(int $id)
    {
        return ProjectModel::findOrFail($id);
    }

    public function update(int $id,  array $data)
    {
        $project =  ProjectModel::findOrFail($id);
        $project->update($data);
        return $project->fresh();
    }

    public function count(): int
    {
        return ProjectModel::count();
    }

    public function countByStatus(string $status): int
    {
        return ProjectModel::where('status', $status)->count();
    }
}
