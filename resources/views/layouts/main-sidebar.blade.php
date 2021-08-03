<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard" >
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">@lang('main.dashboard')</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('dashboard.index')}}">@lang('main.dashboard')</a> </li>
                        </ul>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">@lang('main.school_management_system')</li>

                    <!-- menu item grades-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#gradesMenue">
                            <div class="pull-left"><i class="fa fa-university"></i><span
                                    class="right-nav-text">@lang('main.grades')</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="gradesMenue" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('grades.index')}}">@lang('main.grades_list')</a></li>
                        </ul>
                    </li>
                    <!-- menu item classes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">@lang('main.classes')</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('classrooms.index')}}">@lang('main.classes_list')</a> </li>
                        </ul>
                    </li>

                    <!-- menu item section-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#section-menu">
                            <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                                    class="right-nav-text">@lang('main.sections')</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="section-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('sections.index')}}">@lang('main.sections_list')</a> </li>

                        </ul>
                    </li>

                    <!-- menu student-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu">
                            <div class="pull-left"><i class="fas fa-user-graduate"></i><span class="right-nav-text">@lang('main.students')</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('students.index')}}">@lang('main.students_list')</a> </li>
                            <li> <a href="{{route('promotions.index')}}">@lang('main.students_promotions')</a> </li>
                            <li> <a href="{{route('promotions.create')}}">@lang('main.manage_students_promotions')</a> </li>
                            <li> <a href="{{route('graduated.create')}}">@lang('main.graduate_students')</a> </li>
                            <li> <a href="{{route('graduated.index')}}">@lang('main.manage_graduate_students')</a> </li>
                        </ul>
                    </li>


                    <!-- menu teacher-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#teacher-menu">
                            <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i><span class="right-nav-text">@lang('main.teachers')</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="teacher-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('teachers.index')}}">@lang('main.teachers_list')</a> </li>
                        </ul>
                    </li>

                    <!-- menu parents -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#parent-menu">
                            <div class="pull-left"><i class="fas fa-user-tie"></i><span class="right-nav-text">@lang('main.parents')</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="parent-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('add_parent')}}">@lang('main.parents_list')</a> </li>
                        </ul>
                    </li>
                    <!-- menu  accounts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#accounts-menu">
                            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span class="right-nav-text">@lang('main.accounts')</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('fees.index')}}">@lang('main.fees_list')</a> </li>
                            <li> <a href="{{route('feesInvoices.index')}}">@lang('main.fees_invoices')</a> </li>
                            <li> <a href="{{route('receiptStudents.index')}}">@lang('main.receipt_list')</a> </li>
                            <li> <a href="{{route('processingFees.index')}}">@lang('main.processing_fees')</a> </li>
                            <li> <a href="{{route('paymentStudents.index')}}">@lang('main.payment_students')</a> </li>
                        </ul>
                    </li>
                    <!-- menu  attendance-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#attendance-menu">
                            <div class="pull-left"><i class="fa fa-calendar"></i><span class="right-nav-text">@lang('main.attendance')</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="attendance-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('attendances.index')}}">@lang('main.attendance_list')</a> </li>

                        </ul>
                    </li>

                    <!-- menu  attendance-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#subject-menu">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">@lang('main.subjects')</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="subject-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('subjects.index')}}">@lang('main.subject_list')</a> </li>

                        </ul>
                    </li>

                    <!-- menu  attendance-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#exam-menu">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">@lang('main.exams')</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="exam-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('exams.index')}}">@lang('main.exams_list')</a> </li>

                        </ul>
                    </li>


                    <!-- menu  attendance-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-menu">
                            <div class="pull-left"><i class="fas fa-book"></i><span class="right-nav-text">@lang('main.library')</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="library-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="login.html">@lang('main.library_list')</a> </li>

                        </ul>
                    </li>

                    <!-- menu  online-class-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#online-class-menu">
                            <div class="pull-left"><i class="fas fa-video"></i><span class="right-nav-text">@lang('main.online_classes')</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="online-class-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="login.html">@lang('main.online_classes')</a> </li>

                        </ul>
                    </li>

                    <!-- menu  settings-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#settings-menu">
                            <div class="pull-left"><i class="fas fa-cogs"></i><span class="right-nav-text">@lang('main.settings')</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="settings-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="login.html">@lang('main.settings')</a> </li>

                        </ul>
                    </li>

                    <!-- menu  users-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#user-menu">
                            <div class="pull-left"><i class="fas fa-users"></i><span class="right-nav-text">@lang('main.users')</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="user-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="login.html">@lang('main.users_list')</a> </li>

                        </ul>
                    </li>




                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
