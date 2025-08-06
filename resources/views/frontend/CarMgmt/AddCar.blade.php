@extends('frontend.layout.admin')

@section('content')
    <h4 class="m-2">Cars</h4>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">All Cars</h6>
            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                Add+
            </a>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="{{ route('car.stores') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 text-center mb-3">
                            <img id="preview-image" src="{{ asset('admin/img/upload.svg') }}" alt="Selected Car Image"
                                style="max-width: 40%; height: auto; cursor: pointer;">
                            <input id="car-image" name="image" accept="image/*" type="file" hidden>
                            <p>Upload car image</p>
                        </div>
                        {{-- <br> --}}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Brand</label>
                                <input type="text" name="brand"
                                    class="form-control  @error('brand') is-invalid @enderror"
                                    placeholder="e.g. BMW, Honda">
                                @error('brand')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Model</label>
                                <input type="text" name="model"
                                    class="form-control  @error('model') is-invalid @enderror" placeholder="e.g. X5, Civic">
                                @error('model')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Year</label>
                                <input type="number" name="year"
                                    class="form-control  @error('year') is-invalid @enderror" placeholder="e.g. 2020">
                                @error('year')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Daily Price</label>
                                <input type="text" name="price"
                                    class="form-control  @error('price') is-invalid @enderror" placeholder="e.g. 5000">
                                @error('price')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Seating Capacity</label>
                                <input type="number" name="seating_capacity"
                                    class="form-control  @error('seating_capacity') is-invalid @enderror"
                                    placeholder="e.g. 4">
                                @error('seating_capacity')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" name="location"
                                    class="form-control  @error('location') is-invalid @enderror" placeholder="e.g. Lahore">
                                @error('location')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control">
                                    @foreach ($category as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label>Features</label>
                            <div class="row">
                                @foreach ($feature as $value)
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="features[]"
                                                id="check-{{ $value->id }}" value="{{ $value->id }}">
                                            <label class="form-check-label"
                                                for="check-{{ $value->id }}">{{ $value->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-lg-12 text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JS to preview image -->
    <script>
        document.getElementById('preview-image').addEventListener('click', function() {
            document.getElementById('car-image').click();
        });

        document.getElementById('car-image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('preview-image').src = e.target.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
