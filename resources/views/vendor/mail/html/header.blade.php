@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Sistema GR')
<img src="https://i.pinimg.com/originals/24/bf/0e/24bf0e4063f6b8b50c080b5280cff9da.png" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
