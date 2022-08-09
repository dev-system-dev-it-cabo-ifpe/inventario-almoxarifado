@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.stock.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stocks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="asset_id">{{ trans('cruds.stock.fields.asset') }}</label>
                <select class="form-control select2 {{ $errors->has('asset') ? 'is-invalid' : '' }}" name="asset_id" id="asset_id" required>
                    
                   

                    {{-- @foreach( array_combine($assets->toArray(), $names->toArray()) as $result => $name)
                        <option value="{{ $result }}" {{ old('asset_id') == $result ? 'selected' : '' }}>{{ $result. '-' .$name }}</option>
                    @endforeach --}}
                    @foreach($assets as $id => $asset)
                        <option value="{{ $id }}" {{ old('asset_id') == $id ? 'selected' : '' }}>{{ $asset }}</option>
                    @endforeach
                </select>
                @if($errors->has('asset'))
                    <div class="invalid-feedback">
                        {{ $errors->first('asset') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stock.fields.asset_helper') }}</span>
            </div>
            {{-- inventario_stock --}}


            <div class="form-group">
                <label for="current_stock">{{ trans('cruds.stock.fields.inventario_stock') }}</label>

                <input class="form-control {{ $errors->has('suap_stock') ? 'is-invalid' : '' }}" type="number" name="suap_stock" id="suap_stock" value="{{ old('suap_stock', '') }}" step="1">
                @if($errors->has('suap_stock'))
                    <div class="invalid-feedback">
                        {{ $errors->first('suap_stock') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stock.fields.suap_stock_helper') }}</span>
            </div>
            

            {{-- suap_stock --}}

            <div class="form-group">
                <label for="current_stock">{{ trans('cruds.stock.fields.suap_stock') }}</label>
                <input class="form-control {{ $errors->has('inventario_stock') ? 'is-invalid' : '' }}" type="number" name="inventario_stock" id="inventario_stock" value="{{ old('inventario_stock', '') }}" step="1">
                @if($errors->has('inventario_stock'))
                    <div class="invalid-feedback">
                        {{ $errors->first('inventario_stock') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stock.fields.inventario_stock_helper') }}</span>
            </div>


            {{-- data_inventario --}}

            <div class="form-group">
                <label for="current_stock">{{ trans('cruds.stock.fields.data_inventario') }}</label>
                <input class="form-control {{ $errors->has('data_inventario') ? 'is-invalid' : '' }}" type="date" name="data_inventario" id="data_inventario" value="{{ old('data_inventario', '') }}" step="1" required> 
                @if($errors->has('data_inventario'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_inventario') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stock.fields.data_inventario_helper') }}</span>
            </div>


            {{-- data_suap --}}

            <div class="form-group">
                <label for="current_stock">{{ trans('cruds.stock.fields.data_suap') }}</label>
                <input class="form-control {{ $errors->has('data_suap') ? 'is-invalid' : '' }}" type="date" name="data_suap" id="data_suap" value="{{ old('data_suap', '') }}" step="1" required>
                @if($errors->has('data_suap'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_suap') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stock.fields.data_suap_helper') }}</span>
            </div>


            <div class="form-group">
                <label for="team_id">{{ trans('cruds.user.fields.team') }}</label>
                <select class="form-control select2 {{ $errors->has('team') ? 'is-invalid' : '' }}" name="team_id" id="team_id">
                    @foreach($teams as $id => $team)
                        <option value="{{ $id }}" {{ old('team_id') == $id ? 'selected' : '' }}>{{ $team }}</option>
                    @endforeach
                </select>
                @if($errors->has('team'))
                    <div class="invalid-feedback">
                        {{ $errors->first('team') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.team_helper') }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection