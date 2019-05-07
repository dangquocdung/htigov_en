<div class="modal-container">
    <div class="modal-title">{{ __('Create new backup') }}</div>
    <div class="modal-body">
        <div class="form-body">
            <div class="form-group">
                <label for="name" class="control-label required">{{ __('Name') }}</label>
                <input type="text" class="form-control" id="name" placeholder="{{ __('Backup name') }}">
            </div>
            <div class="form-group">
                <label for="description" class="control-label">{{ __('Description') }}</label>
                <textarea id="description" rows="4" class="form-control" placeholder="{{ __('Backup description') }}"></textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-primary" data-fancybox-close>{{ __('Close') }}</a>
        <button class="btn btn-info backup-button-submit" data-url="{{ route('backup.create.post') }}">{{ __('Create') }}</button>
    </div>
</div>