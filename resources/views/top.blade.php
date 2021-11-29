@extends('layouts.common')
@section('title', 'Task-Board')
@section('content')
<main class='container mx-auto'>
    <div>
        <h1 class="text-9xl text-green-700 font-semibold">Task-Board</h1>
    </div>
    <div>
        <button
            class="text-4xl bg-blue-700 border border-blue-500 px-6 py-2 text-white py-2 px-4  rounded"
        >
        <a href="{{ url('/register') }}">
            {{ ('ユーザー登録') }}
        </a>
    </div>
</button>
</main>

@endsection