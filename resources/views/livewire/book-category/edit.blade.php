<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('bookCategory.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.bookCategory.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="bookCategory.name">
        <div class="validation-message">
            {{ $errors->first('bookCategory.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bookCategory.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bookCategory.slug') ? 'invalid' : '' }}">
        <label class="form-label required" for="slug">{{ trans('cruds.bookCategory.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" required wire:model.defer="bookCategory.slug">
        <div class="validation-message">
            {{ $errors->first('bookCategory.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bookCategory.fields.slug_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.book-categories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>