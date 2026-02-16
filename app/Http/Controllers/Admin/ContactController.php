<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = ContactSetting::latest()->paginate(12);

        return view('admin.contact.index', [
            'title' => 'Contact',
            'contacts' => $contacts,
        ]);
    }

    public function create()
    {
        return view('admin.contact.create', [
            'title' => 'New Contact',
        ]);
    }

    public function store(Request $request)
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

        ContactSetting::create($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Contact created.');
        }

        return redirect()->route('admin.contact.index')->with('success', 'Contact created.');
    }

    public function edit(ContactSetting $contact)
    {
        return view('admin.contact.edit', [
            'title' => 'Edit Contact',
            'contact' => $contact,
        ]);
    }

    public function update(Request $request, ContactSetting $contact)
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

        $contact->update($data);

        if ($request->boolean('drawer')) {
            return back()->with('success', 'Contact updated.');
        }

        return redirect()->route('admin.contact.index')->with('success', 'Contact updated.');
    }

    public function destroy(ContactSetting $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contact.index')->with('success', 'Contact deleted.');
    }
}
