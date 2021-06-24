<?php

namespace App\Http\Controllers\Sections;
use App\Http\Controllers\Controller;
use App\Models\Classroom;

use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{


  public function index()
  {



      $sections = Section::all();
      $class = Classroom::with('sections')->get();
      $teachers = Teacher::all();


      return view('dashboard.sections.index',compact('sections','class','teachers'));



  }//end of index

  public function create()
  {

  }//end of create


  public function store(Request $request)
  {

      $request->validate([
          'section_name_ar' =>'required',
          'section_name_en' =>'required',
          'section_name_ku' =>'required',
          'class_id' => 'required',
      ]);


      try {
          $section_list  = $request->all();
          $section = new Section();

          $translations = [
              'en' => $section_list['section_name_ar'],
              'ar' => $section_list['section_name_en'],
              'ku'=>$section_list['section_name_ku'],
          ];

          $section->setTranslations('name', $translations);

          $section->class_id = $section_list['class_id'];

          $section->status = 1;

          $section->save();
          $section->teachers()->attach($request->teacher_id);

          toastr()->success(__('message.success'));
          return redirect()->back();




      }catch (\Exception $e){

          return redirect()->back()->withErrors(['errors' => $e->getMessage()]);

      }//end of try catch


  }//end of store


  public function show($id)
  {

  }//end of show


  public function edit($id)
  {

  }//end of edit


  public function update(Request $request ,$id)
  {


      try {

          $request->validate([
              'name_section_ar' =>'required',
              'name_section_en' =>'required',
              'name_section_ku' =>'required',
              'class_id' => 'required',
          ]);
          $section = Section::findOrFail($id);




          $translations = [
              'en' => $request->name_section_ar,
              'ar' => $request->name_section_en,
              'ku' =>  $request->name_section_ku,
          ];

          $section->setTranslations('name', $translations);


          $section->class_id = $request->class_id;

          if (isset($request->status) == true) {
              $section->status = 1 ;
          }else{
              $section->status  = 0 ;

          }//end of if


          $section->save();

          if (isset($request->teacher_id)) {

              $section->teachers()->sync($request->teacher_id);

          }//end of id

          toastr()->success(__('message.update'));
          return redirect()->route('sections.index');



      }catch (\Exception $e){
          return redirect()->back()->withErrors(['errors' => $e->getMessage()]);

      }//end of try

  }//end of update


  public function destroy($id)
  {
      try {

          $section = Section::findOrFail($id);
          $section->delete();
          toastr()->error(__('message.delete'));
          return redirect()->route('sections.index');


      }catch (\Exception $e){
          return redirect()->back()->withErrors(['errors' => $e->getMessage()]);

      }//end of try

  }//end of destroy

}//end of contoller

?>
