<?php

namespace App\Livewire;

use App\Repositories\ProjectRepository;
use App\Services\ProjectService;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Throwable;

class ProjectListing extends Component
{
    use WithPagination;

    public bool $showDeleteModal = false;
    public ?int $deletingId  = null;
    public string $deletingName   = '';

    #[Title('Project Listing')]
    public function render(ProjectRepository $projectRepo)
    {
        $projects = $projectRepo->paginate(5);

        return view('livewire.project-listing', ['projects' => $projects]);
    }

    public function confirmDelete(int $id, string $name)
    {
        $this->deletingId      = $id;
        $this->deletingName    = $name;
        $this->showDeleteModal = true;
    }

    public function cancelDelete() {
        $this->showDeleteModal = false;
        $this->deletingId      = null;
        $this->deletingName    = '';
    }

    public function deleteProject(ProjectService $projectService) {
        if (!$this->deletingId) {
            return;
        }
        try {
            $projectService->delete($this->deletingId);

            // Reset modal state
            $this->cancelDelete();

            $this->dispatch('notify', message: 'Project deleted.', type: 'success');

            return redirect()->route('project.list');
        } catch (Throwable $e) {

            $this->dispatch('notify',
                message: 'Unable to delete project. Please try again.',
                type: 'danger'
            );
        }
    }

}
