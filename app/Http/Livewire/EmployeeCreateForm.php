<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Models\Position;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

class EmployeeCreateForm extends Component
{
    public $employees;
    public Collection $roles;
    public Collection $positions;
    public Collection $perusahaans;

    public function mount()
    {
        $this->positions = Position::all();
        $this->roles = Role::all();
        $this->perusahaans = Perusahaan::all();
        $this->employees = [
            ['username' => '', 'name' => '' ,'email' => '', 'phone' => '', 'password' => '', 'role_id' => User::USER_ROLE_ID, 'position_id' => $this->positions->first()->id,'perusahaan_id' => $this->perusahaans->first()->id]
        ];
    }

    public function addEmployeeInput(): void
    {
        $this->employees[] = ['username' => '', 'name' => '' , 'email' => '', 'phone' => '', 'password' => '', 'role_id' => User::USER_ROLE_ID, 'position_id' => $this->positions->first()->id,'perusahaan_id' => $this->perusahaans->first()->id];
    }

    public function removeEmployeeInput(int $index): void
    {
        unset($this->employees[$index]);
        $this->employees = array_values($this->employees);
    }

    public function saveEmployees()
    {
        // cara lebih cepat, dan kemungkinan data role tidak akan diubah/ditambah
        $roleIdRuleIn = join(',', $this->roles->pluck('id')->toArray());
        $positionIdRuleIn = join(',', $this->positions->pluck('id')->toArray());
        $perusahaanIdRuleIn = join(',', $this->perusahaans->pluck('id')->toArray());
        // $roleIdRuleIn = join(',', Role::all()->pluck('id')->toArray());

        // setidaknya input pertama yang hanya required,
        // karena nanti akan difilter apakah input kedua dan input selanjutnya apakah berisi
        $this->validate([
            'employees.*.username' => 'required',
            'employees.*.name' => 'required',
            'employees.*.email' => 'required|email|unique:users,email',
            'employees.*.phone' => 'required|unique:users,phone',
            'employees.*.password' => '',
            'employees.*.role_id' => 'required|in:' . $roleIdRuleIn,
            'employees.*.position_id' => 'required|in:' . $positionIdRuleIn,
            'employees.*.perusahaan_id' => 'required|in:' . $perusahaanIdRuleIn,
        ]);
        // cek apakah no. telp yang diinput unique
        $phoneNumbers = array_map(function ($employee) {
            return trim($employee['phone']);
        }, $this->employees);
        $uniquePhoneNumbers = array_unique($phoneNumbers);

        if (count($phoneNumbers) != count($uniquePhoneNumbers)) {
            // layar browser ke paling atas agar user melihat alert error
            $this->dispatchBrowserEvent('livewire-scroll', ['top' => 0]);
            return session()->flash('failed', 'Pastikan input No. Telp tidak mangandung nilai yang sama.');
        }

        // alasan menggunakan create alih2 mengunakan ::insert adalah karena tidak looping untuk menambahkan created_at dan updated_at
        $affected = 0;
        foreach ($this->employees as $employee) {
            if (trim($employee['password']) === '') $employee['password'] = '123';
            $employee['password'] = Hash::make($employee['password']);
            User::create($employee);
            $affected++;
        }

        redirect()->route('employees.index')->with('success', "Ada ($affected) data absensi yang berhasil ditambahkan.");
    }

    public function render()
    {
        return view('livewire.employee-create-form');
    }
}
