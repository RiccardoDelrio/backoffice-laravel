<section class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="steam-card mb-4">
                <div class="card-header">
                    <h4 class="mb-0 text-danger">
                        <i class="fas fa-user-times me-2"></i>{{ __('Delete Account') }}
                    </h4>
                    <small class="text-muted">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('profile.destroy') }}" class="steam-form">
                        @csrf
                        @method('delete')
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock"></i> {{ __('Password') }}
                            </label>
                            <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" />
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-4">
                            <button type="submit" class="btn-steam btn-steam-danger">
                                <i class="fas fa-user-times"></i> {{ __('Delete Account') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
