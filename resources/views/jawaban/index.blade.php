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
    {{-- <h3 class="card-title">Jawaban</h3> --}}

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
            <div class="row">
              <div class="col-12 col-sm-12">
                <div class="info-box bg-light">

                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted"><h3>{{$question['tittle']}}</h3></span>
                    <span class="info-box-number text-center text-muted mb-0"><h2>{{$question['content']}}</h2></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <h4>Jawaban</h4>
                @foreach($answer as $jawab)
                <div class="post">
                  {{-- <div class="user-block">
                    <span class="username">
                      <a href="#">Jonathan Burke Jr.</a>
                    </span>
                    <span class="description">Shared publicly - 7:45 PM today</span>
                  </div> --}}
                  <!-- /.user-block -->
                  <div class="row">
                    <div class="col-md-9">
                      <p>
                        {{$jawab->content}}
                      </p>
                    </div>
                    <div class="col-md-3 " >
                      <form
                      method="POST"
                      class="d-inline"
                      onsubmit="return confirm('Move book to trash?')"
                      action="{{route('jawaban.destroy', [$jawab->id])}}"
                      >@csrf
                      <input
                      type="hidden"
                      value="DELETE"
                      name="_method">
                      <button type="sumbit" class="btn float-right shadow-none" value="Trash">
                        <a class="" href="{{ route('jawaban.index', [$jawab->id_question  ])}}">
                          <i class="fas fa-trash"></i>
                        </a>
                      </button>
                      {{-- <input
                        type="submit"
                        value="Trash"
                        class="btn btn-app"> --}}
                      </form>
                      <p class='float-right'>
                        <button type="sumbit" class="btn float-right shadow-none" value="Trash">
                          <a class="" href="{{ route('jawaban.edit',$jawab->id)}}">
                            <i class="fas fa-edit"></i>
                          </a>
                        </button>
                      </p>
                    </div>
                  </div>
                </div>
                @endforeach
                <div>
                </div>
              </div>
            </div>

            <div class="text-center mt-5 mb-3">
              <form action="{{route('jawaban.store')}}" method="POST">
                @csrf
                <input type="hidden" name="id_question" value="{{$question['id']}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jawab</label>
                    <textarea class="form-control" rows="3" placeholder="Isi Jawawan" id="jawaban" name="content"></textarea>
                  </div>
                </div>
                
                <a href="{{route('pertanyaan.index')}}" class="btn btn-sm btn-primary">Kembali</a>
                <button type="submit" class="btn btn-sm btn-success">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    @endsection