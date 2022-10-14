@extends('layouts.app')

@section('template_title')
    Paddlet
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <h2 class="mb-0" id="card_title">
                                {{ __('Padlet') }}
                            </h2>

                             <div class="">
                                <a style="font-size: 20px ;  " href="{{ route('paddlets.create') }}" class="mb-0 btn btn-primary btn-sm "  data-placement="left">
                                  {{ __('Crear') }}
                                  <i class="fa-solid fa-circle-plus"></i>
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                </div> 
                    <div class="row">
                        <div class="d-flex justify-content-center flex-wrap">
                                    @foreach ($paddlets as $paddlet)
                                        <div style="height: 150px ;" class="card col-sm-3 mx-2 mt-3 pb-3 text-white bg-dark">
                                            <div style="font-size: 17px ;" class="my-1 ms-2 d-flex justify-content-between">{{ $paddlet->user }}  <form action="{{ route('paddlets.destroy',$paddlet->id) }}" method="POST">  <button type="submit" class="btn btn-light btn-sm"><i class="fa fa-fw fa-trash"></i></button>   <a class="btn btn-sm btn-light me-2" href="{{ route('paddlets.edit',$paddlet->id) }}"><i class="fa-solid fa-pen-to-square"></i></a> @csrf
                                                @method('DELETE') </form> </div>
											<div style="font-size: 18px;" class="text-justify px-2 py-3" >{{ $paddlet->comment }}</div>
                                            
                                            
                                            <form action="{{ route('paddlets.destroy',$paddlet->id) }}" method="POST">
                                                <!-- <a class="btn btn-sm btn-primary " href="{{ route('paddlets.show',$paddlet->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> -->
                                              
                                                @csrf
                                                @method('DELETE')
                                              
                                            </form>
                                        </div>
                                    @endforeach
                                    </div>
                    </div>
                {!! $paddlets->links() !!}
            </div>
        </div>
    </div>
   
    
@endsection
