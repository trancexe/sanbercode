@extends('master')

@push('style')
<link rel="stylesheet" href="{{ asset('public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush

@push('script')
<script src="{{asset('public/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
  $(function () {
    $("#datatables").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@endpush
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Daftar Pertanyaan</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12 text-left">
            <a
            href="{{route('pertanyaan.create')}}"
            class="btn btn-primary">Buat Pertanyaan</a>
          </div>
        </div>
        <br>
        <table id="datatables" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>id</th>
              <th>Judul</th>
              <th>Isi</th>
              <th>Action</th>
            </tr>
          </thead>
          @foreach($pertanyaan as $tanya)
          <tr>
            <td>{{$tanya->id}}</td>
            <td>{{$tanya->tittle}}</td>
            <td>{{$tanya->content}}</td>
            <td><a
              href="{{route('pertanyaan.edit', [$tanya->id])}}"
              class="btn btn-info btn-sm"
              > Lihat Jawaban </a></td>
            </tr>
            @endforeach
            <tbody>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{-- <div class="card-footer">
          Footer
        </div> --}}
        <!-- /.card-footer-->
      </div>
      @endsection