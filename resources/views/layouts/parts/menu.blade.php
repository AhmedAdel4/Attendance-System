   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
       <!-- Brand Logo -->
       <a href="{{ route('home') }}" class="brand-link">
           <img src="{{ asset('images/logo.jpg') }}" alt="System Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
           <span class="brand-text font-weight-light">{{ config('app.name', 'Attendance system') }}</span>
       </a>

       <!-- Sidebar -->
       <div class="sidebar">
           <!-- Sidebar user panel (optional) -->
           <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                   <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
               </div>
               <div class="info">
                   <a href="#" class="d-block">{{ auth()->user()->name }}</a>
               </div>
           </div>


           <!-- Sidebar Menu -->
           <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                   data-accordion="false">

                   @if (auth()->user()->isAdmin)
                       <li class="nav-header">NENUE ITEMS</li>
                       <li class="nav-item">
                           <a href="{{ route('Instructor.index') }}" class="nav-link">
                               <i class="nav-icon far fa-user"></i>
                               <p>
                                   Instructors
                                   {{-- <span class="badge badge-info right">{{ $doctorsCount  }}</span> --}}
                               </p>
                           </a>
                       </li>
                       <li class="nav-item">
                           <a href="{{ route('Subject.index') }}" class="nav-link">
                               <i class="nav-icon far fa-calendar-alt"></i>
                               <p>
                                   Subjects
                                   {{-- <span class="badge badge-info right">{{ $doctorsCount  }}</span> --}}
                               </p>
                           </a>
                       </li>
                       <li class="nav-item">
                           <a href="{{ route('Group.index') }}" class="nav-link">
                               <i class="nav-icon fa fa-users"></i>
                               <p>
                                   Groups
                                   {{-- <span class="badge badge-info right">{{ $doctorsCount  }}</span> --}}
                               </p>
                           </a>
                       </li>
                       <li class="nav-item">
                           <a href="{{ route('Student.index') }}" class="nav-link">
                               <i class="nav-icon fa fa-graduation-cap"></i>
                               <p>
                                   Students
                                   {{-- <span class="badge badge-info right">{{ $doctorsCount  }}</span> --}}
                               </p>
                           </a>
                       </li>
                   @else
                       <li class="nav-item">
                           <a href="{{ route('Instructor.mySubjects') }}" class="nav-link">
                               <i class="nav-icon far fa-calendar-alt"></i>
                               <p>
                                   My Subjects
                                   {{-- <span class="badge badge-info right">{{ $doctorsCount  }}</span> --}}
                               </p>
                           </a>
                       </li>
                   @endif





               </ul>
           </nav>
           <!-- /.sidebar-menu -->
       </div>
       <!-- /.sidebar -->
   </aside>
