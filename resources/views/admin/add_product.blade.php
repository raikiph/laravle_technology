@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THEM SAN PHAM
                        </header>
                        <div class="panel-body">
                        <?php
                use Illuminate\Support\Facades\Session as FacadesSession;
                    $message = FacadesSession::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span>';
                            FacadesSession::put('message',null);
                        }
    ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">TEN SAN PHAM</label>
                                    <input data-validation="length" data-validation-length="min10" data-validation-error-msg="ten san pham it nhat 10 ky tu" name="product_name" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">GIA SAN PHAM</label>
                                    <input name="product_price" type="text" id="emailForm" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">HINH ANH SAN PHAM</label>
                                    <input name="product_image" type="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">MO TA SAN PHAM</label>
                                    <textarea id="editor1" style="resize: none;" rows="5"  name="product_desc" class="form-control" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">NOI DUNG SAN PHAM</label>
                                    <textarea class="ckeditor form-control" name="product_content" rows="5" id="editor2" style="resize: none;"></textarea>
                                </div>
                                    <div class="form-group">
                                    <label for="exampleInputPassword1">DANH MUC SAN PHAM</label>
                                    <select  name="product_cate" class="form-control input-sm m-bot15">
                                    @foreach($cate_product as $key => $cate) 
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                    <div class="form-group">
                                    <label for="exampleInputPassword1">THUONG HIEU</label>
                                    <select  name="product_brand" class="form-control input-sm m-bot15">
                                    @foreach($brand_product as $key => $brand) 
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                    <div class="form-group">
                                    <label for="exampleInputPassword1">Hien thi</label>
                                    <select  name="product_status" class="form-control input-sm m-bot15">
                                        <option value="1">An</option>
                                        <option value="0">Hien thi</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_category_product" class="btn btn-info">Them San Pham</button>
                            </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
        @endsection
        