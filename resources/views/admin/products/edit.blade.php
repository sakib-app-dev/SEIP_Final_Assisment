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
							<form action="{{ route('admin.product.update',$product->id) }}" method="POST">
								@csrf
								@method('patch')

								
								<div class="form-group">
									
									<x-form.input type="text" name="name" label="Product name" value="{{ old('title', $product->title ) }}" required placeholder="Product Title...." />
								</div>

							
								@php
									
									$list = ['Kids' => 'Kids', 'Men' => 'Men','Women'=>'Women'];
								@endphp
								<x-form.select class="form-select form-select-lg mb-3 form-control" name="category"   :list=$list />

								{{-- brand --}}
								@php
									
									$list = ['Polo' => 'Polo', 'W-Men' => 'W-Men'];
								@endphp
								<x-form.select class="form-select form-select-lg mb-3 form-control" name="brand" label="Brand"   :list=$list />

								<div class="form-check"> 
								  <x-form.radio name="is_active" class="form-check-input"  type="checkbox" label="Is Active ?"/>
								</div>

								<div class="form-group">
									<x-form.textarea name="description" class="form-control" id="" cols="30" rows="4" label="Description" text="{{ $product->description }}"/>
								</div>
								
								<button type="submit" class="btn btn-primary">Submit</button>
							  </form>
						</div>
					</div>

				</div>
			</div>
		</div>
</x-master>