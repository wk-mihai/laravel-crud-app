@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 py-2 home">
            <div class="page-title mb-3">
                <h1>{{ $pageTitle }}</h1>
            </div>
            <div class="page-content">
                <div class="items">
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="count">{{ $totalTrainings }}</div>
                        <div class="name">{{ __('Trainings') }}</div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="count">{{ $totalFiles }}</div>
                        <div class="name">{{ __('Image/Video files') }}</div>
                    </div>
                </div>
                <div class="mt-2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam dicta id quo soluta.
                    Assumenda aut consequatur deleniti dolor dolore expedita fuga fugit incidunt ipsa laudantium libero
                    officia perferendis, quas soluta ullam vel veritatis voluptatum. Culpa dignissimos doloremque ipsam
                    officia praesentium soluta vel voluptatibus. Autem blanditiis consectetur consequuntur corporis
                    delectus dolorem, dolores dolorum est et eum ex excepturi fugit harum, illo inventore magnam nam
                    obcaecati odit omnis perspiciatis praesentium quae quibusdam quisquam repellendus repudiandae sequi
                    sunt veritatis voluptas voluptatibus voluptatum. A, atque distinctio doloremque est, ex
                    exercitationem, fugiat laborum maxime modi nobis quae vero. Accusamus, adipisci aliquam architecto
                    at aut corporis dolore doloremque eaque ex, facere magnam molestias natus optio possimus quam quas
                    quo quod ullam! Dolorum earum fugiat illum incidunt ipsum laudantium pariatur quidem rerum?
                    Assumenda deleniti esse impedit perferendis sequi similique, vel voluptates?
                </div>
            </div>
        </div>
    </div>
@endsection
