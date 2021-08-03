<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::group(['middleware'=>'guest'],function (){
    Route::get('/', function () {
        return view('auth.login');
    });

});



Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth']], function(){ //...

        //dashboard routes
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard.index');

//grade routes
    Route::group(['namespace'=>'Grades'],function (){
        Route::resource('grades', 'GradeController');

    });

    //classrooms routes
    Route::group(['namespace'=>'Classrooms'],function (){
        Route::resource('classrooms', 'ClassroomController');
        Route::post('delete_all','ClassroomController@delete_all')->name('class.delete_all');
        Route::post('filter_classes','ClassroomController@filter_classes')->name('class.filter_classes');
    });

    //Sections routes
    Route::group(['namespace'=>'Sections'],function (){
        Route::resource('sections', 'SectionController');

    });

    //parent routes

    Route::view('add-student-parent','livewire.show_form')->name('add_parent');


    //Teachers routes
    Route::group(['namespace'=>'Teachers'],function (){
        Route::resource('teachers', 'TeacherController');

    });

    //Students routes
    Route::group(['namespace'=>'Students'],function (){
        Route::resource('students', 'StudentController');
        Route::get('/getClassrooms/{id}', 'StudentController@getClassrooms');
        Route::get('/getSections/{id}', 'StudentController@getSections');
        Route::post('/uploadAttachments/{id}','StudentController@uploadAttachments')->name('uploadAttachments');
        Route::get('download_attachment/{studentname}/{filename}','StudentController@downloadAttachment')->name('downloadAttachment');
        Route::delete('/deleteAttachment','StudentController@deleteAttachment')->name('deleteAttachment');

        Route::resource('promotions', 'PromotionController');
        Route::resource('graduated', 'GraduatedController');
    });

    //fees route

    Route::group(['namespace'=>'Fees'],function (){
        Route::resource('fees', 'FeeController');
        Route::resource('feesInvoices', 'FeeInvoiceController');
        Route::resource('receiptStudents', 'ReceiptStudentController');
        Route::resource('processingFees', 'ProcessingFeeController');
        Route::resource('paymentStudents', 'PaymentStudentController');
    });

    Route::group(['namespace'=>'Attendances'],function (){
        Route::resource('attendances', 'AttendanceController');

    });


    Route::group(['namespace'=>'Subject'],function (){
        Route::resource('subjects', 'SubjectController');

    });

    Route::group(['namespace'=>'Exams'],function (){
        Route::resource('exams', 'ExamController');

    });



});



