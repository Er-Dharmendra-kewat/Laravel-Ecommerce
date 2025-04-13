@extends('layouts.admin')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4>Upload Crop Image for Disease Detection</h4>
                    </div>

                    <form action="{{ url('/detect-crop') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="image">Upload Crop Image:</label>
                        <input type="file" name="image" id="image" required>
                        <button type="submit">Detect Crop Disease</button>
                    </form>


                </div>
            </div>

        </div>
    </div>
@endsection
