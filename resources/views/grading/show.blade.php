@extends('_layouts.main')

@push('js')
    <script src="{{ url('/app-assets/js/scripts/modal/components-modal.js') }}" type="text/javascript" defer></script>
@endpush

@section('content-title')
    {{ $subject->subjecttitle }}
@endsection

@php($comment_show = false)

@section('content-breadcrumb')
    Grade: {{ $subject->gradelevel }}
@endsection

@php($type = request('type') != "" ? request('type') : "MidQuarter")
@php($comment_show = false)

@if ($subject->gradelevel >= 1 and $subject->gradelevel <= 6)
    @php($schema = schema("comments.mid.lower.school"))
    @foreach($schema as $title => $item)
        @if($subject->subjectname == $title)
            @php($comment_show = true)
        @endif
    @endforeach
@elseif ($subject->gradelevel >= 7 and $subject->gradelevel <= 10)
    @php($schema = schema("comments.mid.upper.school"))
    @foreach($schema as $title => $item)
        @if($subject->subjectname == $title)
            @php($comment_show = true)
        @endif
    @endforeach
@elseif ($subject->gradelevel >= 11 and $subject->gradelevel <= 12)
    @php($schema = schema("comments.mid.senior.high"))
    @php($comment_show = true)
@endif
@if (session()->has('currentQuarter'))
    @php($currentQuarter = session('currentQuarter'))
@else
    @php($currentQuarter = 1)
@endif

@section('content-body')
    <section class="row">
        <div class="col-12">
            <div id="" class="card">
                <div class="card-header">
                    <div class="card-title">
                        <ul class="nav nav-tabs nav-top-border no-hover-bg">
                            @if (schema('student')->{"senior.high.school"} and $subject->gradelevel >= 11 and $subject->gradelevel <= 12)
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
                            @else
                                <li class="nav-item">
                                    <a class="nav-link {{ $currentQuarter == 1 ? 'active' : '' }}" id="baseLable-tab1"
                                       data-toggle="tab"
                                       aria-controls="tabLable1" href="#1" aria-expanded="true">
                                        {{ schema("quarter.term") }} 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $currentQuarter == 2 ? 'active' : '' }}" id="baseLable-tab2"
                                       data-toggle="tab" aria-controls="tabLable2"
                                       href="#2" aria-expanded="false">
                                        {{ schema("quarter.term") }} 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $currentQuarter == 3 ? 'active' : '' }}" id="baseLable-tab3"
                                       data-toggle="tab" aria-controls="tabLable3"
                                       href="#3" aria-expanded="false">
                                        {{ schema("quarter.term") }} 3</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $currentQuarter == 4 ? 'active' : '' }}" id="baseLable-tab3"
                                       data-toggle="tab" aria-controls="tabLable3"
                                       href="#4" aria-expanded="false">
                                        {{ schema("quarter.term") }} 4</a>
                                </li>
                            @endif
                            <li class="nav-item heading-elements">
                                @if (schema('function')->type)
                                    <div class="pull-left mr-1">
                                        <select class="select2-placeholder form-control hide-search"
                                                title="Select Quarter"
                                                id="quarter"
                                                onchange="changeQuarter();">
                                            <option value="MidQuarter" {{ $type == "MidQuarter" ? "selected" : "" }}>
                                                MidQuarter
                                            </option>
                                            <option value="Quarter" {{ $type == "Quarter" ? "selected" : "" }}>
                                                Quarter
                                            </option>
                                        </select>
                                    </div>
                                @endif
                                <div class="pull-right">
                                    <a href="{{ route('report.summary.subject', $subject->subject_id) . '?type='.$type }}"
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
                    @if (schema('student')->{"senior.high.school"} and $subject->gradelevel >= 11 and $subject->gradelevel >= 12)
                        @for($quarter = 1; $quarter <= 2; $quarter++)
                            <div role="tabpanel" class="tab-pane {{ $quarter == $currentQuarter ? 'active' : '' }}"
                                 id="{{ $quarter }}">
                                @include('grading._snippets.table', ['quarter'=>$quarter, 'type'=>$type, 'comment_show'=>$comment_show, 'comments'=>$comments])
                            </div>
                        @endfor
                    @else
                        @for($quarter = 1; $quarter <= 4; $quarter++)
                            <div role="tabpanel" class="tab-pane {{ $quarter == $currentQuarter ? 'active' : '' }}"
                                 id="{{ $quarter }}">
                                @include('grading._snippets.table', ['quarter'=>$quarter, 'type'=>$type, 'comment_show'=>$comment_show])
                            </div>
                        @endfor
                    @endif
                    @php(session()->forget('import'))
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