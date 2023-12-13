<ul class="navbar-nav bg-gradient-primary-to-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Studo Assist</div>
    </a>

    <!-- Divider -->

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{request()->is('dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{request()->is('dashboard/users') ? 'active' : ''}}">
        <a class="nav-link" href="/dashboard/users">
            <i class="fas fa-users"></i>
            <span>Seluruh User</span></a>
    </li>

    <li class="nav-item {{request()->is('dashboard/matakuliah') ? 'active' : ''}}">
        <a class="nav-link" href="/dashboard/matakuliah">
            <i class="fas fa-tasks"></i>
            <span>Seluruh Mata Kuliah</span></a>
    </li>

    <li class="nav-item {{request()->is('dashboard/tasks') ? 'active' : ''}}">
        <a class="nav-link" href="/dashboard/tasks">
            <i class="fas fa-tasks"></i>
            <span>Seluruh Tugas</span></a>
    </li>


    <!-- Divider -->
    <li class="nav-item {{request()->is('dashboard/history') ? 'active' : ''}}">
        <a class="nav-link" href="/dashboard/history">
            <i class="fas fa-history"></i>
            <span>History</span></a>
    </li>



    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Creators</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sosial Media Creators :</h6>
                <a target="_blank" href="https://www.instagram.com/tegar_deyustian/" class="collapse-item" ">Tegar Deyustian </a>
                <a target="_blank" href="https://www.instagram.com/busdrifter/" class="collapse-item" > Sabian Resatya</a>
                <a target="_blank" href="https://www.instagram.com/m.rinaldi_afgan/" class="collapse-item" >Rinaldi Afgan</a>

            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    

    <!-- Divider -->

    <!-- Heading -->
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    
</ul>