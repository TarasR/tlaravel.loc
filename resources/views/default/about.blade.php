@extends('default.layouts.layout')

@section('navbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="card border-0">
        <div class="card-body px-0">
            <h2 class="mb-1">About this project</h2>
            <p class="text-muted mb-4">A Laravel learning project</p>

            <p>This is a Laravel-based web application built as a hands-on learning project. It covers core framework concepts including routing, Eloquent ORM, authentication, policies, resource controllers, and Blade templating.</p>

            <hr>

            <h5>What's inside</h5>
            <ul>
                <li>User authentication (register, login, logout)</li>
                <li>Role-based access control with Gates &amp; Policies</li>
                <li>Articles — create, update, soft-delete</li>
                <li>Products — full CRUD with slugs</li>
                <li>Pages — resource management via admin panel</li>
                <li>Contact form with email delivery</li>
            </ul>

            <hr>

            <h5>Tech stack</h5>
            <ul>
                <li>PHP / Laravel 5.8</li>
                <li>MySQL</li>
                <li>Bootstrap 4</li>
                <li>Blade templates</li>
            </ul>

            <hr>

            <p class="text-muted mb-0">&copy; {{ date('Y') }} {{ config('app.name') }}</p>
        </div>
    </div>
@endsection
