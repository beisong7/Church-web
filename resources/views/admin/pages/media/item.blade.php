<div class="col-md-3">
    <div class="card ecommerce-card">
        <div class="card-content">
            <div class="item-img text-center" style="position:relative!important; vertical-align: middle;text-align: center;">
                <span class="badge badge-success">{{ number_format($item->download_count) }} <i class="feather icon-download"></i></span>
                @if($item->file->isImg)
                    <img class="img-fluid" src="{{ $item->file->thumb }}" alt="img-placeholder" style="width: 60%; max-height: 150px; margin: auto;padding-top: 15%">
                @else
                    <i title="{{ $item->file->name }}" class="fa fa-{{ $item->file->icon }}" style="color: #fff; font-size: 100px; padding-top: 15%"></i>
                @endif
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="text-center">
            <h5 class="text-center">{{ $item->file->name }}</h5>
            <a href="{{ route('media.item.pop', $item->uuid) }}" class="btn btn-danger btn-sm">Remove</a>
        </div>

    </div>
</div>