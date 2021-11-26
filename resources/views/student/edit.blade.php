@extends('layout')

@section('title', 'Add Student')

@section('content')
    <p>This is my body content.</p>
    <form method="POST" action="/students/{{ $student->id }}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" value="{{ $student->name }}" name="name" placeholder="Johnatan Joestar">
        </div>
        <div class="mb-3">
            <label for="NIM" class="form-label">NIM</label>
            <input type="text" class="form-control" name="nim" value="{{ $student->nim }}" id="NIM" placeholder="1234567890">
        </div>
        <div class="mb-3">
            <label for="phone_num" class="form-label">Nomor Handphone</label>
            <input type="text" class="form-control" name="phone_num" value="{{ $student->phone_num }}" id="phone_num" placeholder="081234567890">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <input type="text" class="form-control" name="gender" value="{{ $student->gender }}" id="gender" placeholder="Laki-laki">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </div>
    </form>
@endsection
