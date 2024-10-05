@extends('Frontend.layout.app')
@section('content')

    @include('Frontend.layout.calendly')

    <!-- Featured Blogs Section -->
    <div class="container my-5" data-aos="fade-up">
        <h2 class="text-center mb-4">Our Featured <span class="text-primary">Blogs</span></h2>
        @if ($bestBlog)
            @if ($bestBlog['bestOne'])
                <div class="row mb-4 align-items-center">
                    <div class="col-lg-6 p-4">
                        <a href="blog-details.html" class="text-decoration-none">
                            <div class="card border-0 bg-light">
                                <img src="{{ $bestBlog['bestOne']['image'] }}" class="card-img-top rounded"
                                    alt="Featured Image">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 p-md-4 px-4 px-md-0">
                        <a href="{{ route('blog.view', $bestBlog['bestOne']['slug']) }}" class="text-decoration-none">
                            <h3 class="card-title text-dark py-md-4 pb-0 pb-md-2" style="font-size: 22px !important">
                                {{ $bestBlog['bestOne']['title'] }}</h3>
                        </a>
                        <p class="card-text mt-3">{{ $bestBlog['bestOne']['description'] }}</p>
                        <div class="d-flex justify-content-between py-2">
                            <div class="card-pan">{{ $bestBlog['bestOne']['author'] }} • {{ $bestBlog['bestOne']['date'] }}
                            </div>
                            <small class="text-muted">
                                <svg fill="#252222c2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                    viewBox="0 0 442.04 442.04" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path
                                                d="M221.02,341.304c-49.708,0-103.206-19.44-154.71-56.22C27.808,257.59,4.044,230.351,3.051,229.203
                                                                                                                                                                                           c-4.068-4.697-4.068-11.669,0-16.367c0.993-1.146,24.756-28.387,63.259-55.881c51.505-36.777,105.003-56.219,154.71-56.219
                                                                                                                                                                                           c49.708,0,103.207,19.441,154.71,56.219c38.502,27.494,62.266,54.734,63.259,55.881c4.068,4.697,4.068,11.669,0,16.367
                                                                                                                                                                                           c-0.993,1.146-24.756,28.387-63.259,55.881C324.227,321.863,270.729,341.304,221.02,341.304z M29.638,221.021
                                                                                                                                                                                           c9.61,9.799,27.747,27.03,51.694,44.071c32.83,23.361,83.714,51.212,139.688,51.212s106.859-27.851,139.688-51.212
                                                                                                                                                                                           c23.944-17.038,42.082-34.271,51.694-44.071c-9.609-9.799-27.747-27.03-51.694-44.071
                                                                                                                                                                                           c-32.829-23.362-83.714-51.212-139.688-51.212s-106.858,27.85-139.688,51.212C57.388,193.988,39.25,211.219,29.638,221.021z" />
                                        </g>
                                        <g>
                                            <path
                                                d="M221.02,298.521c-42.734,0-77.5-34.767-77.5-77.5c0-42.733,34.766-77.5,77.5-77.5c18.794,0,36.924,6.814,51.048,19.188
                                                                                                                                                                                           c5.193,4.549,5.715,12.446,1.166,17.639c-4.549,5.193-12.447,5.714-17.639,1.166c-9.564-8.379-21.844-12.993-34.576-12.993
                                                                                                                                                                                           c-28.949,0-52.5,23.552-52.5,52.5s23.551,52.5,52.5,52.5c28.95,0,52.5-23.552,52.5-52.5c0-6.903,5.597-12.5,12.5-12.5
                                                                                                                                                                                           s12.5,5.597,12.5,12.5C298.521,263.754,263.754,298.521,221.02,298.521z" />
                                        </g>
                                        <g>
                                            <path
                                                d="M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z" />
                                        </g>
                                    </g>
                                </svg>
                                {{ $bestBlog['bestOne']['view'] }} views</small>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                @if ($bestBlog['bestThree'])
                    @foreach ($bestBlog['bestThree'] as $blog)
                        <div class="col-md-4 mb-4">
                            <x-blog title="{{ $blog['title'] }}" slug="{{ $blog['slug'] }}"
                                category="{{ $blog['category'] }}" date="{{ $blog['date'] }}" views="{{ $blog['view'] }}"
                                image="{{ $blog['image'] }}" />
                        </div>
                    @endforeach
                @endif
            </div>
        @endif
    </div>

    <!-- Latest Blogs Section -->
    <div class="container my-5" id="content" data-aos="fade-up">
        <h2 class="text-center mb-4">Latest <span class="text-primary">Blogs</span></h2>
        <div class="row">
            <!-- Repeated Blog Cards -->
            @foreach ($latestBlog as $blog)
                <div class="col-md-4 mb-4" data-aos="fade-up">
                    <x-blog title="{{ $blog['title'] }}" slug="{{ $blog['slug'] }}" category="{{ $blog['category'] }}"
                        date="{{ $blog['date'] }}" views="{{ $blog['view'] }}" image="{{ $blog['image'] }}" />
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            @if (!empty($pagination) && $pagination['total_pages'] > 1)
                <nav class="py-3">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link {{ $pagination['current_page'] == 1 ? 'disabled' : '' }}"
                                href="{{ url()->current() }}?page={{ $pagination['current_page'] - 1 }}#content"
                                rel="prev">&laquo;
                                Previous</a>
                        </li>
                        @for ($page = 1; $page <= $pagination['total_pages']; $page++)
                            @if ($page == $pagination['current_page'])
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ url()->current() }}?page={{ $page }}#content">{{ $page }}</a>
                                </li>
                            @endif
                        @endfor
                        <li class="page-item">
                            <a class="page-link {{ $pagination['current_page'] == $pagination['total_pages'] ? 'disabled' : '' }}"
                                href="{{ url()->current() }}?page={{ $pagination['current_page'] + 1 }}#content"
                                rel="next">Next
                                &raquo;</a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>
    </div>

    <!-- Collaborate -->
    <x-collaborate />

    <!-- News Letter-->
    <x-newsletter />
@endsection
