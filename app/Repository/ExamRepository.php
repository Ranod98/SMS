<?php


namespace App\Repository;


use App\Models\Exam;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Exception;

class ExamRepository implements ExamRepositoryInterface
{

    public function index()
    {
        $exams  = Exam::all();


        return view('dashboard.exams.index',compact('exams'));
    }//end of index

    public function create()
    {
        return view('dashboard.exams.create');
    }//end of create

    public function store($request)
    {
        try {
            $exams = new Exam();
            $exams->name = ['en' => $request->name_en, 'ar' => $request->name_ar,'ku' => $request->name_ku];
            $exams->term = $request->term;
            $exams->academic_year = $request->academic_year;
            $exams->save();
            toastr()->success(trans('message.success'));
            return redirect()->route('exams.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }//end of store

    public function edit($id)
    {
        $exam = Exam::findOrFail($id);

        return view('dashboard.exams.edit',compact('exam'));
    }//end of exam

    public function update($request, $id)
    {
        try {
            $exams =Exam::findOrFail($id);

            $exams->name = ['en' => $request->name_en, 'ar' => $request->name_ar,'ku' => $request->name_ku];
            $exams->term = $request->term;
            $exams->academic_year = $request->academic_year;
            $exams->save();
            toastr()->success(trans('message.update'));
            return redirect()->route('exams.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }//end of update

    public function destroy($id)
    {
        try {
            Exam::destroy($id);
            toastr()->error(trans('message.delete'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }//end of destroy
}
