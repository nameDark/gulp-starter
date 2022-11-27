<div id="fmodal" x-on:keyup.escape.window="modals_close()">
    <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur z-10"
         x-show="$store.showModal" x-transition style="display: none;"></div>
    <!-- Modal -->
    <div class="fixed left-0 top-0 z-30 overflow-hidden w-full h-0"
         :class="{ 'overflow-x-hidden overflow-y-auto h-full': $store.showModal, 'overflow-hidden h-0': !$store.showModal }">
        <!-- Modal inner -->
        <div class="max-w-md mx-auto my-8 px-4 sm:px-0 flex items-center opacity-0 translate-y-1/4 transition-all modal-inner"
             :class="{ 'opacity-100 translate-y-0': $store.showModal, 'opacity-0 translate-y-1/4': !$store.showModal }">
            <div class="overflow-hidden w-full bg-white rounded-4xl shadow-lg relative loader" id="modal-inner">
                <!-- Title / Close-->
                <button type="button" class="absolute right-4 top-4 sm:right-6 sm:top-6 z-50 cursor-pointer text-border hover:text-blue" x-on:click="modals_close()">
                    <svg class="stroke-body fill-transparent" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 294 295" width="14" height="14">
                        <g>
                            <path style="stroke-width: 64" d="m22.5 23.3l249 249"/>
                            <path style="stroke-width: 64" d="m22.5 272.3l249-249"/>
                        </g>
                    </svg>
                </button>
                <!-- content -->
                <div class="w-full tournament" id="fmodal-content"></div>
            </div>
        </div>
    </div>
</div>
<script>
	document.addEventListener('alpine:init', function () {
		Alpine.store('showModal', false)
	})
    function show_modal(content) {
        document.getElementById('fmodal-content').innerHTML = content;
        Alpine.store('showModal', true);
	    scroll_lock();
    }
    function modals_close() {
	    Alpine.store('showModal', false);
	    scroll_unlock();
    }
    function scroll_lock() {
	    document.querySelector('body').classList.add('body-scroll-lock')
	    document.querySelector('html').classList.add('body-scroll-lock')
    }
    function scroll_unlock() {
	    document.querySelector('body').classList.remove('body-scroll-lock')
	    document.querySelector('html').classList.remove('body-scroll-lock')
    }
</script>
