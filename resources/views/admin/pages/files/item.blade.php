<div class="card ecommerce-card">
    <div class="card-content">
        <a href="#" style=" ">
            <div class="item-img text-center" style="position: relative;vertical-align: middle;text-align: center;">
                @if($file->isImg)
                    <img class="img-fluid" src="{{ $file->thumb }}" alt="img-placeholder" style="max-height: 100%;max-width: 100%;width: auto;height: auto;position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;">
                @else
                    <i title="{{ $file->name }}" class="fa fa-{{ $file->icon }}" style="color: #fff; font-size: 100px; padding-top: 15%"></i>
                @endif
            </div>
        </a>
        <div class="card-body">
            <div>
                <h5 class="item-description">{{ $file->name }}</h5>
            </div>
            <div class="item-wrapper">
                <div>
                    <p class="item-price">
                        @if(!empty($file->width))
                            <span style="margin-right: 20px">Width: {{ $file->width }}px</span>
                        @endif

                        @if(!empty($file->sized))
                            <span >Size: {{ $file->sized }}</span>
                        @endif

                    </p>
                </div>
            </div>

        </div>
        <div class="item-options text-center">
            @if(!empty($action) and !empty($model))
                @if($action==='add')
                    <div class="wishlist">
                        <i class="fa fa-info-circle"></i>
                        <a href="#">
                            Preview
                        </a>
                    </div>
                    <div class="cart">
                        <a href="{{ route('add.to.model', ['model'=>$model,'uuid'=>$file->uuid, 'anchor'=>$anchor]) }}"><i class="feather icon-plus text-white"></i> <span class="">Add to {{ ucfirst($model) }}</span></a>
                    </div>
                @endif
            @else
                <div class="wishlist">
                    <i class="fa fa-trash"></i> <span>Delete</span>
                </div>
                <div class="cart">
                    <a href="#"><i class="feather icon-layers"></i> <span class="">Preview</span></a>
                </div>
            @endif
        </div>
    </div>
</div>