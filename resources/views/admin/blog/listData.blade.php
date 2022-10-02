@extends('admin.layout.default')
@section('title', 'Blog')
@section('content')

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Blog </h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <a href="{{ route('blog.create') }}" class="btn btn-danger btn-rounded">Add New</a>

                </ul>
            </div>
        </div>
        <hr>
        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Descripton</th>
                    <th>Thamnail</th>
                    <th>status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($blogs))
                    @foreach ($blogs as $key => $blog)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $blog->name }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->description }}</td>
                            <td>
                                <img class="img-fluid" height="120px" width="150px"
                                    src="{{ asset('upload/blogTham/' . $blog->thumbnail) }}" alt="">
                            </td>

                            <td>

                                @if ($blog->valid == 1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">In Active</span>
                                @endif
                            </td>


                            <td class="text-center">
                                <a href="{{ route('blog.edit', $blog->id) }}"><i class=" icon-pencil5"></i></a>

                                <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"><i class=" icon-trash"></i></button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">NO data found</td>
                    </tr>
                @endif

            </tbody>
        </table>

    </div>

@endsection
