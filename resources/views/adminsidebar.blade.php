@extends('layouts.app')

@section('sidebar')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

    .sidebar {
        height: 100vh;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #007bff; /* Sidebar background color */
        padding-top: 20px;
    }

    .sidebar a {
        padding: 10px 15px;
        text-align: left;
        font-size: 18px;
        color: #fff; /* Sidebar text color */
        display: block;
        transition: 0.3s;
        text-decoration: none;
    }

    .sidebar a:hover {
        background-color: #1d2124; /* Sidebar item hover background color */
        color: #fff;
        text-decoration: none;
    }

    .sidebar .sidebar-header {
        font-size: 22px;
        color: #fff; /* Sidebar header text color */
        text-align: center;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .content {
        margin-left: 250px;
        padding: 20px;
    }

    .sidebar .nav-item {
        margin-bottom: 10px;
    }
</style>

<div class="sidebar">
    <div class="sidebar-header">
        Dashboard
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="/adminPresDetails" class="nav-link">
                <i class="fa fa-user-circle" aria-hidden="true"></i> <span class="ms-1">Manage Prescriptions</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="/addQuantity" class="nav-link">
                <i class="fa fa-briefcase" aria-hidden="true"></i> <span class="ms-1">Add Drugs</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="/adminUsers" class="nav-link">
                <i class="fa fa-briefcase" aria-hidden="true"></i> <span class="ms-1">All Users</span>
            </a>
        </li>
    </ul>
</div>
@endsection
