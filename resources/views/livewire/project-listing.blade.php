<div>
    <div class="container">
         <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Project List </h5>
                <a href="{{route('project.create')}}" class="btn btn-primary">Add Project</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Project Name</th>
                    <th scope="col">Contractor</th>
                    <th scope="col">Project Cost</th>
                    <th scope="col">Category</th>
                    <th scope="col">Sub Category</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($projects->isNotEmpty())
                @foreach($projects as $project)
                <tr wire:key="project-{{$project->id}}">
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name_en }}</td>
                    <td>{{ $project->contractor }}</td>
                    <td>{{ number_format($project->cost,2) }}</td>
                    <td>{{ $project?->category?->name_en }}</td>
                    <td>{{ $project?->subCategory?->name_en }}</td>
                    <td>
                        <a wire:navigate href="{{route('project.edit', $project->id)}}" class="btn btn-primary"> Edit</a>

                        <button type="button" wire:click="confirmDelete({{$project->id}}, '{{addSlashes($project->name_en)}}')" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                @endforeach

                @else
                    <p>No projects found.</p>
                @endif
            </tbody>

        </table>
         {{ $projects->links('pagination::bootstrap-5') }}
    </div>


@if($showDeleteModal)
<div class="modal d-block" tabindex="-1"
     style="background: rgba(0,0,0,0.5);">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-danger">🗑️ Confirm Delete</h5>
            </div>
            <div class="modal-body">
                Are you sure you want to delete
                <strong>{{ $deletingName }}</strong>?
                <br><small class="text-muted">This action soft-deletes the record.</small>
            </div>
            <div class="modal-footer border-0">
                <button wire:click="cancelDelete" class="btn btn-secondary">Cancel</button>
                <button
                    wire:click="deleteProject"
                    wire:loading.attr="disabled"
                    class="btn btn-danger">
                    {{-- wire:loading shows spinner only while deleteProject() is running --}}
                    <span wire:loading wire:target="deleteProject"
                          class="spinner-border spinner-border-sm me-1"></span>
                    Yes, Delete
                </button>
            </div>
        </div>
    </div>
</div>
@endif
</div>
