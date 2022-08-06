@extends('client.home')
@section('index')


<section class="blog_area single-post-area padding_top">
    <div class="container">
       <div class="row">
          <div class="col-lg-12 posts-list">
             <div class="single-post">
                <div class="feature-img">
                   <img class="img-fluid" src="{{ asset('client/images/news/' . $news->image) }}" alt="">
                </div>
                <div class="blog_details">
                   <h2>
                        {{ $news->name }}
                   </h2>
                   <ul class="blog-info-link mt-3 mb-4">
                      <li><a href="#"><i class="far fa-user"></i> Travel, Lifestyle</a></li>
                      <li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li>
                   </ul>
                   <p class="excert">
                        {{ $news->short_description }}
                   </p>
                   <p>
                    {!! $news->content !!}
                   </p>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>

@endsection