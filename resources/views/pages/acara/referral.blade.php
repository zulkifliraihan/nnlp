@extends('layouts.user')
@section('content')
<!-- BEGIN: Top Bar -->
<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="{{ route("landing") }}" class="">Acara Gratis</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="#" class="breadcrumb--active">Seminar Nasional</a> </div>
    <!-- END: Breadcrumb -->
</div>
<!-- END: Top Bar -->
<h2 class="intro-y text-lg font-medium mt-10 mb-5">
    {{ $user->name }}
</h2>
<div class="flex flex-wrap sm:flex-no-wrap w-full sm:w-auto mt-8 sm:mt-0 sm:ml-auto md:ml-0">
    <div class="w-5/6 sm:w-5/6 lg:w-1/2 relative text-gray-700 dark:text-gray-300">
        <input type="text" class="input w-full box placeholder-theme-13" placeholder="Your Referral" value="{{ route('landing') }}?ref={{ $user['ref'] }}" id="ref_link">
    </div>
    <button class="button text-white bg-theme-1 shadow-md ml-2" id="button_copy"> <i class="w-4 h-4" data-feather="copy"></i> </button>
</div>
<div class="grid grid-cols-12 gap-6 mt-5" id="terundang">
    <div v-cloak style="display: none">{{ "wow" }}</div>
    {{-- BEGIN: Button share --}}
    <div class="intro-y col-span-12  flex flex-wrap sm:flex-no-wrap mt-2">
        <a href="https://api.whatsapp.com/send?text={{ urlencode($msg_wa.route('acara.pendaftaran').'?ref='.$user['ref']) }}" target="_blank" class="button text-white bg-green-600 shadow-md mr-2" id="button_copy"> WhatsApp </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('acara.pendaftaran').'?ref='.$user['ref']) }}&quote={{ urlencode($msg_fb.route('acara.pendaftaran').'?ref='.$user['ref']) }}" target="_blank" class="button text-white bg-blue-800 shadow-md mr-2" id="button_copy"> Facebook </a>
        <a href="https://twitter.com/intent/tweet?text={{ urlencode($msg_twitter.route('acara.pendaftaran').'?ref='.$user['ref']) }}" target="_blank" class="button text-white bg-blue-500 shadow-md mr-2" id="button_copy"> Twitter </a>
    </div>
    {{-- END: Button share --}}
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap mt-2">
        <div class="block text-gray-600"><span class="text-orange-600">@{{ terundang.length }}</span> orang mendaftar menggunakan link yang Anda bagikan</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 ml-auto sm:ml-auto md:ml-auto">
            <div class="w-full md:w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" class="input w-full md:w-56 box pr-10 placeholder-theme-13" placeholder="Search..." v-model="search_filter" @keyup="updatePaginate" id="searchbar">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i> 
            </div>
        </div>
    </div>
    <!-- BEGIN: Users Layout  -->
    <div class="intro-y col-span-6 md:col-span-4" v-for="orang in terundang | filterBy search_filter in 'name'" v-show="setPaginate($index)" id="item">
        <div class="box">
            <div class="flex flex-col lg:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <div class="w-12 h-12 lg:w-12 lg:h-12 image-fit lg:mr-1">
                    <img alt="@{{ orang.name }}" class="rounded-full" :src="'https://avatars.dicebear.com/api/initials/' + orang.name + '.svg'">
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
        <ul class="pagination flex flex-no-wrap" style="overflow-x: auto;">
            <li v-for="page_index in paginate_total" v-if="Math.abs(page_index - current) < 3 || page_index == paginate_total - 1 || page_index == 0" @click.prevent="updateCurrent(page_index + 1)">
                <a v-bind:class = "((page_index + 1) == current)?'pagination__link pagination__link--active':'pagination__link'">
                    @{{ page_index + 1 }} 
                </a>
            </li>
        </ul>
        {{-- <select class="w-20 input box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select> --}}
    </div>
    <!-- END: Pagination -->

</div>
<script>
    document.getElementById("button_copy").addEventListener("click", function() {
        copyToClipboard(document.getElementById("ref_link"));
    });

    function copyToClipboard(elem) {
        // create hidden text element, if it doesn't already exist
        var targetId = "_hiddenCopyText_";
        var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
        var origSelectionStart, origSelectionEnd;
        if (isInput) {
            // can just use the original source element for the selection and copy
            target = elem;
            origSelectionStart = elem.selectionStart;
            origSelectionEnd = elem.selectionEnd;
        } else {
            // must use a temporary form element for the selection and copy
            target = document.getElementById(targetId);
            if (!target) {
                var target = document.createElement("textarea");
                target.style.position = "absolute";
                target.style.left = "-9999px";
                target.style.top = "0";
                target.id = targetId;
                document.body.appendChild(target);
            }
            target.textContent = elem.textContent;
        }
        // select the content
        var currentFocus = document.activeElement;
        target.focus();
        target.setSelectionRange(0, target.value.length);
        
        // copy the selection
        var succeed;
        try {
            succeed = document.execCommand("copy");
        } catch(e) {
            succeed = false;
        }
        // restore original focus
        if (currentFocus && typeof currentFocus.focus === "function") {
            currentFocus.focus();
        }
        
        if (isInput) {
            // restore prior selection
            elem.setSelectionRange(origSelectionStart, origSelectionEnd);
        } else {
            // clear temporary content
            target.textContent = "";
        }
        return succeed;
    }

    var app = new Vue({
        el: '#terundang',
        created() {
            this.paginate_total = this.terundang.length/this.paginate;
        },
        data: {
            current: 1,
            terundang: {!! json_encode($user['mengundang']) !!},
            paginate: 12,
            paginate_total: 0,
            search_filter: '',
            status_filter: '',
            scTimer: 0,
            scY: 0,
        },
        mounted: {
            function() { window.addEventListener('scroll', this.handleScroll); }
        },
        methods: {
            handleScroll: function () {
                if (this.scTimer) return;
                this.scTimer = setTimeout(() => {
                this.scY = window.scrollY;
                clearTimeout(this.scTimer);
                this.scTimer = 0;
                }, 100);
            },
            toTop: function () {
                window.scrollTo({
                top: 0,
                behavior: "smooth"
                });
            },
            setPaginate: function (i) {
                if (this.current == 1) {
                    return i < this.paginate;
                } else {
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
                this.toTop();
            }
        }
    });
</script>
@stop