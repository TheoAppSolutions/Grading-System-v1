let token = $("meta[name=csrf-token]").attr("content");

function readURL(input) {
    let img = $("#img");
    let url = input.value;
    let ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
    if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $("#img").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
        console.log(url);
    } else {
        $("#img").attr("src", img.getAttribute("src"));
    }
}

function accountStatus(url, status, id) {
    let msg = "", type = "question";
    if (status === "Delete") {
        msg = "\n Warning! This cannot be undone.";
        type = "warning";
    }

    swal({
        title: "Are you sure?",
        text: status + " User? " + msg,
        type: type,
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Confirm",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    "id": id,
                    "_token": token
                },
                success: function () {
                    swal(
                        "Success!",
                        "User " + status + "!",
                        "success")
                        .then(function () {
                            if (status === "Delete") {
                                location.replace('/user');
                            } else {
                                location.reload();
                            }
                        });
                }
            });
        }
    }).catch(swal.noop);
}

function studentStatus(url, status, id) {
    swal({
        title: "Are you sure?",
        text: status + " Student?",
        type: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Confirm",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    "student_id": id,
                    "_token": token
                },
                success: function () {
                    swal(
                        "Success!",
                        "Student " + status + "d!",
                        "success")
                        .then(function () {
                            location.reload();
                        });
                }
            });
        }
    }).catch(swal.noop);
}

function loadModal(title, url) {
    $.ajax({
        url: url,
        type: "GET",
        data: {
            "type": title,
        },
        success: function (response) {
            $("#modal-body").html(response);
            $("#modal-title").html(title);
        }
    });
}

function unlockPassword() {
    swal({
        title: "Input Password To Unlock Grades",
        input: "password",
        confirmButtonText: "Submit",
        showCancelButton: true,
        showLoaderOnConfirm: true,
        allowOutsideClick: false,
        inputValidator: (value) => {
            return new Promise((resolve) => {
                if (value) {
                    resolve()
                } else {
                    resolve("You need to write something!")
                }
            })
        },
        preConfirm: (password) => {
            return new Promise((resolve) => {
                setTimeout(function () {
                    $.ajax(
                        {
                            type: "post",
                            url: "/user/password/check",
                            data: {
                                "password": password,
                                "_token": token
                            },
                            success: function (response) {
                                if (response === "success") {
                                    let grades = $(".grades");

                                    for (let i = 0; i < grades.length; i++) {
                                        grades[i].removeAttr("readonly");
                                    }
                                    resolve("Correct Password");
                                } else {
                                    resolve("Wrong Password");
                                }
                            },
                        });

                }, 1000)
            })
        }
    }).then((result) => {
        if (result.value === "Correct Password") {
            swal({
                type: "success",
                title: "Grades Unlocked"
            });
        } else if (result.value === "Wrong Password") {
            swal({
                type: "error",
                title: "Wrong Password"
            });
        }
    });
}

function changePassword() {
    var steps = [
        {
            title: "Enter Current Password",
            /*text: ""*/
        }, {
            title: "Enter New Password",
        }, {
            title: "Re-Enter New Password",
        }
    ];

    swal.setDefaults({
        input: 'password',
        confirmButtonText: 'Next &rarr;',
        showCancelButton: true,
        progressSteps: ['1', '2', '3'],
        showLoaderOnConfirm: true,
        preConfirm: (value) => {
            return new Promise((resolve) => {
                setTimeout(() => {
                    if (value === '') {
                        swal.showValidationError(
                            'Please Input Something.'
                        )
                    }
                    resolve()
                }, 1000)
            })
        },
        allowOutsideClick: () => !swal.isLoading()
    });

    swal.queue(steps).then((result) => {
        if (result.value) {

            $.ajax({
                type: "post",
                url: "/account/password",
                data: {
                    "result": result,
                    "_token": token
                },
                success: function (response) {
                    if (response === "Success") {
                        swal({
                            title: "Success!",
                            html: "Password Change Successfully",
                            type: "success",
                            confirmButtonText: "Ok",
                            showCancelButton: false
                        });
                    } else if (response !== "Success") {
                        swal({
                            title: "Failed!",
                            html: "" + response,
                            type: "error",
                            confirmButtonText: "Ok",
                            showCancelButton: false
                        }).then(function () {
                            changePassword(response);
                        });
                    }
                },
            });
        }
    }).catch(swal.noop);
}

function resetPassword(id) {
    swal({
        title: "Are you sure?",
        text: "Reset User Password?",
        type: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Confirm",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "/admin/account/reset",
                type: "POST",
                data: {
                    "_token": token,
                    "id": id
                },
                success: function () {
                    swal({
                        title: "Success!",
                        html: "Password Reset Successfully",
                        type: "success",
                        confirmButtonText: "Ok",
                        showCancelButton: false
                    }).catch(swal.noop);
                }
            });
        }
    }).catch(swal.noop);
}

