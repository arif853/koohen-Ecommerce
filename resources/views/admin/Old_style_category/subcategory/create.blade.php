{{-- Modal subsubcategory add --}}

<!-- Modal -->
<div class="modal fade" id="subsubcategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Subcategory</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {{-- <div class="subcategory_form" id="subcategory_form"></div> --}}
        <form action="{{route('subcategory.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('POST')
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-12 mb-2">
                        <label for="category_id" class="form-label">Parent category <span class="text-danger">*</span></label>
                        <select id="category_id" class="form-control" name="category" required>
                            <option value="0">--Select parent category--</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                      </div>
                    <div class="col-md-12 mb-2">
                      <label for="subcategory_id" class="form-label">Subcategory <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="subcategory_id" name="subcategory_name" required>
                    </div>
                    <div class="col-md-12 mb-2">
                      <label for="subcategory_image" class="form-label">subcategory Image</label>
                      <input type="file" class="form-control" id="subcategory_image" name="subcategory_image" >
                    </div>
                    <div class="col-12 mb-2">
                      <div class="form-check ml-20">
                        <input class="form-check-input" type="checkbox" checked name="status" id="status">
                        <label class="form-check-label" for="status">
                          Publish
                        </label>
                      </div>

                    </div>
                    <div class="col-12 mb-4">
                        <div id="image-preview">
                            <img id="output-image" src="" alt=""  width="250px">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                      {{-- <button class="btn btn-primary" type="submit">Submit form</button> --}}
                    </div>
                </div>
            </div>
        </form>
        {{-- <div class="modal-footer">
        </div> --}}
      </div>
    </div>
</div>


<script>
    document.getElementById('subcategory_image').addEventListener('change', function (event) {
        const input = event.target;
        const preview = document.getElementById('image-preview');
        const outputImage = document.getElementById('output-image');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                outputImage.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    });

</script>
