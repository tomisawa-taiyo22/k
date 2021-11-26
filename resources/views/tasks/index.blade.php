@extends('layouts.app')
@section('content')
<div id="app">
    <kanban-component :initial-data="{{ $tasks }}"></kanban-component>
</div>
@endsection