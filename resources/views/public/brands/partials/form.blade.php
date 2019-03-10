<div class="form-group">
    <label for="name">Brand name</label>
    <input type="text" class="form-control {{ $errors->has('name')?"is-invalid":"" }}" id="name" name="name" placeholder="Introduce the brand's name" value="{{ isset($brand)?$brand->name:old('name') }}" required>
    @if( $errors->has('name'))
    <div class="invalid-feedback">
        {{ $errors->first('name') }}
    </div>
    @endif
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control {{ $errors->has('description')?"is-invalid":"" }}" id="description" name="description" rows="10" placeholder="Introduce sneakers description" required>{{ isset($sneaker)?$sneaker->description:old('description') }}</textarea>
    @if( $errors->has('description'))
    <div class="invalid-feedback">
        {{ $errors->first('description') }}
    </div>
    @endif
</div>
<div class="form-group">
    <label for="createDate">Owner</label>
    <input type="text" class="form-control {{ $errors->has('owner')?"is-invalid":"" }}" id="owner" name="owner" placeholder="Introduce the name of the brand owner" value="{{ isset($brand)?$brand->owner:old('owner') }}" required>
    @if( $errors->has('owner'))
    <div class="invalid-feedback">
        {{ $errors->first('owner') }}
    </div>
    @endif
</div>
<div class="form-group">
    <label for="createDate">Create Date</label>
    <input type="text" class="form-control {{ $errors->has('createDate')?"is-invalid":"" }}" id="createDate" name="createDate" placeholder="Introduce the creation date, ex: April 1925" value="{{ isset($brand)?$brand->createDate:old('createDate') }}" required>
    @if( $errors->has('createDate'))
    <div class="invalid-feedback">
        {{ $errors->first('createDate') }}
    </div>
    @endif
</div>
<div class="form-group">
    <label for="release">Web</label>
    <input type="text" class="form-control {{ $errors->has('url')?"is-invalid":"" }}" id="url" name="url" placeholder="Introduce web page." value="{{ isset($brand)?$brand->url:old('url') }}" required>
    @if( $errors->has('url'))
    <div class="invalid-feedback">
        {{ $errors->first('url') }}
    </div>
    @endif
</div>

