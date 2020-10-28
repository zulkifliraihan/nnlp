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
                                <div class="text-base text-gray-600 mt-1">Total Pendaftar</div>
                            </div>

                        </div>
                    </div>

                    @php
                    $color = array(
                    'bg-theme-12',
                    'bg-theme-1',
                    'bg-theme-9',
                    'bg-theme-12',
                    'bg-theme-1',
                    'bg-theme-9',
                    'bg-theme-12',
                    'bg-theme-1',
                    'bg-theme-9',
                    'bg-theme-12',
                    'bg-theme-1',
                    'bg-theme-9',
                    'bg-theme-12',
                    'bg-theme-1',
                    'bg-theme-9',
                    );
                    $rank = array(
                    'st',
                    'nd',
                    'rd',
                    'th',
                    'th',
                    'th',
                    'th',
                    'th',
                    'th',
                    'th'
                    );
                    @endphp

                    @forelse ($pemenang as $item)
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    {{-- <span class="text-base report-box__indicator bg-yellow-500">1 <sup>st</sup> Winner</span> --}}
                                    <div class="mt-3">
                                        <span
                                            class="px-2 py-1 rounded-full {{ $color[$loop->index] }} text-white mr-1">{{ $loop->index + 1 }}<sup>{{ $rank[$loop->index] }}</sup>
                                            Winner</span>
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
                                    {{ isset($item->user) ? number_format($item->jumlah,0,',','.') : 0 }} Undangan
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
                                data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel
                        </button>
                    </a>
                    <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#modalImport"
                            class="button inline-block bg-theme-1 text-white">Import Order Online</a> </div>
                </div>
            </div>

            <div class="modal" id="modalImport">
                <div class="modal__content">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">Import Order Online</h2> 
                    </div>
                    <div class="w-full">
                        <form id="importOrderOnlineForm" method="POST" action="{{ route('admin.import.user') }}">
                            <input name="file" type="file" /> 
                        
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                        <button class="button w-20 bg-theme-1 text-white">Upload</button> </div>
                    </form>
                </div>
            </div>

            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0 my-3">
                <table class="table table-report sm:mt-2" id="userTableData">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap bg-white">MENGUNDANG</th>
                            <th class="whitespace-no-wrap bg-white">NAMA<br>LENGKAP</th>
                            <th class="text-center whitespace-no-wrap bg-white">JUMLAH<br>TERUNDANG</th>
                            <th class="text-center whitespace-no-wrap bg-white">TOTAL<br>TAGIHAN</th>
                            <th class="text-center whitespace-no-wrap bg-white">BUKTI<br>PEMBAYARAN</th>
                            <th class="text-center whitespace-no-wrap bg-white">STATUS<br>PEMBAYARAN</th>
                            <th class="text-center whitespace-no-wrap bg-white">PROSES</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- END: Weekly Top Products -->

        </div>
    </div>
</div>
<!-- END: Content -->

<script>
    function proses_pembayaran(id) {
        Swal.fire({
            title: 'Apa anda yakin?',
            text: "Proses pembayaran akan terverifikasi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, verifikasi!'
            }).then((result) => {
            if (result.isConfirmed) {
                return fetch(`{{ route('admin.proses.pembayaran') }}/`+id)
                    .then(response => {
                        if (!response.ok) {
                        throw new Error(response.data.message)
                        }
                        $('#userTableData').DataTable().draw(false);
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                        `Request failed: ${error}`
                        )
                    })
            }
        })
    }

    var table = $('#userTableData').DataTable({
        dom : 'Brtp',
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.dashboard') }}",
        aaSorting: [],
        pageLength: 5,
        columns: [
            {data: 'mengundang', name: 'mengundang', orderable: false, searchable: false},
            // {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'total_mengundang', name: 'total_mengundang'},
            // {data: 'ref', name: 'ref'},
            // {data: 'diundang_oleh', name: 'diundang_oleh'},
            {data: 'total_tagihan', name: 'total_tagihan'},
            {data: 'bukti_pembayaran', name: 'bukti_pembayaran', orderable: false, searchable: false},
            {data: 'status_pembayaran', name: 'status_pembayaran', orderable: false, searchable: false},
            {data: 'button_proses', name: 'button_proses', orderable: false, searchable: false}
        ]
    });

    $('#db-search').keyup(function(){
        table.search( $(this).val() ).draw();
    });

    $('#db-jumlah').on('change', function(){
        table.page.len($(this).val()).draw();
    });

    $('#importOrderOnlineForm').submit(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: $(this).attr("action"),
            data: new FormData($('#importOrderOnlineForm')[0]),
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(data) {
                if(data.status == "ok"){
                    toastr["success"](data.messages);
                    location.reload();
                }
            },
            error: function(data){
                var data = data.responseJSON;
                if(data.status == "fail"){
                     toastr["error"](data.messages);
                }
            }
        });
    });
</script>
@endsection