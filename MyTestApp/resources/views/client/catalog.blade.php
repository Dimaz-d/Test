@extends('client.layout')

@section('main')
    <style>
        form{
            width: 100%;
            display: flex;
            justify-content: end;
            margin: 0px;
        }
        .deleteItem i{
            color: red;
            transition: all .3s linear;
        }
        .deleteItem i:hover{
            color: orange;
            transition: all .3s linear;
        }
        .hide{
            display: none;
        }
    </style>
    <section>
        <div class="container">
            <div class="row g-5">
                <div class="col-12">
                    <h3>Items</h3>
                </div>
                <div class="col-12">
                    <table id="myTable" class="table table-striped">
                        <thead>
                        <tr>
                            <td>Id</td>
                            <td>Title</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>User</td>
                            <td>Delete</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr id="item-{{$item->id}}">
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->count}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
                                            <form method="POST" class="ml-2 deleteItem">
                                                @csrf
                                                <input hidden name="id" value="{{$item->id}}" type="number">
                                                <button type="submit" class="btn">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')
    <script>
        let table = new DataTable('#myTable');
    </script>
    <script>
        document.querySelectorAll('.deleteItem').forEach((e)=>{
            console.log(e)
            e.addEventListener('submit', async (el) => {
                el.preventDefault();
                let response = await fetch(`/deleteItem`,{
                    method: 'POST',
                    body : new FormData(el.target)
                }).then(data=>{
                    switch (data.status) {
                        case 200:
                            Swal.fire({
                                toast: true,
                                icon: 'success',
                                position: 'center',
                                title: 'Item was deleted',
                                timer: 1000,
                                timerProgressBar: true,
                                showConfirmButton: false,
                            })
                            hideItem(el.target.querySelector('[name="id"]').value)
                            break;
                        case 500:
                            Swal.fire({
                                toast: true,
                                icon: 'error',
                                position: 'top-end',
                                title: 'Sth went wrong.... :(',
                                timer: 1000,
                                timerProgressBar: true,
                                showConfirmButton: false,
                            })
                            break;
                    }
                })
                console.log(response)
                function hideItem(id){
                    document.querySelector('#item-' + id).classList.add('hide');
                }
            })
        })
    </script>
@endpush
