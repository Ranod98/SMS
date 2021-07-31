<?php


namespace App\Repository;


use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;

class SubjectRepository implements SubjectRepositoryInterface
{

    public function index()
    {
      $subjects = Subject::all();

      return view('dashboard.subjects.index',compact('subjects'));
    }//end of index

    public function create()
    {
        $grades = Grade::all();
        $teachers =Teacher::all();
        return view('dashboard.subjects.create',compact('grades','teachers'));
    }//end of create

    public function store($request)
    {
        try {
            $subjects = new Subject();
            $subjects->name = ['en' => $request->name_en, 'ar' => $request->name_ar, 'ku' => $request->name_ku];
            $subjects->grade_id = $request->grade_id;
            $subjects->classroom_id = $request->class_id;
            $subjects->teacher_id = $request->teacher_id;
            $subjects->save();
            toastr()->success(trans('message.success'));
            return redirect()->route('subjects.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }//end of store

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        $grades = Grade::all();
        $teachers =Teacher::all();

        return view('dashboard.subjects.edit',compact('subject','grades','teachers'));

    }//end of edit

    public function update($request, $id)
    {

        try {
            $subjects =  Subject::findorfail($id);
            $subjects->name = ['en' => $request->name_en, 'ar' => $request->name_ar,'ku' => $request->name_ku];
            $subjects->grade_id = $request->grade_id;
            $subjects->classroom_id = $request->class_id;
            $subjects->teacher_id = $request->teacher_id;
            $subjects->save();
            toastr()->success(trans('message.update'));
            return redirect()->route('subjects.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }//end of update

    public function destroy($id)
    {
        try {
            Subject::destroy($id);
            toastr()->error(trans('message.delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }//end of destroy
}
