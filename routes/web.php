<?php

/*
    TODO: Validation
*/
app('debugbar')->disable();

Route::get('/', 'HomeController@dashboard')->middleware('auth')->name('home');
Route::redirect('/home', '/');

/*----------AUTHENTICATION LINKS----------------------------------------------------------------------------------*/
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

/*----------RESOURCE LINKS----------------------------------------------------------------------------------------*/
Route::resource('student', 'StudentsController')->except('destroy');
Route::resource('subject', 'SubjectsController')->except('destroy');
Route::resource('user', 'UsersController')->except('destroy');

/*----------JSON API LINKS----------------------------------------------------------------------------------------*/
Route::get('json/accounts.json', 'JSONController@get_users')->name('json.get_users');
Route::get('json/subjects.json', 'JSONController@get_subjects')->name('json.get_subjects');

Route::patch('subject.mass.update/{subject_id}', 'SubjectsController@massUpdate')->name('subject.mass.update');
Route::patch('subject.solo.update/{subject_id}', 'SubjectsController@soloUpdate')->name('subject.solo.update');
Route::post('subject.load.data', 'SubjectsController@loadData')->name('subject.load.data');

Route::middleware(['auth'])->group(function () {
    /*----------USER FUNCTIONS----------------------------------------------------------------------------------------*/
    Route::prefix('user')->group(function () {
        Route::get('{id}/logs', 'LogsController@logs')->name('logs');
        Route::get('{id}/settings', 'UsersController@settings')->name('user.settings');
        Route::get('{id}/filestorage', 'UsersController@settings')->name('user.filestorage');

        Route::post('password/check', 'PasswordController@_check')->name('user.password.check');
        Route::patch('password/update', 'PasswordController@_update')->name('user.password.update');
    });

    /*----------STUDENT FUNCTIONS-------------------------------------------------------------------------------------*/
    Route::prefix('student')->group(function () {
        Route::post('activate', 'StudentsController@activate')->name('student.activate');
        Route::get('{id}/filestorage', 'StudentsController@filestorage')->name('student.filestorage');
        Route::post('{id}/filestorage', 'StudentsController@filestorage')->name('student.filestorage.upload');
        Route::get('{id}/modal', 'StudentsController@show_modal')->name('student.show.modal');
    });

    Route::prefix('homeroom')->group(function () {
        Route::post('student/destroy', 'StudentsController@destroy')->name('student.destroy');
        Route::get('', 'HomeroomController@index')->name('homeroom.index');
        Route::get('summary', 'HomeroomController@summary')->name('homeroom.summary.index');
        Route::get('summary/{gradelevel}', 'HomeroomController@showSummary')->name('homeroom.summary.show');
        Route::get('adviser/{id}', 'HomeroomController@show')->name('homeroom.show');
    });
});

Route::get('import','EnrollmentController@show_import_student')->name('student.import.show');
Route::post('import','EnrollmentController@import_student')->name('student.import');

Route::get('password/reset', 'PasswordController@_token')->name('user.password.reset.token');
Route::post('password/reset', 'PasswordController@_reset')->name('user.password.reset');

/*----------ADMIN FUNCTIONS---------------------------------------------------------------------------------------*/
Route::middleware("check.role:Admin")->prefix("admin")->group(function () {
    Route::get('gradelevels', 'AdminController@gradelevel_setup')->name('admin.gradelevel_setup');
    Route::get('schema', 'AdminController@schema_setup')->name('admin.schema_setup');
    Route::get('settings', 'AdminController@system_settings')->name('admin.system_settings');
    Route::get('database', 'AdminController@database_manager')->name('admin.database');
    Route::post('password/default', 'PasswordController@_default')->name('admin.password.default');

    /*----------ADMIN FUNCTIONS-----------------------------------------------------------------------------------*/
    Route::post('logs/clear', 'LogsController@logs_clear')->name('user.logs.clear');
    Route::get('access/roles', 'UsersController@roles')->name('user.roles');
    Route::post('account/activate', 'UsersController@activate')->name('user.activate');
    Route::post('account/delete', 'UsersController@destroy')->name('user.delete');
    Route::post('access/roles', 'AdminController@update_roles')->name('roles.update');

    /*--SCHOOL YEAR FUNCTIONS--*/
    Route::get('schoolyear', 'SchoolYearController@index')->name('schoolyear.index');
    Route::get('schoolyear/{schoolyear}', 'SchoolYearController@show')->name('schoolyear.show');
    Route::patch('schoolyear', 'SchoolYearController@update')->name('schoolyear.update');
    Route::post('schoolyear/{method}', 'SchoolYearController@action')->name('admin.schoolyear.action');
});

