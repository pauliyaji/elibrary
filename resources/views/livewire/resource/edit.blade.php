<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('resource.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.resource.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="resource.title">
        <div class="validation-message">
            {{ $errors->first('resource.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resource.slug') ? 'invalid' : '' }}">
        <label class="form-label required" for="slug">{{ trans('cruds.resource.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" required wire:model.defer="resource.slug">
        <div class="validation-message">
            {{ $errors->first('resource.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.slug_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resource.authors') ? 'invalid' : '' }}">
        <label class="form-label required" for="authors">{{ trans('cruds.resource.fields.authors') }}</label>
        <input class="form-control" type="text" name="authors" id="authors" required wire:model.defer="resource.authors">
        <div class="validation-message">
            {{ $errors->first('resource.authors') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.authors_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resource.authors_affiliations') ? 'invalid' : '' }}">
        <label class="form-label" for="authors_affiliations">{{ trans('cruds.resource.fields.authors_affiliations') }}</label>
        <input class="form-control" type="text" name="authors_affiliations" id="authors_affiliations" wire:model.defer="resource.authors_affiliations">
        <div class="validation-message">
            {{ $errors->first('resource.authors_affiliations') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.authors_affiliations_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resource.publisher') ? 'invalid' : '' }}">
        <label class="form-label" for="publisher">{{ trans('cruds.resource.fields.publisher') }}</label>
        <input class="form-control" type="text" name="publisher" id="publisher" wire:model.defer="resource.publisher">
        <div class="validation-message">
            {{ $errors->first('resource.publisher') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.publisher_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resource.date_of_publication') ? 'invalid' : '' }}">
        <label class="form-label" for="date_of_publication">{{ trans('cruds.resource.fields.date_of_publication') }}</label>
        <x-date-picker class="form-control" wire:model="resource.date_of_publication" id="date_of_publication" name="date_of_publication" picker="date" />
        <div class="validation-message">
            {{ $errors->first('resource.date_of_publication') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.date_of_publication_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resource.year_of_publication') ? 'invalid' : '' }}">
        <label class="form-label required" for="year_of_publication">{{ trans('cruds.resource.fields.year_of_publication') }}</label>
        <input class="form-control" type="text" name="year_of_publication" id="year_of_publication" required wire:model.defer="resource.year_of_publication">
        <div class="validation-message">
            {{ $errors->first('resource.year_of_publication') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.year_of_publication_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resource.issn_isbn') ? 'invalid' : '' }}">
        <label class="form-label" for="issn_isbn">{{ trans('cruds.resource.fields.issn_isbn') }}</label>
        <input class="form-control" type="text" name="issn_isbn" id="issn_isbn" wire:model.defer="resource.issn_isbn">
        <div class="validation-message">
            {{ $errors->first('resource.issn_isbn') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.issn_isbn_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resource.edition') ? 'invalid' : '' }}">
        <label class="form-label" for="edition">{{ trans('cruds.resource.fields.edition') }}</label>
        <input class="form-control" type="text" name="edition" id="edition" wire:model.defer="resource.edition">
        <div class="validation-message">
            {{ $errors->first('resource.edition') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.edition_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resource.volume') ? 'invalid' : '' }}">
        <label class="form-label" for="volume">{{ trans('cruds.resource.fields.volume') }}</label>
        <input class="form-control" type="text" name="volume" id="volume" wire:model.defer="resource.volume">
        <div class="validation-message">
            {{ $errors->first('resource.volume') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.volume_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resource.issue') ? 'invalid' : '' }}">
        <label class="form-label" for="issue">{{ trans('cruds.resource.fields.issue') }}</label>
        <input class="form-control" type="text" name="issue" id="issue" wire:model.defer="resource.issue">
        <div class="validation-message">
            {{ $errors->first('resource.issue') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.issue_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resource.abstract') ? 'invalid' : '' }}">
        <label class="form-label" for="abstract">{{ trans('cruds.resource.fields.abstract') }}</label>
        <textarea class="form-control" name="abstract" id="abstract" wire:model.defer="resource.abstract" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('resource.abstract') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.abstract_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resource.references') ? 'invalid' : '' }}">
        <label class="form-label" for="references">{{ trans('cruds.resource.fields.references') }}</label>
        <textarea class="form-control" name="references" id="references" wire:model.defer="resource.references" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('resource.references') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.references_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resource.pages') ? 'invalid' : '' }}">
        <label class="form-label" for="pages">{{ trans('cruds.resource.fields.pages') }}</label>
        <input class="form-control" type="number" name="pages" id="pages" wire:model.defer="resource.pages" step="1">
        <div class="validation-message">
            {{ $errors->first('resource.pages') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.pages_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.resource_cover_image') ? 'invalid' : '' }}">
        <label class="form-label" for="cover_image">{{ trans('cruds.resource.fields.cover_image') }}</label>
        <x-dropzone id="cover_image" name="cover_image" action="{{ route('admin.resources.storeMedia') }}" collection-name="resource_cover_image" max-file-size="2" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.resource_cover_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.cover_image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.resource_file') ? 'invalid' : '' }}">
        <label class="form-label required" for="file">{{ trans('cruds.resource.fields.file') }}</label>
        <x-dropzone id="file" name="file" action="{{ route('admin.resources.storeMedia') }}" collection-name="resource_file" max-file-size="5" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.resource_file') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.file_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tag') ? 'invalid' : '' }}">
        <label class="form-label required" for="tag">{{ trans('cruds.resource.fields.tag') }}</label>
        <x-select-list class="form-control" required id="tag" name="tag" wire:model="tag" :options="$this->listsForFields['tag']" multiple />
        <div class="validation-message">
            {{ $errors->first('tag') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.tag_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resource.book_category_id') ? 'invalid' : '' }}">
        <label class="form-label" for="book_category">{{ trans('cruds.resource.fields.book_category') }}</label>
        <x-select-list class="form-control" id="book_category" name="book_category" :options="$this->listsForFields['book_category']" wire:model="resource.book_category_id" />
        <div class="validation-message">
            {{ $errors->first('resource.book_category_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.book_category_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('resource.resource_category_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="resource_category">{{ trans('cruds.resource.fields.resource_category') }}</label>
        <x-select-list class="form-control" required id="resource_category" name="resource_category" :options="$this->listsForFields['resource_category']" wire:model="resource.resource_category_id" />
        <div class="validation-message">
            {{ $errors->first('resource.resource_category_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.resource.fields.resource_category_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.resources.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>