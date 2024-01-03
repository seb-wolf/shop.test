<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Registration extends Component
{

    public $firstName;

    public $lastName;

    public $email;

    public $address;

    public $city;

    public $state;

    public $zip;

    protected $rules = [
        'firstName' => 'required|max:20',
        'lastName' => 'required|max:20',
        'email' => 'required|email',
        'address' => 'required|max:100',
        'city' => 'required',
        'state' => 'required',
        'zip' => 'required',
    ];

    public function updated($propertyName) {

        $this->validateOnly($propertyName);
    }

    public function submit() {

        $validatedData = $this->validate();

        // Add registration data to modal
        dd( $validatedData );
    }

    public function render()
    {
        return view('livewire.registration');
    }
}