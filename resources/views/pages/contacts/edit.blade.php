@extends('layouts.app', ['title' => 'Editar contacto'])

@section('content')
    <div class="container">
        <div class="form-container">
            <h3 class="mb-4 text-center">
                <i class="ri-edit-line me-2"></i> Editar Contacto
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
                <label for="nome" class="form-label">
                    <i class="ri-user-line"></i> Nome
                </label>
                <input form="contact-update" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $contact->name }}"  required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">
                    <i class="ri-mail-line"></i> Email
                </label>
                <input form="contact-update" type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $contact->email }}" required>
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">
                    <i class="ri-phone-line"></i> Contacto Telefónico
                </label>
                <input form="contact-update" type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ $contact->phone_number }}" required>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('contacts.index') }}" class="btn btn-secondary">
                    <i class="ri-arrow-go-back-line me-1"></i> Cancelar
                </a>
                <form action="{{ route('contacts.update', $contact->id) }}" method="POST" name="contact-update" id="contact-update">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">
                        <i class="ri-save-3-line me-1"></i> Guardar Alterações
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
