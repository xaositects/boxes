@extends ('layouts.master') 
@section ('content')
<form method="post" action="/create-profile-type">
    {{ csrf_field() }}
    <div class="row">
        <div class="col l12 m12 s12">
            <div class="card">
                <div class="card-content">
                    <h5><span class="card-title">Add a New User Profile Type</span></h5>
                    <div class="input-field">
                        <input type="text" id="name" name="name" value="" pattern="[a-zA-Z0-9_ -]+">
                        <label for="name">Name</label>
                    </div>
                    <div class="input-field">
                        <input type="number" id="rank" name="rank" value="" pattern="undefined">
                        <label for="rank">Rank</label>
                    </div>
                </div>
                <div class="card-action"><button class="btn waves waves-effect sa-add-btn undefined" type="submit"><i class="material-icons left">add_box</i></button></div>
            </div>
        </div>
    </div>
</form>
@endsection 
@yield('profile-content')