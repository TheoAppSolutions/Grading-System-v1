@extends('_layouts.main')

@section('content-title')
    Student
@endsection

@section('content-body')
    <div class="card border-info">
        <div class="card-head">
            <div class="card-header">
                <div class="card-title">
                    <p>Fields with
                        <span class="danger">*</span> are required fields.</p>
                    <div class="heading-elements">
                        <a href="{{ route('student.index') }}" class="btn btn-primary block btn-md">
                            <i class="ft-list white"></i> Student List
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="card-text">
                    @include('_partials.error_alerts')
                </div>
                <form class="form form-horizontal form-bordered" action="{{ route('student.store') }}"
                      method="POST">
                    @csrf

                    <div class="form-body">
                        @include('students._snippets.form')
                    </div>

                    <div class="form-actions right">
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
