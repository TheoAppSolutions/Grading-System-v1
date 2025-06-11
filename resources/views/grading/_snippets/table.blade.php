<?php
$schoolyear = getSchoolYear();
$fields = ['final', 'effort', 'deportment'];
?>

<form action="{{ route('grades.save', [$schoolyear, $subject->subject_id]) }}" method="post">
    @csrf
    <input type="hidden" value="{{ $type }}" name="type">
    <input type="hidden" value="{{ $quarter }}" name="quarter">
    <input type="hidden" value="{{ $subject->subject_id }}" name="subject_id">

    <table class="table table-bordered table-responsive-lg table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Semester Grade</th>
            <th>Effort Grade</th>
            <th>Deportment</th>
            @if($type == 'MidQuarter' and $comment_show)
                <th>Card Comments</th>
            @endif
        </tr>
        </thead>
        <?php $lockOff = 0; ?>
        @foreach($students as $student)
            @if (!in_array($student->student_id, $exclude_list))
                @php
                    $final = ''; $effort = ''; $deportment = ''; $importStatus = '';
                    if (Session::has('import')):
                        $import = session('import');
                        session()->forget('import');
                    endif;

                    foreach ($fields as $field):
                        if (isset($grades[$student->student_id][$quarter]) and $grades[$student->student_id][$quarter][$field] > 0):
                            ${$field} = $grades[$student->student_id][$quarter][$field];
                            $importStatus = 'found';
                        elseif (isset($import[$student->student_id][$quarter][$field])):
                            ${$field} = $import[$student->student_id][$quarter][$field];
                            $importStatus = 'import';
                        endif;

                        if ($importStatus == 'import') {
                            ${$field . 'Lock'} = '';
                        } else {
                            if ($importStatus == 'found') {
                                if (${$field} > 0) {
                                    ${$field . 'Lock'} = 'Lock';
                                } else {
                                    ${$field . 'Lock'} = '';
                                }
                            } else {
                                ${$field . 'Lock'} = '';
                            }
                        }

                        if (${$field . 'Lock'} == 'Lock'):
                            if ($lockOff == 0):
                                $lockOff = 1;
                            endif;
                        endif;

                    endforeach;
                @endphp

                <input type="hidden" name="grades[{{$loop->index}}][student_id]" value="{{ $student->student_id }}">

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

                    <td>
                        <input type='number' step='0.01' min='0' max='100'
                               class='form-control grades' title="Semester Grade"
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

                    @if($type == 'MidQuarter' and $comment_show)
                        <td>
                            <button data-target='#modal' data-toggle="modal" class='btn btn-default' type="button"
                                    onclick="loadModal('View MiqQuarter Comments',
                                            '{{ route('comments.midquarter.show', [$subject->subject_id, $student->student_id]) }}')">
                                <i class="la la-edit"></i>
                            </button>
                        </td>
                    @endif
                </tr>
            @endif
        @endforeach
        <tfoot>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Semester Grade</th>
            <th>Effort Grade</th>
            <th>Deportment</th>
            @if($type == 'MidQuarter' and $comment_show)
                <th>Card Comments</th>
            @endif
        </tr>
        </tfoot>
    </table>

    <button type="submit" class="btn btn-success pull-right">Save</button>
    @if (schema("function")->import)
        <button type="button"
                onclick="loadModal('Import Data From Excel','{{ route('grades.import.show', ['currentQuarter='.$quarter]) }}');"
                class="btn btn-primary pull-right" data-target='#modal' data-toggle="modal">Import
        </button>
    @endif

    @if($lockOff == 1)
        <button type="button" class="btn btn-info pull-left" onclick="unlockPassword();">Unlock All</button>

        @if($quarter == 4)
            <button type="button"
                    onclick="loadModal('Subject Excellence Ranking','{{ route('sea.show', $subject->subject_id) }}');"
                    class="btn btn-success ml-1" data-target='#modal' data-toggle="modal">
                Ranking
            </button>
        @endif
    @endif
</form>
