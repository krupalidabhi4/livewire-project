<?php

namespace App\Livewire;

use App\Repositories\ProjectRepository;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Dashboard')]
    public function render(ProjectRepository $projectRepo)
    {
        $stats = [
            'total'    => $projectRepo->count(),
            'active'   => $projectRepo->countByStatus('active'),
            'inactive' => $projectRepo->countByStatus('inactive'),
        ];

        return view('livewire.dashboard', compact('stats'));
    }
}
