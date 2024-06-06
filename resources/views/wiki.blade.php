<!DOCTYPE html>
<html>
<head>
@extends('layouts.app')
    <title>{{ $stranka->nazev }}</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container my-4">
        <h1>{{ $stranka->nazev }}</h1>
        <div class="row">
            <div class="col-md-8">
            <p>Kategorie:
            @foreach($stranka->kategorie as $kategorium)
                {{ $kategorium->nazev }}@if(!$loop->last), @endif
            @endforeach
        </p>
                <a href="{{ url('diskuse/' . $stranka->id) }}" class="btn btn-primary mb-3 text-right">Odkaz na diskusi</a>
            </div>
            <div class="col-md-4">
                
            <a href="{{ url('obrazek/'. $stranka->id) }}" class="btn btn-primary mb-3 text-right">Odkaz na obrázek</a>

            </div>
        </div>
        
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Popis editace</th>
                    <th>Datum editace</th>
                </tr>
            </thead>
            <tbody>
                @foreach($historieEditace as $editace)
                <tr>
                    <td>{{ $editace->popis_editace }}</td>
                    <td>{{ $editace->datum_editace }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
         
            
      
    </div>
    <footer style=" position: fixed;left: 0;bottom: 0;width: 100%;background-color: blue;color: white;text-align: center;" class="margin-bottom">Datum založení stránky: {{ $stranka->datum_vytvoreni }} | Verze editace: {{ $editace->verze }}</footer>
       
    
</body>
</html>
