@extends('layouts.app')

@section('content')

@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title">Welcome aboard!</h3>
        </div>
        <div class="card-body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Facilisis mauris sit amet massa vitae. Enim blandit volutpat maecenas volutpat blandit.
            Fermentum odio eu feugiat pretium. Nec nam aliquam sem et tortor consequat. Tortor aliquam nulla facilisi
            cras fermentum odio. Dapibus ultrices in iaculis nunc sed. Purus ut faucibus pulvinar elementum. Duis at
            consectetur lorem donec massa sapien. Nibh mauris cursus mattis molestie a. Et leo duis ut diam quam. Tortor
            aliquam nulla facilisi cras fermentum odio eu feugiat pretium.
        </div>
    </div>
</section>
@endsection
