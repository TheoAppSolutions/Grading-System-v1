@extends('_layouts.main')

@section('content-title')
    Subject Summary
@endsection

@section('content-body')
    <div class="card border-info">
        <div class="card-content">
            <div class="card-header card-head-inverse bg-info">
                <h4 class="card-title text-white">Homeroom Advisory: {{ $gradelevel }}</h4>
            </div>

            <div class="card-body">
                @include('reports.summary._snippets.table')
            </div>
        </div>
    </div>
@endsection

@include('_layouts.modal')