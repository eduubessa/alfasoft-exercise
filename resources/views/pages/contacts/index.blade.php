@extends('layouts.app', ['title' => 'Lista de Contactos'])

@section('content')
    <div class="container">
        <div class="container py-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">Lista de Contactos</h2>
                <button class="btn btn-primary">
                    <i class="ri-user-add-line me-2"></i> Novo Contacto
                </button>
            </div>

            <div class="row g-4">
               @foreach($contacts as $contact)
                    <div class="col-md-6 col-lg-4">
                        <div class="card contact-card border-0 shadow-sm">
                            <div class="position-absolute top-0 end-0 p-2">
                                <a class="btn btn-sm btn-outline-primary me-1" title="Editar" href="{{ route('contacts.edit', $contact->id) }}">
                                    <i class="ri-pencil-line"></i>
                                </a>
                                <form method="POST" action="{{ route('contacts.delete', $contact->id) }}" onsubmit="return confirm('Tem certeza que deseja apagar este contacto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" title="Apagar" href="{{ route('contacts.delete', $contact->id) }}">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mb-2">
                                    <i class="ri-user-3-line"></i> {{ $contact->name }}
                                </h5>
                                <p class="mb-1">
                                    <i class="ri-mail-line"></i> {{ $contact->email }}
                                </p>
                                <p class="mb-0">
                                    <i class="ri-phone-line"></i>{{ $contact->phone_number }}
                                </p>
                            </div>
                        </div>
                    </div>
               @endforeach
            </div>
        </div>
    </div>
@endsection
