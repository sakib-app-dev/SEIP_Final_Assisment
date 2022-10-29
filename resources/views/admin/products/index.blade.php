<x-master>
    <!-- main content start-->
    <div id="page-wrapper">
        <div class="main-page">
            <div class="tables">
                <h2 class="title1">Tables</h2>
                <div class="panel-body widget-shadow">
                   @if(session ('message'))
                       
                   <p class="text-success">{{session('message')  }}</p>
                   @endif 
                    <div class="col-md-4">
                        <h4>Product Table:</h4>
                        
                    </div>
                    
                    
                     
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl#</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Status</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->category }}</td>
                                    <td>{{ $data->brand }}</td>
                                    <td>{{ $data->description }}</td>
                                    <td>{{ $data->price }}</td>
                                    <td><img src="{{ asset('storage/products/'.$data->image) }}" alt="" height="50px"></td>
                                    <td>{{ $data->status? 'Active': 'Inactive' }}</td> 
                                    
                                    <td class="d-flex">
										<a href="{{ route('product.show',$data->id) }}" class="btn btn-primary">Show</a>
										<a href="{{ route('product.edit',$data->id) }}" class="btn btn-success">Edit</a>
										
                                        <form action="{{ route('product.destroy',$data->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Delete</button>

                                        </form>
									</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-master>
