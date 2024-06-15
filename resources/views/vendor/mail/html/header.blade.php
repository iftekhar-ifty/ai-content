@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<a  href="/" class="text-white btn btn-ghost text-xl" style="font-size: 30px;
            font-weight: 800;">Twixify</a>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
