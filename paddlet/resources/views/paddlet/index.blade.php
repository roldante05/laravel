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

                            <span id="card_title">
                                {{ __('Paddlet') }}
                            </span>

                             <div class="">
                                <a href="{{ route('paddlets.create') }}" class="btn btn-primary btn-sm "  data-placement="left">
                                  {{ __('Create New') }}
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
                                        <div class="card col-sm-3 mx-2 mt-3">
                                            <div class="my-1 ms-2">{{ $paddlet->user }}</div>
											<div class="text-center py-4" >{{ $paddlet->comment }}</div>
                                            
                                            
                                            <form action="{{ route('paddlets.destroy',$paddlet->id) }}" method="POST">
                                                <!-- <a class="btn btn-sm btn-primary " href="{{ route('paddlets.show',$paddlet->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> -->
                                                <a class="btn btn-sm btn-success" href="{{ route('paddlets.edit',$paddlet->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                            </form>
                                        </div>
                                    @endforeach
                                    </div>
                    </div>
                {!! $paddlets->links() !!}
            </div>
        </div>
    </div>
    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Paddlet') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('paddlets.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>User</th>
										<th>Comment</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paddlets as $paddlet)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $paddlet->user }}</td>
											<td>{{ $paddlet->comment }}</td>

                                            <td>
                                                <form action="{{ route('paddlets.destroy',$paddlet->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('paddlets.show',$paddlet->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('paddlets.edit',$paddlet->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $paddlets->links() !!}
            </div>
        </div>
    </div> -->
    
@endsection
