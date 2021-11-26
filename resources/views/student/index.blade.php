@extends('layout')

@section('title', 'Home')

@section('content')
    {{-- @if (session('success'))
        <div id="liveAlertPlaceholder"></div>
        <button type="button" class="btn btn-primary" id="liveAlertBtn">{{ session('success') }}</button>
    @endif --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <p>This is my body content.</p>
    <a class="btn-primary btn" href="/students/create">Add Student</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>no</th>
                <th>nama</th>
                <th>nim</th>
                <th>nomor hp</th>
                <th>gender</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->nim }}</td>
                    <td>{{ $student->phone_num }}</td>
                    <td>{{ $student->gender }}</td>
                    <td><a href="students/{{ $student->id }}/edit" class="bi bi-vector-pen"></a>
                        <button type="submit" class="border-0 text-danger bg-transparent" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $student->id }}">
                            <i class="bi bi-trash"> </i>
                        </button>
                    </td>
                    <div class="modal fade" id="deleteModal{{ $student->id }}" tabindex="-1"
                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete student</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body bgwhite">
                                    Anda yakin ingin menghapus student?
                                </div>
                                <form action="/students/{{ $student->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
