<x-master>
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div> 
				@endif
				<div class="forms">
					{{-- @dd($product->category = 'Men'); --}}
					<div class="row">
						<h3 class="title1">Product Form :</h3>
						<div class="form-three widget-shadow">
							<form action="{{ route('product.update',$product->id) }}" method="POST">
								@csrf
								@method('patch')

								
								<div class="form-group">
									
									<x-form.input type="text" name="name" label="Product_name" value="{{ old('name', $product->name ) }}" required placeholder="Product Name...." />
								</div>

							
								@php
									
									$product_list = ['Kids' => 'Kids', 'Men' => 'Men','Women'=>'Women'];
								@endphp
								<x-form.select class="form-select form-select-lg mb-3 form-control" name="category" label="Category"   :list=$product_list />

								{{-- brand --}}
								@php
									
									$brand_list = ['Polo' => 'Polo', 'Wild-Men' => 'Wild-Men','Dorjibari'=>'Dorjibari'];
								@endphp
								<x-form.select class="form-select form-select-lg mb-3 form-control" name="brand" label="Brand"   :list=$brand_list />
								<x-form.input type="number" name="price" label="Product_Price" value="{{ old('price', $product->price ) }}" required placeholder="Product Price...." />
								<div class="form-group">
									<x-form.textarea name="description" class="form-control" id="" cols="30" rows="4" label="Description" text="{{ $product->description }}"/>
								</div>
								<div class="form-check"> 
								  <x-form.radio name="is_active" class="form-check-input"  type="checkbox" label="Is Active ?"/>
								</div>

								
								<button type="submit" class="btn btn-primary">Submit</button>
							  </form>
						</div>
					</div>

				</div>
			</div>
		</div>
</x-master>