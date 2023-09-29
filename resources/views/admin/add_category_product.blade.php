@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THEM DANH MUC SAN PHAM
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
                                <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">TEN DANH MUC</label>
                                    <input name="category_product_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Ten danh muc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">MO TA DANH MUC</label>
                                    <textarea style="resize: none;" rows="5" name="category_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mo ta danh muc"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">TU KHOA DANH MUC</label>
                                    <textarea style="resize: none;" rows="5" name="category_product_keywords" class="form-control" id="exampleInputPassword1" placeholder="Mo ta danh muc"></textarea>
                                </div>
                                    <div class="form-group">
                                    <label for="exampleInputPassword1">Hien thi</label>
                                    <select  name="category_product_status" class="form-control input-sm m-bot15">
                                        <option value="1">An</option>
                                        <option value="0">Hien thi</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_category_product" class="btn btn-info">Them Danh Muc</button>
                            </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
        @endsection