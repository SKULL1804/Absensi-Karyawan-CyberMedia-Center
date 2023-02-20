<div>
    <form wire:submit.prevent="saveEmployees" method="post" novalidate>
        @include('partials.alerts')
        @foreach ($employees as $employee)

        <div class="mb-3">
            <div class="row g-3">
                <div class="col-md-6">
                    <x-form-label id="name{{ $employee['id'] }}"
                        label="Nama Karyawaan (ID: {{ $employee['id'] }})" />
                    <x-form-input id="name{{ $employee['id'] }}" name="name{{ $employee['id'] }}"
                        wire:model.defer="employees.{{ $loop->index }}.name" />
                    <x-form-error key="employees.{{ $loop->index }}.name" />
                </div>
                <div class="col-md-6">
                    <x-form-label id="username{{ $employee['id'] }}"
                        label="Username Karyawaan (ID: {{ $employee['id'] }})" />
                    <x-form-input id="username{{ $employee['id'] }}" name="username{{ $employee['id'] }}"
                        wire:model.defer="employees.{{ $loop->index }}.username" />
                    <x-form-error key="employees.{{ $loop->index }}.username" />
                </div>
                <div class="col-md-6">
                    <x-form-label id="email{{ $employee['id'] }}" label='Email Karyawaan' />
                    <x-form-input id="email{{ $employee['id'] }}" name="email{{ $employee['id'] }}" type="email"
                        wire:model.defer="employees.{{ $loop->index }}.email" placeholder="Email aktif" />
                    <x-form-error key="employees.{{ $loop->index }}.email" />
                </div>
                <div class="col-md-6">
                    <x-form-label id="phone{{ $employee['id'] }}" label='No. Telp' />
                    <x-form-input id="phone{{ $employee['id'] }}" name="phone{{ $employee['id'] }}"
                        wire:model.defer="employees.{{ $loop->index }}.phone" placeholder="Format: 08**" />
                    <x-form-error key="employees.{{ $loop->index }}.phone" />
                </div>
                <div class="col-md-6">
                    <x-form-label id="password{{ $employee['id'] }}" label='Password hanya bisa diubah oleh karyawaan'
                        required="false" />
                    <x-form-input id="password{{ $employee['id'] }}" name="password{{ $employee['id'] }}" disabled
                        required="false" />
                </div>
                <div class="col-md-6">
                    <x-form-label id="perusahaan_id{{ $employee['id'] }}"
                        label='Perusahaan' />
                    <select class="form-select" aria-label="Default select example" name="perusahaan_id"
                        wire:model.defer="employees.{{ $loop->index }}.perusahaan_id">
                        <option selected disabled>-- Pilih Role --</option>
                        @foreach ($perusahaans as $perusahaan)
                        <option value="{{ $perusahaan->id }}">{{ ucfirst($perusahaan->name) }}</option>
                        @endforeach
                    </select>
                    <x-form-error key="employees.{{ $loop->index }}.role_id" />
                </div>
                <div class="col-md-6">
                    <x-form-label id="position_id{{ $employee['id'] }}"
                        label='Jabatan / Posisi Karyawaan' />
                    <select class="form-select" aria-label="Default select example" name="position_id"
                        wire:model.defer="employees.{{ $loop->index }}.position_id">
                        <option selected disabled>-- Pilih Role --</option>
                        @foreach ($positions as $position)
                        <option value="{{ $position->id }}">{{ ucfirst($position->name) }}</option>
                        @endforeach
                    </select>
                    <x-form-error key="employees.{{ $loop->index }}.role_id" />
                </div>
                <div class="col-md-6">
                    <x-form-label id="role_id{{ $employee['id'] }}" label='Role' />
                    <select class="form-select" aria-label="Default select example" name="role_id"
                        wire:model.defer="employees.{{ $loop->index }}.role_id">
                        <option selected disabled>-- Pilih Role --</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                        @endforeach
                    </select>
                    <x-form-error key="employees.{{ $loop->index }}.role_id" />
                </div>
            </div>
        </div>
        <hr>
        @endforeach

        <div class="d-flex justify-content-between align-items-center mb-5">
            <button class="btn btn-primary">
                Simpan
            </button>
        </div>
    </form>
</div>
