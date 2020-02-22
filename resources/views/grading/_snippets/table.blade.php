<?php
$schoolyear = getSchoolYear();
$fields = ['final', 'effort', 'deportment', 'midquarter'];
?>


<form action="{{ route('grades.save', [$schoolyear, $subject->subject_id]) }}" method="post">
    @csrf
    <input type="hidden" value="{{ $type }}" name="type">
    <input type="hidden" value="{{ $quarter }}" name="quarter">
    <input type="hidden" value="{{ $subject->subject_id }}" name="subject_id">

    <div style="overflow: auto; max-height: 500px;">
        <table class="table table-bordered table-responsive-lg table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>{{ $type }} Grade</th>
                @if($type == 'MidQuarter')
                    @if ($comment_show)
                        @if (schema('student')->{"senior.high.school"} and $subject->gradelevel >= 11 and $subject->gradelevel <= 12)
                            <th>Performance</th>
                            <th>Behavior</th>
                        @endif
                        <th>Card Comments</th>
                    @endif
                @elseif($type == 'Quarter')
                    <th>Effort Grade</th>
                    <th>Deportment</th>
                @endif
            </tr>
            </thead>

            <?php $lockOff = 0; ?>
            @foreach($students as $student)
                <?php
                $final = ''; $effort = ''; $deportment = ''; $importStatus = ''; $midquarter = '';

                if (session()->has('import')):
                    $import = session('import');
                endif;

                foreach ($fields as $field):
                    if (isset($grades[$student->student_id][$quarter]) and $grades[$student->student_id][$quarter][$field] > 0):
                        ${$field} = $grades[$student->student_id][$quarter][$field];
                        $importStatus = 'found';
                    elseif (isset($import[$student->student_id][$quarter][$field])):
                        ${$field} = $import[$student->student_id][$quarter][$field];
                        $importStatus = 'import';
                    endif;

                    ${$field . 'Lock'} = $importStatus == 'import' ? '' : $importStatus == 'found' ? ${$field} > 0 ? 'Lock' : '' : '';

                    if (${$field . 'Lock'} == 'Lock'):
                        if ($lockOff == 0):
                            $lockOff = 1;
                        endif;
                    endif;
                endforeach;
                ?>
                <tr>
                    <td>
                        <input type="hidden" name="grades[{{$loop->index}}][student_id]"
                               value="{{ $student->student_id }}">
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        <img src="{{ student_image($student->student_id) }}"
                             style="height: 50px;width:50px;" onclick="$('#img-responsive').attr('src',this.src);"
                             data-toggle="modal" data-target="#imageModal" alt=""
                             class="img-rounded center-block table-img">
                        {{ $student->lastname . ', ' . $student->firstname }}
                    </td>

                    @if($type == 'MidQuarter')
                        <td>
                            <input type='number' step='0.01' min='0' max='100'
                                   class='form-control grades' title="MidQuarter Grade"
                                   name='grades[{{$loop->index}}][midquarter]'
                                   value="{{ $midquarter>0?$midquarter:'' }}"
                                    {{ $midquarterLock=='Lock'?'readonly':'' }}>
                        </td>
                        @if (schema('student')->{"senior.high.school"} and $subject->gradelevel >= 11 and $subject->gradelevel <= 12)
                            <td>
                                <select class="select2-placeholder form-control hide-search"
                                        name="grades[{{$loop->index}}][performance]">
                                    @php($comments = schema("comments.mid.senior.high")->{"Performance"})
                                    <option value=""> </option>
                                    <optgroup label="Performance">
                                        @foreach($comments as $key => $comment)
                                            <option value="{{ $key }}" {{ $key == $studentNames[$student->student_id]["performance"] ? "selected" : "" }}>
                                                {{ $comment }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </td>

                            <td>
                                <select class="select2-placeholder form-control hide-search"
                                        name="grades[{{$loop->index}}][behavior]">
                                    @php($comments = schema("comments.mid.senior.high")->{"Behavior"})
                                    <option value=""> </option>
                                    <optgroup label="Behavior">
                                        @foreach($comments as $key => $comment)
                                            <option value="{{ $key }}" {{ $key == $studentNames[$student->student_id]["behavior"] ? "selected" : "" }}>
                                                {{ $comment }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </td>
                        @endif
                        @if ($comment_show)
                            <td>
                                <button data-target='#modal' data-toggle="modal" class='btn btn-default'
                                        type="button"
                                        onclick="loadModal('View MiqQuarter Comments',
                                                '{{ route('comments.midquarter.show', [$subject->subject_id, $student->student_id]) }}')">
                                    <i class="la la-edit"></i>
                                </button>
                            </td>
                        @endif
                    @elseif($type == 'Quarter')
                        <td>
                            <input type='number' step='0.01' min='0' max='100'
                                   class='form-control grades' title="Term Grade"
                                   name='grades[{{$loop->index}}][final]'
                                   value="{{ $final>0?$final:'' }}"
                                    {{ $finalLock=='Lock'?'readonly':'' }}>
                        </td>
                        <td>
                            <input type='number' step='1' min='1' max='5'
                                   class='form-control grades' title="Effort Grade"
                                   data-toggle='tooltip' data-placement='bottom' title='1, 2, 3, 4, 5'
                                   name='grades[{{$loop->index}}][effort]'
                                   value="{{ $effort>0?$effort:'' }}"
                                    {{ $effortLock=='Lock'?'readonly':'' }}>
                        </td>

                        <td>
                            <input type='number' step='0.01' min='0' max='100'
                                   class='form-control grades' title="Deportment Grade"
                                   name='grades[{{$loop->index}}][deportment]'
                                   value="{{ $deportment>0?$deportment:'' }}"
                                    {{ $deportmentLock=='Lock'?'readonly':'' }}>
                        </td>
                    @endif
                </tr>
            @endforeach
            <tfoot>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>{{ $type }} Grade</th>
                @if($type == 'MidQuarter')
                    @if ($comment_show)
                        @if (schema('student')->{"senior.high.school"} and $subject->gradelevel >= 11 and $subject->gradelevel <= 12)
                            <th>Performance</th>
                            <th>Behavior</th>
                        @endif
                        <th>Card Comments</th>
                    @endif
                @elseif($type == 'Quarter')
                    <th>Effort Grade</th>
                    <th>Deportment</th>
                @endif
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="mt-1">
        <button type="submit" class="btn btn-success pull-right">Save</button>

        @if (schema('function')->import)
            <button type="button" class="btn btn-primary pull-right mr-1" data-target='#modal' data-toggle="modal"
                    onclick="loadModal('Import Data From Excel','{{ route('grades.import.show', ['currentQuarter='.$quarter]) }}');">
                Import
            </button>
        @endif

        @if($lockOff == 1)
            <button type="button" class="btn btn-info pull-left" onclick="unlockPassword();">Unlock All</button>
        @endif
    </div>
</form>
