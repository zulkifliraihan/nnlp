@extends('layouts.admin')
@section('content')

<style>
    .cut-text {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>

<!-- BEGIN: Content -->
<div class="content">
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Application</a> <i
                data-feather="chevron-right" class="breadcrumb__icon"></i> <a href=""
                class="breadcrumb--active">Dashboard</a> </div>
        <!-- END: Breadcrumb -->

        <!-- BEGIN: Account Menu -->
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                <img alt="img" src="https://avatars.dicebear.com/api/initials/Admin Lpkn.svg">
            </div>
            <div class="dropdown-box w-56">
                <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                    <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                        <div class="font-medium">LPKN Admin</div>
                        <div class="text-xs text-theme-41 dark:text-gray-600">Admin</div>
                    </div>
                    <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                        <a href=""
                            class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                            <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>


    <!-- END: Top Bar -->
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        General Report
                    </h2>
                    {{-- <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10"> <i data-feather="refresh-ccw"
                            class="w-4 h-4 mr-3"></i> Reload Data </a> --}}
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="user" class="report-box__icon text-theme-9"></i>
                                    <div class="ml-auto">
                                        {{-- <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                            title="22% Higher than last month"> 22% <i data-feather="chevron-up"
                                                class="w-4 h-4"></i> </div> --}}
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">
                                    {{ number_format($total_user, 0, ',', '.') }}</div>
                                <div class="text-base text-gray-600 mt-1">Total User</div>
                            </div>
                            
                        </div>
                    </div>

                    @php
                        $color = array(
                            'bg-theme-12',
                            'bg-theme-1',
                            'bg-theme-9'
                        );
                        $rank = array(
                            'st',
                            'nd',
                            'rd'
                        );
                    @endphp

                    @forelse ($pemenang as $item)
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    {{-- <span class="text-base report-box__indicator bg-yellow-500">1 <sup>st</sup> Winner</span> --}}
                                    <div class="mt-3"> 
                                        <span class="px-2 py-1 rounded-full {{ $color[$loop->index] }} text-white mr-1">{{ $loop->index + 1 }}<sup>{{ $rank[$loop->index] }}</sup> Winner</span> 
                                    </div>
                                    {{-- <div class="ml-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                            title="22% Higher than last month"> 22% <i data-feather="chevron-up"
                                                class="w-4 h-4"></i> </div>
                                    </div> --}}
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">
                                    {{ isset($item->user) ? $item->user->name : "Belum ada pemenang" }}
                                </div>
                                <div class="text-base text-gray-600 mt-1">
                                    {{ isset($item->user) ? $item->jumlah : 0 }} Undangan
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        
                    @endforelse
                </div>
                
            </div>
            <!-- END: General Report -->
        </div>

        <!-- BEGIN: Weekly Top Products -->
        <div class="col-span-12 mt-6">
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Data User
                </h2>
            </div>
            <div class="flex box p-2 flex-col sm:flex-row sm:items-end xl:items-start">
                <div class="flex-auto items-center sm:mr-4 mt-3 xl:mt-0">
                    <input type="text" id="db-search" placeholder="Pencarian .." class="input w-full border">
                </div>
                <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                    <select id="db-jumlah" class="input border mr-2">
                        <option value="5">5 Data</option>
                        <option value="10">10 Data</option>
                        <option value="20">20 Data</option>
                        <option value="30">30 Data</option>
                        <option value="40">40 Data</option>
                        <option value="50">50 Data</option>
                        <option value="-1">All</option>
                    </select> 
                    <a href="{{ route('admin.export.user') }}" target="_blank">
                        <button class="button box flex items-center bg-green-800 text-white dark:text-white-300"> <i
                            data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel </button>
                    </a>
                </div>
            </div>
            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0 my-3">
                <table class="table table-report sm:mt-2" id="userTableData">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap bg-white">MENGUNDANG</th>
                            <th class="whitespace-no-wrap bg-white">NAMA LENGKAP</th>
                            <th class="text-center whitespace-no-wrap bg-white">JUMLAH TERUNDANG</th>
                            <th class="text-center whitespace-no-wrap bg-white">KODE REFFERENSI</th>
                            <th class="text-center whitespace-no-wrap bg-white">DIUNDANG OLEH</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr class="intro-x">
                            <td class="w-40">
                                @if(isset($user->mengundang) && !empty($user->mengundang))
                                <div class="flex">
                                    @php
                                    $counter = 0;
                                    @endphp
                                    @forelse ($user->mengundang as $mengundang)
                                    @if ($counter > 2)
                                    @php
                                    break;
                                    @endphp
                                    @else
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        <img alt="img" class="tooltip rounded-full"
                                            src="https://avatars.dicebear.com/api/initials/{{ $mengundang->name }}.svg"
                                            title="{{ $mengundang->name }}">
                                    </div>
                                    @php
                                    $counter++;
                                    @endphp
                                    @endif
                                    @empty

                                    @endforelse

                                    @if ($counter > 2 && ($user->mengundang->count() - $counter) != 0)
                                    <div class="w-10 h-10 image-fit">
                                        <div class="rounded-full text-center">
                                            {{ $user->mengundang->count() - $counter }} +
                                        </div>
                                    </div>
                                    @endif

                                </div>
                                @endif
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-no-wrap">{{ $user->name }}</a>
                                <div class="text-gray-600 text-xs whitespace-no-wrap">{{ $user->instansi }}</div>
                            </td>
                            <td class="text-center">{{ isset($user->mengundang) ? count($user->mengundang) : 0 }}</td>
                            <td class="w-40">
                                <div class="flex items-center justify-center text-theme-9">
                                    {{ $user->ref }}
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    @isset($user->diundang->name)
                                    {{ $user->diundang->name }}
                                    @endisset
                                </div>
                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- END: Weekly Top Products -->

        </div>
    </div>
</div>
<!-- END: Content -->

<script>
    var table = $('#userTableData').DataTable({
        dom : 'Brtp',
        aaSorting: [],
        pageLength: 5
    });

    $('#db-search').keyup(function(){
        table.search( $(this).val() ).draw();
    });

    $('#db-jumlah').on('change', function(){
        table.page.len($(this).val()).draw();
    });
</script>
@endsection