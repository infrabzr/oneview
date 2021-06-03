@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
						@foreach($equipments as $key => $val)
							 {{ $equipments[$key]->e_product_type }},
							 {{ $equipments[$key]->e_equipment_type }}
						@endforeach
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
