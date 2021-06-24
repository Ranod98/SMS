<?php
namespace App\Http\Controllers\Classrooms;
use App\Http\Controllers\Controller;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

  public function index()
  {
      $classrooms = Classroom::all();
      $grades = Grade::all();
    return view('dashboard.classrooms.index',compact('classrooms','grades'));
  }//end of index

  public function create()
  {

  }


  public function store(Request $request)
  {

      $request->validate([
          'class_list.*.name_ar' =>'required',
          'class_list.*.name_en' =>'required',
          'class_list.*.name_ku' =>'required',
          'class_list.*.Grade_id' => 'required',
          ]);


      try {



          $listclass = $request->class_list;

          foreach ($listclass as  $listClass){


          $class = new  Classroom();
          $translations = [
              'en' => $listClass['name_en'],
              'ar' => $listClass['name_ar'],
              'ku'=>$listClass['name_ku'],
          ];

          $class->setTranslations('name', $translations);

          $class->Grade_id = $listClass['Grade_id'];

          $class->save();
          }
          toastr()->success(__('message.success'));
          return redirect()->back();





      }
      catch (\Exception $e){
          return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
      }//end of catch
  }//end of store


  public function show($id)
  {


  }


  public function edit($id)
  {

  }

  public function update(Request $request , $id)
  {

      $request->validate([
          'name_ar' =>'required',
          'name_en' =>'required',
          'name_ku' =>'required',
          'Grade_id' => 'required',
      ]);

      try {
          $translations = [
              'en' => $request->name_en,
              'ar' => $request->name_ar,
              'ku'=>$request->name_ku,
          ];


          $class = Classroom::findOrFail($id);

          $class->update([
              'name'=> $translations,
              'Grade_id' => $request->Grade_id,
          ]);

          toastr()->success(__('message.update'));
          return redirect()->route('classrooms.index');



      }catch (\Exception $e){
          return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
      }//end of catch


  }//end of update


  public function destroy($id)
  {
      try {
          $class = Classroom::findOrFail($id);
          $class->delete();

          toastr()->error(__('message.delete'));
          return redirect()->route('classrooms.index');

      }catch (\Exception $e){
          return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
      }//end of try and catch
  }//end of destroy

    public function delete_all(Request $request){

      $ids = explode(',',$request->delete_all_id);
      Classroom::whereIn('id',$ids)->Delete();
        toastr()->error(__('message.delete'));
        return redirect()->route('classrooms.index');



    }//end of delete all

    public function filter_classes(Request $request){

      $search  = Classroom::where('grade_id' , $request->grade_id)->get();
      $grades = Grade::all();

        return view('dashboard.classrooms.index',compact('grades'))->withDetails($search);
    }//filter_classes

}//end of controller

?>
