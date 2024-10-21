@extends('guest.layouts.app')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5" style="background-image: url({{ asset('img/banner.jpg') }})">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Projects</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Projects</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Projects Start -->
    <div class="container-xxl">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0 py-5">
                <!-- Image on the left side -->
                <div class="col-lg-7 col-sm-12 ps-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $project->images->first()->image_path) }}"
                            alt="project 1">
                    </div>
                </div>

                <!-- Project information on the right side -->
                <div class="col-lg-5 ps-lg-4 pt-3 pt-lg-0 about-text wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-3 pe-lg-0 border shadow">
                        <h6 class="text-primary">Project Information</h6>
                        <ul class="list-unstyled">
                            <li><strong>Partner:</strong> {{ $project->client }} </li>
                            <li><strong>Project date:</strong> {{ $project->project_date }}</li>
                        </ul>
                    </div>
                    <h5 class="mt-4">{{ $project->project_name }}</h5>
                    <p>{{ $project->description }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Projects End -->
@endsection
