<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function edit()
    {
        $contact = ContactSetting::first();

        return view('admin.contact.edit', [
            'title' => 'Contact',
            'contact' => $contact,
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'email' => ['nullable', 'email', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'availability_text' => ['nullable', 'string', 'max:255'],
            'availability_note' => ['nullable', 'string', 'max:255'],
            'inquiry_title' => ['nullable', 'string', 'max:255'],
            'inquiry_subtitle' => ['nullable', 'string'],
            'inquiry_button' => ['nullable', 'string', 'max:255'],
            'whatsapp_number' => ['nullable', 'string', 'max:32'],
        ]);

        $contact = ContactSetting::first();
        if ($contact) {
            $contact->update($data);
        } else {
            ContactSetting::create($data);
        }

        return redirect()->route('admin.contact.edit')->with('success', 'Contact settings updated.');
    }
}
