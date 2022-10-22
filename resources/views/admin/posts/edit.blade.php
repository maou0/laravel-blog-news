@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Редактирование поста</li>
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
                    <div class="col-12">
                        <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <div>
                                    <label class="w-50">
                                        <input type="text" class="form-control" name="title"
                                               placeholder="Введите название поста"
                                               value="{{ $post->title }}"
                                        >
                                    </label>
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="summernote"></label><textarea id="summernote" name="content">
                                        {{ $post->content }}
                                    </textarea>
                                    <div>
                                        @error('content')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group w-50">
                                    <label for="exampleInputFile">Добавить превью</label>
                                    <div class="w-50 mb-2">
                                        <img src="{{ asset('storage/' . $post->preview_image) }}" alt="preview_image" class="w-50">
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="preview_image">
                                            <label class="custom-file-label">Выбрать изображение</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузить</span>
                                        </div>
                                    </div>
                                    <div>
                                        @error('preview_image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group w-50">
                                    <label for="exampleInputFile">Добавить основное изображение</label>
                                    <div class="w-50 mb-2">
                                        <img src="{{ asset('storage/' . $post->main_image) }}" alt="main_image" class="w-50">
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="main_image">
                                            <label class="custom-file-label">Выбрать изображение</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузить</span>
                                        </div>
                                    </div>
                                    @error('preview_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Категория</label>
                                <select class="form-control w-25" name="category_id">
                                    <option selected disabled>Выберите категорию</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $post->category_id ? 'selected' : '' }}
                                        >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50" data-select2-id="29">
                                <label>Теги</label>
                                <select class="select2 select2-hidden-accessible" name="tag_ids[]" multiple=""
                                        data-placeholder="Выберите теги" style="width: 100%;" data-select2-id="7"
                                        tabindex="-1" aria-hidden="true">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                        >{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                                @error('tag_ids[]')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-primary w-25" value="Обновить">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
