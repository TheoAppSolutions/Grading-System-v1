<div id="reset" class="animate form registration_form">
    <section class="login_content">
        <img src="{{ config('app.logo') }}" style="width: 200px; height: 200px;"/>
        <form class="form-horizontal" action="{{ route('register') }}" method="POST">
            {{ csrf_field() }}
            <h1>Reset Account</h1>

            <div>
                <input name="email" type="email" class="form-control" placeholder="Email" required=""/>
            </div>
            <div>
                <button type="submit" class="btn btn-default">Send Email</button>
            </div>
        </form>
    </section>
</div>
