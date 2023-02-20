<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Position;
use App\Models\Perusahaan;

class AttendanceAbstract extends Component
{
    public $attendance;
    public $positions;
    public $perusahaans;
    public $position_ids = [];
    public $perusahaan_ids = [];

    protected $rules = [
        'attendance.title' => 'required|string|min:6',
        'attendance.description' => 'required|string|max:500',
        'attendance.start_time' => 'required|date_format:H:i',
        'attendance.batas_start_time' => 'required|date_format:H:i|after:start_time',
        'attendance.end_time' => 'required|date_format:H:i',
        'attendance.batas_end_time' => 'required|date_format:H:i|after:end_time',
        'attendance.code' => 'sometimes|nullable|boolean',
        'position_ids' => 'required|array',
        'perusahaan_ids' => 'required|array',
        "position_ids.*"  => "required|distinct|numeric",
        "perusahaan_ids.*"  => "required|distinct|numeric",
    ];

    public function mount()
    {
        $this->positions = Position::query()->select(['id', 'name'])->get();
        $this->perusahaans = Perusahaan::query()->select(['id', 'name'])->get();
    }
}
