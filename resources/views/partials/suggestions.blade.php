<div class="row container">
    @foreach($suggestedProducts as $suggestedProduct)
        <div class="col-md-4 align-content-center">
            <div class="card" style="width: 20rem;">
                <a href="{{ $suggestedProduct->path() }}"><img src="{{ $suggestedProduct->img() }}" class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <p class="card-text">{{ Str::limit($suggestedProduct->name, 20) }}</p>
                    <p class="card-text">{{ $suggestedProduct->price() }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
