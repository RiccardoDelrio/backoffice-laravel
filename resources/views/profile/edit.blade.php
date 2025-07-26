@extends('layouts.master')
@section('content')

<div class="container py-5">
    <h2 class="fs-3 text-secondary mb-4 text-center">
        <i class="fas fa-user-cog me-2"></i>Profile
    </h2>
    @include('profile.partials.update-profile-information-form')
    @include('profile.partials.update-password-form')
    @include('profile.partials.delete-user-form')
</div>

@endsection
