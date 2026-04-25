<?php

namespace App\Livewire;

use App\Jobs\ProcessProjectJob;
use App\Repositories\CategoryRepository;
use App\Repositories\CountryRepository;
use App\Repositories\SubcategoryRepository;
use App\Services\ProjectService;
use Exception;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectCreate extends Component
{
    use WithFileUploads;
    // ── FORM FIELDS (public properties = two-way bound via wire:model) ─
    public $category_id                  = '';
    public $categories                   = '';
    public $subCategories                = '';
    public $countries                    = '';
    public $sub_category_id              = '';
    public $country_id                   = '';
    public $name_en                      = '';
    public $contractor                   = '';
    public $contractor_amount            = '';
    public $cost                         = '';
    public $quantity                     = 1;
    public $project_type                 = '';
    public $status                       = 'active';
    public array $display_on             = [];  // checkboxes bind to array
    public $description_en               = '';
    public $imageFile                    = null;

    private $projectRepo;

    #[Title('Add Project')]
     // mount() runs once when component loads — like a constructor for Livewire
    public function mount()
    {
        $this->categories = CategoryRepository::getAllCategory();
        $this->subCategories = SubcategoryRepository::getAllSubCategory();
        $this->countries = CountryRepository::getCountries();
    }

    public function render()
    {
        return view('livewire.project-create');
    }

     // ── VALIDATION RULES ────────────────────────────────────────
    // Define once — used by both validate() and validateOnly()
    protected function rules(): array
    {
        return [
            'category_id'                  => 'required',
            'sub_category_id'              => 'required',
            'country_id'                   => 'required|integer|max:100',
            'name_en'                       => 'required|string|max:255',
            'contractor'                    => 'required|string|max:255',
            'contractor_amount'             => 'required|numeric|min:0',
            'cost'                          => 'required|numeric|min:0',
            'quantity'                      => 'required|integer|min:1',
            'project_type'                  => 'required|in:building,road,bridge,school,hospital,other',
            'status'                        => 'required|in:active,inactive',
            'display_on'                    => 'nullable|array',
            'display_on.*'                  => 'in:website,app,cs,kiosk',
            'description_en'               => 'required|string',
            'imageFile'                     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    protected function messages(): array
    {
        return [
            'category_id.required'     => 'Please select a project category.',
            'sub_category_id.required' => 'Please select a sub-category.',
            'name_en.required'         => 'Project name in English is required.',
            'description_en.required'  => 'English description is required.',
            'imageFile.dimensions'     => 'Image must be 900x400 pixels.',
        ];
    }

    public function save(ProjectService $projectService) {
        try {
            // validate() checks ALL rules at once. Stops and shows errors if invalid.
            $validated = $this->validate();
            $validated['display_on'] = $this->display_on;

            $projectService->create($validated, $this->imageFile);

            // Dispatch the job to the queue
            ProcessProjectJob::dispatch();

            $this->dispatch('notify', message: 'Project is being processed! You will be notified once it\'s created.', type: 'success');
            $this->redirect(route('project.list'), navigate : true);

        } catch (Exception $e){
            Log::error('Error dispatching job', [
                'error' => $e->getMessage(),
                'timestamp' => now(),
            ]);

            $this->dispatch('notify', message: $e->getMessage(), type: 'danger');
        }

    }
}
