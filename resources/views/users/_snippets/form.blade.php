<div class="row">
    <div class="col-12 col-md-6">
        <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="firstname">First Name <span
                        class="danger">*</span>: </label>
            <div class="col-md-9">
                <input type="text" id="firstname" value="{{  $user->firstname ?? old('firstname', '') }}"
                       class="form-control" min="1"
                       max="255" required
                       placeholder="First Name" name="firstname">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="lastname">Last Name <span class="danger">*</span>:</label>
            <div class="col-md-9">
                <input type="text" id="lastname" value="{{  $user->lastname ?? old('lastname', '') }}"
                       class="form-control" min="1"
                       max="255" required
                       placeholder="Last Name" name="lastname">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="middlename">Middle Name: </label>
            <div class="col-md-9">
                <input type="text" id="middlename" value="{{  $user->middlename ?? old('middlename', '') }}"
                       class="form-control"
                       max="1" placeholder="Middle Name" name="middlename">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="suffix">Suffix: </label>
            <div class="col-md-9">
                <input type="text" id="suffix" value="{{  $user->suffix ?? old('suffix', '') }}"
                       class="form-control" min="0"
                       placeholder="Suffix" name="suffix">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="birthdate">Birth Date: </label>
            <div class="col-md-9">
                <input type="date" id="birthdate" value="{{  $user->birthdate ?? old('birthdate', '') }}"
                       class="form-control" min="0"
                       placeholder="Birth Date:" name="birthdate">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control"
                   for="title">Honorifics :
                <span class="danger">*</span>
            </label>
            <div class="col-md-9">
                <select class="form-control" id="title" required name="title">
                    @if (isset($request->title))
                        @php($title = $request->old('title'))
                    @elseif (isset($user->title))
                        @php($title = $user->title)
                    @else
                        @php($title = '')
                    @endif
                    <option value=""></option>
                    <option value="Mr." {{ $title == "Mr." ? "selected" : "" }}>
                        Mr.
                    </option>
                    <option value="Ms." {{ $title == "Ms."  ? "selected" : ""}}>
                        Ms.
                    </option>
                    <option value="Mrs." {{ $title == "Mrs." ? "selected" : "" }}>
                        Mrs.
                    </option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <h4 class="form-section"><i class="ft-phone"></i> Contact Info</h4>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="email">Email Address :</label>
            <div class="col-md-9">
                <input type="email" id="email" value="{{  $user->email ?? old('email', '') }}"
                       class="form-control" min="0"
                       placeholder="Email Address" name="email">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="contact">Contact Number :</label>
            <div class="col-md-9">
                <input type="text" id="contact" value="{{  $user->contact ?? old('contact', '') }}"
                       class="form-control" min="0"
                       placeholder="Contact Number" name="contact">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="address">Home Address :</label>
            <div class="col-md-9">
                <input type="text" id="address" value="{{  $user->address ?? old('address', '') }}"
                       class="form-control" min="0"
                       placeholder="Home Address" name="address">
            </div>
        </div>
    </div>
</div>