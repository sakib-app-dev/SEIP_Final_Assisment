    <x-master>
        <!-- main content start-->
        <div id="page-wrapper">
            <div class="main-page">
                <div class="tables">
                    <h2 class="title1">Tables</h2>
                    <div class="panel-body widget-shadow">
                        <h4>Product View:</h4>
                        <div class="container">
                            <div class="row">
                                <div class="offset-md-3 col-md-9">
                                    <div class="col-md-4 text-center">
                                        <img src="{{ asset('storage/products/'.$product->image ) }}" alt="" srcset="" height="300px">
                                    </div>
                                    <div class="col-md-5">
                                    <h3>Product Title: {{ $product->name ?? 'Not Available' }}</h3>
                                    <p>Description: {{ $product->description ?? 'Not Available' }}</p>
                                    <p>Category: {{ $product->category ?? 'Not Available' }}</p>
                                    <p>Is Active: {{ $product->is_active ? 'Active' : 'Not Active' }}</p>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                            
    
                         
                    </div>
    
                </div>
            </div>
        </div>
    </x-master>
    

