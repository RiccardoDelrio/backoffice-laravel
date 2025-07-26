<section class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="steam-card mb-4">
                <div class="card-header">
                    <h4 class="mb-0 text-secondary">
                        <i class="fas fa-user-cog me-2"></i>{{ __('Profile Information') }}
                    </h4>
                    <small class="text-muted">{{ __("Update your account's profile information and email address.") }}</small>
                </div>
                <div class="card-body">
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>
                    <form method="post" action="{{ route('profile.update') }}" class="steam-form">
                        @csrf
                        @method('patch')
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">
                                <i class="fas fa-user"></i> {{__('Name')}}
                            </label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" autocomplete="name" value="{{old('name', $user->name)}}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope"></i> {{__('Email')}}
                            </label>
                            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email)}}" required autocomplete="username" />
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-2">
                                    <p class="text-sm text-muted mb-2">
                                        {{ __('Your email address is unverified.') }}
                                        <button form="send-verification" class="btn-steam btn-sm ms-2">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>
                                    @if (session('status') === 'verification-link-sent')
                                        <div class="alert steam-alert alert-success mb-2" role="alert">
                                            <i class="fas fa-check-circle me-2"></i>
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-4">
                            <button class="btn-steam" type="submit">
                                <i class="fas fa-save"></i> {{ __('Save') }}
                            </button>
                            @if (session('status') === 'profile-updated')
                                <span id='profile-status' class="fs-5 text-success ms-3">{{ __('Saved.') }}</span>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
