@extends('layouts.backend.app')
@section('title','Dashboard')

@push('css')

@endpush
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">Total Posts</div>
                    <div class="number count-to" data-from="0" data-to="{{$posts->count()}}" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">favorite</i>
                </div>
                <div class="content">
                    <div class="text">Total Favorite</div>
                    <div class="number count-to" data-from="0" data-to="{{Auth::user()->favorite_posts()->count()}}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">library_books</i>
                </div>
                <div class="content">
                    <div class="text">Pending Posts</div>
                    <div class="number count-to" data-from="0" data-to="{{$total_pending_posts}}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">person_add</i>
                </div>
                <div class="content">
                    <div class="text">Total View</div>
                    <div class="number count-to" data-from="0" data-to="{{$all_views}}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->
    <!-- CPU Usage -->


    <div class="row clearfix">
        <!-- Task Info -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Top 5 Popular Posts</h2>

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>Rank List</th>
                                    <th>Title</th>
                                    <th>Views</th>
                                    <th>Favorite</th>
                                    <th>Comments</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($popular_posts as $key => $post)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <span title="{{ $post->title }}">{{ Str::limit($post->title, 30) }}</span>
                                    </td>
                                    <td>{{ number_format($post->view_count) }}</td>
                                    <td>{{ number_format($post->favorite_to_users_count) }}</td>
                                    <td>{{ number_format($post->comments_count) }}</td>
                                    <td>
                                        <span class="label {{ $post->status ? 'bg-green' : 'bg-red' }}">
                                            {{ $post->status ? __('Published') : __('Pending') }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Task Info -->
        <!-- Browser Usage -->

        <!-- #END# Browser Usage -->
    </div>
</div>
@endsection

@push('js')
<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('assets/backend/plugins/jquery-countto/jquery.countTo.js') }}"></script>

<!-- Morris Plugin Js -->
<script src="{{ asset('assets/backend/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/morrisjs/morris.js') }}"></script>

<!-- ChartJs -->
<script src="{{ asset('assets/backend/plugins/chartjs/Chart.bundle.js') }}"></script>

<!-- Flot Charts Plugin Js -->
<script src="assets/backend/plugins/flot-charts/jquery.flot.js"></script>
<script src="assets/backend/plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="assets/backend/plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="assets/backend/plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="assets/backend/plugins/flot-charts/jquery.flot.time.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="assets/backend/plugins/jquery-sparkline/jquery.sparkline.js"></script>
<script src="{{ asset('assets/backend/js/pages/index.js') }}"></script>


@endpush
