@extends('admin.index')
@section('thamb')
    <div class="card">
        <div class="card-header" id="topCard">
            <h5>Musicas</h5>
            <a href="#" class="text-secondary">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Ano</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i =1
                    @endphp
                    @foreach (App\Models\Musica::all() as $item)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$item->titulo}}</td>
                            <td>{{$item->autor}}</td>
                            <td>{{$item->ano}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection