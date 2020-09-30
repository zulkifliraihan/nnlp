@extends('layouts.user')
@section('content')
<!-- BEGIN: Top Bar -->
<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Acara Gratis</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Seminar Nasional</a> </div>
    <!-- END: Breadcrumb -->
</div>
<!-- END: Top Bar -->
<h2 class="intro-y text-lg font-medium mt-10 mb-5">
    Erik Santiago
</h2>
<div class="flex flex-wrap sm:flex-no-wrap w-full sm:w-auto mt-8 sm:mt-0 sm:ml-auto md:ml-0">
    <div class="w-5/6 sm:w-5/6 lg:w-1/2 relative text-gray-700 dark:text-gray-300">
        <input type="text" class="input w-full box placeholder-theme-13" placeholder="Your Referral" value="https://acara.com/acara/daftar?ref=xr5ty1">
    </div>
    <button class="button text-white bg-theme-1 shadow-md ml-2"> <i class="w-4 h-4" data-feather="copy"></i> </button>
</div>
<div class="grid grid-cols-12 gap-6 mt-5" id="terundang">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap mt-2">
        <div class="hidden md:block text-gray-600">30 orang mendaftar menggunakan link yang Anda bagikan</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 ml-auto sm:ml-auto md:ml-auto">
            <div class="w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i> 
            </div>
        </div>
    </div>
    <!-- BEGIN: Users Layout  -->
    <div class="intro-y col-span-12 md:col-span-4" v-for="orang in terundang | filterBy search_filter in 'name'" v-show="setPaginate($index)" id="item">
        <div class="box">
            <div class="flex flex-col lg:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" :src="'https://avatars.dicebear.com/api/initials/' + orang.name + '.svg'">
                </div>
                <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                    <a href="" class="font-medium">@{{ orang.name }}</a> 
                    <div class="text-gray-600 text-xs">@{{ orang.instansi }}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Users Layout -->

    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
        <ul class="pagination">
            <li>
                <a class="pagination__link pagination__link--active" v-for="page_index in paginate_total" @click.prevent="updateCurrent(page_index + 1)">
                    @{{ page_index + 1 }} 
                </a>
            </li>
        {{-- </ul>
        <select class="w-20 input box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select> --}}
    </div>
    <!-- END: Pagination -->

</div>
<script>
    var app = new Vue({
        el: '#terundang',
        created() {
            this.paginate_total = this.terundang.length/this.paginate;
        },
        data: {
            current: 1,
            terundang: {!! json_encode($data) !!},
            paginate: 12,
            paginate_total: 0,
            search_filter: '',
            status_filter: ''
        },
        mounted: {
        },
        methods: {
            setPaginate: function (i) {
            if (this.current == 1) {
                return i < this.paginate;
            }
            else {
                return (i >= (this.paginate * (this.current - 1)) && i < (this.current * this.paginate));
            }
            },
            setStatus: function (status) {
            this.status_filter = status;
            this.$nextTick(function () {
                this.updatePaginate();
            });
            },
            updateCurrent: function (i) {
            this.current = i;
            },
            updatePaginate: function () {
            this.current = 1;
            this.paginate_total = Math.ceil(document.querySelectorAll('#terundang #item').length/this.paginate);
            }
        }
    });
</script>
@stop