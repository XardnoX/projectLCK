<!DOCTYPE html>
<html>
<head>
@extends('layouts.app')
@foreach ($diskuse as $diskus)
    <title>diskuse - {{ $diskus->datum }}</title>
    @endforeach
</head>
<body>
    <div class="container">
        <h1 class="my-4">Diskuse</h1>
        @if($diskuse->isEmpty())
            <div class="alert alert-warning">No discussions found.</div>
        @else
            @foreach ($diskuse as $diskus)
                <div class="card mb-3">
                    <div class="card-header">
                        <strong>{{ $diskus->user->prezdivka }}</strong> - <span>{{ $diskus->datum }}</span>
                    </div>
                    <div class="card-body">
                        <p>{{ $diskus->obsah }}</p>

                    </div>
                </div>
            @endforeach
        @endif
    </div>
    
</body>
</html>
