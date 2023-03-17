@extends('templates.default.app')

@section('content')

<div class="block about-us">
    <div class="about-us__image"></div>
    <div class="container">
        <div class="row justify-content-center">
            @foreach($terms as $term)
            <div class="col-12 col-xl-10">
                <div class="about-us__body">
                    <h1 class="about-us__title">{{ucfirst($term['title'])}}</h1>
                    <div class="about-us__text typography">
                        <?php echo $term['terms']; ?>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection