@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="card" data-aos="fade-up">
                <div class="card-body">
                  <livewire:posts.detail-post :post="$post"/>
                </div>
            </div>
        </div>
    </div>
@endsection

