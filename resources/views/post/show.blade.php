@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">Автор: {{ $post->user->name}}
                • {{ $data->translatedFormat('F') }} {{ $data->day }}, {{ $data->year }} • {{ $data->format('H:i') }} •
                Комментарии: {{ $post->comments->count() }}</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <div>
                            {!! $post->content !!}
                        </div>
                        @auth()
                        <div class="row mt-5 d-flex justify-content-between">
                            <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                                @csrf
                                <div>
                                <button type="submit" class="border-0 bg-transparent">
                                    @if(auth()->user()->likedPosts->contains($post->id))
                                        <strong>Вы отметили данный пост как понравившийся!</strong>
                                        <i class="fa fa-duotone fa-heart ml-2"></i>
                                    @else
                                        Понравился пост?
                                    <strong>Нажмите лайк!</strong><i class="fa fa-solid fa-heart ml-2"></i>
                                    @endif
                                </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endauth
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto mb-5">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{ asset('storage/' . $relatedPost->preview_image) }}" alt="related post"
                                         class="post-thumbnail">
                                    <p class="post-category">{{ $relatedPost->category->title }}</p>
                                    <a href="{{route('post.show', $relatedPost->id)}}"><h5
                                            class="post-title">{{ $relatedPost->title }}</h5></a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <section class="comment-list mb-5 bg-gradient-dark">
                        @foreach($post->comments as $comment)
                        <div class="comment-text mb-3">
                            <span class="username">
                                <div>
                                    <h6>{{ $comment->user->name }}</h6>
                                </div>
                                <span class="text-muted float-right">{{ $comment->dateCarbon->diffForHumans() }}</span>
                            </span><!-- /.username -->
                            <div>
                                {{ $comment->message }}
                            </div>
                        </div>
                        @endforeach
                    </section>
                    @auth()
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Оставить комментарий</h2>
                        <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="message" id="comment" class="form-control"
                                              placeholder="Оставьте комментарий" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-5" data-aos="fade-up">
                                    <input type="submit" value="Отправить" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
