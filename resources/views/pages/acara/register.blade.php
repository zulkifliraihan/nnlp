@extends('layouts.registration')
@section('content')
<div class="container sm:px-10">
    <div class="block xl:grid grid-cols-2 gap-4">
        <div class="hidden xl:flex flex-col min-h-screen">
            <a href="" class="-intro-x flex items-center pt-5">
                <img alt="logo" class="w-6" src="{{ asset('mone/images/logo.svg') }}">
                <span class="text-white text-lg ml-3"> LPK<span class="font-medium">N</span> </span>
            </a>
            <div class="my-auto">
                <img alt="logo" class="-intro-x w-1/2 -mt-16" src="{{ asset('mone/images/illustration.svg') }}">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                    Seminar membangun ekonomi
                    <br>
                    dan keuangan digital indonesia
                    <br>
                    Tahun 2025
                </div>
                <div class="-intro-x mt-5 text-lg text-white dark:text-gray-500">
                    Anda dapat mengikuti kelas ini dengan <span class="font-medium text-red-500">GRATIS</span>.
                </div>
            </div>
        </div>
        <!-- END: Register Info -->
        <!-- BEGIN: Register Form -->
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div
                class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                    Pendaftaran
                </h2>
                <div class="intro-x mt-2 text-gray-500 dark:text-gray-500 xl:hidden text-center">
                    Seminar membangun ekonomi
                    <br>
                    dan keuangan digital indonesia
                    <br>
                    Tahun 2025
                </div>
                <form id="acaraForm" action="{{ route("acara.daftar") }}" method="POST">
                    <div class="intro-x mt-8">
                        <div class="input-form">
                            <label class="flex flex-col sm:flex-row"> Nama Lengkap <span
                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required</span> </label>
                            <input type="text" name="nama_lengkap" class="input w-full border mt-2" required>
                        </div>
                        <div class="input-form mt-3">
                            <label class="flex flex-col sm:flex-row"> Email <span
                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, email address
                                    format</span> </label>
                            <input type="email" name="email" class="input w-full border mt-2"
                                placeholder="example@gmail.com" required>
                        </div>
                        <div class="input-form mt-3">
                            <label class="flex flex-col sm:flex-row"> No Handphone <span
                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required</span> </label>
                            <input type="text" name="no_hp" class="input w-full border mt-2" required>
                        </div>
                        <div class="input-form mt-3">
                            <label class="flex flex-col sm:flex-row"> Nama Instansi <span
                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required</span> </label>
                            <input type="text" name="nama_instansi"
                                class="intro-x login__input input input--lg border border-gray-300 block mt-2">
                        </div>
                        @isset($ref)
                        <div class="input-form mt-3">
                            <label class="flex flex-col sm:flex-row"> Referral </label>
                            <input id="ref_field" disabled value="{{ $ref }}" type="text" name="ref"
                                class="intro-x login__input input input--lg border border-gray-300 block mt-2">
                        </div>
                        @endisset
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-right">
                        <button type="submit"
                            class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3 align-top">Register</button>
                    </div>

                </form>
            </div>
        </div>
        <!-- END: Register Form -->
    </div>
</div>

<script>
    $('#acaraForm').submit(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: $(this).attr("action"),
            data: new FormData($('#acaraForm')[0]),
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(data) {
                if(data.status == "ok"){
                    toastr["success"](data.messages);
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
@stop