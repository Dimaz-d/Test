<section>
    <div class="row">
        <div class="col-md-8">
            <h4 class="mb-3">Edit DB info</h4>
            <form class="needs-validation" id="requestSetForm">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="uToken" class="form-label">Your Token</label>
                        <input type="text" class="form-control" id="uToken" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid uToken name is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="itemId" class="form-label">Item Id</label>
                        <input type="number" class="form-control" name="id" id="itemId" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid Id is required.
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="data" class="form-label">Your Data</label>
                        <input type="text" name="data" class="form-control" id="data" placeholder="" value='{"title": "Ban","price": 2000, "count": 1,"description": "qwerty"}' required="">
                        <div class="invalid-feedback">
                            Valid Data name is required.
                        </div>
                    </div>
                </div>
                <hr class="my-4">

                <h4 class="mb-3">Type</h4>

                <div class="my-3">
                    <div class="form-check">
                        <input id="get" name="type" value="GET" type="radio" class="form-check-input"  required="">
                        <label class="form-check-label" for="get">Get</label>
                    </div>
                    <div class="form-check">
                        <input id="post" name="type" value="POST" type="radio" class="form-check-input" checked="" required="">
                        <label class="form-check-label" for="post">Post</label>
                    </div>
                </div>
                <hr class="my-4">
                <button class="w-100 btn btn-primary btn-lg" type="submit">Set</button>
            </form>
        </div>
    </div>
</section>
@push('script')
    <script>
        document.querySelector('#requestSetForm').addEventListener('submit',async (e) => {
            e.preventDefault()
            let type = e.target.querySelector('input[name="type"]:checked').value
            let token = e.target.querySelector('#uToken').value
            let response
            switch (type){
                case 'POST':
                    response = await fetch('/setData',{
                        method: 'POST',
                        headers:{
                            Authorization: `Bearer ${token}`,
                            Accept :'application/json',
                        },
                        body : new FormData(e.target)
                    }).then( data => {
                        switch (data.status){
                            case 200:
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Object has been edited',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                break;
                            case 410:
                                Swal.fire({
                                    icon: 'error',
                                    title: 'You don`t have item with this ID',
                                    text: 'Check your input',
                                })
                                break;
                            case 401:
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Invalid Token',
                                    text: 'Check your input',
                                })
                                break;
                            case 500:
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                })
                                break;
                        }
                    })
                    console.log(JSON.parse(response))
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: `ID: ${JSON.parse(response).id}`,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    console.log(JSON.parse(response))
                    break;
                case 'GET':
                    response = await fetch(`/setData?&id=${e.target.querySelector('input[name="id"]').value}&data=${e.target.querySelector('input[name="data"]').value}`,{
                        method: 'GET',
                        headers:{
                            Authorization: `Bearer ${token}`,
                            Accept :'application/json',
                        },
                    }).then( data => {
                        console.log(data)
                        switch (data.status){
                            case 200:
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: `Object has been created`,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                break;
                            case 401:
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Invalid Token',
                                    text: 'Check your input',
                                })
                                break;
                            case 500:
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                })
                                break;
                        }
                    })
                    break;
            }
        })
    </script>
@endpush
