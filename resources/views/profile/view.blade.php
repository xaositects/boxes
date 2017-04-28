@extends ('layouts.master') 
@section ('content')
<div class="container green profile-header">
    <div class="row">
        <div class="col l5 hide-on-small-only"></div>
        <div class="col l2 s12 profile-image-container">
            <br class="hide-on-small-only">
            <div class="profile-image-outer">
                <a href="/profile"><img class="circle profile-image-inner" src="/uploads/1/nny3_png"></a>
            </div>
        </div>
        <div class="col l5 hide-on-small-only"></div>
    </div>
</div>
@endsection
@yield('profile-content')