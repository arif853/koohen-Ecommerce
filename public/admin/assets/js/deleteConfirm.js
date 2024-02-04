function confirmDelete(event) {
    event.preventDefault(); // prevent form submit

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            // Get CSRF token from the meta tag
            var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

            // Create a form dynamically
            var form = document.createElement("form");
            form.action = event.target.href;
            form.method = "POST";

            // Add CSRF token as a hidden input
            var csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = csrfToken;

            // Add method override as a hidden input
            var methodInput = document.createElement("input");
            methodInput.type = "hidden";
            methodInput.name = "_method";
            methodInput.value = "DELETE";

            // Append inputs to the form
            form.appendChild(csrfInput);
            form.appendChild(methodInput);

            // Append form to the body
            document.body.appendChild(form);

            // Submit the form
            form.submit();

            // Remove the form from the body
            document.body.removeChild(form);

            Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
            });
        }
    });
}

// custom.js
function category() {
    var selectedCategory = $('#product_category').val();

    $.ajax({
        url: '/dashboard/subcategory/get_subcategory/' + selectedCategory,
        type: 'GET',
        success: function(response) {
            $('#product_subcategory').empty();
            $('#product_subcategory').append('<option value="0">Select a Subcategory....</option>');

            $.each(response, function(index, subcategory) {
                $('#product_subcategory').append('<option value="' + subcategory.id + '">' + subcategory.subcategory_name + '</option>');
            });
        },
        error: function(error) {
            console.error('Error fetching subcategories: ' + error);
        }
    });
}
