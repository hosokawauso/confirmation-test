<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ModalContactDetail extends Component
{
    public $showModal = false;
    public $contact;

    protected $listeners = ['openModal'];

    /* public function mount($contactId)
{
        $this->contact = Contact::findOrFail($contactId);
        /* $this->showModal = true; */

    /* if ($contactId) {
        $this->contact = Contact::find($contactId);
        $this->showModal = true;
    } else {
        $this->contact = new Contact(); // 空でもOKにしておく
    } */


    public function openModal($id)
    {
        $this->contact = Contact::findOrFail($id);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function deleteContact()
    {
        $this->contact->delete();
        $this->showModal = false;
        session()->flash('message', '削除しました');
        $this->emit('contactDeleted');
    }
    
    public function render()
    {
        return view('livewire.modal-contact-detail');

    }
}
