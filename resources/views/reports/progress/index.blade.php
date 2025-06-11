@extends('_layouts.main')

@section('content-title')
    Progress Report
@endsection

@if(request("gradelevel") and request("gradelevel") != "")
    @php($gradelevel = request("gradelevel"))
@else
    @php($gradelevel = 1)
@endif

@section('content-body')
    <div class="card border-info">
        <div class="card-content">
            <div class="card-head">
                <div class="card-header">
                    <div class="card-title">
                        <p>Select a <code>grade level</code> to view</p>
                        @include('subjects._snippets.gradeselect',['current_GradeLevel'=>$gradelevel, 'includeGraduate'=>true])
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('reports.progress._snippets.table')
            </div>
        </div>
    </div>
@endsection

@include('_layouts.modal')
