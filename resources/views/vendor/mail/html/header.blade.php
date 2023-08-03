<tr>
    <td class="header">
        {{-- <img src="{{asset('img/logo.png')}}" class="logo" alt="ISFT38 Logo"> --}}
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Noticias')
            <img src="{{asset('img/logo.png')}}" class="logo" alt="ISFT38 Logo"/>
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>