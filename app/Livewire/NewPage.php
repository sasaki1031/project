<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class NewPage extends Component
{
    public $name;
    public $email;
    public $password;

    public function submit(){

        $this->validate([
            'name'=>'required|min:2',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8'
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $this->reset(['name','email','password']);
        session()->flash('message','Register Successful');
    }
    
    public function render()
    {
        return view('livewire.new-page');
    }
}
