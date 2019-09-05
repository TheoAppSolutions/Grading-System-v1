@extends('_layouts.main')

@push('js')
    <script src="{{ url('/app-assets/js/scripts/modal/components-modal.js') }}" type="text/javascript" defer></script>
@endpush

@section('content-title')
    {{ $subject->subjecttitle }}
@endsection

@php($comment_show = false)

@php($schema = schema("comments.midquarter"))
@foreach($schema as $title => $item)
    @if($subject->subjectname == $title)
        @php($comment_show = true)
    @endif
@endforeach

@section('content-breadcrumb')
    Grade: {{ $subject->gradelevel }}
@endsection

@section('content-body')
    <section class="row">
        <div class="col-12">
            <div id="" class="card">
                <div class="card-header">
                    <div class="card-title">
                        <ul class="nav nav-tabs nav-top-border no-hover-bg">
                            <li class="nav-item">
                                <a class="nav-link active" id="baseLable-tab1" data-toggle="tab"
                                   aria-controls="tabLable1" href="#1" aria-expanded="true">
                                    {{ schema("quarter.term") }} 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="baseLable-tab2" data-toggle="tab" aria-controls="tabLable2"
                                   href="#2" aria-expanded="false">
                                    {{ schema("quarter.term") }} 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="baseLable-tab3" data-toggle="tab" aria-controls="tabLable3"
                                   href="#3" aria-expanded="false">
                                    {{ schema("quarter.term") }} 3</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="baseLable-tab3" data-toggle="tab" aria-controls="tabLable3"
                                   href="#4" aria-expanded="false">
                                    {{ schema("quarter.term") }} 4</a>
                            </li>

                            <li class="nav-item heading-elements">
                            <div class="pull-right">
                                <a href="{{ route('report.summary.subject', $subject->subject_id) }}" class="btn btn-outline-success" target="_blank">
                                    <i class="la la-eye"></i>
                                    Summary
                                </a>
                            </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content p-1">
                    @for($quarter = 1; $quarter <= 4; $quarter++)
                        <div role="tabpanel" class="tab-pane {{ $quarter == 1 ? 'active' : '' }}" id="{{ $quarter }}">
                            @if($quarter == 1 or $quarter == 3)
                                <?php $type = 'MidQuarter'; ?>
                            @elseif($quarter == 2 or $quarter == 4)
                                <?php $type = 'AfterQuarter'; ?>
                            @endif
                            @include('grading._snippets.table', ['quarter'=>$quarter])
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    @include('_layouts.modal')

@endsection

