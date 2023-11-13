
{{-- 상속 --}}
@extends('inc.layout')

{{-- section : 부모 템플릿에 해당하는 yield --}}
@section('title', '자식1 타이틀')

{{-- section ~ @endsection : 처리해야 될 코드가 많을 경우  --}}
@section('main')
<hr>

<h2>자식1 화면 입니다. </h2>
<p> 여러 데이터를 표시 합니다. </p>

{{-- 조건문 --}}
@if($gender === '0')
    <span>남자</span>
@elseif($gender === '1')
    <span>여자</span>
@else
    <span>기타</span>
@endif

<hr>

{{-- 반복문 --}}
<h3>반복문</h3>
@for($i=0; $i < 5; $i++)
{{-- {{변수}} : 화면에 변수를 출력하는 방법 --}}
    <span>{{$i}}</span>
@endfor

<hr>

{{-- foreach문 --}}
<h3>foreach문</h3>
@foreach($data as $key => $val)
{{-- $loop->count : 돌고있는 반복문의 개수 --}}
<p>{{$loop->count.' >> '.$loop->iteration}}</p> 
<span>{{$key.' : '.$val}}</span>
<br>
@endforeach

<hr>

{{-- foreach문 --}}
<h3>forelse</h3>
@forelse($data2 as $key => $val)
    <span>{{$key." : ".$val}}</span>
    <br>
@empty
    <span>빈배열입니다.</span>
@endforelse



@endsection

{{-- 부모 show 테스트용 --}}
@section('show')
<hr>
<h2> 자식 1 show 입니다.</h2>
<p>자식1 자식1 자식1</p>
<hr>
@endsection