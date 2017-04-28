@extends ('layouts.master') 
@section ('content')
  <div class="row">
    <div class="col l4 offset-l4 m12 s12">
      <form method="post" action="/create-profile">
          {{ csrf_field() }}
        <div class="card">
          <div class="card-content">
            <h5><span class="card-title">Create a {{ $app_name }} Profile</span></h5>
            <div class="input-field">
              <i class="material-icons prefix">face</i>
              <input type="text" name="firstname" placeholder="First Name" required />
              <input type="text" name="lastname" placeholder="Last Name" required />
            </div>
          </div>
          <div class="card-action">
            <div class="input-field">
              <button class="btn waves waves-effect-light grey" type="submit" value="Submit" id="new_profile_btn">Submit</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection 
@yield('profile-content')

