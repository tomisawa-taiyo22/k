@extends('layouts.common')
@section('title', 'Kanban-Board')
@section('content')
<div id="app">
    <kanban-component :initial-data="{{ $tasks }}"></kanban-component>
</div>
@endsection