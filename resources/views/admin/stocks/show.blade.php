@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stock.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stock.fields.id') }}
                        </th>
                        <td>
                            {{ $stock->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stock.fields.asset') }}
                        </th>
                        <td>
                            {{ $stock->asset->name ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.stock.fields.inventario_stock') }}
                        </th>
                        <td>
                            {{ $stock->inventario_stock ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.stock.fields.suap_stock') }}
                        </th>
                        <td>
                            {{ $stock->suap_stock ?? '' }}


                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ 'Situação' }}
                        </th>
                        <td>
                            @if( $stock->suap_stock == $stock->inventario_stock )
                                {{ 'CONFERE' }}
                            @elseif($stock->suap_stock < $stock->inventario_stock )
                                {{ 'ABAIXO' }}
                            @else
                                {{ 'ACIMA' }} 
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.stock.fields.data_inventario') }}
                        </th>
                        <td>
                            {{-- Invertido 
                             {{ $stock->data_inventario ?? '' }}--}}
                             {{ $stock::serializeDate($stock->data_inventario ) ?? '' }}


                        </td>
                    </tr>

                    
                    <tr>
                        <th>
                            {{ trans('cruds.stock.fields.data_suap') }}
                        </th>
                        <td>
                            {{-- Invertido 
                            {{ $stock->data_suap ?? '' }}--}}
                            {{ $stock::serializeDate($stock->data_suap) ?? '' }}
                        </td>
                    </tr>


                    <tr>
                        <th>
                            {{ trans('cruds.stock.fields.current_stock') }}
                        </th>
                        <td>
                             {{-- Invertido --}}
                            {{-- {{ $stock->current_stock }} --}}
                            {{ $stock->current_suap_stock ?? '' }}


                        </td>
                    </tr>

                    
                    <tr>
                        <th>
                            {{ trans('cruds.stock.fields.current_suap_stock') }}
                        </th>
                        <td>
                            {{-- Invertido --}}
                            {{-- {{ $stock->current_suap_stock ?? '' }} --}}
                            {{ $stock->current_stock }}

                        </td>
                    </tr>


                </tbody>
            </table>
            <h4 class="text-center">
                Histórico do {{ $stock->asset->name }}
                @if(count($stock->asset->transactions) == 0)
                    está vazio
                @endif
            </h4>
            @if(count($stock->asset->transactions) > 0)
                <table class="table table-sm table-bordered table-striped col-6 m-auto">
                    <thead>
                        <tr>
                            <th class="w-75">User</th>
                            <th>Amount</th>
                        </tr>
                        @foreach($stock->asset->transactions as $transaction)
                            <tr>
                                <td>
                                    {{ $transaction->user->name }}
                                    ({{ $transaction->user->email }})
                                    ({{ $transaction->user->team->name }})
                                </td>
                                <td>{{ $transaction->stock }}</td>
                            </tr>
                        @endforeach
                    </thead>
                </table>
            @endif
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
