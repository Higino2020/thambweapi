@extends('admin.index')
@section('thamb')
    <div class="card">
        <div class="card-header" id="topCard">
            <h5>Galeria</h5>
            <a href="#Galeria" class="text-secondary" data-bs-toggle="modal">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Ano</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i =1
                    @endphp
                    @foreach (App\Models\Imagem::all() as $item)
                        <tr>
                            <td>
                                <img src="{{ url('getfile/' . $item->file) }}" style="width: 100px" alt="">
                            </td>
                            <td>{{$item->titulo}}</td>
                            <td>{{$item->ano}}</td>
                            <td>
                                <a href="" class="bts"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('galeria.show',$item->id) }}" class="bts"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="Galeria" tabindex="-1"  data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Cadastro de Imagens</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('galeria.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-3">
                            <div class="col-6">
                                <label for="" class="mb-2">Imagem</label>
                                <input type="file" name="file" accept="image/*" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="" class="mb-2">T??tulo</label>
                                <input type="text" name="titulo" placeholder="Titulo da m??sica" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-6">
                                <label for="" class="mb-2">Ano de Produ????o</label>
                                <input type="number" name="ano" placeholder="ano de produ????o" class="form-control">
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