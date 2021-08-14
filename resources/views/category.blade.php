@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="card" data-aos="fade-up">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12" style="z-index: 9999">
                                <h1 class="font-weight-600 mb-4 text-capitalize">
                                    {{ $category->name  }}
                                </h1>
                            </div>
                        </div>
                        <livewire:categories.detail-category :category="$category"/>
                    </div>
                </div>
        </div>
    </div>
@endsection

