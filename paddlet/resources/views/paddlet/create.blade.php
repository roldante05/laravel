@extends('layouts.app')

@section('template_title')
    Create Paddlet
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Paddlet</span>
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
