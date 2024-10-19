<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('resourceCategory.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.resourceCategory.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="resourceCategory.name">
        <div class="validation-message">
            {{ $errors->first('resourceCategory.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resourceCategory.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resourceCategory.slug') ? 'invalid' : '' }}">
        <label class="form-label required" for="slug">{{ trans('cruds.resourceCategory.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" required wire:model.defer="resourceCategory.slug">
        <div class="validation-message">
            {{ $errors->first('resourceCategory.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resourceCategory.fields.slug_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.resource-categories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>