<?php
namespace App\Services;

use App\Repositories\Contracts\ProjectRepositoryInterface;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\Storage;

class ProjectService
{

    public function __construct(private readonly ProjectRepository $repo) {

    }

    public function create(array $data, $imageFile = null, $thumbFile = null)
    {
        $data['image'] = $this->storeFile($imageFile, 'projects/images');
        return $this->repo->create($data);
    }

    public function update(int $id, array $data, $imageFile = null)
    {
        $existing = $this->repo->findOrFail($id);

        if ($imageFile) {
            $this->deleteFile($existing->image);
            $data['image'] = $this->storeFile($imageFile, 'projects/images');
        }

        return $this->repo->update($id, $data);
    }

    public function delete($id)
    {
        $existing = $this->repo->findOrFail($id);

        if ($existing->image) {
            $this->deleteFile($existing->image);
        }
        return $this->repo->delete($id);
    }

    private function storeFile($file, string $dir): ?string
    {
        return $file ? $file->store($dir, 'public') : null;
    }

    private function deleteFile(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

}
