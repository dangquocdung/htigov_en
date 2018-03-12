<div class="modal-container">
    <div class="modal-title">{{ __('Confirm restore backup') }}</div>
    <div class="modal-body">
        <p>
            {{ __('Do you really want to restore this backup ":name"?', ['name' => $backup['name']]) }}
        </p>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-primary" data-fancybox-close>{{ __('No')  }}</a>
        <button type="button" class="btn btn-info btn-confirm-restore-backup" data-url="{{ route('backup.restore.post', $backup['key']) }}">{{ __('Restore') }}</button>
    </div>
</div>