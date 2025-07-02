@extends('layouts.app', ['title' => 'Criar contacto'])

@section('content')
    <div class="container">
        <div class="form-container">
            <h3 class="mb-4 text-center">
                <i class="ri-add-line me-2"></i> Criar Contacto
            </h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">
                    <i class="ri-user-line"></i> Nome
                </label>
                <input form="contact-create" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">
                    <i class="ri-mail-line"></i> Email
                </label>
                <input form="contact-create" type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">
                    <i class="ri-phone-line"></i> Contacto Telefónico
                </label>
                <input form="contact-create" type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('contacts.index') }}" class="btn btn-secondary">
                    <i class="ri-arrow-go-back-line me-1"></i> Cancelar
                </a>
                <form action="{{ route('contacts.store') }}" method="POST" name="contact-create" id="contact-create">
                    @csrf
                    @METHOD('POST')
                    <button type="submit" class="btn btn-primary">
                        <i class="ri-save-3-line me-1"></i> Guardar Contacto
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
