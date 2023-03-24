<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">
    
    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex " style="position: relative" href="#">
        <br>
        <div class="sidebar-brand-icon rotate-n-15"  style="visibility: hidden">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3" style="visibility: hidden">Administrator</div>
    </div>
    <div style="position:fixed">
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Interface
    </div> -->

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3"  style="width: auto">Administrator</div>
        </a>
    </li>
    <hr class="sidebar-divider">
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="/listcompany">
            <i class="fas fa-fw fa-list"></i>
            <span>List of Company</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/addcompany">
            <i class="fas fa-fw fa-list"></i>
            <span>Add Company</span></a>
    </li>

    <form action="/logout" method="post">
        @csrf 
        <div class="text-center"><button type="submit" class="btn btn-danger">Logout</button></div>
    </form>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center">
        {{-- <button class="rounded-circle border-0" id="sidebarToggle"></button> --}}
    </div>
    </div>
</ul>
