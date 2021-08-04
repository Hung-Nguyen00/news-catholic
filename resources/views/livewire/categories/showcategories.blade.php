@if($categories->count() > 0)
    @foreach($categories as $category)
        @if($category->children()->count() > 0)
            <div style="cursor: pointer">
                <div class="alert alert-dark"  data-toggle="collapse" data-target="#collapse{{$category->id}}">
                    {{ $category->name }}
                </div>
                <div id="collapse{{$category->id}}" class="collapse">
                    @foreach($category->children as $child)
                        <div style="padding-left: 20px">
                            <div class="alert alert-light">
                                {{ $child->name }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div>
                <div class="alert alert-dark">
                    {{ $category->name }}
                </div>
            </div>
        @endif
    @endforeach
@else
    <div>
        <div class="alert alert-dark">
            There are not any categories
        </div>
    </div>
@endif