@extends('layouts.admin.app')

@section('title', 'Slider')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Slider</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Slider List</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <a href="{{ route('slider.create') }}" class="btn btn-success">
                                    <i class="fa fa-plus-circle"></i>
                                    <span>Create New Slider</span>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Image</th>
                                        <th>Update Time</th>
                                        <th>Published</th>
                                        <th>Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sliders as $key => $slider)
                                        <tr>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->link }}</td>
                                            <td>{{ $slider->image }}</td>
                                            <td>{{ $slider->updated_at }}</td>
                                            <td>
                                                @if($slider->published)
                                                    <a class="btn btn-success" href="{{ route('slider.published', $slider->id) }}">Pushlished</a>
                                                @else
                                                    <a class="btn btn-danger" href="{{ route('slider.published', $slider->id) }}">Not Pushlished</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('slider.edit', $slider->id) }}"
                                                    class="btn btn-info btn-circle btn-sm">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                                <form method="POST" class="d-inline-block" action="{{ route('slider.destroy', $slider->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-circle btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>                                                
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous">
                                        <a class="page-link" href="{{ $firstPageUrl }}">First</a>
                                    </li>
                                    @php
                                    $lastPage = min($currentPage + 5, $lastPage)
                                    @endphp
                                    @for($i = $currentPage; $i <= $lastPage; $i++)
                                        @if($i == $currentPage)
                                            <li class="paginate_button page-item active">
                                                <a class="page-link" href="#">{{ $i }}</a>
                                            </li>
                                        @else
                                            <li class="paginate_button page-item">
                                                <a class="page-link" href="{{ $path . '?page=' . $i }}">{{ $i }}</a>
                                            </li>
                                        @endif
                                    @endfor
                                    <li class="paginate_button page-item next">
                                        <a class="page-link" href="{{ $lastPageUrl }}">Last</a>
                                    </li>
                                </ul>                                    
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
