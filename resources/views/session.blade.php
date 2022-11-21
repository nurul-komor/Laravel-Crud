@php
    session(['user'=>'Emon']);
    p(session()->all());
    echo session('user');
@endphp