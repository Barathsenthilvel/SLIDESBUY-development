<h4 align="center">Review</h4>  
<div class="form-group row">
    <label class="col-2 col-form-label">Rating<span class="text-danger"></span></label>
    <div class="col-8">
        <span class="fa fa-star {{(1 <= $Review->rating)?'checked':''}}"></span>
        <span class="fa fa-star {{(2 <= $Review->rating)?'checked':''}}"></span>
        <span class="fa fa-star {{(3 <= $Review->rating)?'checked':''}}"></span>
        <span class="fa fa-star {{(4 <= $Review->rating)?'checked':''}}"></span>
        <span class="fa fa-star {{(5 <= $Review->rating)?'checked':''}}"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-2 col-form-label">comment<span class="text-danger"></span></label>
    <div class="col-10">
        <textarea class="form-control" >{{$Review->command}}</textarea>
    </div>
</div>
