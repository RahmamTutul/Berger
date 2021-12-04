@extends('backend.app')

@push('css')
    
@endpush
@section('content')
<div class="col-lg-10 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Paints Table</h4> 
          <p class="card-description">
              <a href="{{ url('paint/add') }}" style="font-weight:600" class="btn btn-lg btn-outline-dribbble">ADD New</a>
          </p>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>
                    Image
                  </th>
                  <th>
                    Title
                  </th>
                  <th>
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($paints as $paint)
                    <tr>
                      <td class="py-1">
                          <img src="{{ asset('storage/images/paint/'.$paint['image']) }}" alt="image"/>
                      </td>
                      <td>
                      {{ $paint['title'] }}
                      </td>
                      <td>
                          <a href="{{ url('paint/edit', $paint['id']) }}" title="Edit"><i class="mdi mdi-credit-card-off"></i></a> | &nbsp;
                          <a href="{{ url('paint/delete',$paint['id']) }}" class="confirmDelete" name="Paint" title="Delete"><i class="mdi mdi-delete-sweep"></i></a>
                        
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection
@push('css')
    
@endpush
