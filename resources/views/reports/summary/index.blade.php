@extends('_layouts.main')

@section('content-title')
    Subject Summary
@endsection

@section('content-body')
    <div class="card border-info">
        <div class="card-content">
            <div class="card-head">
                @php($roles = getRoles(auth()->id()))
                @foreach($roles as $role)
                    @switch($role->role_description)
                        @case("Admin")
                        @case("Secretary")
                        @case("Registrar")
                        @case("Principal")
                        <div class="card-header">
                            <div class="card-title">
                                <p>Select a <code>grade level</code> to view</p>
                                @include('subjects._snippets.gradeselect',['current_GradeLevel'=>$gradelevel])
                            </div>
                        </div>
                        @break;
                    @endswitch
                @endforeach
            </div>

            <div class="card-body">
                @include('reports.summary._snippets.table')
            </div>
        </div>
    </div>
@endsection

@include('_layouts.modal')