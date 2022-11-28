@extends('layout.website')
@section('home_content')
 <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-9">

                    	@foreach($blogs as $row)
                        <article class="entry">
                            <div class="entry-media">
                                <a href="{{ route('blog-post', $row->id) }}">
                                    <img src="{{ asset('/') }}{{ $row->blog_image }}" alt="Post">
                                </a>
                            </div><!-- End .entry-media -->

                            <div class="entry-body">
                                <div class="entry-date">
                                    <span class="day">{{ date('d', strtotime($row->created_at)) }}</span>
                                    <span class="month">{{ date('M', strtotime($row->created_at)) }}</span>
                                </div><!-- End .entry-date -->

                                <h2 class="entry-title">
                                    <a href="{{ route('blog-post', $row->id) }}">{{$row->blog_title}}</a>
                                </h2>

                                <div class="entry-content">
                                    <p>{{ \Illuminate\Support\Str::limit($row->blog, 250, '..........') }}</p>

                                    <a href="{{ route('blog-post', $row->id) }}" class="read-more">Read More <i class="icon-angle-double-right"></i></a>
                                </div><!-- End .entry-content -->

                                <div class="entry-meta">
                                    <span><i class="icon-calendar"></i>{{ date('M d, Y', strtotime($row->created_at)) }}</span>
                                    <span><i class="icon-user"></i>By <a href="#">Admin</a></span>
                                    
                                </div><!-- End .entry-meta -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                        @endforeach
                        

                        

                        

                       <!--  <nav class="toolbox toolbox-pagination">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><span>...</span></li>
                                <li class="page-item"><a class="page-link" href="#">15</a></li>
                                <li class="page-item">
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav> -->
                    </div><!-- End .col-lg-9 -->

                    <aside class="sidebar col-lg-3">
                        <div class="sidebar-wrapper">
                            

                           

                            <div class="widget">
                                <h4 class="widget-title">Recent Posts</h4>

                                <ul class="simple-entry-list">

                                	@foreach($recent_blog as $row)
                                    <li>
                                        <div class="entry-media">
                                            <a href="{{ route('blog-post', $row->id) }}">
                                                <img src="{{ asset('/') }}{{ $row->blog_image }}" alt="Post">
                                            </a>
                                        </div><!-- End .entry-media -->
                                        <div class="entry-info">
                                            <a href="{{ route('blog-post', $row->id) }}">{{ $row->blog_title }}</a>
                                            <div class="entry-meta">
                                                {{ date('M d, Y', strtotime($row->created_at)) }}
                                            </div><!-- End .entry-meta -->
                                        </div><!-- End .entry-info -->
                                    </li>
                                    @endforeach
                                
                                </ul>
                            </div><!-- End .widget -->
      
                        </div><!-- End .sidebar-wrapper -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-6"></div><!-- margin -->
        </main><!-- End .main -->


@endsection