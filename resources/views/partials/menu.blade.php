<div id="sidebar-disable" class="sidebar-disable hidden"></div>

<div id="sidebar" class="sidebar-menu transform -translate-x-full ease-in">
    <div class="flex items-center justify-center mt-4">
        <div class="flex items-center">
            <img src="{{ asset('img/icon/logo.png') }}" alt="" class="img-fluid" style="width: 150px; height: 150px;">
        </div>
    </div>

    <nav class="mt-4">
        <a class="nav-link{{ request()->is('admin') ? ' active' : '' }}" href="{{ route("admin.home") }}">
            <i class="fas fa-fw fa-tachometer-alt">

            </i>

            <span class="mx-4">Dashboard</span>
        </a>

        @can('user_management_access')
            <div class="nav-dropdown">
                <a class="nav-link" href="#">
                    <i class="fa-fw fas fa-users">

                    </i>

                    <span class="mx-4">{{ trans('cruds.userManagement.title') }}</span>
                    <i class="fa fa-caret-down ml-auto" aria-hidden="true"></i>
                </a>
                <div class="dropdown-items mb-1 hidden">
                        @can('permission_access')
                        <a class="nav-link{{ request()->is('admin/permissions*') ? ' active' : '' }}" href="{{ route('admin.permissions.index') }}">
                            <i class="fa-fw fas fa-unlock-alt">

                            </i>

                            <span class="mx-4">{{ trans('cruds.permission.title') }}</span>
                        </a>
                    @endcan
                    @can('role_access')
                        <a class="nav-link{{ request()->is('admin/roles*') ? ' active' : '' }}" href="{{ route('admin.roles.index') }}">
                            <i class="fa-fw fas fa-briefcase">

                            </i>

                            <span class="mx-4">{{ trans('cruds.role.title') }}</span>
                        </a>
                    @endcan
                    @can('user_access')
                        <a class="nav-link{{ request()->is('admin/users*') ? ' active' : '' }}" href="{{ route('admin.users.index') }}">
                            <i class="fa-fw fas fa-user">

                            </i>

                            <span class="mx-4">{{ trans('cruds.user.title') }}</span>
                        </a>
                    @endcan
                </div>
            </div>
        @endcan
        @can('admin_access')
        <a class="nav-link{{ request()->is('admin/admins*') ? ' active' : '' }}" href="{{ route('admin.admins.index') }}">
            <i class="fa-fw fas fa-user-alt">

            </i>

            <span class="mx-4">{{ trans('cruds.admin.title') }}</span>
        </a>
    @endcan
        @can('kategori_access')
            <a class="nav-link{{ request()->is('admin/kategoris*') ? ' active' : '' }}" href="{{ route('admin.kategoris.index') }}">
                <i class="fa-fw fas fa-book">

                </i>

                <span class="mx-4">{{ trans('cruds.kategori.title') }}</span>
            </a>
        @endcan
        @can('buku_access')
            <a class="nav-link{{ request()->is('admin/bukus*') ? ' active' : '' }}" href="{{ route('admin.bukus.index') }}">
                <i class="fa-fw fas fa-address-book">

                </i>

                <span class="mx-4">{{ trans('cruds.buku.title') }}</span>
            </a>
        @endcan

        {{-- @can('category_access')
            <a class="nav-link{{ request()->is('admin/categories*') ? ' active' : '' }}" href="{{ route('admin.categories.index') }}">
                <i class="fa-fw fas fa-project-diagram">

                </i>

                <span class="mx-4">{{ trans('cruds.category.title') }}</span>
            </a>
        @endcan --}}
        {{-- @can('kelas_access')
        <a class="nav-link{{ request()->is('admin/kelas*') ? ' active' : '' }}" href="{{ route('admin.kelas.index') }}">
            <i class="fa-fw fas fa-project-diagram">

            </i>

            <span class="mx-4">{{ trans('cruds.kelas.title') }}</span>
        </a>
    @endcan --}}
        @can('kelase_access')
        <a class="nav-link{{ request()->is('admin/kelases*') ? ' active' : '' }}" href="{{ route('admin.kelases.index') }}">
            <i class="fa-fw fas fa-institution">

            </i>

            <span class="mx-4">{{ trans('cruds.kelase.title') }}</span>
        </a>
        @endcan
        @can('angkatan_access')
            <a class="nav-link{{ request()->is('admin/angkatans*') ? ' active' : '' }}" href="{{ route('admin.angkatans.index') }}">
                <i class="fa-fw fas fa-id-card">

                </i>

                <span class="mx-4">{{ trans('cruds.angkatan.title') }}</span>
            </a>
        @endcan
        @can('anggota_access')
            <a class="nav-link{{ request()->is('admin/anggotas*') ? ' active' : '' }}" href="{{ route('admin.anggotas.index') }}">
                <i class="fa-fw fas fa-user-plus">

                </i>

                <span class="mx-4">{{ trans('cruds.anggota.title') }}</span>
            </a>
        @endcan
        @can('peminjam_access')
            <a class="nav-link{{ request()->is('admin/peminjams*') ? ' active' : '' }}" href="{{ route('admin.peminjams.index') }}">
                <i class="fa-fw fas far fa-credit-card">

                </i>

                <span class="mx-4">{{ trans('cruds.peminjam.title') }}</span>
            </a>
        @endcan
        @can('pengembalian_access')
            <a class="nav-link{{ request()->is('admin/pengembalians*') ? ' active' : '' }}" href="{{ route('admin.pengembalians.index') }}">
                <i class="fa-fw fas far fa-file-alt">

                </i>

                <span class="mx-4">{{ trans('cruds.pengembalian.title') }}</span>
            </a>
        @endcan
        @can('pengunjung_access')
            <a class="nav-link{{ request()->is('admin/pengunjungs*') ? ' active' : '' }}" href="{{ route('admin.pengunjungs.index') }}">
                <i class="fa-fw fas fa-users">

                </i>

                <span class="mx-4">{{ trans('cruds.pengunjung.title') }}</span>
            </a>
        @endcan
        @can('project_access')
            <a class="nav-link{{ request()->is('admin/projects*') ? ' active' : '' }}" href="{{ route('admin.projects.index') }}">
                <i class="fa-fw fas fa-project-diagram">

                </i>

                <span class="mx-4">{{ trans('cruds.project.title') }}</span>
            </a>
        @endcan
        @can('folder_access')
            <a class="nav-link{{ request()->is('admin/folders*') ? ' active' : '' }}" href="{{ route('admin.folders.index') }}">
                <i class="fa-fw fas fa-folder">

                </i>

                <span class="mx-4">{{ trans('cruds.folder.title') }}</span>
            </a>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            <a class="nav-link{{ request()->is('profile/password') ? ' active' : '' }}" href="{{ route('profile.password.edit') }}">
                <i class="fa-fw fas fa-key">

                </i>

                <span class="mx-4">{{ trans('global.change_password') }}</span>
            </a>
        @endif
        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
            <i class="fa-fw fas fa-sign-out-alt">

            </i>

            <span class="mx-4">{{ trans('global.logout') }}</span>
        </a>
    </nav>
</div>
