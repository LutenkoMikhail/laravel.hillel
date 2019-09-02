<div class="col-md-12">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-baseline">
                <a href="{{route('categories.show',$category->id)}}"

                   class="text-muted btn-outline-dark">
                    <h3>{{__ ($category->title)}}</h3>
                    <hr>
                    {{__ ($category->description)}}
                    <hr>

                </a>
            </div>
        </div>
    </div>
</div>
