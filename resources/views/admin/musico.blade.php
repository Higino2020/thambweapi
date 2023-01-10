@extends('admin.index')
@section('thamb')
    <div class="card">
        <div class="card-header" id="topCard">
            <h5>Artistas</h5>
            <a href="#Artista" data-bs-toggle="modal" class="text-secondary">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Autor</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i =1
                    @endphp
                    @foreach (App\Models\Artista::all() as $item)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$item->autor}}</td>
                            <td>{{$item->descricao}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="Artista" tabindex="-1"  data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Cadastro de Artistas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('artista.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-3">
                            <div class="col-6">
                                <label for="" class="mb-2">Imagem do Artista</label>
                                <input type="file" name="file" accept="image/*" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="" class="mb-2">Nome do Artista</label>
                                <input type="text" name="autor" placeholder="Nome do Artista" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-12">
                                <label for="" class="mb-2">Sobre o Artista</label> <br>
                                <textarea class="form-control" name="descricao" id="" cols="30" rows="4"></textarea>
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