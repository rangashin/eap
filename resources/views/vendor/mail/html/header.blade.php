@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
{{-- <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo"> --}}
{{-- <img src="{{ asset('images/logo.png') }}" class="logo" alt="Laravel Logo"> --}}
<img src="https://drive.google.com/uc?export=view&id=1EVJqXR_Yx_CbZ3ctz5ovEreTszsbs3xF" class="logo" alt="EAP Logo">

@else
{{ $slot }}
@endif
</a>
</td>
</tr>
