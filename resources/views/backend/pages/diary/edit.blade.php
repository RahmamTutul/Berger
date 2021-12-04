@extends('backend.app')
@push('css')
    
@endpush
@section('content')
    <div class="col-md-6 grid-margin stretch-card m-auto">
              <div class="card">
                @if ($errors->any())
                  <div class="alert alert-danger">
                  <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                  </ul>
                  </div>
                @endif
                <div class="card-body">
                  <h4 class="card-title">EDIT DIARY INFO</h4>
                  <form class="forms-sample" action="{{ url('/diary/edit',$diary->id) }}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label" >Title</label>
                      <div class="col-sm-9">
                        <input name="title" type="text" class="form-control" id="exampleInputUsername2" value="{{ $diary->title }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Details</label>
                      <div class="col-sm-9">
                        <textarea name="details" class="form-control" id="exampleInputMobile"> {{ $diary->details }}</textarea>
                      </div>
                    </div>
                     <div class="form-group row">
                       <label for="exampleInputUsername2" class="col-sm-3 col-form-label" >Image</label>
                      <div class="col-sm-9">
                        <input name="image" type="file" class="form-control form-control-lg" title="Choose diary image">
                      </div>
                      <div class="col-sm-3 m-auto">
                        <img style="height: 100px; border-radius:5px; margin-top:20px" src="{{ asset('storage/images/diary/'.$diary->image) }}" alt="NO Image" srcset="">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>
@endsection
