<?php

namespace App\Http\Controllers\Grades;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGrade;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;


class GradeController extends Controller
{

  public function index()
  {

      $grades = Grade::all();

    return view('dashboard.grades.index',compact('grades'));
  }//end of index


  public function store(StoreGrade $request)
  {
      if(Grade::where('Name->ar',$request->Name_ar)->orWhere('Name->en',$request->Name_en)->orWhere('Name->ku',$request->Name_ku)->exists()){
          return  redirect()->back()->withErrors(__('grades.this_name_already_exist'));

      }//end if
      try {
          $request->validated();
          $grade = new Grade();
          $translations = [
              'en' => $request->Name_en,
              'ar' => $request->Name_ar,
              'ku'=>$request->Name_ku,
          ];
          $grade->setTranslations('Name', $translations);
          $grade->Notes = $request->Notes;
          $grade->save();

          toastr()->success(__('message.success'));
          return redirect()->back();

      }catch (\Exception $e){

          return redirect()->back()->withErrors(['errors' => $e->getMessage()]);

      }//end of try and catch

  }//end of store



  public function update(StoreGrade $request,$id)
  {
      try {

          $request->validated();
          $grade = Grade::findOrFail($id);


          $translations = [
              'en' => $request->Name_en,
              'ar' => $request->Name_ar,
              'ku'=>$request->Name_ku,
          ];
          $grade->update([
              'Name'=> $translations,
             'Notes' => $request->Notes,
          ]);


          toastr()->success(__('message.update'));
          return redirect()->route('grades.index');

      }catch (\Exception $e){
          return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
      }//end of try and catch
  }//end of update



  public function destroy(Request $request , $id)
  {

      try {
          $MyClass =  Classroom::where('Grade_id',$id)->pluck('Grade_id');
          if ($MyClass->count() == 0) {
              $grade = Grade::findOrFail($id);
              $grade->delete();
              toastr()->error(__('message.delete'));
              return redirect()->route('grades.index');
          }else{
              toastr()->error(__('message.erorr_child'));
              return redirect()->route('grades.index');
          }


      }catch (\Exception $e){
          return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
      }//end of try and catch
  }//end of destroy

}//end of controller

?>
