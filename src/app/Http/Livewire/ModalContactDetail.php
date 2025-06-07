<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ModalContactDetail extends Component
{
    public $contact;
    public $showModal = false;

    protected $listeners = ['openModal' => 'show', 'closeModal' => 'hide'];

    public function show($contactId)
    {
        //dd($id);

        Log::info("openModal triggered with ID: {$id}");
        
        $this->contact = Contact::find($contactId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function delete()
    {
        /* $this->contact->delete();
        $this->showModal = false;
        session()->flash('message', '削除しました');
        $this->emit('contactDeleted'); */

        /* if ($this->contact) {
            $this->contact->delete();
            $this->showModal = false;
            $this->emit('contactDeleted');
        } */

        $this->contact->delete();
        $this->showModal = false;

    }

    public function render()
    {
        return view('livewire.modal-contact-detail');
    }

   /*  public function testClick()
{
    logger('Livewire の click イベント反応 OK');
} */
}