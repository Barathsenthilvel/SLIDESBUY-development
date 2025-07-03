<div class="review_comment">
    <ul class="review_com">
        @forelse ( $Review as $review)
        <li>
            <div class="comment">
                <figure class="comment-media">
                    {{-- <a href="#">
                        <img src="{{URL::asset('assets/media/avat.svg')}}" alt="avatar">
                    </a> --}}
                </figure>
                <div class="comment-body">
                    <div class="comment-user">
                        <span class="comment-date text-body">{{date('F d, Y',strtotime($review->updated_at))}} at
                            {{date('h:i A',strtotime($review->updated_at))}}</span>
                        <div class="comment-rating ratings-container mb-0">
                            <div class="ratings-full">
                                <span class="ratings" style="width:80%"></span>
                                <span class="tooltiptext tooltip-top">
                                    <div class="star-rated">
                                        <i class=" {{($review->rating >= 1)?'fa fa-star':'fa fa-star-o'}}"></i>
                                        <i class=" {{($review->rating >= 2)?'fa fa-star':'fa fa-star-o'}}"></i>
                                        <i class=" {{($review->rating >= 3)?'fa fa-star':'fa fa-star-o'}}"></i>
                                        <i class=" {{($review->rating >= 4)?'fa fa-star':'fa fa-star-o'}}"></i>
                                        <i class=" {{($review->rating >= 5)?'fa fa-star':'fa fa-star-o'}}"></i>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <h4><a href="#">{{($review->getuser() == "")?"":$review->getuser()->name}}</a></h4>
                    </div>

                    <div class="comment-content">
                        <p>{!! $review->command !!}</p>
                    </div>
                </div>
            </div>
        </li>
        @empty
        <li>No reviews & ratings yet</li>
        @endforelse
    </ul>
    {{-- <nav class="product_pagination" aria-label="Page navigation">
        <ul class="pagination pagination-mg">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav> --}}

</div>
@if (Auth::user())
@if(count($reviewed)<1 && false) <div class="reply">
    <div class="title-wrapper text-left">
        <h3 class="title title-simple text-left text-normal">Add a Review</h3>
        <p>Your email address will not be published. Required fields are marked *</p>
    </div>
    <div class="rating-form" >
        <label for="rating" class="text-dark">Your rating * </label>
        <div class="star-rated" id="star_rating">
            <i data-star=1 class="fa fa-star "></i>
            <i data-star=2 class="fa fa-star "></i>
            <i data-star=3 class="fa fa-star "></i>
            <i data-star=4 class="fa fa-star"></i>
            <i data-star=5 class="fa fa-star"></i>
        </div>

        <select name="rating" id="rating" required="" style="display: none;">
            <option value="">Rate…</option>
            <option value="5">Perfect</option>
            <option value="4">Good</option>
            <option value="3">Average</option>
            <option value="2">Not that bad</option>
            <option value="1">Very poor</option>
        </select>
    </div>
    <form action="{{route('product.review')}}" id="reviewSubmit">
        @csrf
        <textarea id="reply-message" name="command" cols="30" rows="6" class="form-control mb-4" placeholder="Comment *" required=""></textarea>
        <input type="hidden" name="rating" id="rating" value="">
        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="vendor_id" id="vendor_id" value="{{$product->vendor}}">
        <button type="submit" class="review-btn">Submit</button>
    </form>
    </div>

    @endif
    @endif
