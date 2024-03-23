{{-- Modal category add --}}

<!-- Modal -->
<div class="modal fade" id="typeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Type of Offer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form method="post" action="{{ route('offerstype.create') }}">
           @csrf
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-12 mb-4">
                      <label for="validationDefault01" class="form-label">Offer type Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="offer_type_name"  name="offer_type_name">
                    </div>
                    @php
                        $offer_types = DB::table('offer_types')->get();
                    @endphp
                    {{-- {{$offer_types}} --}}
                    <ul>
                        @foreach ($offer_types as $item)
                            <li class="p-2">
                                <span class="offer-type">{{ $item->offer_type_name }}</span>
                                <a href="#" class="pull-right px-2 "><i class="far fa-times"></i></a>

                                <a href="#" class="pull-right px-2 edit"><i class="far fa-edit"></i></a>
                                <!-- Hidden input field to store the item ID -->
                                <input type="hidden" class="offer-id" value="{{ $item->id }}">
                                <!-- Hidden submit icon -->
                                <a href="#" class="pull-right px-2 submit" style="display: none;"><i class="far fa-check"></i></a>
                            </li>
                        @endforeach
                        </ul>
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

@push('product')
<script>
   document.addEventListener('DOMContentLoaded', function () {
        const editIcons = document.querySelectorAll('.edit');
        editIcons.forEach(icon => {
            icon.addEventListener('click', function () {
                const listItem = this.closest('li');
                const offerType = listItem.querySelector('.offer-type').textContent;
                const offerId = listItem.querySelector('.offer-id').value;

                // Replace span with input field
                listItem.querySelector('.offer-type').outerHTML = `<input type="text" class="offer-type" value="${offerType}">`;

                // Show submit icon and hide edit icon
                listItem.querySelector('.edit').style.display = 'none';
                listItem.querySelector('.submit').style.display = 'inline-block';

                // Add event listener to submit icon
                listItem.querySelector('.submit').addEventListener('click', function () {
                    const updatedOfferType = listItem.querySelector('.offer-type').value;

                    // Send AJAX request to update data without reloading the page
                    // Example AJAX request using Fetch API
                    fetch(`/dashboard/promotion/update-offertype/${offerId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            // Add any additional headers if needed
                        },
                        body: JSON.stringify({ offerType: updatedOfferType }),
                    })
                    .then(response => {
                        // Handle response accordingly
                        if (response.status == 200) {
                            // Data updated successfully, you can handle the UI update here if needed
                            console.log('Data updated successfully');
                        } else {
                            // Handle error response
                            console.error('Error updating data');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            });
        });
    });

</script>
@endpush
