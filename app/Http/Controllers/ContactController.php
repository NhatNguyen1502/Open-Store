<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    private $contacts;
    public function __construct(){
        $this->contacts = new Contacts();
    }

    public function index()
    {
        $contacts = DB::table('contacts')
            ->join('users', 'contacts.user_id', '=', 'users.id')
            ->get();
        return view('admin.contact', ['contacts' => $contacts, 'UI' => 'contacts']);
    }

    public function update(Request $request, $id){
        $contact = Contacts::find($id);
        $contact->is_contact = $request->is_contact;
        $contact->save();
        return redirect()->route('contact.index')->with('success', 'Contact updated successfully');
    }

}
