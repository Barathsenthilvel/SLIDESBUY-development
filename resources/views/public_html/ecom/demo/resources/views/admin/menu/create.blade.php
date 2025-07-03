@extends('layout.admin') 

@section('content')  
                    <!--end::Header-->
                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-1">
                                    <!--begin::Page Heading-->
                                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                                        <!--begin::Page Title-->
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Front Menu Management</h5>
                                        <!--end::Page Title-->
                                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route('admin-menuManagement') }}" class="text-muted">Front Menu Management</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end::Page Heading-->
                                </div>
                                <!--end::Info-->
                            </div>
                        </div>
                        <!--end::Subheader-->
                        <!--begin::Entry-->
                        <div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!--begin::Card-->
                                        <div class="card card-custom gutter-b example example-compact">
                                            <div class="card-header">
                                                <h3 class="card-title">Front Menu Management</h3>
                                               
                                            </div>
                                            <!--begin::Form-->
                                            <div class="alert alert-danger alert-dismissible fade show" style="display:none" role="alert">
                                                <div></div>
                                                <button type="button" class="close" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="alert alert-success alert-dismissible fade show" style="display:none" role="alert">
                                                <div></div>
                                                <button type="button" class="close" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            
                                            <form method="POST" action="{{route('admin-menuManagement-store',$data[0]->id)}}" enctype="multipart/form-data" id="formEdit">
                                                {{ csrf_field() }}
                                                <div class="card-body">

                                                  @php
                                                    $menu=explode(',',$data[0]->menu_name);
                                                    $menu_type=explode(',',$data[0]->menu_type);
                                                    $sort_order=explode(',',$data[0]->menu_link);
                                                    $page_link=explode('|',$data[0]->page_link);
                                                  @endphp

                                                    <div id="cloning">
                                                        @foreach($menu as $key => $value)
                                                    <div class="form-group row" id="app">
                                                        <label class="col-2 col-form-label"></label>
                                                        
                                                        <div class="col-12">
                                                            <div class="row">

                                                            <div class="col-2">
                                                            <input type="text"  class="form-control" name="txtMenu_name[]" id="txtMenu_name[]" value="{{$value}}">
                                                            </div>

                                                            <div class="col-2">
                                                            <select  class="form-control typeSelect" name="sel_menutype[]" id="sel_menutype[]">
                                                            <option value="1" {{ ($menu_type[$key] == 1)?"selected":""}}>Link</option>
                                                            <option value="2" {{ ($menu_type[$key] == 2)?"selected":""}}>Category</option>
                                                            </select>
                                                            </div>
                                                            <div class="col-2">
                                                            <input type="text"  class="form-control inputText" name="sel_menulink[]" id="sel_menulink[]" placeholder="Link" value="{{$page_link[$key]}}" style="display:{{ ($menu_type[$key] == 1)?"block":"none"}};">

                                                            <select  class="form-control selectBox" name="sel_menulink[]" id="sel_menulink1[]" multiple style="display:{{ ($menu_type[$key] == 2)?"block":"none"}};">
                                                            @foreach($category as $cat)
                                                            <option value="{{$cat->id}}" {{(in_array($cat->id,explode(',',$page_link[$key])))? "selected":""}}>{{$cat->category_name}}</option>
                                                            @endforeach
                                                            </select>
                                                            <input type="text" hidden="true" name="sel_menul[]" value="{{$page_link[$key]}}">
                                                            </div>

                                                            <div class="col-2">
                                                            <input type="text"  class="form-control" name="txtMenu_sortby[]" id="txtMenu_sortby[]" value="{{$sort_order[$key]}}">
                                                            </div>

                                                            <div class="col-2">
                                                            <label></label>
                                                            <button class="btn btn-success" type="button" onclick="cloneDiv()">Add</button>
                                                            </div>

                                                            <div class="col-2">
                                                            <label></label>
                                                            <button class="btn btn-success" id="removeButton" type="button" onclick="cloneRemove(this)">Remove</button>
                                                            </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>





                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                                </div>
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Card-->
                                                        
                                    </div>
                                  
                                </div>
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>

                    <!--end::Content-->
                    <!--begin::Footer-->
 @endsection                     

 @push('script')
 <script>  

     function cloneDiv(){
        var clone = document.getElementById('app').cloneNode(true); // "deep" clone
        var data = clone.querySelectorAll("input")
        data.forEach(function(data){ data.value="";});
        clone.querySelector("#removeButton").removeAttribute("style");
        document.getElementById("cloning").appendChild(clone);
        }

    function cloneRemove(button)
        {
            var parent = button.parentNode;
            var grand_father = parent.parentNode.parentNode.parentNode;
            var GEAST_grand_father = grand_father.parentNode;
            if(GEAST_grand_father.childElementCount > 1){
            GEAST_grand_father.removeChild(grand_father);
        }else{

            document.getElementById('app').querySelectorAll("input").forEach(function(data){ data.value="";});
        }
        }   

    $("body").on('change','.typeSelect',function(){
        var types=$(this).val();
        if(types==1){

          this.parentNode.parentNode.children[2].children[0].style.display = "block";
          this.parentNode.parentNode.children[2].children[1].style.display = "none";

        }
        if(types==2){
          this.parentNode.parentNode.children[2].children[1].style.display = "block";
          this.parentNode.parentNode.children[2].children[0].style.display = "none";
        }
    });


    $("body").on('focusout','.selectBox',function(e) {
        var nn = "";
        Object.keys(this.selectedOptions).forEach((n, i) => {
            nn += this.selectedOptions[i].value+",";
        });
        $(this).next().val(nn);
        nn = "";
    });
    $("body").on('focusout','.inputText',function(e) {
        // debugger
        var nn = $(this).val();
        $(this).next().next().val(nn);
        
        nn = "";
    });
</script>
 @endpush