<div class="modal-container">
    <div class="modal-title">{{ __('Confirm delete backup #:id', ['id' => $backup['key']]) }}</div>
    <div class="modal-body">
        <p>
            {{ __('Do you really want to delete this backup ":name"?', ['name' => $backup['name']]) }}
        </p>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-primary" data-fancybox-close>{{ __('No')  }}</a>
        <button type="button" class="btn btn-info btn-confirm-delete-backup" data-url="{{ route('backup.delete.post', $backup['key']) }}">{{ __('Yes, let\'s delete it!') }}</button>
    </div>
</div>