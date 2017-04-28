@extends ('layouts.master') 
@section ('content')
    <div class="row">
        <div class="col l6 offset-l3 m12 s12">
            <form method="post" action="/register" id="sign_up_form" name="sign_up_form">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-content">
                        <h5><span class="card-title">Sign Up for StaShow</span></h5>
                        <div class="row">
                            <div class="col l6 m12 s12">
                                <div class="input-field">
                                    <i class="material-icons prefix">person</i><input type="text" id="firstname" name="firstname" required ><label for="firstname" class="active">First Name</label>
                                </div>
                            </div>
                            <div class="col l6 m12 s12">
                                <div class="input-field">
                                    <input type="text" id="lastname" name="lastname" required><label for="lastname" class="active">Last Name</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-field">
                            <i class="material-icons prefix">mail</i><input type="email" id="email" name="email" required><label for="email" class="active">Email Address</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">lock</i><input type="password" id="password" name="password" data-error="Your password must be 8-32 characters and contain at least 1 number, 1 upper case letter, and 1 lower case letter" required="" pattern="^(?=.{8,32}$)(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).*" ><label for="password" class="active">Password</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">lock</i><input type="password" id="password_confirmation" name="password_confirmation" required="" ><label for="password_confirmation" class="active">Password (again)</label>
                        </div>
                    </div>
                    <div class="card-action">
                        <div class="input-field">
                            <button class="btn waves waves-effect-light grey" type="submit" value="Submit" id="sign_up_btn">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

