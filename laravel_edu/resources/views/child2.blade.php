
{{-- 상속 --}}
@extends('inc.layout')

{{-- section : 부모 템플릿에 해당하는 yield --}}
{{-- @section('title') --}}

{{-- main section 구구단 생성 --}}

@section('main')

@for($i=1;$i<=9;$i++)
{{$i}}단<br>
    @for($j=1;$j<=9;$j++)

{{ $i }}x{{$j}}={{$i*$j}}<br>
    @endfor
@endfor
<hr>

@endsection