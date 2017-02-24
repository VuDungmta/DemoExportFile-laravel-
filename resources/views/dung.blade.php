@extends('layouts.master')
 
@section('title', 'Tiêu đề trang')
 
@section('sidebar')
    @parent
 
    <p>Đây là phần thêm vào bên dưới sidebar chính ở layout.</p>
@endsection
 
@section('content')
    <p>Đây là phần nội dung trong trang.</p>
@endsection

