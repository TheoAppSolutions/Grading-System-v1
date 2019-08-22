<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="card-title">
                <h4><span>Name:</span>
                    <b>{{ $student->firstname . " " . $student->lastname . " " . $student->suffix }}</b></h4>
                <span>Student ID:</span> <code>{{ $student->student_id }}</code><br/>
                <span>Current Grade Level:</span> <code>{{ $student->gradelevel }}</code>
            </div>

            <table class="table table-bordered">
                <col width=100>
                <col width=10>
                <col width=200>

                <tbody>
                <tr>
                    <td rowspan="5" class="align-middle text-center p-0">
                        <img src="{{ student_image($student->student_id) }}" class="img-circle"
                             style="max-width: 200px;">
                    </td>
                    <td>Gender:</td>
                    <td class="text-center"><b>{{ $student->gender }}</b></td>
                </tr>
                <tr>
                    <td>Birthdate:</td>
                    <td class="text-center"><b>{{ $student->birthdate }}</b></td>
                </tr>
                <tr>
                    <td>Contact#:</td>
                    <td class="text-center"><b>{{ $student->contact }}</b></td>
                </tr>
                <tr>
                    <td>Email Address:</td>
                    <td class="text-center"><b>{{ $student->email }}</b></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td class="text-center"><b>{{ $student->address }}</b></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
