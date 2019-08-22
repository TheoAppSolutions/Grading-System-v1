<div id="register" class="animate form registration_form">
    <section class="login_content">
        <img src="{{ config('app.logo') }}" style="width: 200px; height: 200px;"/>
        <form class="form-horizontal" action="{{ route('register') }}" method="POST">
            {{ csrf_field() }}
            <h1>Create Account</h1>
            <div>
                <input name="name" type="text" class="form-control" placeholder="Username" required=""/>
            </div>
            <div>
                <input name="email" type="email" class="form-control" placeholder="Email" required=""/>
            </div>
            <div>
                <input name="password" type="password" class="form-control" placeholder="Password" required="" minlength="6"/>
            </div>
            <div>
                <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password"
                       required="" minlength="6"  />
            </div>
            <div>
                <button class="btn btn-default submit">Submit</button>
            </div>
            <div class="clearfix"></div>
            <div class="separator">
                <p class="change_link">Already a member ?
                    <a href="#signin" class="to_register"> Log in </a>
                </p>
                <div class="clearfix"></div>
                <br/>
                @if (count($errors) > 0)
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item list-group-item-warning">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </form>
    </section>
</div>
