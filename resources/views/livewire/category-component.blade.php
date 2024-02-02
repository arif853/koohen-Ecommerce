<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <section class="popular-categories section-padding mt-15 mb-25">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
            {{-- @if ($categories > 0) --}}
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                <div class="carausel-6-columns" id="carausel-6-columns">
                    @foreach ($categories as $category)
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="{{asset('storage/category_image/'.$category->category_image)}}" alt="{{$category->category_name}}"></a>
                        </figure>
                        <h5><a href="shop-grid-right.html">{{$category->category_name}}</a></h5>
                    </div>
                    @endforeach

                </div>
            </div>
            {{-- @else --}}
                {{-- <h2 class="text-center my-10">No Category found.</h2> --}}
            {{-- @endif --}}

        </div>
    </section>
</div>
