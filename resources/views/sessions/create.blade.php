@extends ('layouts.master') 
@section ('content')
    <div class="row">
        <div class="col l6 offset-l3 m12 s12">
            <form class="ui large form" method="post" action="/login">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-content">
                        <h5><span class="card-title">Login to Your Account</span></h5>
                        <div class="input-field">
                            <i class="material-icons prefix">mail</i><input class="form-control" type="email" name="email" autocomplete="off"><label for="email" class="active">Email Address</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">lock</i><input class="form-control" type="password" name="password" autocomplete="off" ><label for="password" class="active">Password</label>
                        </div>
                    </div>
                    <div class="card-action">
                        <div class="input-field">
                            <button class="btn waves waves-effect-light grey" type="submit" value="Submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
