@extends('frontend.layout.admin')

@section('content')
    <div class="modal fade bd-example-modal-sm" id="editModel" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3" id="view">
                {{-- jquery model working mode enabled --}}

            </div>

        </div>
    </div>



    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">All Cars</h6>
            <a href="{{ route('car.add') }}" class="btn btn-primary btn-sm">
                Add+
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>View</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $value)
                            <tr>
                                <td><img src="{{ asset($value->image) }}" alt="" class="img-fluid"
                                        style="width: 80px"></td>
                                <td>{{ $value->brand }}</td>
                                <td>{{ $value->price }}</td>
                                <td>61</td>
                                <td><button class="btn btn-info btn-sm viewcar" data-id="{{ $value->id }}"><i
                                            class="fas fa-eye"></button></i>
                                </td>
                                <td>

                                    <button class="btn btn-secondary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>



            </div>
        </div>
    </div>

    {{-- <div class="container">
        <h3>Toast Notification in HTML CSS JavaScript</h3>
        <div class="toast-buttons">
            <div class="toast-row">
                <button type="button" class="custom-toast success-toast">
                    Submit
                </button>
                <button type="button" class="custom-toast danger-toast">
                    Failed
                </button>
                <button type="button" class="custom-toast info-toast">
                    Information
                </button>
                <button type="button" class="custom-toast warning-toast">
                    Warning
                </button>
            </div>
        </div>
    </div>
    <div class="toast-overlay" id="toast-overlay"></div> --}}
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.viewcar').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '{{ url('view/') }}/' + id,
                type: 'GET',
                data: {
                    "id": id,
                },
                success: function(response) {
                    console.log(response);
                    console.log(response.data.image); // Debug

                    $('#editModel').modal('show');

                    // Remove extra /storage if already in image
                    var imagePath = "public/" + response.data.image;

                    var row = `

    <div class="text-center mb-4">
        <img src="${imagePath}" class="img-fluid rounded shadow-sm" style="max-width: 300px;" alt="Car Image">
    </div>

    <table class="table table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>Category</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Price</th>
                <th>Seating Capacity</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>${response.data.getcategory.name}</td>
                <td>${response.data.brand}</td>
                <td>${response.data.model}</td>
                <td>${response.data.year}</td>
                <td>${response.data.price}</td>
                <td>${response.data.seating_capacity}</td>
                <td>${response.data.location}</td>
            </tr>
        </tbody>
    </table>

    <h4 class="mt-4 mx-auto">Description</h4>
    <p>${response.data.description}</p>
    <h4 class="mt-4 mx-auto">Features</h4>
    <ul id="feature-list" class="list-group list-group-flush mb-3">
        <!-- Features will be appended here -->
    </ul>

`;

                    row += "<ul class='list-group'>";
                    response.data.getfeature.forEach(function(feature) {
                        row +=
                            `<li class="list-group-item">${feature.getfeaturename.name}</li>`;
                    });
                    row += "</ul>";
                    row += `

                    `

                    $('#view').html(row);

                },
                error: function(error) {
                    console.log(error);
                }
            });



        });
    });
</script>
