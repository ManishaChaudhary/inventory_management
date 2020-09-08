@if(!isset($count))
    @php($count = 1)
@elseif(isset($product))
    @php( $count =  $product->id)
@else
    @php($count = $count + 1)
@endif
<div class="products-container container-fluid control-group" id="fields">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {{Form::label('title')}}
                {{Form::text('products['.$count.'][title]' , isset($product) ? $product['title'] : null , ['class' => 'form-control' , 'required'=> 'required' , 'id' => 'name' ])}}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{Form::label('Quantity')}}
                {{Form::number('products['.$count.'][quantity]' , isset($product) ? $product['quantity'] : null , ['class' => 'form-control' , 'required'=> 'required' , 'id' => 'quantity' ])}}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{Form::label('Alternate Quantity')}}
                {{Form::number('products['.$count.'][alt_quantity]' , isset($product) ? $product['alt_quantity'] : null , ['class' => 'form-control' , 'required'=> 'required' , 'id' => 'alt_quantity' ])}}
            </div>
        </div>
        <div class="col-md-2">
            {{Form::label('')}}
            <div class="form-group">
                @if($count > 1)
                    <button class="products_add btn-add btn btn-success" type="button"
                            data-count="{{$count}}"
                            data-url="{{route('add.product' ,['count' => $count])}}"><i
                            class="fa fa-plus"></i>
                    </button>
                    <button class="btn products_remove btn-danger btn" data-count="{{$count}}"><i
                            class="fa fa-minus"></i>
                    </button>
                @else($count = 1)
                    <button class="products_add btn btn-add btn-success" type="button"
                            data-count="{{$count}}"
                            data-url="{{route('add.product' ,['count' => $count])}}"><i
                            class="fa fa-plus"></i>
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>

