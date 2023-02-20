<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Models\Position;
use App\Models\Perusahaan;
use Illuminate\Validation\Rule;
use App\Http\Traits\useUniqueValidation;
use Illuminate\Database\Eloquent\Collection;

class EmployeeEditForm extends Component
{
    use useUniqueValidation;

    public $employees;
    public Collection $roles;
    public Collection $positions;
    public Collection $perusahaans;

    public function mount(Collection $employees)
    {
        $this->employees = []; // reset, karena ada data employees sebelumnya

        foreach ($employees as $employee) {
            $this->employees[] = [
                'id' => $employee->id,
                'username' => $employee->username,
                'name' => $employee->name,
                'email' => $employee->email,
                'original_email' => $employee->email, // untuk cek validasi unique
                'phone' => $employee->phone,
                'original_phone' => $employee->phone, // untuk cek validasi unique nanti
                'role_id' => $employee->role_id,
                'position_id' => $employee->position_id,
                'perusahaan_id' => $employee->perusahaan_id
            ];
        }
        $this->roles = Role::all();
        $this->positions = Position::all();
        $this->perusahaans = Perusahaan::all();
    }
    public function saveEmployees()
    {
        $roleIdRuleIn = join(',', $this->roles->pluck('id')->toArray());
        $positionIdRuleIn = join(',', $this->positions->pluck('id')->toArray());
        $perusahaanIdRuleIn = join(',', $this->perusahaans->pluck('id')->toArray());

        $this->validate([
            'employees.*.username' => 'required',
            'employees.*.name' => 'required',
            'employees.*.email' => 'required|email',
            'employees.*.phone' => 'required',
            'employees.*.password' => '',
            'employees.*.role_id' => 'required|in:' . $roleIdRuleIn,
            'employees.*.position_id' => 'required|in:' . $positionIdRuleIn,
            'employees.*.perusahaan_id' => 'required|in:' . $perusahaanIdRuleIn,
        ]);

        if (!$this->isUniqueOnLocal('phone', $this->employees)) {
            $this->dispatchBrowserEvent('livewire-scroll', ['top' => 0]);
            return session()->flash('failed', 'Pastikan input No. Telp tidak mangandung nilai yang sama dengan input lainnya.');
        }

        if (!$this->isUniqueOnLocal('email', $this->employees)) {
            $this->dispatchBrowserEvent('livewire-scroll', ['top' => 0]);
            return session()->flash('failed', 'Pastikan input Email tidak mangandung nilai yang sama dengan input lainnya.');
        }

        // alasan menggunakan create alih2 mengunakan ::insert adalah karena tidak looping untuk menambahkan created_at dan updated_at
        $affected = 0;
        foreach ($this->employees as $employee) {
            // cek unique validasi
            $employeeBeforeUpdated = User::find($employee['id']);

            if (!$this->isUniqueOnDatabase($employeeBeforeUpdated, $employee, 'phone', User::class)) {
                $this->dispatchBrowserEvent('livewire-scroll', ['top' => 0]);
                return session()->flash('failed', "No. Telp dari data karyawaan {$employee['id']} sudah terdaftar. Silahkan masukan No. Telp yang berbeda!");
            }

            if (!$this->isUniqueOnDatabase($employeeBeforeUpdated, $employee, 'email', User::class)) {
                $this->dispatchBrowserEvent('livewire-scroll', ['top' => 0]);
                return session()->flash('failed', "Email dari data karyawaan {$employee['id']} sudah terdaftar. Silahkan masukan email yang berbeda!");
            }

            $affected += $employeeBeforeUpdated->update([
                'username' => $employee['username'],
                'name' => $employee['name'],
                'email' => $employee['email'],
                'phone' => $employee['phone'],
                'role_id' => $employee['role_id'],
                'position_id' => $employee['position_id'],
                'perusahaan_id' => $employee['perusahaan_id'],
            ]);
        }

        $message = $affected === 0 ?
            "Tidak ada data karyawaan yang diubah." :
            "Ada $affected data karyawaan yang berhasil diedit.";

        return redirect()->route('employees.index')->with('success', $message);
    }

    public function render()
    {
        return view('livewire.employee-edit-form');
    }
}
