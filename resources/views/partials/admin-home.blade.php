
<link rel="stylesheet" href="{{asset('css/index.css')}}">




<div class="container-fluid">
    <div class="px-lg-5">

        <div class="row py-5 header-bg">
            <div class="col-lg-12 mx-auto">
                <div class="text-white p-5 shadow-sm rounded banner">
                    <div class="row h-100 align-items-center justify-content-center text-center">
                        <div class="col-lg-10 align-self-end">
                            <h1 class="text-uppercase text-white header-txt">Isekai Express</h1>
                            <h3 class="text-white header-txt">Preorder Merchandise</h3>
                        </div>
                    </div>
                </p>
            </div>
        </div>

    </div>
    <br><br>
    <div class="container">
        <div class="row row-form justify-content-center align-items-center">
           <button type="button" class="btn btn-outline-primary" onclick="showAddMerchForm(1)"><b>Add Merchandise</b></button><br><br>
        </div>
    </div>
    <div class="container form" id="insert-merch-form">
        <div class="row row-form justify-content-center align-items-center">
            <div class="col-5">
                <h4 style="text-align: center; color: aliceblue;"><b>Add New Merchandise</b></h4>
                <form action = "insert-merchandise" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="merch_name" class="text">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="price" class="text">Price</label>
                        <input type="text" class="form-control" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="description" class="text">Description</label>
                        <textarea class="form-control" rows="3" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="merch_image" class="text">Image</label>
                        <input type="file" class="form-control-file text" name="merch_image" style="color: aliceblue" required>
                    </div>
                    <div class="row row-form justify-content-center align-items-center">
                     <button type="submit" class="btn btn-primary btn-width">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 2rem;">
        <br><br>
        @foreach ($merchandise as $value)
            <div class="col-xl-4 col-lg-5 col-md-7 mb-5" style="display:flex; flex-wrap:wrap;">
                <div class="bg-white rounded shadow-sm"><img src="/storage/merch_images/{{$value['image']}}" alt="" class="img-fluid card-img-top">
                    <div class="p-4">
                            <h5 class="text-dark d-flex align-self-center justify-content-around" style="text-align: center"><b>{{$value['merch_name']}}</b></h5>
                            <h4 class="d-flex align-self-center justify-content-around" style="color: rgba(221, 0, 0, 0.9)">P{{ number_format($value->price, 2, '.', ',') }}</h4>
                            <br>
                            <p class="small text-muted mb-0" style="font-size: 16px;">{{$value['description']}}</p>
                            <div class="d-flex justify-content-around rounded-pill bg-light px-3 py-2 mt-4">
                                <button type="button" class="btn btn-primary btn-sm update-btn"  data-toggle="modal" data-target="#update-merch-form-{{$value['id']}}" data-id="{{$value['id']}}" data-name="{{$value['merch_name']}}" data-price="{{$value['price']}}" data-description="{{$value['description']}}" data-image="{{$value['image']}}">
                                        Update
                                </button>
                                <form action="delete-merchandise" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{$value['id']}}">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
              <div class="modal fade" id="update-merch-form-{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="updateMerchForm" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: rgba(45, 61, 147, 0.9);">
                      <h5 class="modal-title" id="exampleModalLongTitle" style="color:aliceblue" >Update Merchandise Info</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action = "update-merchandise" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="">
                            <div class="form-group">
                                <label for="merch_name" class="text">Name</label>
                                <input type="text" class="form-control" name="name" value="">
                            </div>
                            <div class="form-group">
                                <label for="price" class="text">Price</label>
                                <input type="text" class="form-control" name="price" value="">
                            </div>
                            <div class="form-group">
                                <label for="description" class="text">Description</label>
                                <textarea class="form-control" rows="3" name="description">{{$value['description']}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="merch_image" class="text">Image</label>
                                <input type="file" class="form-control-file text" name="merch_image" value="">
                            </div>
                            <div class="modal-footer">
                                <form action="update-merchandise" method="POST">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-primary btn-width">Save</button>
                                </form>
                                <button type="button" class="btn btn-primary btn-width" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>

                    </div>
                  </div>
                </div>
              </div>
        @endforeach
     </div>

</div>



<script>

    window.onload = function() {
        document.getElementById("insert-merch-form").style.display = "none";
        document.getElementById("update-merch-form").style.display = "none";

    };

    function showAddMerchForm(isShow) {
        document.getElementById("insert-merch-form").style.display = isShow ? "block" : "none";
    };


    $('.update-btn').click(function(){
        var valId = $(this).attr('data-id');

        $('#update-merch-form-' + valId).on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var name = $(e.relatedTarget).data('name');
        var price= $(e.relatedTarget).data('price');
        var description = $(e.relatedTarget).data('description');
        var image = $(e.relatedTarget).data('image');

        $(e.currentTarget).find('input[name="id"]').val(id);
        $(e.currentTarget).find('input[name="name"]').val(name);
        $(e.currentTarget).find('input[name="price"]').val(price);
        $(e.currentTarget).find('textarea').val(description);
        $(e.currentTarget).find('input[name="merch_image"]').val(image);
        });
    });


</script>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}


