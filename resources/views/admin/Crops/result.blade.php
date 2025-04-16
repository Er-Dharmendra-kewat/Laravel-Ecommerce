@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4>Disease Detection Result</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Detection Status: <span class="badge bg-info">{{ $response['status'] }}</span></h5>

            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>Model Version:</strong> {{ $response['model_version'] }}</li>
                <li class="list-group-item"><strong>Access Token:</strong> {{ $response['access_token'] }}</li>
                <li class="list-group-item"><strong>Client SLA Compliant:</strong> {{ $response['sla_compliant_client'] ? 'Yes' : 'No' }}</li>
                <li class="list-group-item"><strong>System SLA Compliant:</strong> {{ $response['sla_compliant_system'] ? 'Yes' : 'No' }}</li>
                <li class="list-group-item"><strong>Created At:</strong> {{ date('Y-m-d H:i:s', $response['created']) }}</li>
                <li class="list-group-item"><strong>Completed At:</strong> {{ date('Y-m-d H:i:s', $response['completed']) }}</li>
            </ul>

            <h5>Input Details</h5>
            <ul class="list-group mb-3">
                @foreach($response['input'] as $key => $value)
                    <li class="list-group-item"><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</li>
                @endforeach
            </ul>

            <h5>Result</h5>
            <ul class="list-group">
                <li class="list-group-item"><strong>Disease:</strong> {{ $response['result']['disease'] }}</li>
                <li class="list-group-item"><strong>Confidence:</strong> {{ $response['result']['confidence'] * 100 }}%</li>
                <li class="list-group-item"><strong>Recommendation:</strong> {{ $response['result']['recommendation'] }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
