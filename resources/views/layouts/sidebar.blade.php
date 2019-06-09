<div class="left-side-menu left-side-menu-dark">
    <div class="slimscroll-menu"><!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Navigation</li>
                <li><a href="{{url('/main')}}" class="{{Request::is('main') ? 'active' :''}}"><i class="mdi mdi-view-dashboard"></i> <span>Dashboard</span></a></li>
                <li><a href="{{url('/academics/courses')}}" class="{{Request::is('academics/courses') ? 'active' :''}}"><i class="mdi mdi-atom"></i> <span>Manage Courses</span></a></li>
                <li><a href="{{url('/academics/units')}}" class="{{Request::is('academics/units') ? 'active' :''}}"><i class="mdi mdi-file-document-box"></i> <span>Manage Units</span></a></li>
                <li><a href="{{url('/academics/batches')}}" class="{{Request::is('academics/batches') ? 'active' :''}}"><i class="mdi mdi-buffer"></i> <span>Manage Batches</span></a></li>
                <li><a href="{{url('/academics/intakes')}}" class="{{Request::is('academics/intakes') ? 'active' :''}}"><i class="mdi mdi-buffer"></i> <span>Manage Intakes</span></a></li>
                <li><a href="{{url('/students')}}" class="{{Request::is('students') ? 'active' :''}}"><i class="mdi mdi-account-multiple"></i> <span>Manage Students</span></a></li>
                <li><a href="{{url('/lecturers')}}" class="{{Request::is('lecturers') ? 'active' :''}}"><i class="mdi mdi-account-multiple"></i> <span>Manage Lecturers</span></a></li>
                <li><a href="" class=""><i class=" mdi mdi-amazon-alexa"></i> <span>Pending Approvals</span></a></li>
                <li><a href="" class=""><i class="mdi mdi-arch"></i> <span>Approved Payments</span></a></li>
                <li class="menu-title">Reports</li>
                <li><a href="" class=""><i class="mdi mdi-cash-usd"></i> <span>Payments Report</span></a></li>
                <li><a href="" class=""><i class="mdi mdi-book-open"></i> <span>Course Reports</span></a></li>
                <li><a href="" class=""><i class="mdi mdi-account-multiple"></i> <span>Learners Report</span></a></li>


            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
