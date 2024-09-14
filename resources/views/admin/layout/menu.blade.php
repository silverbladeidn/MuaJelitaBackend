 <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
            <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="{{ asset('admin/dasbor') }}" class="brand-link"> <!--begin::Brand Image--> <img src="<?php echo asset('assets/admin') ?>/dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">ROYANI</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2"> <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                        <!-- dashboard -->
                        <li class="nav-item"> <a href="{{ asset('admin/dasbor') }}" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
                                <p>Dasbor Aplikasi</p>
                            </a> 
                        </li>

                        <!-- Peta Konsumsi -->
                        <li class="nav-item"> <a href="{{ asset('admin/peta') }}" class="nav-link"> <i class="nav-icon bi bi-map"></i>
                                <p>Peta Konsumsi</p>
                            </a> 
                        </li>

                        <!-- konsumsi -->
                        <li class="nav-item"> <a href="{{ asset('admin/konsumsi') }}" class="nav-link"> <i class="nav-icon bi bi-basket"></i>
                                <p>Konsumsi Produk</p>
                            </a> 
                        </li>

                        <!-- jenis produk -->
                        <li class="nav-item"> <a href="{{ asset('admin/jenis-produk') }}" class="nav-link"> <i class="nav-icon bi bi-tags"></i>
                                <p>Jenis Produk</p>
                            </a> 
                        </li>

                        <!-- jenis proyek -->
                        <li class="nav-item"> <a href="{{ asset('admin/jenis-proyek') }}" class="nav-link"> <i class="nav-icon bi bi-cash-coin"></i>
                                <p>Jenis Proyek</p>
                            </a> 
                        </li>

                        <!-- pengguna -->
                        <li class="nav-item"> <a href="{{ asset('admin/user') }}" class="nav-link"> <i class="nav-icon bi bi-person-lock"></i>
                                <p>Pengguna Aplikasi</p>
                            </a> 
                        </li>

                        <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-gear"></i>
                                <p>
                                    Konfigurasi Website
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="{{ asset('admin/konfigurasi') }}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Setting Website</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="{{ asset('admin/konfigurasi/logo') }}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Update Logo</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="{{ asset('admin/konfigurasi/icon') }}" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Update Icon</p>
                                    </a> </li>
                            </ul>
                        </li>
                        
                        
                    </ul> <!--end::Sidebar Menu-->
                </nav>
            </div> <!--end::Sidebar Wrapper-->
        </aside> <!--end::Sidebar--> <!--begin::App Main-->
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-0">{{ $title }}</h3>
                        </div>
                        
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-12"> <!-- Default box -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $title }}</h3>
                                    <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove"> <i class="bi bi-x-lg"></i> </button> </div>
                                </div>
                                <div class="card-body" style="min-height: 400px;">

                                        