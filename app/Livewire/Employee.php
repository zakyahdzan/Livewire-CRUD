<?php

namespace App\Livewire;

use App\Models\Employee as ModelsEmployee;
use Livewire\Component;

class Employee extends Component
{
    public $nama;
    public $email;
    public $alamat;

    public function store()
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required'
        ];
        $pesan = [
            'nama.required'=>'Nama Wajib Diisi',
            'email.required'=>'Email Wajib Diisi',
            'email.email'=>' Format Wajib Email',
            'alamat.required'=>'Alamat Wajib Diisi',
        ];

        $validated = $this->validate($rules, $pesan);

        ModelsEmployee::create($validated);
        session()->flash('message', 'Data berhasil dimasukan');
    }
    public function render()
    {
        return view('livewire.employee');
    }
}
 