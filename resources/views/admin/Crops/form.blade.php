@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-9">

            @if (@session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Upload Crops Image
                        <a href="{{ url('admin/colors') }}" class="btn btn-sm btn-danger text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/image-upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="file" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
