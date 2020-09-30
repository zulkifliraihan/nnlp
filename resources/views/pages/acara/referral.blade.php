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
    <!-- BEGIN: Users Layout -->
    @for ($i = 0; $i < 12; $i++)    
        <div class="intro-y col-span-12 md:col-span-4">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="https://avatars.dicebear.com/api/initials/Johnny Depp.svg">
                    </div>
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Johnny Depp</a> 
                        <div class="text-gray-600 text-xs">Universitas Negeri Jakarta</div>
                    </div>
                </div>
            </div>
        </div>
    @endfor
    <!-- END: Users Layout -->

    <script>
    new Vue({
        el: '#heroes',
        created() {
            this.paginate_total = this.heroes.length/this.paginate;
        },
        data: {
            current: 1,
            heroes: [
                { name: 'Wolverine', universe: 'Marvel'},
                { name: 'Batman', universe: 'DC' },
                { name: 'Beast', universe: 'Marvel'},
                { name: 'Superman', universe: 'DC' },
                { name: 'Wonder Woman', universe: 'DC' },
                { name: 'Iceman', universe: 'Marvel'},
                { name: 'Black Panther', universe: 'Marvel'},
                { name: 'Beast Boy', universe: 'DC' },
                { name: 'Captain America', universe: 'Marvel'},
                { name: 'Hawkgirl', universe: 'DC' },
                { name: 'Cyclops', universe: 'Marvel'},
                { name: 'Green Lantern', universe: 'DC' },
                { name: 'Thor', universe: 'Marvel'},
                { name: 'Flash', universe: 'DC' },
                { name: 'Spider-man', universe: 'Marvel'},
                { name: 'Martian Manhunter', universe: 'DC' },
                { name: 'Nightwing', universe: 'DC' },
                { name: 'Raven', universe: 'DC' },
                { name: 'Hulk', universe: 'Marvel'},
                { name: 'Shehulk', universe: 'Marvel'}
            ],
            paginate: 12,
            paginate_total: 0,
            search_filter: '',
            status_filter: ''
        },
        mounted: {
            axios
            .get('https://api.coindesk.com/v1/bpi/currentprice.json')
            .then(response => {
                this.info = response.data.bpi
            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => this.loading = false)
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
            this.paginate_total = Math.ceil(document.querySelectorAll('tbody tr').length/this.paginate);
            }
        }
    });
    </Script>

    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
        <ul class="pagination">
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
            </li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
            </li>
            <li> <a class="pagination__link" href="">...</a> </li>
            <li> <a class="pagination__link" href="">1</a> </li>
            <li> <a class="pagination__link pagination__link--active" href="">2</a> </li>
            <li> <a class="pagination__link" href="">3</a> </li>
            <li> <a class="pagination__link" href="">...</a> </li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
            </li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
            </li>
        </ul>
        <select class="w-20 input box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div>
    <!-- END: Pagination -->
</div>
@stop