<?php

namespace App\Livewire;

use App\Repositories\CategoryRepository;
use App\Repositories\CountryRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\SubcategoryRepository;
use App\Services\ProjectService;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectEdit extends Component
{
    use WithFileUploads;
    #[Locked]
    public int $id;

   // ── FORM FIELDS (public properties = two-way bound via wire:model)
    public $category_id = '';
    public $sub_category_id = '';
    public $name_en = '';
    public $country_id = '';
    public $contractor = '';
    public $contractor_amount = '';
    public $cost = '';
    public $quantity = 1;
    public $project_type = '';
    public $status = '';
    public array $display_on = [];  // checkboxes bind to array
    public $description_en = '';
    public $imageFile = null;
    public $categories = '';
    public $subCategories = '';
    public $existingImage = '';
    public $countries = '';

    public function render()
    {
        return view('livewire.project-edit');
    }

    #[Title('Edit Project')]
    public function mount(int $id)
    {
        $this->categories = CategoryRepository::getAllCategory();
        $this->subCategories = SubcategoryRepository::getAllSubCategory();
        $this->countries = CountryRepository::getCountries();

        $projectRepo  = new ProjectRepository();
        $project = $projectRepo->edit($id);

        $this->id = $project->id;
        $this->category_id = $project->category_id;
        $this->sub_category_id = $project->sub_category_id;
        $this->name_en = $project->name_en;
        $this->contractor = $project->contractor;
        $this->contractor_amount = $project->contractor_amount;
        $this->cost = $project->cost;
        $this->quantity = $project->quantity;
        $this->project_type = $project->project_type;
        $this->status = $project->status;
        $this->display_on = $project->display_on ?? [];
        $this->description_en = $project->description_en ?? [];
        $this->imageFile = '';
        $this->existingImage = $project->image;
        $this->country_id = $project->country_id;
    }

    protected function rules(): array
    {
        return [
            'category_id'                  => 'required|exists:project_categories,id',
            'sub_category_id'              => 'required|exists:sub_categories,id',
            'country_id'                    => 'required|integer|max:100',
            'name_en'                       => 'required|string|max:255',
            'contractor'                    => 'required|string|max:255',
            'contractor_amount'             => 'required|numeric|min:1',
            'cost'                          => 'required|numeric|min:1',
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

    public function update(ProjectService $projectService)
    {
        try {
            // validate() checks ALL rules at once. Stops and shows errors if invalid.
            $validated = $this->validate();
            $validated['display_on'] = $this->display_on;

            $validated = $this->validate();
            $projectService->update($this->id, $validated, $this->imageFile);

            $this->dispatch('notify', message: 'Project updated successfully!', type: 'success');
            $this->redirect(route('project.list'), navigate: true);
        } catch (Exception $e){

            $this->dispatch('notify', message: $e->getMessage(), type: 'danger');
        }
    }
}
