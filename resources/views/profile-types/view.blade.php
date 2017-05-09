@extends ('layouts.master') 
@section ('content')
<div class="row">
    <div class="col l12 m12 s12">

        <div class="card">
            <div class="card-content">
                <h5><span class="card-title">User Profile Types</span></h5>
                
                <table class="striped">
                    <tbody>
                        <tr>
                            <th><a class="btn waves waves-effect sa-add-btn " href="{{ route('profile-types/create') }}"><i class="material-icons left">add_box</i></a>
                            <th>
                            <th>Name
                            <th>Rank
                            <th>Created At
                            <th>Updated At</th>

                        @foreach($profiletypes as $profiletype)
                        <tr>
                            <td><form method="post" action="{{ route('profile-types/delete', ['id' => $profiletype->id]) }}">{{ csrf_field() }}<button class="btn waves waves-effect sa-del-btn " type="submit"><i class="material-icons left">delete</i></button></form>
                            <td><a class="btn waves waves-effect sa-del-btn " href="{{ route('profile-types/update', ['id' => $profiletype->id]) }}"><i class="material-icons left">mode_edit</i></button></a>
                            <td>{{ $profiletype->name }}
                            <td>{{ $profiletype->rank }}
                            <td>{{ $profiletype->created_at }}
                            <td>{{ $profiletype->updated_at }}
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 