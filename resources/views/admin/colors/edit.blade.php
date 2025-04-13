@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">

            @if (@session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Add Color
                        <a href="{{ url('admin/colors') }}" class="btn btn-sm btn-danger text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/colors/'.$colors->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        @method('PUT')

                        <div class="mb-3">
                            <label>Color Name</label>
                            <input type="text" name="name" value="{{$colors->name}}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Code Name</label>
                            <input type="text" name="code" value="{{$colors->code}}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Status</label><br>
                            <input type="checkbox" name="status" value="{{$colors->status=='1' ? 'Hidden':'Visible'}}" style="width: 30px;height:30px;">
                            Checked=Hidden,UnChecked=Visible
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
