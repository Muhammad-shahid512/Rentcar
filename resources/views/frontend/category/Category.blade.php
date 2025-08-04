@extends('frontend.layout.admin')
@section('title', 'Category')
@section('content')


    {{-- <!--Create Modal --> --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category Car</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="ajax-form" action="{{ route('category.storex') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Suv,van,Sedan">
                            <span class="text-danger error-text name_error"></span>

                        </div>

                        <div class="mb-3 text-center">

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-submit"><i class="fa fa-save"></i>
                        Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>



    {{-- edit Modal --}}


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Category </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="ajax-formupdate"method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Names:</label>
                            <input type="text" id="names" name="name" class="form-control"
                                placeholder="Suv,van,Sedan">
                            <input type="hidden" id="hiddeninput" name="name" class="form-control"
                                placeholder="Suv,van,Sedan">

                        </div>

                        <div class="mb-3 text-center">

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-submit"><i class="fa fa-save"></i>
                        Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Car Category</h6>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                Add +
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="categoryTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>status</th>

                        </tr>
                    </thead>

                    <tbody id="categoryTables">

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
        getcate()
        $('#ajax-form').submit(function(event) {
            event.preventDefault();

            let name = $('#name').val();
            let button = $(".btn-submit").text("load.....")

            $.ajax({
                url: '{{ route('category.storex') }}',
                type: 'POST',
                data: {
                    name: name,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response)
                    let button = $(".btn-submit").text("Submited")
                    $('#exampleModal').modal('hide');
                    $('#response-message').text(response.message ||
                        'Comment posted successfully!');
                    $('#name').val('');
                    $('span.error-text').text('');
                    $('#name').removeClass('is-invalid');
                    $(".print-error-msg").hide();
                    // Clear old data and reload
                    $('#categoryTable tbody').empty();
                    getcate();
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON);
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        let button = $(".btn-submit").text("Error...")

                        $(".print-error-msg").find("ul").html('');
                        $(".print-error-msg").show();
                        $.each(errors, function(key, value) {
                            $('span.' + key + '_error').text(value[0]);
                            $('#' + key).addClass('is-invalid');
                        });
                    } else {
                        alert('Some other error occurred!');
                    }
                }
            });
        });



        function getcate() {
            $.ajax({
                url: '{{ route('category.getcategory') }}',
                type: "GET",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    var rows = ''; // rows ko empty string se initialize karo

                    $.each(response, function(index, item) {
                        rows += `
        <tr>
            <td>${item.name}</td>
            <td>
                <button data-id="${item.id}" class="btn btn-primary btn-sm edit-cate"><i class="fas fa-edit"></i></button>
                <button data-id="${item.id}" class="btn btn-danger btn-sm delete-cate"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
    `;
                    });

                    $('#categoryTable tbody').html(rows);


                }

            })
        }


        $(document).on('click', '.delete-cate', function() {
            let id = $(this).data('id');
            if (confirm("Are you sure want to delete  this post?")) {
                $.ajax({
                    url: '{{ url('category') }}/' + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // alert(response)
                        getcate()
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

        });


        // edit

        $(document).on('click', '.edit-cate', function() {
            let id = $(this).data('id');

            if (confirm("Are you sure want to update this post?")) {
                $.ajax({
                    url: '{{ url('category/update') }}/' + id,
                    type: 'GET',
                    data: {
                        "id": id,
                    },
                    success: function(response) {
                        console.log(response.updatedata.name);
                        $('#editModal').modal('show');

                        $("#names").val(response.updatedata.name)
                        $("#hiddeninput").val(response.updatedata.id)
                        getcate()
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

        });




        // edit post updates

        $('#ajax-formupdate').submit(function(event) {
            event.preventDefault();
            let name = $('#names').val();
            let id = $('#hiddeninput').val();

            let button = $(".btn-submit").text("load.....")

            $.ajax({
                url: '{{ route('category.updatecategorydata') }}',
                type: 'POST',
                data: {
                    name: name,
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response)
                    $('#editModal').modal('hide');

                    getcate()

                },
                error: function(xhr) {
                    console.log(xhr.responseJSON);


                }
            });
        });

    });
</script>
