@extends('_layouts.main')

@section('content-title')
    Student Profile
@endsection

@section('content-breadcrumb')
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Student List</a>
                </li>
                <li class="breadcrumb-item active">Student Profile
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content-body')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content collpase show">
                    <div class="card-body">
                        <div class="card-title">
                            <p>Fields with
                                <span class="danger">*</span> are required fields.</p>
                        </div>

                        <h4 class="form-section"><i class="la la-image"></i> Profile Image</h4>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <div class="text-center">
                                        <img src="{{ url('images/logo.png') }}" class="img-circle"
                                             style="max-width: 200px; width: 100%;">
                                    </div>

                                    <div class="pull-right">
                                        <button class="btn btn-sm btn-warning">
                                            <i class="la la-image"></i>
                                            Change
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form class="form form-horizontal form-bordered" action="{{ route('student.update') }}"
                              method="POST">
                            @csrf

                            <div class="form-body">
                                <h4 class="form-section"><i class="la la-user"></i> Personal Information</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control"
                                                   for="userinput1">First Name :
                                                <span class="danger">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <input type="text" id="userinput1"
                                                       class="form-control required" required
                                                       placeholder="First Name" name="firstname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control"
                                                   for="userinput2">Last Name :
                                                <span class="danger">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <input type="text" id="userinput2"
                                                       class="form-control required" required
                                                       placeholder="Last Name" name="lastname">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput3">
                                                Middle Initial :
                                            </label>
                                            <div class="col-md-9">
                                                <input type="text" id="userinput3"
                                                       class="form-control"
                                                       placeholder="Middle Initial" name="username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="title">
                                                Gender :
                                                <span class="danger">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <select class="custom-select form-control required" id="title"
                                                        name="title" required>
                                                    <option value=""></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row last">
                                            <label class="col-md-3 label-control" for="userinput3">Date of Birth
                                                :</label>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control" id="date1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row last">
                                            <label class="col-md-3 label-control" for="userinput3">
                                                Grade level :
                                                <span class="danger">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <select class="custom-select form-control required" id="userinput3"
                                                        name="title" required>
                                                    <option value="">
                                                    </option>
                                                    <option value="Prep">Prep
                                                    </option>
                                                    <option value="Jr. Kindy">Jr. Kindy
                                                    </option>
                                                    <option value="1">1
                                                    </option>
                                                    <option value="2">2
                                                    </option>
                                                    <option value="3">3
                                                    </option>
                                                    <option value="4">4
                                                    </option>
                                                    <option value="5">5
                                                    </option>
                                                    <option value="6">6
                                                    </option>
                                                    <option value="7">7
                                                    </option>
                                                    <option value="8">8
                                                    </option>
                                                    <option value="9">9
                                                    </option>
                                                    <option value="10">10
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="form-section"><i class="ft-phone"></i> Contact Information</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput5">Email Address
                                                :</label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control" id="emailAddress1"
                                                       placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput6">Contact Number
                                                :</label>
                                            <div class="col-md-9">
                                                <input type="tel" class="form-control" id="phoneNumber1"
                                                       placeholder="Contact Number">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row last">
                                            <label class="col-md-3 label-control" for="userinput5">Home Address
                                                :</label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control" id="emailAddress1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
