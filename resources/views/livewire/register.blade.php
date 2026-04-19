<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body p-4">
        <h5 class="card-title text-center mb-4 fw-semibold">Create an account</h5>

        <form wire:submit="register">
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       wire:model="name"
                       placeholder="John Doe"
                       autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       wire:model="email"
                       placeholder="you@example.com">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       wire:model="password"
                       placeholder="Min. 8 characters">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password"
                       class="form-control @error('password_confirmation') is-invalid @enderror"
                       wire:model="password_confirmation"
                       placeholder="Repeat password">
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-dark" wire:loading.attr="disabled">
                    <span wire:loading wire:target="register" class="spinner-border spinner-border-sm me-1"></span>
                    Create Account
                </button>
            </div>
        </form>

        <hr class="my-3">
        <p class="text-center text-muted mb-0 small">
            Already have an account?
            <a href="{{ route('login') }}" wire:navigate>Sign in</a>
        </p>
    </div>
</div>
