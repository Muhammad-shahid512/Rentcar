@extends('frontend.layout.admin')
@section('content')
    <h4 class="m-2">Cars</h4>



    {{-- edit Modal --}}


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large
        modal</button>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content p-2">

                <div class="container">
                    <h4 class="mt-3">Add New Car</h4>
                    <p>Fill in details to list a new car for booking, including pricing, availability, and car
                        specifications.</p>
                    <form id="ajax-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 text-center">
                                <img id="preview-image" src="{{ asset('admin/img/upload.svg') }}" alt="Selected Car Image"
                                    style="max-width: 100%; height: auto; cursor: pointer;">
                                <input id="car-image" accept="image/*" type="file">
                                <p>Upload car image</p>
                            </div>

                        </div>
                        <div class="row">


                            <div class="col-4">
                                <label for="">Brand</label>
                                <input type="text" id="brand" name="firstname" class="form-control"
                                    placeholder="Your name..">
                            </div>
                            <div class="col-4">
                                <label for="">Model</label>
                                <input type="text" id="model" name="firstname" class="form-control"
                                    placeholder="Your name..">
                            </div>
                            <div class="col-4">
                                <label for="">Year</label>
                                <input type="text" id="year" name="firstname" class="form-control"
                                    placeholder="Your name..">
                            </div>

                        </div>
                        <div class="row mt-3">

                            <div class="col-4">
                                <label for="">daily price</label>
                                <input type="number" id="price" name="firstname" class="form-control"
                                    placeholder="Your name..">
                            </div>
                            <div class="col-4">
                                <label for="">year</label>
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
                                <input class="form-check-input" type="checkbox" name="features[]" value="Bluetooth"
                                    id="feature-bluetooth">
                                <label class="form-check-label" for="feature-bluetooth">Bluetooth</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="Air Conditioning"
                                    id="feature-ac">
                                <label class="form-check-label" for="feature-ac">Air Conditioning</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="GPS Navigation"
                                    id="feature-gps">
                                <label class="form-check-label" for="feature-gps">GPS Navigation</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="Leather Seats"
                                    id="feature-leather">
                                <label class="form-check-label" for="feature-leather">Leather Seats</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="Sunroof"
                                    id="feature-sunroof">
                                <label class="form-check-label" for="feature-sunroof">Sunroof</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="Backup Camera"
                                    id="feature-backup">
                                <label class="form-check-label" for="feature-backup">Backup Camera</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="Heated Seats"
                                    id="feature-heated">
                                <label class="form-check-label" for="feature-heated">Heated Seats</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="Keyless Entry"
                                    id="feature-keyless">
                                <label class="form-check-label" for="feature-keyless">Keyless Entry</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="Cruise Control"
                                    id="feature-cruise">
                                <label class="form-check-label" for="feature-cruise">Cruise Control</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="Alloy Wheels"
                                    id="feature-alloy">
                                <label class="form-check-label" for="feature-alloy">Alloy Wheels</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-submit"><i class="fa fa-save"></i>
                                Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>

                        <div class="row">
                            {{-- <input type="submit" value="Submit"> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Car Featured</h6>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                Add+
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="categoryTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Features</th>
                            <th>status</th>

                        </tr>
                    </thead>

                    <tbody id="categoryTables">
                        <tr>
                            <td>Foof</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
</script>
<script>
    $(document).ready(function() {
        alert("hello")

        $('#ajax-form').submit(function(event) {
            event.preventDefault();
            // alert("hello shahid")
            let name = $('#brand').val();
            let model = $('#model').val();
            let year = $('#year').val();
            let car_img = $('#car-image').val();
            let price = $('#price').val();
            let button = $(".btn-submit").text("load.....")
            // alert(name)
            console.log(name, model, year, price, car_img)
            // $.ajax({
            //     // url: '{{ route('features.post') }}',
            //     type: 'POST',
            //     data: {
            //         name: name,
            //         _token: '{{ csrf_token() }}'
            //     },
            //     success: function(response) {
            //         console.log(response)
            //         let button = $(".btn-submit").text("Submited")
            //         $('#exampleModal').modal('hide');
            //         $('#response-message').text(response.message ||
            //             'Comment posted successfully!');
            //         $('#name').val('');
            //         $('span.error-text').text('');
            //         $('#name').removeClass('is-invalid');
            //         $(".print-error-msg").hide();
            //         // Clear old data and reload
            //         $('#categoryTable tbody').empty();
            //         getcate();
            //     },
            //     error: function(xhr) {
            //         console.log(xhr.responseJSON);
            //         if (xhr.status === 422) {
            //             var errors = xhr.responseJSON.errors;
            //             let button = $(".btn-submit").text("Error...")

            //             $(".print-error-msg").find("ul").html('');
            //             $(".print-error-msg").show();
            //             $.each(errors, function(key, value) {
            //                 $('span.' + key + '_error').text(value[0]);
            //                 $('#' + key).addClass('is-invalid');
            //             });
            //         } else {
            //             alert('Some other error occurred!');
            //         }
            //     }
            // });
        });



    });
</script>
