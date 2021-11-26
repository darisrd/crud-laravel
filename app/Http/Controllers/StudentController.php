<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = student::get();
        return view('/student/index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/student/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'phone_num' => 'required',
            'gender' => 'required',
        ]);

        $insert = student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'phone_num' => $request->phone_num,
            'gender' => $request->gender,
        ]);

        session()->flash('success', 'Siswa berhasil ditambah');
        return redirect('/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
        return view('/student/edit', compact("student"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
        student::where('id', $student->id)
            ->update([
                'name' => $request->name,
                'nim' => $request->nim,
                'phone_num' => $request->phone_num,
                'gender' => $request->gender,
            ]);

        session()->flash('success', 'Siswa berhasil diupdate');
        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        student::destroy($student->id);
        session()->flash('success', 'Siswa berhasil dihapus');
        return redirect('/students');
    }
}
