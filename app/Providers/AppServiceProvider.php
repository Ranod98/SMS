<?php

namespace App\Providers;

use App\Repository\AttendanceRepository;
use App\Repository\AttendanceRepositoryInterface;
use App\Repository\FeeInvoicesRepository;
use App\Repository\FeeInvoicesRepositoryInterface;
use App\Repository\FeeRepository;
use App\Repository\FeeRepositoryInterface;
use App\Repository\PaymentStudentRepository;
use App\Repository\PaymentStudentRepositoryInterface;
use App\Repository\ProcessingFeeRepository;
use App\Repository\ProcessingFeeRepositoryInterface;
use App\Repository\ReceiptStudentsRepository;
use App\Repository\ReceiptStudentsRepositoryInterface;
use App\Repository\StudentGraduatedRepository;
use App\Repository\StudentGraduatedRepositoryInterface;
use App\Repository\StudentPromotionRepository;
use App\Repository\StudentPromotionRepositoryInterface;
use App\Repository\StudentRepository;
use App\Repository\StudentRepositoryInterface;
use App\Repository\TeacherRepository;
use App\Repository\TeacherRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
       $this->app->bind(TeacherRepositoryInterface::class,TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class,StudentRepository::class);
        $this->app->bind(StudentPromotionRepositoryInterface::class,StudentPromotionRepository::class);
        $this->app->bind(StudentGraduatedRepositoryInterface::class,StudentGraduatedRepository::class);
        $this->app->bind(FeeRepositoryInterface::class,FeeRepository::class);
        $this->app->bind(FeeInvoicesRepositoryInterface::class,FeeInvoicesRepository::class);
        $this->app->bind(ReceiptStudentsRepositoryInterface::class,ReceiptStudentsRepository::class);
        $this->app->bind(ProcessingFeeRepositoryInterface::class,ProcessingFeeRepository::class);
        $this->app->bind(PaymentStudentRepositoryInterface::class,PaymentStudentRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class,AttendanceRepository::class);

    }


    public function boot()
    {
        //
    }
}
