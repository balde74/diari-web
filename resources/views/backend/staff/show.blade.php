@extends('layouts.main-layout')
@section('title')
    Affichage
@endsection
@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Détail du personnel</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

					<h3 class="text-center">{{ $staff->name }}</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <div>
                                @if ($staff->image)
                                    <img src="{{ asset('documents/' . $staff->image) }}" class="" alt="image du personnel"
                                        width="180px" height="180px">
                                @else
								<img src="{{ asset('default_images/default_image_staff.jpg') }}" class="" alt="image du personnel"
								width="180px" height="180px">
                                @endif
                            </div>
                            <div class="mt-2">
                                {{-- <h2 class="text-2xl font-bold mb-1">{{ $staff->name }}</h2> --}}
                                <p class="">{{ $staff->position }} — {{ $staff->department }}</p>
                                <p class="text-sm ">Depuis 
                                    {{ \Carbon\Carbon::parse($staff->start_date)->format('m-Y') }}</p>
                            </div>

                            <div class="mt-4">
                                <h3 class="font-semibold">Contact</h3>
                                {{-- <p><strong>Phone:</strong> {{ $staff->phone }}</p> --}}
                                <p><strong>Email:</strong> {{ $staff->email }}</p>
                                <p><strong>District:</strong> {{ $staff->district->name ?? '—' }}</p>
                            </div>
							<hr>
                        <div class="text-center">
                            <a class="btn-sm" style="margin-right: 10%" href="{{ route('staff.index') }}"> <i
                                    class="fa fa-arrow-left"></i> Liste du personnel</a>
                            <a class="btn-sm" href="{{ route('staff.edit', $staff->id) }}"> <i class="fa fa-edit"></i>
                                Editer </a>
                            {{-- <a href="{{ route('staff.destroy',$staff->id) }}"> <i class="fa fa-trash"></i>supprimer</a> --}}
                        </div>



						</div>
                            <div class="col">
                                <div class="mt-1">
                                    <h3 class="font-semibold">Bibliographie</h3>
                                    <p class="text-justify" style="background-color: #f8f9fa; padding: 10px; border-radius: 5px;" >{{ $staff->bio }}</p>
                                </div>
                            </div>












                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
