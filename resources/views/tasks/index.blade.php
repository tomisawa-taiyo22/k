@extends('layouts.app')
@section('content')
<div id="app">
    <example-component></example-component>
    <kanban-component :initial-data="{{ $tasks }}"></kanban-component>
</div>
@endsection