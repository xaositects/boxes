@extends ('layouts.master') 
@section ('content')

<div class="row">
    <div class="col l12 m12 s12">

        <div class="card">
            <div class="card-content">
                <h5><span class="card-title">Stash Types</span></h5>
                
                <table class="striped">
                    <tbody>
                        <tr>
                            <th><a class="btn waves waves-effect sa-add-btn undefined" href="/create-stash-type"><i class="material-icons left">add_box</i></a>
                            <th>
                            <th>Name
                            <th>Rank
                            <th>Created At
                            <th>Updated At</th>

                        @foreach($stashtypes as $stashtype)
                        <tr>
                            <td><form method="post" action="/delete-stash-type/{{ $stashtype->id }}">{{ csrf_field() }}<button class="btn waves waves-effect sa-del-btn undefined" type="submit"><i class="material-icons left">delete</i></button></form>
                            <td><a class="btn waves waves-effect sa-del-btn undefined" href="/update-stash-type/{{ $stashtype->id }}"><i class="material-icons left">mode_edit</i></button></a>
                            <td>{{ $stashtype->name }}
                            <td>{{ $stashtype->rank }}
                            <td>{{ $stashtype->created_at }}
                            <td>{{ $stashtype->updated_at }}
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 