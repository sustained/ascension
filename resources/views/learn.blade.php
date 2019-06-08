@extends('layouts.app')

@section('content')
    <nav>
        <ul>
            <li>
                <router-link to="/">Home</router-link>
            </li>
            <li>
                <router-link to="/courses">Courses</router-link>
            </li>
        </ul>
    </nav>

    <router-view></router-view>
@endsection
