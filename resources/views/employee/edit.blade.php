@extends('layouts.app')

@section('content')
<div class="container-sm mt-5">
    <form action="{{ route('employees.update', ['employee' => $employee->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row justify-content-center">
            <div class="p-5 bg-light border rounded-3 col-xl-6">
                <div class="mb-3 text-center">
                    <i class="bi bi-pencil-square fs-1 text-dark"></i>
                    <h4 class="text-dark">Edit Pesanan</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName" class="form-label">Nama Lengkap</label>
                        <input class="form-control @error('firstName') is-invalid @enderror" type="text" name="firstName" id="firstName" value="{{ $errors->any() ? old('firstName') : $employee->firstname }}" placeholder="Enter First Name">
                        @error('firstName')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Jenis Perusahaan</label>
                        <input class="form-control @error('lastName') is-invalid @enderror" type="text" name="lastName" id="lastName" value="{{ $errors->any() ? old('lastName') : $employee->lastname }}" placeholder="Enter Last Name">
                        @error('lastName')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ $errors->any() ? old('email') : $employee->email }}" placeholder="Enter Email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="age" class="form-label">No Telephone</label>
                        <input class="form-control @error('age') is-invalid @enderror" type="text" name="age" id="age" value="{{ $errors->any() ? old('age') : $employee->age }}" placeholder="Enter Age">
                        @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="position" class="form-label">Layanan</label>
                        <select name="position" id="position" class="form-select">
                            @php
                                $selected = $errors->any() ? old('position') : $employee->position_id;
                            @endphp
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}" {{ $selected == $position->id ? 'selected' : '' }}>
                                    {{ $position->code . ' - ' . $position->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('position')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Lampiran Informasi Perusahaan</label>
                        @if ($employee->original_filename)
                            <h5>{{ $employee->original_filename }}</h5>
                            <a href="{{ route('employees.downloadFile', ['employeeId' => $employee->id]) }}" class="btn btn-primary btn-sm mt-2">
                                <i class="bi bi-cloud-download me-1"></i> Download Lampiran Informasi Perusahaan
                            </a>
                        @else
                            <h5>Tidak ada</h5>
                        @endif
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="cv" class="form-label">Upload Lampiran Informasi Perusahaan</label>
                        <input type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" id="cv">
                        @error('cv')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 d-grid">
                        <a href="{{ route('employees.index') }}" class="btn btn-outline-dark btn-lg mt-3">
                            <i class="bi bi-arrow-left-circle me-2"></i> Cancel
                        </a>
                    </div>
                    <div class="col-md-6 d-grid">
                        <button type="submit" class="btn btn-dark btn-lg mt-3">
                            <i class="bi bi-check-circle me-2"></i> Edit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
