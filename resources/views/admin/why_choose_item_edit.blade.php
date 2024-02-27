@extends('admin.layout.app')

@section('heading','Edit Why Choose Item')

@section('button')
<div>
    <a href="{{ route('admin_why_choose_item') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_why_choose_item_update', $why_choose_item->id) }}" method="post" >
                        @csrf
                        <div class="form-group mb-1">
                            <label class="mb-2">Heading *</label>
                            <input type="text" class="form-control" name="heading" value="{{ $why_choose_item->heading }}">
                        </div>
                        <div class="form-group mb-1">
                            <label class="mb-2">Text *</label>
                            <textarea name="text" class="form-control h_100" cols="30" rows="10"   >{{ $why_choose_item->text }}</textarea>
                        </div>
                        <div class="form-group mb-1">
                            <label class="mb-2">Icon Preview</label>
                            <div>
                                <i class="{{ $why_choose_item->icon }}"></i>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <label class="mb-2">Icon *</label>
                            <input type="text" class="form-control " name="icon" value="{{ $why_choose_item->icon }}">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection