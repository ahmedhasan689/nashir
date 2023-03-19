<div class="card-header border-0 pt-6">
    <!--begin::Card title-->
    <div class="card-title">
        <!--begin::Search-->
        <div class="d-flex align-items-center position-relative my-1">
            <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
            <span class="">
                Show Media For : {{ $advertisement->title }}
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Search-->
    </div>
    <!--begin::Card title-->
</div>
<div class="card-body pt-0">
    <form action="{{ route('advertisement_dashboard.storeMedia', ['id' => $advertisement->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-5">
            <div class="col-xl-12" id="media">
                <div class="input-group mb-10">
                    <label class="input-group-text" for="inputGroupFile01">Media</label>
                    <input type="file" name="media[]" class="form-control @error('media') is-invalid @enderror" id="inputGroupFile01" multiple>
                </div>
                @error('media')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="row mb-10">
            <span class="fw-bolder mb-3">
                Files : ( {{ $advertisement->media->count() }} )
            </span>
            @foreach( $advertisement->media as $image )
                <div class="col-6 mb-5">
                    <img src="{{ asset('storage') . '/' . $image->media_url }}" width="150" height="150" alt="" class="mx-10">
                    <button type="button" class="btn btn-danger deleteMedia" data-id="{{ $image->id }}">
                        Delete
                    </button>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 d-flex gap-2 justify-content-start">
                <button type="submit" class="btn btn-success">
                    Submit
                </button>
                <a href="{{ route('advertiser.index') }}" class="btn btn-secondary">
                    Back
                </a>
            </div>
        </div>
    </form>
</div>
