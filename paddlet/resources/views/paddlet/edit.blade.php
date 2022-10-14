@extends('layouts.app')

@section('template_title')
    Update Paddlet
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="d-flex justify-content-center">

                @includeif('partials.errors')

                <div class="card card-default col-md-9 bg-dark text-white">
                    <div class="card-header">
                        <span class="card-title">Update Paddlet</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('paddlets.update', $paddlet->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('paddlet.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
