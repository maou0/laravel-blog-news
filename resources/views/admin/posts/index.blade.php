@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Список постов</h1>
                    </div><!-- /.col -->
                    <div class="container-fluid">
                        <h2 class="text-center display-4">Поиск</h2>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <form action="{{ route('admin.search.post') }}">
                                    <div class="input-group">
                                        <input type="search" class="form-control form-control-lg" name="search" placeholder="Введите слово для поиска поста по названию или содержанию">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-lg btn-default">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Посты</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-1 mb-3">
                        <a href="{{ route('admin.post.create') }}" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Название</th>
                                        <th class="text-center">Превью</th>
                                        <th class="text-center">Дата публикации</th>
                                        <th colspan="3" class="text-center">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td class="text-center">{{ $post->id }}</td>
                                            <td class="text-center">{{ $post->title }}</td>
                                            <td class="text-center"><img src="{{ asset('storage/' . $post->preview_image) }}" alt="preview_image" class="w-50"></td>
                                            <td class="text-center">{{ $post->created_at }}</td>
                                            <td class="text-center"><a href="{{ route('admin.post.show', $post->id) }}"><i
                                                        class="fa fa-solid fa-eye"></i></a></td>
                                            <td class="text-center"><a href="{{ route('admin.post.edit', $post->id) }}"
                                                   class="text-success"><i class="fa fa-solid fa-pen"></i></a></td>
                                            <td class="text-center">
                                                <form action="{{ route('admin.post.delete', $post->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent"><i class="fa fa-solid fa-trash text-danger" role="button"></i></button>
                                                    </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
