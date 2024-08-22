<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Customer</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Name *</label>
                                <input type="text" class="form-control" id="customerName">
                                <label class="form-label">Customer Email *</label>
                                <input type="text" class="form-control" id="customerEmail">
                                <label class="form-label">Customer Mobile *</label>
                                <input type="text" class="form-control" id="customerMobile">
                                <label class="form-label">Customer Address *</label>
                                <input type="text" class="form-control" id="customerAddress">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>

    async function Save() {
        let customerName = document.getElementById('customerName').value;
        let customerEmail = document.getElementById('customerEmail').value;
        let customerMobile = document.getElementById('customerMobile').value;
        let customerAddress = document.getElementById('customerAddress').value;

        if (customerName.length === 0) {
            errorToast("Customer Name Required!");
        } else if (customerEmail.length === 0) {
            errorToast("Customer Email Required!");
        } else if (customerMobile.length === 0) {
            errorToast("Customer Mobile Required!");
        } else if (customerAddress.length === 0) {
            errorToast("Customer Address Required!");
        } else {
            showLoader();
            try {
                let res = await axios.post("/create-customer", {
                    name: customerName,
                    email: customerEmail,
                    mobile: customerMobile,
                    address: customerAddress
                });

                hideLoader();

                if (res.status === 201) {
                    successToast('Customer created successfully!');
                    document.getElementById("save-form").reset();
                    document.getElementById('modal-close').click(); // Close modal after success
                    await getList();
                } else {
                    errorToast("Request failed!");
                }
            } catch (error) {
                hideLoader();
                errorToast("An error occurred! Please try again.");
            }
        }
    }


</script>
