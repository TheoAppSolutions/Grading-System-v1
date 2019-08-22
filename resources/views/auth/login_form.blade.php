<section class="login_content">
    <img src="{{ config('app.logo') }}" style="width: 200px; height: 200px;"/>
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <h1>Login</h1>
        <user-list old="{{ old('id') }}" name="id"></user-list>
        <br>
        <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
        <button type="submit" class="btn btn-success">Log in</button>
        <div class="clearfix"></div>
        <div class="separator">
            <div class="clearfix"></div>
            <button type="button" onclick="passwordReset();" class="btn btn-danger btn-xs pull-right">Reset Password
            </button>
            <br/>
            @if (count($errors) > 0)
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{!! $error !!}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </form>
</section>
