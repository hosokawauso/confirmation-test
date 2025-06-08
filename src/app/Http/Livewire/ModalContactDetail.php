<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;


class ModalContactDetail extends Component
{
    public $contact;
    public $showModal = false;

    protected $listeners = ['openModal' => 'show', 'closeModal' => 'hide'];

     /* public function mount()
{
    $this->showModal = true;
    $this->contact = \App\Models\Contact::first();
}  */
    
    
    
    
    public function show($contactId)
    {
        //dd($contactId);

        //Log::info("openModal triggered with ID: {$contactId}");
        //logger("モーダルを開きます: $contactId"); // ←ログで検証
        
        $this->contact = Contact::find($contactId);
        $this->showModal = true;

        //dd($this->showModal); // 値が true になっているかチェック

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
        return view('livewire.modal-contact-detail')->extends('layouts.app');
    }

    public function testClick()
    {
        dd('ボタンが押されました！');
    }
}