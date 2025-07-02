<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUpdateRequest;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{

    public function __construct(
        protected ContactRepository $contactRepository
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contacts = $this->contactRepository->getAll();

        return view('pages.contacts.index')
            ->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $contact = $this->contactRepository->getById($id);

        return view('pages.contacts.edit')
            ->with('contact', $contact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactUpdateRequest $request, string $id)
    {
        //
        try {
            $validatedData = $request->validated();
            $this->contactRepository->update($id, $validatedData);

            return redirect()->route('contacts.index')
                ->with('success', 'Contacto atualizado com sucesso!');

        }catch(\Exception $e) {
            Log::error("Update Contact Error | ID: {$id} | MESSAGE: ". $e->getMessage());

            return back()->withErrors([
                'message' => "Não foi possível atualizar o contacto, por favor tente novamente.". $e->getMessage()
            ])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

    }
}
