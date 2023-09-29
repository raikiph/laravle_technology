@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            CAP NHAT DANH MUC SAN PHAM
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
    @foreach($edit_category_product as $key =>$edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">TEN DANH MUC</label>
                                    <input name="category_product_name" type="text" value="{{$edit_value->category_name}}" class="form-control" id="exampleInputEmail1" placeholder="Ten danh muc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">MO TA DANH MUC</label>
                                    <textarea style="resize: none;" rows="5" name="category_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mo ta danh muc">{{$edit_value->category_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">TU KHOA DANH MUC</label>
                                    <textarea style="resize: none;" rows="5" name="category_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mo ta danh muc">{{$edit_value->meta_keywords}}</textarea>
                                </div>
                                <button type="submit" name="update_category_product" class="btn btn-info">Cap Nhat Danh Muc San Pham</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>
            </div>
        </div>
        @endsection