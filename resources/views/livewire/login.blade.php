<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body p-4">
        <h5 class="card-title text-center mb-4 fw-semibold">Sign in to your account</h5>

        <form wire:submit="login">
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       wire:model.lazy="email"
                       placeholder="you@example.com"
                       autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       wire:model.lazy="password"
                       placeholder="••••••••">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" wire:model="remember" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-dark" wire:loading.attr="disabled">
                    <span wire:loading wire:target="login" class="spinner-border spinner-border-sm me-1"></span>
                    Sign In
                </button>
            </div>
        </form>

        <hr class="my-3">
        <p class="text-center text-muted mb-0 small">
            Don't have an account?
            <a href="{{ route('register') }}" wire:navigate>Register here</a>
        </p>
    </div>
</div>
