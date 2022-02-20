@extends('admin.template.master')

@section('content')

      @include('admin.pattern.header', ['page' => 'Manage'])



      <div class="br-pagebody">
        <div class="br-section-wrapper">

          <div class="table-wrapper table-responsive">
            <table id="datatable3" class="table display nowrap">
              <thead>
                <tr>
                  <th class="">#</th>
                  <th class="">Image</th>
                  <th class="">Name</th>
                  <th class="">Slug</th>
                  <th class="">Brand</th>
                  <th class="">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach (App\Models\Pattern::orderBy('id', 'asc')->get() as $pattern)

                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td><img src="{{ $pattern->tyreImages->count() > 0 ? asset('pattern/100/' . $pattern->tyreImages[0]->image ) : '' }}" width="30" alt=""></td>
                  <td>{{ $pattern->name }}</td>
                  <td>{{ $pattern->slug }}</td>
                  <td>{{ $pattern->brand ? $pattern->brand->name : '' }}</td>
                  <td>
                    <a href="{{ url('admin/pattern/edit', $pattern->id) }}" class="btn btn-teal btn-sm" data-toggle="tooltip-info" data-placement="top" title="Edit"><i class="fa fa-pen" ></i></a>
                    <a href="{{ url('admin/pattern/image', $pattern->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip-info" data-placement="top" title="Manage Images"><i class="fa fa-images" ></i></a>
                    <form action="{{ url('admin/pattern/delete', $pattern->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete?')">
                      @csrf                      
                      <button class="btn btn-danger btn-sm d-inline" data-toggle="tooltip-info" data-placement="top" title="Delete"><i class="fa fa-trash-alt" ></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach 
              </tbody>
            </table>
          </div><!-- table-wrapper -->

        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->


@endsection



