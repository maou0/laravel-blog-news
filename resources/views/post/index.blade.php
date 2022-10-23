@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @if($posts->isNotEmpty())
                    @foreach($posts as $post)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ 'storage/' . $post->preview_image }}" alt="blog post">
                        </div>
                        <p class="blog-post-category">{{ $post->category->title }}</p>
                        <span><i class="fa fa-solid fa-heart mr-1"></i> <strong>{{ $post->liked_users_count }}</strong></span>
                        <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{ $post->title }}</h6>
                        </a>
                    </div>
                    @endforeach
                    @else
                        <img src="{{ asset('assets/images/no_posts_image.png') }}" class="img-fluid" alt="Responsive image">
                    @endif
                </div>
                @if($posts->isNotEmpty())
                <div class="row mb-5 mx-auto" style="margin-top: -80px;">
                    {{ $posts->links() }}
                </div>
                @endif
            </section>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                            @foreach($randomPosts as $post)
                            <div class="col-md-6 blog-post" data-aos="fade-up">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{ 'storage/' . $post->preview_image }}" alt="blog post">
                                </div>
                                <p class="blog-post-category">{{ $post->category->title }}</p>
                                <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{ $post->title }}</h6>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                @if($likedPosts->isNotEmpty())
                <div class="col-md-4 sidebar mb-5" data-aos="fade-left">
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Популярные посты</h5>
                        <ul class="post-list">
                            @foreach($likedPosts as $post)
                            <li class="post">
                                <a href="{{ route('post.show', $post->id) }}" class="post-permalink media">
                                    <img src="{{ 'storage/' . $post->preview_image }}" alt="blog post">
                                    <div class="media-body">
                                        <h6 class="post-title">{{ $post->title }}</h6>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>

    </main>
@endsection
