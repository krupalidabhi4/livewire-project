<div>
    <h4 class="mb-4 fw-semibold">
        <i class="bi bi-speedometer2 me-2"></i>Dashboard
    </h4>

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-primary bg-opacity-10 p-3">
                        <i class="bi bi-folder2 fs-3 text-primary"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Total Projects</div>
                        <div class="fs-3 fw-bold">{{ $stats['total'] }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-success bg-opacity-10 p-3">
                        <i class="bi bi-check-circle fs-3 text-success"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Active Projects</div>
                        <div class="fs-3 fw-bold">{{ $stats['active'] }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-secondary bg-opacity-10 p-3">
                        <i class="bi bi-pause-circle fs-3 text-secondary"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Inactive Projects</div>
                        <div class="fs-3 fw-bold">{{ $stats['inactive'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('project.list') }}" class="btn btn-dark btn-sm">
            <i class="bi bi-list-ul me-1"></i>View All Projects
        </a>
        <a href="{{ route('project.create') }}" class="btn btn-outline-dark btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Add Project
        </a>
    </div>
</div>
