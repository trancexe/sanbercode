@extends('master')

@push('style')

@endpush

@push('script')

@endpush
@section('content')
<div class="card">
  <div class="card-header">
    <form action="{{route('pertanyaan.update',[$pertanyaan->id])}}" method="POST">
        @csrf
        @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Judul</label>
          <input type="text" class="form-control" id="tittle" name="tittle" placeholder="Judul" value="{{$pertanyaan->tittle}}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Isi</label>
          <textarea class="form-control" rows="3" placeholder="Isi Pertanyaan" id="content" name="content" >{{$pertanyaan->content}}</textarea>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-sm btn-success">Submit</button>
        <a href="{{route('pertanyaan.index')}}" class="btn btn-sm btn-primary">Kembali</a>
      </div>    
    </form>
    @endsection