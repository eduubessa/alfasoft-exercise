@extends('layouts.auth')

@section('content')
    <div class="container d-flex align-items-center justify-content-center login-container">
        <div class="row w-100 justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card login-card flex-md-row">
                    <div class="col-md-6 d-none d-md-block login-image"></div>
                    <div class="col-md-6 p-4 d-flex flex-column justify-content-center">
                        <h2 class="mb-4 text-center fw-bold">Bem-vindo de volta</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="ri-mail-line form-icon me-2"></i>Email
                                </label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    required
                                    autofocus
                                >
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">
                                    <i class="ri-lock-line form-icon me-2"></i>Senha
                                </label>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    required
                                >
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="remember"
                                    name="remember"
                                    {{ old('remember') ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="remember">Lembrar-me</label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2">
                                Entrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
