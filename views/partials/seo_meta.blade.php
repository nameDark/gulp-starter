@if(!config( 'app.active' ))
    <meta name="robots" content="noindex,nofollow">
@endif
<title>@yield('seo-title') - {{ config( 'app.name' ) }}</title>
<meta name="description" content="@yield('seo-description')">
<meta name="thumbnail" content="@yield('thumbnail', asset('/logo.png'))" />
{{--<link rel="canonical" href="{{ url(route.name, route.params) }}" />--}}

<meta property="og:title" content="@yield('seo-title')" />
<meta property="og:description" content="@yield('seo-description')" />
<meta name="twitter:card" content="summary" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:type" content="@yield('og-type', 'website')" />
<meta property="og:image" content="@yield('thumbnail', asset('/logo.png'))" />
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:locale" content="{{ app()->getLocale() }}">

<script type="application/ld+json">
    @php
        $base_url = route('home');
    @endphp
    {
    "@context": "https://schema.org",
    "@graph": [
			{
				"@type": "Organization",
				"@id": "{{ $base_url }}#organization",
				"name": "{{ config( 'app.name' ) }}",
				"url": "{{ $base_url }}",
{{--				"sameAs": [--}}
{{--					"https://www.facebook.com//",--}}
{{--					"https://instagram.com//",--}}
{{--					"https://twitter.com/"--}}
{{--				],--}}
				"logo": {
					"@type": "ImageObject",
					"@id": "{{ $base_url }}#logo",
					"inLanguage": "{{ app()->getLocale() }}",
					"url": "{{ asset(config('app.site_id').'/logo.png') }}",
					"caption": "{{ config( 'app.name' ) }}"
				},
				"image": {
					"@id": "{{ $base_url }}#logo"
				}
			},
			{
				"@type": "WebSite",
				"@id": "{{ $base_url }}#website",
				"url": "{{ $base_url }}",
				"name": "{{ config( 'app.name') }}",
				"description": "{!! __('Description')  !!}",
				"potentialAction": [
					{
						"@type": "SearchAction",
						"target": "{{ $base_url }}/search/{search_term_string}",
						"query-input": "required name=search_term_string"
					}
				],
				"inLanguage": "{{ app()->getLocale() }}"
			},
			{
				"@type": "ImageObject",
				"@id": "{{ url()->current() }}#primaryimage",
				"inLanguage": "{{ app()->getLocale() }}",
				"url": "@yield('thumbnail', asset('/logo.png'))"
			},
			{
				"@type": "WebPage",
				"@id": "{{ url()->current() }}#webpage",
				"url": "{{ url()->current() }}",
				"name": "@yield('seo-title')",
				"isPartOf": {
					"@id": "{{ $base_url }}#website"
				},
				"description": "@yield('seo-description')",
				"inLanguage": "{{ app()->getLocale() }}"
			}
		]
	}
</script>