/*----------OFFICE FUNCTIONS--------------------------------------------------------------------------------------*/
Route::middleware("check.role:Secretary,Principal")->prefix('office')->group(function () {
    Route::get('enroll', 'StudentsController@enroll')->name('student.enroll');
    Route::get('settings', 'OfficeController@settings')->name('office.settings');
    Route::patch('homeroom', 'OfficeController@homeroom_update')->name('office.homeroom.update');
    Route::patch('schooldays', 'OfficeController@schooldays_update')->name('office.schooldays.update');

    Route::get('report/student', 'OfficeController@report_student')->name('office.report.student');
    Route::get('report/subject', 'OfficeController@report_subject')->name('office.report.subject');
});

/*----------GRADING FUNCTIONS-------------------------------------------------------------------------------------*/
Route::prefix('grades')->group(function () {
    Route::get('{subject_id}', 'GradesController@show_grade')->name('grades.show');
    Route::post('{subject_id}', 'GradesController@store_grade')->name('grades.save');

    Route::get('import', 'GradesController@show_import')->name('grades.import.show');
    Route::post('import', 'GradesController@import')->name('grades.import');

    Route::post('awards', 'GradesController@setSEA')->name('grades.awards.save');
});

/*----------COMMENTS AND ATTENDANCE--MODAL FORMS--------------------------------------------------------------------*/
Route::prefix('comment')->group(function () {
    Route::get('midquarter/{subject_id}/{student_id}', 'MidQuarterController@show')->name('comments.midquarter.show');
    Route::post('midquarter/{subject_id}/{student_id}', 'MidQuarterController@store')->name('comments.midquarter.save');

    Route::get('quarter/{student_id}', 'HomeroomController@show_comments')->name('comments.quarter.show');
    Route::post('quarter/{student_id}', 'HomeroomController@store_comments')->name('comments.quarter.save');
});

Route::prefix('attendance')->group(function () {
    Route::get('quarter/{student_id}', 'HomeroomController@show_attendance')->name('attendance.show');
    Route::post('quarter/{student_id}', 'HomeroomController@store_attendance')->name('attendance.save');
});

/*----------LINKS FOR PDF GENERATOR-------------------------------------------------------------------------------*/
Route::prefix('report')->group(function () {
    Route::get('student/{type}/{student_id}', 'Reports\ReportController@report_by_student')->name('report.student');
    Route::get('grade/{type}/{gradelevel}', 'Reports\ReportController@report_by_gradelevel')->name('report.grade');

    Route::get('summary/subject/{subject_id}', 'Reports\ReportController@summary_by_subject')->name('report.summary.subject');
    Route::get('summary/grade/{gradelevel}', 'Reports\ReportController@summary_by_gradelevel')->name('report.summary.grade');

    /*----------PDF GENERATOR-----------------------------------------------------------------------------------------*/

    Route::get('midquarter/{student_id}', 'Reports\ReportController@report')->name('report.midquarter');
    Route::get('quarter/{student_id}', 'Reports\ReportController@report')->name('report.quarter');
    Route::get('award/{student_id}', 'Reports\ReportController@report')->name('report.award');
    Route::get('summary/{subject_id}', 'Reports\ReportController@summary')->name('report.subject');

    Route::get('master/{gradelevel}', 'Reports\ReportController@masterSummary')->name('report.master');
    Route::get('award/summary/{gradelevel}', 'Reports\ReportController@awardSummary')->name('report.award.summary');
});

/*----------FOR SORTING------------------------------------------------------------------------------------------*/
Route::prefix('file')->group(function () {
    Route::get('storage/{id}', 'FilesController@show')->name('file.storage');
    Route::post('storage', 'FilesController@store')->name('file.upload');
    Route::get('download', 'FilesController@download')->name('file.download');
    Route::post('delete', 'FilesController@destroy')->name('file.delete');
    Route::post('upload', 'UploadController@upload');
});

/*---------------------------------------------------------------------------------------------------------------*/
/*Route::get('test', 'IntegrationController@refresh')->name('test');*/

/*----------DOWNLOAD COVER PAGE----------------------------------------------------------------------------------*/
Route::get('cover/{category}/{level?}', 'Reports\ReportController@downloadCover')->name('coverpage');

Route::patch('settings', 'SettingsController@change_settings')->name('setting.user');

Route::get('unenrollment/{id}', 'EnrollmentController@un_enrollment')->name('un-enroll');
Route::get('enrollment/{id}', 'EnrollmentController@enrollment')->name('enrollment');
Route::post('enrollment/save/{id}', 'EnrollmentController@enrollment_save')->name('enrollment.save');
Route::post('enrollment/mass', 'EnrollmentController@enrollment_mass')->name('enrollment.mass');

Route::post('status/student', 'EnrollmentController@change_status')->name('status.student');

Route::resource('announcement', 'AnnouncementsController');
Route::get('announcement/delete/{id}', 'AnnouncementsController@delete')->name('announcement.delete');

Route::get('subject/{id}/exclude', function () {
    return view('subjects._modal.exclude');
})->name('exclude');