function deleteFile(filename, id) {
    swal({
        title: 'Are you sure?',
        text: 'Delete "' + filename + '" File?',
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: '/file/delete',
                type: 'POST',
                data: {
                    "id": id,
                    "filename": filename,
                    "_token": token
                },
                success: function () {
                    swal(
                        'Success!',
                        'File ' + filename + ' Deleted',
                        'success'
                    ).then(function () {
                        location.reload();
                    });
                }
            });
        }
    }).catch(swal.noop);
}

function readFileToUpload(input) {
    var filename = input.value.split('\\').pop();
    $('#filename').val(filename);
}

function clearLogs(id) {
    swal({
        title: 'Clear Log Activity?',
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: '/account/' + id + '/logs/clear',
                type: 'POST',
                data: {
                    "id": id,
                    "_token": token
                },
                success: function () {
                    swal(
                        'Success!',
                        'Logs Cleared Successfully',
                        'success'
                    ).then(function () {
                        location.reload();
                    });
                }
            });
        }
    }).catch(swal.noop);
}

function viewLog(url, info) {

    if (info === "Login") {
        info = "Login Activity";
    } else if (info === "Reset Password") {
        info = "Reset Password";
    } else if (info === "Grades") {
        info = "Grade Update";
    }

    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
            $("#modal-table-title").html(info);
            $("#modal-table-body").html(response);
        }
    });
}

function passwordReset() {
    swal({
        title: "Enter Account Email Address",
        input: "email",
        inputPlaceholder: 'Enter your email address',
        confirmButtonText: "Submit",
        showCancelButton: true,
        showLoaderOnConfirm: true,
        allowOutsideClick: false,
        inputValidator: (value) => {
            return new Promise((resolve) => {
                if (value) {
                    resolve()
                } else {
                    resolve("Enter your email address!")
                }
            })
        },
        preConfirm: (email) => {
            return new Promise((resolve) => {
                setTimeout(function () {
                    $.ajax(
                        {
                            type: "POST",
                            url: "/password/reset",
                            data: {
                                "email": email,
                                "_token": token
                            },
                            success: function (response) {
                                if (response === "success") {
                                    resolve("Reset Token Email Sent!");
                                } else if (response === "failed") {
                                    resolve("Email Not Found!");
                                } else if (response === "error") {
                                    resolve("Server Error!");
                                }
                            },
                        });

                }, 1000)
            })
        }
    }).then((result) => {
        if (result.value === "Reset Token Email Sent!") {
            swal({
                title: "Enter Token",
                input: "text",
                inputPlaceholder: 'Enter Token',
                confirmButtonText: "Submit",
                showCancelButton: true,
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        if (value) {
                            resolve()
                        } else {
                            resolve("Enter Token")
                        }
                    })
                },
                preConfirm: (remember_token) => {
                    return new Promise((resolve) => {
                        setTimeout(function () {
                            $.ajax(
                                {
                                    type: "GET",
                                    url: "/password/reset",
                                    data: {
                                        "token": remember_token,
                                        "_token": token
                                    },
                                    success: function (response) {
                                        if (response !== "failed") {
                                            resolve(response);
                                        } else {
                                            resolve("Reset token is incorrect!");
                                        }
                                    },
                                });

                        }, 1000)
                    })
                }
            }).then((result) => {
                if (result.value) {
                    if (result.value !== "Reset token is incorrect!") {
                        swal({
                            type: "success",
                            title: "Password Reset to Default Password: " + result.value
                        });
                    } else if (result.value === "Reset token is incorrect!") {
                        swal({
                            type: "error",
                            title: result.value
                        });
                    }
                }
            });
        } else if (result.value === "Email Not Found!") {
            swal({
                type: "error",
                title: result.value
            });
        } else if (result.value === "Server Error!") {
            swal({
                type: "error",
                title: "Email Server Error",
                html: "<h4>Reset token not sent.</h4> \n <h4>Administrator Notified for reset.</h4>"
            });
        }
    });
} /* ok */

