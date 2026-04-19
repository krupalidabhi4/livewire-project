

<div>
    <div class="container card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">Add Project</h5>
            <a href="{{route('project.list')}}" class="btn btn-secondary btn-sm"
            wire:navigate>Back</a>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Project Category <span class="text-danger">*</span>
                        </label>
                        <select wire:model.live="category_id" class="form-select @error('category_id') is-invalid @enderror">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name_en}}</option>
                            @endforeach
                        </select>
                         @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Project Sub Category <span class="text-danger">*</span>
                        </label>
                        <select wire:model.live="sub_category_id" class="form-select @error('sub_category_id') is-invalid @enderror">
                            <option value="">Select Sub Category</option>
                               @foreach($subCategories as $category)
                                    <option value="{{$category->id}}">{{$category->name_en}}</option>
                               @endforeach
                        </select>
                        @error('sub_category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3 mt-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Project Name In English <span class="text-danger">*</span>
                            </label>

                            <input type="text" wire:model.lazy="name_en"
                                class="form-control @error('name_en') is-invalid @enderror"
                                placeholder="Enter Project Name">
                            @error('name_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Select Country <span class="text-danger">*</span>
                            </label>
                            <select wire:model.live="country_id" class="form-select @error('country_id') is-invalid @enderror">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->english_name}}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Contractor <span class="text-danger">*</span>
                            </label>
                            <input type="text" wire:model.lazy="contractor"
                                class="form-control @error('contractor') is-invalid @enderror"
                                placeholder="Enter Contractor Name">
                            @error('contractor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Contractor Amount <span class="text-danger">*</span>
                            </label>
                            <input type="number" wire:model.lazy="contractor_amount"
                                class="form-control @error('contractor_amount') is-invalid @enderror"
                                placeholder="0.00" step="0.01">
                            @error('contractor_amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Cost <span class="text-danger">*</span>
                            </label>
                            <input type="number" wire:model.lazy="cost"
                                class="form-control @error('cost') is-invalid @enderror"
                                placeholder="0.00" step="0.01">
                            @error('cost')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                     <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Select Project Type <span class="text-danger">*</span>
                            </label>
                            <select wire:model="project_type"
                                    class="form-select @error('project_type') is-invalid @enderror">
                                <option value="">Select Project Type</option>
                                @foreach(['building' => 'Building', 'road' => 'Road', 'bridge' => 'Bridge',
                                        'school'   => 'School',   'hospital' => 'Hospital', 'other' => 'Other']
                                        as $val => $label)
                                    <option value="{{ $val }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('project_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Quantity <span class="text-danger">*</span>
                            </label>
                            <input type="number" wire:model.lazy="quantity"
                                class="form-control @error('quantity') is-invalid @enderror"
                                placeholder="1" min="1">
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Project Status <span class="text-danger">*</span>
                            </label>
                            {{-- wire:model on radio group — whichever radio is selected
                                sets $status to its value --}}
                            <div class="d-flex gap-4 mt-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                        wire:model="status" value="active" id="statusActive">
                                    <label class="form-check-label" for="statusActive">Active</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                        wire:model="status" value="inactive" id="statusInactive">
                                    <label class="form-check-label" for="statusInactive">In Active</label>
                                </div>
                            </div>
                            @error('status')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Display Projects On</label>
                            <div class="d-flex gap-4 flex-wrap mt-1">
                                {{-- wire:model on checkbox with array property --
                                    Livewire adds/removes value from the array automatically --}}
                                @foreach(['website' => 'Website', 'app' => 'App', 'cs' => 'CS', 'kiosk' => 'Kiosk']
                                        as $val => $label)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            wire:model="display_on"
                                            value="{{ $val }}"
                                            id="platform_{{ $val }}">
                                        <label class="form-check-label" for="platform_{{ $val }}">
                                            {{ $label }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('display_on')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                         <div class="row mb-3 mt-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Description / Project Details In English
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea wire:model.lazy="description_en" rows="4"
                                        class="form-control @error('description_en') is-invalid @enderror"
                                        placeholder="Enter description..."></textarea>
                                @error('description_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Image</label>
                                <input type="file" wire:model="imageFile"
                                    class="form-control @error('imageFile') is-invalid @enderror"
                                    accept="image/*">
                                {{-- wire:loading shows while file is uploading to temp storage --}}
                                <div wire:loading wire:target="imageFile" class="text-muted small mt-1">
                                    <span class="spinner-border spinner-border-sm"></span> Uploading...
                                </div>
                                {{-- Preview uploaded image using temporaryUrl() --}}
                                @if(isset($imageFile) && $imageFile)
                                    <img src="{{ $imageFile->temporaryUrl() }}"
                                        class="img-thumbnail mt-2" style="max-height:80px"
                                        alt="Preview">
                                @endif
                                @error('imageFile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="alert alert-warning py-1 px-2 mt-1 small">
                                    Image Dimension: width:900 | height:400
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
                <button type="submit" wire:target="" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
