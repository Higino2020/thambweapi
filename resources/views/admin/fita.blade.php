@extends('admin.index')
@section('thamb')
    <div class="card">
        <div class="card-header" id="topCard">
            <h5>Volume</h5>
            <a href="#Volume" class="text-secondary" data-bs-toggle="modal">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Numero da Fita</th>
                        <th>Titulo do volume</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i =1
                    @endphp
                    @foreach (App\Models\Fita::all() as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->nome}}</td>
                            <td>{{$item->volume->titulo}}</td>
                            <td>
                                <a href="{{ route('fita.show',$item->id) }}" class="bts"><i class="fas fa-edit"></i></a>
                                <a href="" class="bts"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="Volume" tabindex="-1"  data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Nova Fita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('fita.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-3">
                        <div class="col-6">
                            <label for="" class="mb-2">Nome da Fita</label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome da fita">
                        </div>
                        <div class="col-6">
                            <label for="volume" class="mb-2">Volume</label>
                            <select name="volumes_id" class="form-control" id="volume">
                                @foreach (App\Models\Volume::all() as $volume)
                                    <option value="{{ $volume->id }}">{{ $volume->titulo }}</option>
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