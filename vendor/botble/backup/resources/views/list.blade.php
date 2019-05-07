@extends('backup::master')

@section('backup-content')
    <form>
        <div class="form-group">
            <a data-fancybox data-type="ajax" data-src="{{ route('backup.create') }}" href="javascript:;" class="btn btn-info"><i class="fa fa-plus-circle"></i> {{ __('Create new') }}</a>
            <a class="btn btn-danger btn-delete-selected-items hidden"><i class="fa fa-trash-o"></i> {{ __('Delete selected items') }}</a>
        </div>
        <table class="table table-striped" id="table-backups">
            <thead>
                <tr>
                    <th><input class="input-checkbox-minimal input-checkbox-all" type="checkbox"></th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th class="text-center">{{ __('Size') }}</th>
                    <th class="text-center">{{ __('Created At') }}</th>
                    <th class="text-center">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @include('backup::partials.backup-items', compact('backups'))
            </tbody>
        </table>
    </form>

    <div class="modal-container modal-confirm-delete" style="display: none;">
        <div class="modal-title">{{ __('Confirm delete') }}</div>
        <div class="modal-body">
            <p>
                {{ __('Do you really want to delete selected backup item(s)?') }}
            </p>
        </div>
        <div class="modal-footer">
            <a href="javascript:;" class="btn btn-primary" data-fancybox-close>{{ __('No')  }}</a>
            <button type="button" class="btn btn-info btn-confirm-delete-backups" data-url="{{ route('backup.delete.many.post') }}">{{ __('Yes, let\'s delete it!') }}</button>
        </div>
    </div>
@stop