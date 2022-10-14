@extends('layouts.app')

@section('template_title')
    Create Paddlet
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="d-flex justify-content-center">

                @includeif('partials.errors')

                <div class="card card-default col-md-9 bg-dark text-white">
                    <div class="card-header">
                        <span class="card-title">Crear Paddlet</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('paddlets.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('paddlet.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
