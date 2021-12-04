@extends('backend.app')

@push('css')
    
@endpush
@section('content')
<div class="col-lg-10 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">diary Table</h4> 
          <p class="card-description">
              <a href="{{ url('diary/add') }}" style="font-weight:600" class="btn btn-lg btn-outline-dribbble">ADD New</a>
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
                    details
                  </th>
                  <th>
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($diaries as $diary)
                    <tr>
                      <td class="py-1">
                          <img src="{{ asset('storage/images/diary/'.$diary['image']) }}" alt="image"/>
                      </td>
                      <td>
                      {{ $diary['title'] }}
                      </td>
                      <td>
                          {{ $diary['details'] }}
                      </td>
                      <td>
                          <a href="{{ url('diary/edit', $diary['id']) }}" title="Edit"><i class="mdi mdi-credit-card-off"></i></a> | &nbsp;
                          <a href="{{ url('diary/delete',$diary['id']) }}" class="confirmDelete" name="diary" title="Delete"><i class="mdi mdi-delete-sweep"></i></a>
                        
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
