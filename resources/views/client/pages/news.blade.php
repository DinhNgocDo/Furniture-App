@extends('client.home')
@section('index')


<section class="blog_area padding_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog_left_sidebar">
                    @foreach ($news as $item)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ asset('client/images/news/' . $item->image) }}" alt="" style="    width: 100%;
                                height: 270px;
                                object-fit: contain;">
                                <a href="{{ route('news-details', $item->id) }}" class="blog_item_date">
                                    <p>{{ date('d/m/Y', strtotime($item->created_at)) }}</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="{{ route('news-details', $item->id) }}">
                                    <h2>{{ $item->name }}</h2>
                                </a>
                                <p>{{ $item->short_description }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection