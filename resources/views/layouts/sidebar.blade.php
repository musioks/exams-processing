<div class="left-side-menu left-side-menu-dark">
    <div class="slimscroll-menu"><!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Navigation</li>
                <li><a href="{{url('/main')}}" class="{{Request::is('main') ? 'active' :''}}"><i class="mdi mdi-view-dashboard"></i> <span>Dashboard</span></a></li>
                @role('ADMIN')
                <li><a href="{{url('/academics/courses')}}" class="{{Request::is('academics/courses') ? 'active' :''}}"><i class="mdi mdi-atom"></i> <span>Manage Courses</span></a></li>
                <li><a href="{{url('/academics/units')}}" class="{{Request::is('academics/units') ? 'active' :''}}"><i class="mdi mdi-file-document-box"></i> <span>Manage Units</span></a></li>
                <li><a href="{{url('/academics/batches')}}" class="{{Request::is('academics/batches') ? 'active' :''}}"><i class="mdi mdi-buffer"></i> <span>Manage Batches</span></a></li>
                <li><a href="{{url('/academics/intakes')}}" class="{{Request::is('academics/intakes') ? 'active' :''}}"><i class="mdi mdi-buffer"></i> <span>Manage Intakes</span></a></li>
                <li><a href="{{url('/students')}}" class="{{Request::is('students') ? 'active' :''}}"><i class="mdi mdi-account-multiple"></i> <span>Manage Students</span></a></li>
                <li><a href="{{url('/lecturers')}}" class="{{Request::is('lecturers') ? 'active' :''}}"><i class="mdi mdi-account-multiple"></i> <span>Manage Lecturers</span></a></li>
                @endrole

                @role('STUDENT')
                <li><a href="{{url('/portal/student/units')}}" class="{{Request::is('portal/student/units') ? 'active' :''}}"><i class="mdi mdi-book-open"></i> <span>My Units</span></a></li>
                <li><a href="{{url('/portal/student/exams')}}" class="{{Request::is('portal/student/exams') ? 'active' :''}}"><i class="mdi mdi-pencil"></i> <span>My Exams</span></a></li>
                <li><a href="" class=""><i class="mdi mdi-account-multiple"></i> <span>Exam Results</span></a></li>
                @endrole

                @role('LECTURER')
                <li><a href="{{url('/portal/lecturer/units')}}" class="{{Request::is('portal/lecturer/units') ? 'active' :''}}"><i class="mdi mdi-book-open"></i> <span>My Units</span></a></li>
                <li><a href="{{url('/portal/lecturer/exams')}}" class="{{Request::is('portal/lecturer/exams') ? 'active' :''}}"><i class="mdi mdi-pencil"></i> <span>My Exams</span></a></li>
                @endrole

            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
