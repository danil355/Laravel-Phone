<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Phone;
use App\Http\Requests\PhoneFormRequest;
use App\Models\User;

class PhoneController extends Controller
{

    public function index() {

        $phones = Phone::query()
            ->latest()
            ->paginate(10);

        return view('phones.index', [
            'phones' => $phones
        ]);
    }

    public function create() {
        $this->authorize('create', Phone::class);

        return view('phones.form');
    }

    public function store(PhoneFormRequest $request) {
        $this->authorize('create', Phone::class);

        $data = $request->validated();

        /** @var User $user */
        $user = auth()->user();

        /** @var Phone $phone */
        $phone = $user->phones()
            ->create($data);


        return redirect()->route('phones.show', $phone);
    }

    public function show(Phone $phone) {
        return view('phones.show', [
            'phone' => $phone
        ]);
    }

    public function edit(Phone $phone) {
        $this->authorize('update', $phone);

        return view('phones.form', [
            'phone' => $phone
        ]);
    }

    public function update(PhoneFormRequest $request, Phone $phone) {
        $this->authorize('update', $phone);
        $data = $request->validated();

        $phone->update($data);

        return redirect()->route('phones.show', $phone);
    }

    public function destroy(Phone $phone) {
        $this->authorize('delete', $phone);
        $phone->delete();
        return redirect()->route('phones.index');
    }
}
