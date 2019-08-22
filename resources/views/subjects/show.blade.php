@extends('_layouts.main')

@section('content-title')
    Update Subject
@endsection

@section('content-body')
    <div class="card border-info">
        <div class="card-content">
            <div class="card-header">
                <div class="heading-elements">
                    <a href="{{ route('subject.index') }}" class="btn btn-primary block btn-md">
                        <i class="ft-list white"></i> Subject Lists
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form class="form form-horizontal form-bordered striped-rows"
                      action="{{ route('subject.update', $subject->subject_id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-body">
                        @include('subjects._snippets.form')
                    </div>
                    <div class="form-actions right">
                        <button type="submit" class="btn btn-success">
                            <i class="la la-check-square-o"></i> Update
                        </button>
                        <button type="button" class="btn btn-danger">
                            <i class="la la-trash"></i> Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
