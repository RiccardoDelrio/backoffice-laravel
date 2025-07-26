<section class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="steam-card mb-4">
                <div class="card-header">
                    <h4 class="mb-0 text-secondary">
                        <i class="fas fa-lock me-2"></i>{{ __('Update Password') }}
                    </h4>
                    <small class="text-muted">{{ __('Ensure your account is using a long, random password to stay secure.') }}</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('password.update') }}" class="steam-form">
                        @csrf
                        @method('put')
                        <div class="form-group mb-3">
                            <label for="current_password" class="form-label">
                                <i class="fas fa-key"></i> {{__('Current Password')}}
                            </label>
                            <input class="form-control @error('current_password') is-invalid @enderror" type="password" name="current_password" id="current_password" autocomplete="current-password">
                            @error('current_password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock"></i> {{__('New Password')}}
                            </label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label">
                                <i class="fas fa-lock"></i> {{__('Confirm Password')}}
                            </label>
                            <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password">
                            @error('password_confirmation')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-4">
                            <button type="submit" class="btn-steam">
                                <i class="fas fa-save"></i> {{ __('Save') }}
                            </button>
                            @if (session('status') === 'password-updated')
                                <span id='status' class="fs-5 text-success ms-3">{{ __('Saved.') }}</span>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
