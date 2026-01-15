<?php

namespace App\Livewire;

use App\Models\Employee as ModelsEmployee;
use Livewire\Component;
use Livewire\WithPagination;

class Employee extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

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
        $data = ModelsEmployee::orderBy('nama', 'asc')->paginate(2);
        return view('livewire.employee', ['dataEmployees' => $data]);
    }
}
 