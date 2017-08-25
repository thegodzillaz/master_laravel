@extends('dashboard_layouts.app')
@section('title', 'Percobaan sukses')
@section('navbar')
    @parent

    {{-- <p>This is appended to the master sidebar.</p> --}}
@endsection

@section('content')
    <ul>
    @foreach ($userData as $datas)
    {{-- //  {{dd($datas)}} --}}
      <li>{{$datas->name}} @ {{$datas->role->namaRule}}</li>
    @endforeach
    <ul>
@endsection