function system_configuration(field_name, field_value = '') {
    $.ajax({
        url: "/settings",
        type: "POST",
        data: {
            "_token": token,
            "_method": "PATCH",
            "field_name": field_name,
            "field_value": field_value
        },
        success: function (response) {
            field_name = field_name.replace("_enabled", " ");
            field_name = field_name.replace("_", " ");
            field_name = field_name.charAt(0).toUpperCase() + field_name.slice(1);

            if (response === "true") {
                toastr.success(field_name + ' setting updated successfully!', 'Settings Update!', {
                    positionClass: 'toast-bottom-right',
                    containerId: 'toast-bottom-right'
                });
            } else {
                toastr.error(field_name + ' ' + response, 'Settings Update Failed!', {
                    positionClass: 'toast-bottom-right',
                    containerId: 'toast-bottom-right'
                });
            }
        }
    });
}

function schoolyear_create() {
    let public_schoolyear = "";
    swal({
        title: "New School Year",
        input: "text",
        inputPlaceholder: 'Enter New School Year',
        confirmButtonText: "Submit",
        showCancelButton: true,
        showLoaderOnConfirm: true,
        allowOutsideClick: false,
        inputValidator: (value) => {
            return new Promise((resolve) => {
                if (value) {
                    resolve()
                } else {
                    resolve("Enter New School Year")
                }
            })
        },

        preConfirm: (schoolyear) => { /* check schoolyear if already in the database */
            public_schoolyear = schoolyear;
            return new Promise((resolve) => {
                setTimeout(function () {
                    $.ajax(
                        {
                            url: "/admin/schoolyear/check",
                            type: "POST",
                            data: {
                                "schoolyear": schoolyear,
                                "_token": token
                            },
                            success: function (response) {
                                if (response === "false") {/* if not already in the database then create new schoolyear */
                                    $.ajax({
                                        url: '/admin/schoolyear/create',
                                        type: 'POST',
                                        data: {
                                            "schoolyear": schoolyear,
                                            "_token": token
                                        },
                                        success: function (res) {
                                            resolve("School Year Created!");
                                        }
                                    });
                                } else {
                                    resolve("School Year Already in the Database!");
                                }
                            },
                        });

                }, 1000)
            })
        }
    }).then((result) => {
        if (result.value === "School Year Created!") {
            schoolyear_action(public_schoolyear, 'activate');
        }

        if (result.value === "School Year Already in the Database!") {
            swal({
                type: "error",
                title: result.value
            }).catch(swal.noop);
        }
    });
}

function schoolyear_action(schoolyear, method) {
    let type = 'question', method2 = method.charAt(0).toUpperCase() + method.slice(1);
    if (method === 'delete') {
        type = 'warning';
    }

    swal({
        title: method2 + " School Year " + schoolyear + "?",
        type: type,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: '/admin/schoolyear/' + method,
                type: 'POST',
                data: {
                    "schoolyear": schoolyear,
                    "_token": token
                },
                success: function () {
                    swal(
                        'Success!',
                        'School Year ' + schoolyear + ' ' + method2 + 'd!',
                        'success'
                    ).then(function () {
                        if (method === 'delete') {
                            location.href.replace('admin/schoolyear');
                        }
                        location.reload();
                    });
                }
            });
        } else {
            location.reload();
        }
    }).catch(swal.noop);
}

function activate(schoolyear) {
    $.ajax({
        url: "/admin/schoolyear/activate",
        type: "POST",
        data: {
            "_token": token,
            "schoolyear": schoolyear
        },
        success: function () {
            location.reload();
        }
    });
}

function changeImage(input) {
    if (input.files[0].size > 2097152) {
        alert("File is too big!");
    } else {
        let img = $("#avatar-img");
        let url = input.value;
        let ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();

        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
            let reader = new FileReader();
            reader.onload = function (e) {
                img.attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            console.log(url);
        } else {
            img.attr("src", img.getAttribute("src"));
        }
    }
}

function removeImage() {
    $('#removeAvatar').val('true');
    $('#avatar').val('');
    $('#avatar-img').attr('src', '{{ profile_image() }}');
}

function announcement_create() {
    let public_schoolyear = "";
    swal({
        title: "New Announcement",
        input: "text",
        inputPlaceholder: 'Announcement',
        confirmButtonText: "Submit",
        showCancelButton: true,
        showLoaderOnConfirm: true,
        allowOutsideClick: false,
        inputValidator: (value) => {
            return new Promise((resolve) => {
                if (value) {
                    resolve()
                } else {
                    resolve("Enter New School Year")
                }
            })
        },
    }).then((result) => {
        if (result.value === "School Year Created!") {
            schoolyear_action(public_schoolyear, 'activate');
        }

        if (result.value === "School Year Already in the Database!") {
            swal({
                type: "error",
                title: result.value
            }).catch(swal.noop);
        }
    });
}

function runFunction(url, variables) {
    $.ajax({
        url: url,
        type: "POST",
        data: {
            "_token": token,
            "variables": variables
        },
        success: function () {
            location.reload();
        }
    });
}
