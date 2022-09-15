@extends('admin.layout.default')
@section('title', 'Blog Category')
@section('content')

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Blog Category</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <a href="{{ route('blogCategory.create') }}" class="btn btn-danger btn-rounded">Add New</a>

                </ul>
            </div>
        </div>
        <hr>
        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($blogCategories))
                    @foreach ($blogCategories as $key => $category)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $category->name }}</td>
                            <td>

                                @if ($category->valid == 1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">In Active</span>
                                @endif
                            </td>


                            <td class="text-center">
                                <a href="{{ route('blogCategory.edit', $category->id) }}"><i class=" icon-pencil5"></i></a>

                                <form action="{{ route('blogCategory.destroy', $category->id) }}" method="POST">
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
