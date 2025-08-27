<tr class="header">
<td class="header">
<a href="{{ $url }}" style="display: inline-block; width:100%; text-align:center;">
@if (trim($slot) === 'Laravel')
<img src="{{URL::asset('assets/media/banner/'.$StoreConfig->invert_logo)}}" class="logo" alt="Laravel Logo" style="margin:0 auto; display:block;">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
