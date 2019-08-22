<div class="table-responsive">
    <table class="table table-white-space table-bordered row-grouping display no-wrap table-middle">
        <thead>
        <tr>
            <th>ID#</th>
            <th>Name</th>
            <th>Year Graduated</th>
            <th>Email</th>
            <th>Address</th>
            <th>Contact#</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @php($ctr = 1)
        @foreach($students as $student)
            <tr>
                <td>
                    {{ $student->student_id }}
                </td>

                <td>
                    <div class="media">
                        <div class="media-left pr-1">
                                <span class="avatar avatar-sm rounded-circle">
                                <img src="{{ student_image($student->student_id) }}"
                                     alt="avatar">
                                </span>
                        </div>
                        <div class="media-body media-middle">
                            <a href="#" class="media-heading">
                                {{ $student->lastname . ", " . $student->firstname }}
                            </a>
                        </div>
                    </div>
                </td>

                <td>
                    {{ $student->graduated_at }}
                </td>

                <td class="text-center">
                    @if($student->birthdate){{ date("M-d-Y",strtotime($student->birthdate)) }}@endif
                </td>

                <td class="text-center">
                    {{ $student->address }}
                </td>

                <td>{{ $student->contact }}</td>

                <td>
                    <span class="dropdown">
                    <button id="btnSearchDrop2" type="button" data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="true"
                            class="btn btn-primary dropdown-toggle dropdown-menu-right">
                        <i class="ft-settings"></i>
                    </button>
                    <span aria-labelledby="btnSearchDrop2"
                          class="dropdown-menu mt-1 dropdown-menu-right">
                      <a href="#" class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>
                                                @isset($student->active)
                            @if($student->active == 1)
                                <a href="#" class="dropdown-item"><i class="ft-thumbs-down"></i> Deactivate</a>
                            @elseif($student->active == 0)
                                <a href="#" class="dropdown-item"><i class="ft-trash-2"></i> Delete</a>
                            @endif
                        @endisset
                    </span>
                    </span>
                </td>
            </tr>
        @endforeach
        </tbody>

        <tfoot>
        <tr>
            <th>ID#</th>
            <th>Name</th>
            <th>Year Graduated</th>
            <th>Email</th>
            <th>Address</th>
            <th>Contact#</th>
            <th>Actions</th>
        </tr>
        </tfoot>
    </table>
</div>