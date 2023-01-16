@extends('admin.index')
@section('thamb')
    <div class="card">
        <div class="card-header" id="topCard">
            <h5>Musicas</h5>
            <a href="#Musicas" class="text-secondary" data-bs-toggle="modal">
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i =1
                    @endphp
                    @foreach (App\Models\Musica::all() as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->titulo}}</td>
                            <td>{{$item->autor}}</td>
                            <td>{{$item->ano}}</td>
                            <td>
                                <a href="" class="bts"><i class="fas fa-edit"></i></a>
                                <a href="" class="bts"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="Musicas" tabindex="-1"  data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Cadastro de Musicas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('musica.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-3">
                        <div class="col-6">
                            <label for="" class="mb-2">Capa da Música</label>
                            <input type="file" name="capa" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="" class="mb-2">Ficheiro da Música</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-6">
                            <label for="" class="mb-2">Autor</label>
                            <input type="text" name="autor" placeholder="autor da música" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="" class="mb-2">Título</label>
                            <input type="text" name="titulo" placeholder="Titulo da música" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-6">
                            <label for="" class="mb-2">Ano de Produção</label>
                            <input type="number" name="ano" placeholder="ano de produção" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="" class="mb-2">Fita</label>
                            <select name="fita_id" id="" class="form-control">
                                @foreach (App\Models\Fita::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="display: flex; justify-content: end;">
                        <button class="btn btn-success" type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection