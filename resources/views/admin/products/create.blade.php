<x-master>

		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">

					<div class="row">
						<h3 class="title1">Product Form :</h3>
						<div class="form-three widget-shadow">
							<x-form.error/>
							<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								
								<div class="form-group">
								  <x-form.input type="text" name="name" label="Product Title" required placeholder="Product Name...." />
								</div>

								{{-- Category --}}
								@php
									
									$list = ['Kids' => 'Kids', 'Men' => 'Men','Women'=>'Women'];
								@endphp
								<x-form.select class="form-select form-select-lg mb-3 form-control" name="category" label="Category"   :list=$list />
							{{-- brand --}}
								@php
									
									$list = ['Polo' => 'Polo', 'Wild-Men' => 'Wild-Men','Dorjibari'=>'Dorjibari'];
								@endphp
								<x-form.select class="form-select form-select-lg mb-3 form-control" name="brand" label="Brand"   :list=$list />
								<div class="form-group">
									
									<x-form.textarea name="description" class="form-control" id="" cols="30" rows="4" label="Description"/>
								</div>

								<div class="form-group">
									<x-form.input type="number" name="price" label="Product Price" required placeholder="Product Price...." />
								  </div>
								
								<div class="form-gorup">
									<x-form.input name='image'  type='file' label='Image'/>
								</div>

								<div class="form-check">
								  
								  <x-form.radio name="status" class="form-check-input" type="checkbox" label="Staus" />
								</div>
								
								<button type="submit" class="btn btn-primary">Submit</button>
							  </form>
						</div>
					</div>

				</div>
			</div>
		</div>
</x-master>