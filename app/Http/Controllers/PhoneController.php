<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use App\Http\Requests\PhoneFormRequest;

class PhoneController extends Controller
{

    public function index()
    {
        $phones = Phone::query()
            ->latest()
            ->get();

        return view('phones.index', [
            'phones' => $phones
        ]);
    }

    public function create()
    {
        return view('phones.form');
    }

    public function store(PhoneFormRequest $request)
    {
        $data = $request->validated();

        $phone = Phone::query()
            ->create($data);
        return redirect()->route('phones.show', $phone);
    }

    public function show(Phone $phone)
    {
        return view('phones.show', [
            'phone' => $phone
        ]);
    }

    public function edit(Phone $phone)
    {
        return view('phones.form', [
            'phone  ' => $phone
        ]);
    }

    public function update(PhoneFormRequest $request, Phone $phone)
    {
        $data = $request->validated();

        $phone->update($data);
        return redirect()->route('phones.show', $phone);
    }

    public function destroy(Phone $phone)
    {
        $phone->delete();
        return redirect()->route('phones.index');
    }
}
