@extends('_layouts.main')

@section('content-title')
    Progress Report
@endsection

@section('content-body')
    <div class="card border-info">
        <div class="card-content">
            <div class="card-header card-head-inverse bg-info">
                <h4 class="card-title text-white">Homeroom Advisory: {{ $gradelevel }}
                    @if($section) - {{ $section }}@endif</h4>
            </div>

            <div class="card-body">
                @if(isset($students) and count($students) > 0)
                    @include('reports.progress._snippets.table')
                @else
                    <code>No Students Records Found.</code> Please Enroll Old Students or Add New Students.
                @endif
            </div>
        </div>
    </div>
@endsection

@include('_layouts.modal')
