@extends('frontend.layout.admin')
@section('title', 'data')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

        </div>

        <!-- Content Row -->


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-10 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>

                    </div>
                    <!-- Card Body -->

                </div>
            </div>

            <div class="card-body">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large
                    modal</button>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content p-2">

                            <div class="container">
                                <h4 class="mt-3">Add New Car</h4>
                                <p>Fill in details to list a new car for booking, including pricing, availability, and car
                                    specifications.</p>
                                <form action="action_page.php">
                                    <div class="row">
                                        <div class="col-lg-6 text-center">
                                            <img id="preview-image" src="{{ asset('admin/img/upload.svg') }}"
                                                alt="Selected Car Image"
                                                style="max-width: 100%; height: auto; cursor: pointer;">
                                            <input id="car-image" accept="image/*" hidden type="file">
                                            <p>Upload car image</p>
                                        </div>

                                    </div>
                                    <div class="row">


                                        <div class="col-6">
                                            <label for="">Car model</label>
                                            <input type="text" id="fname" name="firstname" class="form-control"
                                                placeholder="Your name..">
                                        </div>
                                        <div class="col-6">
                                            <label for="">Car model</label>
                                            <input type="text" id="fname" name="firstname" class="form-control"
                                                placeholder="Your name..">
                                        </div>

                                    </div>
                                    <div class="row mt-3">

                                        <div class="col-4">
                                            <label for="">Year</label>
                                            <input type="number" id="fname" name="firstname" class="form-control"
                                                placeholder="Your name..">
                                        </div>
                                        <div class="col-4">
                                            <label for="">daily price</label>
                                            <input type="text" id="fname" name="firstname" class="form-control"
                                                placeholder="Your name..">
                                        </div>
                                        <div class="col-4">
                                            <label for="">Select </label>
                                            <select name="" id="" class="form-control">

                                                <option value="">G van</option>
                                                <option value="">Civic</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <label for="">daily price</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Burewala</option>
                                                <option value="">Lahore</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Select Car Features:</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="features[]"
                                                value="Bluetooth" id="feature-bluetooth">
                                            <label class="form-check-label" for="feature-bluetooth">Bluetooth</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="features[]"
                                                value="Air Conditioning" id="feature-ac">
                                            <label class="form-check-label" for="feature-ac">Air Conditioning</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="features[]"
                                                value="GPS Navigation" id="feature-gps">
                                            <label class="form-check-label" for="feature-gps">GPS Navigation</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="features[]"
                                                value="Leather Seats" id="feature-leather">
                                            <label class="form-check-label" for="feature-leather">Leather Seats</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="features[]"
                                                value="Sunroof" id="feature-sunroof">
                                            <label class="form-check-label" for="feature-sunroof">Sunroof</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="features[]"
                                                value="Backup Camera" id="feature-backup">
                                            <label class="form-check-label" for="feature-backup">Backup Camera</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="features[]"
                                                value="Heated Seats" id="feature-heated">
                                            <label class="form-check-label" for="feature-heated">Heated Seats</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="features[]"
                                                value="Keyless Entry" id="feature-keyless">
                                            <label class="form-check-label" for="feature-keyless">Keyless Entry</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="features[]"
                                                value="Cruise Control" id="feature-cruise">
                                            <label class="form-check-label" for="feature-cruise">Cruise Control</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="features[]"
                                                value="Alloy Wheels" id="feature-alloy">
                                            <label class="form-check-label" for="feature-alloy">Alloy Wheels</label>
                                        </div>
                                    </div>


                                    <div class="row">
                                        {{-- <input type="submit" value="Submit"> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Content Row -->


    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('car-image');
        const previewImage = document.getElementById('preview-image');

        previewImage.addEventListener('click', function() {
            imageInput.click();
        });

        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                previewImage.src = URL.createObjectURL(file);
            }
        });
    });
</script>
