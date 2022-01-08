@extends('layouts.app')

@section('title', 'Child Componets')

@section('navbar')
    @parent
@endsection

@section('content')
    <div>
        <h1>Child Components</h1>
        <ul>
            <li>First</li>
            <li>First</li>
            <li>First</li>
        </ul>
    </div>
@endsection