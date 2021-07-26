<?php


namespace App\Repository;


use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Student;

class AttendanceRepository implements AttendanceRepositoryInterface
{

    public function index()
    {
        $grades= Grade::all();

        return view('dashboard.attendance.index',compact('grades'));
    }//end of index

    public function show($id)
    {
        $students = Student::where('section_id',$id)->get();

        return view('dashboard.attendance.show',compact('students'));
    }//end of show

    public function store($request)
    {
        try {

            foreach ($request->attendances as $student_id => $attendance) {

                if( $attendance == 'presence' ) {
                    $attendance_status = true;
                } else if( $attendance == 'absence' ){
                    $attendance_status = false;
                }

                $student = Student::findOrFail($student_id);

                Attendance::create([
                    'student_id'=> $student_id,
                    'grade_id'=> $student->grade_id,
                    'class_room_id'=> $student->class_id,
                    'section_id'=> $student->section_id,
                    'teacher_id'=> 1,
                    'attendance_date'=> date('Y-m-d'),
                    'attendance_status'=> $attendance_status
                ]);

            }

            toastr()->success(trans('message.success'));
            return redirect()->back();

        }  catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }//end of store

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($request, $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}
