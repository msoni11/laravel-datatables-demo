@extends('datatables.template')

@section('demo')
<div class="row">
    <div class="col-md-12">
        <table id="users-table" class="table table-condensed">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('controller')
    public function getBasic()
    {
        return view('datatables.collection.basic');
    }

    public function getBasicData()
    {
        $users = User::select(['id', 'name', 'email', 'created_at', 'updated_at'])->get();

        return Datatables::of($users)->make();
    }
@endsection

@section('js')
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/collection/basic-data'
    });
@endsection