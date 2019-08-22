<template>
    `
    <table class='table table-striped table-bordered table-hover'>
        <thead>
        <tr>
            <th style='text-align:center;'>#</th>
            <th style='text-align:center;'>ID#</th>
            <th style='text-align:center;'>LRN#</th>
            <th style='text-align:center;'>Image</th>
            <th style='text-align:center;'>Name</th>
            <th style='text-align:center;'>Birthdate</th>
            <th style='text-align:center;'>Contact</th>
            <th style='text-align:center;'>Address</th>
            <th style='text-align:center;'></th>
        </tr>
        </thead>
        <tbody>

        <tr v-show="gradelevel === 0 && student.active === 1">
            <td style='text-align: center;'>{{ }}</td>
            <td style='text-align: center;'>{{ student.student_id }}</td>
            <td style='text-align: center;'>{{ student.student_lrn }}</td>
            <td style='text-align: center;'>
                <img src='{{ studentimage(student.student_id) }}'
                     style='height: 50px;width:50px;cursor: pointer;' class='rounded-circle center-block'
                     data-toggle="modal"
                     data-target="#myModal" onclick="$('#img-responsive').attr('src',this.src);">
            </td>
            <td style='text-align: left;'>{{ student.lastname + ', ' + student.firstname }}</td>
            <td style='text-align: center;'>{{ student.birthdate }}</td>
            <td style='text-align: left;'>{{ student.contact }}</td>
            <td style='text-align: left;'>{{ student.address }}</td>
            <td style='text-align: center;'>
                <button data-target='#modal' data-toggle="modal" class='btn btn-outline-success'
                        onclick="loadModal('Students Info View','/student/{{ student.student_id }}/view')">
                    View
                </button>
            </td>
        </tr>

        <tr v-show="gradelevel === 0 && student.active === 0">
            <td style='text-align: center;'>{{ }}</td>
            <td style='text-align: center;'>{{ student.student_id }}</td>
            <td style='text-align: center;'>{{ student.student_lrn }}</td>
            <td style='text-align: center;'>
                <img src='{{ studentimage(student.student_id) }}'
                     style='height: 50px;width:50px;cursor: pointer;' class='rounded-circle center-block'
                     data-toggle="modal"
                     data-target="#myModal" onclick="$('#img-responsive').attr('src',this.src);">
            </td>
            <td style='text-align: center;'>{{ student.lastname . ', ' . student.firstname }}</td>
            <td style='text-align: center;'>{{ date('M-d-Y',strtotime(student.birthdate)) }}</td>
            <td style='text-align: center;'>{{ student.contact }}</td>
            <td style='text-align: center;'>{{ student.address }}</td>
            <td style='text-align: center;'>
                <button data-target='#modal' data-toggle="modal" class='btn btn-outline-success'
                        onclick="loadModal('Students Info View','{{ route('student.edit',student.student_id) }}')">
                    View
                </button>
            </td>
        </tr>
        </tbody>
    </table>
    `
</template>

<script>
    export default {
        name: "table--student"
    }
</script>

<style scoped>

</style>
