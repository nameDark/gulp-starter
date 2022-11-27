<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scroll-behavior: smooth;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <link rel="icon" href="{{ asset('/favicon.ico') }}" sizes="any"><!-- 32×32 -->
        <link rel="icon" href="{{ asset('/icon.svg') }}" type="image/svg+xml">
        <link rel="apple-touch-icon" href="{{ asset('/apple-touch-icon.png') }}"><!-- 180×180 -->
        <link rel="manifest" href="{{ asset('/manifest.webmanifest') }}" crossorigin="use-credentials">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('partials.seo_meta')
        @yield('seo')

        <link rel="preload" href="{{ asset('fonts/Montserrat-Regular.woff2') }}" as="font" crossorigin>
        <link rel="preconnect" href="https://www.google-analytics.com" />
        <link rel="preconnect" href="https://www.googletagmanager.com" />

        <script>
		    function canUseWebP() {
			    var elem = document.createElement('canvas');
			    if (!!(elem.getContext && elem.getContext('2d'))) {
				    // was able or not to get WebP representation
				    return elem.toDataURL('image/webp').indexOf('data:image/webp') == 0;
			    }
			    // very old browser like IE 8, canvas not supported
			    return false;
		    }
		    if (canUseWebP()) {
			    var doc_root = document.getElementsByTagName( 'html' )[0];
			    doc_root.setAttribute( 'class', 'WebP' );
		    }
		    var FlashMessageOptions = {
			    progress: true,
			    interactive: true,
			    timeout: 8000,
		    };
		    var PristineOptions = {
			    classTo: 'form-input-wrap',
			    errorClass: 'is-invalid',
			    successClass: 'is-valid',
			    errorTextParent: 'form-input-wrap',
			    errorTextTag: 'div',
			    errorTextClass: 'form-error'
		    }
        </script>

        <!-- Styles -->
        <style>.ql-align-center {text-align: center;}  .ql-align-justify {text-align: justify;}  .ql-align-right {text-align: right;}</style>
        <style><?php include(public_path().'/css/app.css'); ?></style>
        @yield('inline-css')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased text-body">
        <div class="relative flex justify-between min-h-screen flex-col loader">
            @include('partials.header')

            <main>
                @yield('content')
            </main>

            @include('partials.footer')
        </div>
        <div class="loader-svg" style="background-image: url({{ asset(config('app.site_id').'/loader.svg') }});"></div>
        <script>
            function force_change(item) {const e = new Event("change");item.dispatchEvent(e);}
            function createCookie(name,value,days) {var expires = days?"; max-age="+(days*24*3600):"";document.cookie = name+"="+value+expires+"; path=/; samesite; Priority=High";}
            function checkCookie(name) {var nameEQ = name + "=";var ca = document.cookie.split(';');for(var i=0;i < ca.length;i++) {var c = ca[i];while (c.charAt(0)==' ') c = c.substring(1,c.length);if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);}return null;}
            function eraseCookie(name) {createCookie(name,"",-1);}
        </script>
        @include('partials.modal')
        @yield('js')
        <script>
	        document.addEventListener("DOMContentLoaded", function () {
            @if(session()->has('fail'))
                <x-flash icon="false" title="" content="{{ Str::replace(["\n", "\r"], ' ', $content) }}">
                </x-flash>
		        window.FlashMessage.error(flash_msg, FlashMessageOptions);
            @endif
            @if(session()->has('success'))
                <x-flash icon="false" title="" content="{{ Str::replace(["\n", "\r"], ' ', $content) }}">
                </x-flash>
		        window.FlashMessage.success(flash_msg, FlashMessageOptions);
            @endif
            @if(session()->has('info'))
                <x-flash icon="false" title="" content="{{ Str::replace(["\n", "\r"], ' ', $content) }}">
                </x-flash>
		        window.FlashMessage.info(flash_msg, FlashMessageOptions);
            @endif
	        })
        </script>
    </body>
</html>
