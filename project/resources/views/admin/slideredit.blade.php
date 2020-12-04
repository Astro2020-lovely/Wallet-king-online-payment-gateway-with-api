@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard add-product-1 area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Edit Slider</h2>
                                        <a href="{!! url('admin/sliders') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> back</a>
                                    </div>
                                    <hr/>
                                    <form method="POST" action="{!! action('SliderController@update',['id'=>$slider->id]) !!}" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="PATCH">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="current_slider_image">Current Slider Image *</label>
                                            <div class="col-sm-8">
                                                <img src="{!! url('/') !!}/assets/images/sliders/{{$slider->image}}" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="change_slider_image">Change Slider Image*</label>
                                            <div class="col-sm-8">
                                                <input type="file" name="image" id="change_slider_image" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="slider_title">Slider Title* <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="title" value="{{$slider->title}}" id="slider_title" placeholder="e.g sports">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="slider_text">Slider Text* <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="text" value="{{$slider->text}}" id="slider_text" placeholder="e.g sports">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="slider_text _position">Slider Text Position*</label>
                                            <div class="col-sm-8">
                                                <select id="slider_text _position" name="text_position" class="form-control" required>
                                                    @if($slider->text_position == "slide_style_left")
                                                        <option value="slide_style_left" selected>Left</option>
                                                    @else
                                                        <option value="slide_style_left">Left</option>
                                                    @endif
                                                    @if($slider->text_position == "slide_style_center")
                                                        <option value="slide_style_center" selected>Center</option>
                                                    @else
                                                        <option value="slide_style_center">Center</option>
                                                    @endif
                                                    @if($slider->text_position == "slide_style_right")
                                                        <option value="slide_style_right" selected>Right</option>
                                                    @else
                                                        <option value="slide_style_right">Right</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">update slider</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard add-product-1 area -->

                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop