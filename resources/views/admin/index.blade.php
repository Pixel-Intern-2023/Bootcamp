@extends('layouts.main')

@section('header')
<div class="container-fluid full__width__padding">
    <div class="row">
        <div class="col-xl-12">
            <div class="dashboardarea__wraper">
                <div class="dashboardarea__img">
                    <div class="dashboardarea__inner admin__dashboard__inner">
                        <div class="dashboardarea__left">
                            <div class="dashboardarea__left__img">
                                <img src="{{ asset('assets/img/dashbord/dashbord__2.jpg') }}" alt="">
                            </div>
                            <div class="dashboardarea__left__content font-semibold">
                                <h1>Hello {{ Auth::user()->name }}</h1>
                            </div>
                        </div>
                        <div class="dashboardarea__right">
                            <div class="dashboardarea__right__button">
                                <a class="default__button" href="create-course.html">Create a New Course
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('sidebar')
    <div class="col-xl-3 col-lg-3 col-md-12">
        <div class="dashboard__inner sticky-top">
            <div class="dashboard__nav__title">
                <h6>Welcome, Micle Obema</h6>
            </div>
            <div class="dashboard__nav">
                <ul>
                    <li>
                        <a class="" href="{{ route('admin-dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('applicants') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-book-open">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                            Applicants</a>
                    </li>
                    <li>
                        <a href="admin-profile.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            My Profile</a>
                    </li>
                    <li>
                        <a href="admin-message.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-bookmark">
                                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                            </svg>
                            Courses</a>
                    </li>
                    <li>
                        <a href="admin-reviews.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            Reviews</a>
                    </li>
                    <li>
                        <a href="admin-quiz-attempts.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-help-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                <line x1="12" y1="17" x2="12.01" y2="17"></line>
                            </svg>
                            Quiz Attempts</a>
                    </li>
                </ul>
            </div>

            <div class="dashboard__nav__title mt-40">
                <h6>user</h6>
            </div>

            <div class="dashboard__nav">
                <ul>
                    <li>
                        <a href="admin-settings.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-settings">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path
                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                </path>
                            </svg>
                            Settings</a>
                    </li>
                    <li>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-volume-1">
                                <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                                <path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                            </svg>
                            Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-xl-9 col-lg-9 col-md-12">
        <div class="dashboard__content__wraper">
            <div class="dashboard__section__title">
                <h4>Dashboard</h4>
            </div>
            <div class="row">
                
                <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                    <div class="dashboard__single__counter">
                        <div class="counterarea__text__wraper">
                            <div class="counter__img">
                                <img src="{{ asset('assets/img/counter/counter__2.png') }}" alt="counter">
                            </div>
                            <div class="counter__content__wraper">
                                <div class="counter__number">
                                    <span class="counter">{{ $instructor }}</span>

                                </div>
                                <p>Total Instructor</p>

                            </div>
                        </div>
                    </div>
                </div>
             
                <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                    <div class="dashboard__single__counter">
                        <div class="counterarea__text__wraper">
                            <div class="counter__img">
                                <img src="{{ asset('assets/img/counter/counter__3.png') }}" alt="counter">
                            </div>
                            <div class="counter__content__wraper">
                                <div class="counter__number">
                                    <span class="counter">{{ $user }}</span>

                                </div>
                                <p>Total Students</p>

                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
@endsection