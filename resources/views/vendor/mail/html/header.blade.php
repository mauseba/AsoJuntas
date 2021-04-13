<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Asojuntas')
<img src="{{asset('imagenes/logo.png')}}" style="max-width:50%;width:auto;height:auto;" class="logo" alt="Asojuntas Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
