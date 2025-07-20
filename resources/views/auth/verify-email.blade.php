@extends('layouts.master')

@section('title', 'Verifica Email - SteamLike')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>📧 Verifica la tua Email</h1>
            <p class="lead">Controlla la tua casella di posta per completare la registrazione</p>
        </div>
    </section>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="steam-card">
                    <div class="card-header">
                        <h4 class="mb-0">
                            <i class="fas fa-envelope-open me-2"></i>Verifica Indirizzo Email
                        </h4>
                        <small class="text-muted">Conferma il tuo indirizzo email per attivare l'account</small>
                    </div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="steam-alert alert-success mb-4">
                                <i class="fas fa-check-circle me-2"></i>
                                Un nuovo link di verifica è stato inviato al tuo indirizzo email.
                            </div>
                        @endif

                        <div class="text-center mb-4">
                            <div class="mb-3">
                                <i class="fas fa-envelope-circle-check auth-verification-icon"></i>
                            </div>

                            <p class="mb-4 auth-verification-text">
                                Prima di procedere, controlla la tua email per il link di verifica.
                                <br>
                                Se non hai ricevuto l'email, puoi richiederne una nuova.
                            </p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <form method="POST" action="{{ route('verification.resend') }}" class="steam-form">
                                @csrf
                                <button type="submit" class="btn-steam">
                                    <i class="fas fa-paper-plane"></i> Invia nuova email di verifica
                                </button>
                            </form>
                        </div>

                        <div class="text-center mt-4 pt-4" style="border-top: 1px solid #2a475e;">
                            <p class="mb-0">
                                <a href="{{ route('logout') }}" class="link-steam"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Esci dall'account
                                </a>
                            </p>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection