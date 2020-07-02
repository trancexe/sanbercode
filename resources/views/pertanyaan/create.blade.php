@extends('master')

@push('style')

@endpush

@push('script')

@endpush
@section('content')
<div class="card">
  <div class="card-header">
    <form action="{{route('pertanyaan.store')}}" method="POST">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Judul</label>
          <input type="text" class="form-control" id="tittle" name="tittle" placeholder="Judul">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Isi</label>
          <textarea class="form-control" rows="3" placeholder="Isi Pertanyaan" id="content" name="content"></textarea>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>    
    </form>
    @endsection