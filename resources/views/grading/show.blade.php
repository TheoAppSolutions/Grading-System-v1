@extends('_layouts.main')

@push('js')
    <script src="{{ url('/app-assets/js/scripts/modal/components-modal.js') }}" type="text/javascript" defer></script>
@endpush

@section('content-title')
    {{ $subject->subjecttitle }}
@endsection

@php($type = request('type') != "" ? request('type') : "MidQuarter")
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
                                       aria-controls="tabLable1" href="#2" aria-expanded="true">
                                        {{ schema("quarter.term") }} 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="baseLable-tab2" data-toggle="tab" aria-controls="tabLable2"
                                       href="#4" aria-expanded="false">
                                        {{ schema("quarter.term") }} 2</a>
                                </li>
                            <li class="nav-item heading-elements">
                                <div class="pull-right">
                                    <a href="{{ route('report.summary.subject', $subject->subject_id) }}"
                                       class="btn btn-outline-success" target="_blank">
                                        <i class="la la-file"></i>
                                        Summary
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content p-1">
                    @for($quarter = 1; $quarter <= 2; $quarter++)
                        <div role="tabpanel" class="tab-pane {{ $quarter == 1 ? 'active' : '' }}" id="{{ $quarter }}">
                            <?php $type = 'AfterQuarter'; ?>
                            @include('grading._snippets.table', compact('quarter', 'type'))
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    @include('_layouts.modal')

@endsection

@push('js')
    <script>
        function changeQuarter() {
            var url = window.location.href;
            if (url.indexOf('?') > -1) {
                url += '&type=' + $('#quarter').val();
            } else {
                url += '?type=' + $('#quarter').val();
            }
            window.location.href = url;
        }
    </script>
@endpush
