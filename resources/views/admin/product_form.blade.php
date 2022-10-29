<x-master>
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">

					<div class="row">
						<h3 class="title1">Product Form :</h3>
						<div class="form-three widget-shadow">
							<x-form.error/>
							<form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
								  {{-- <label for="product_title">Title</label>
								  <input type="text" class="form-control" id="product_title" name="title" value="{{ old('title') }}" placeholder="Enter Product Title....">
								  @error('title')
								  <span class="form-text text-danger">{{ $message }}</span>
								  @enderror --}}

								  <x-form.input type="text" name="title" label="Product Title" required placeholder="Product Title...." />
								</div>

								{{-- <x-form.checkbox name="category" label="Category" required placeholder="Product Title...." class="form-select form-select-lg mb-3 form-control"
								:option[

								]
								
								/> --}}
								{{--  
								<select class="form-select form-select-lg mb-3 form-control" aria-label="Default select example" name="category">
									<option selected disabled>Select Category</option>
									<option value="Kids">Kids</option>
									<option value="Men">Men</option>
									<option value="Women">Women</option>
								</select>
								--}}

								{{-- select with component --}}
								@php
									
									$list = ['Kids' => 'Kids', 'Men' => 'Men','Women'=>'Women'];
								@endphp
								<x-form.select class="form-select form-select-lg mb-3 form-control" name="category" label="Category"   :list=$list />
								
								
								
								<div class="form-gorup">
									<x-form.input name='image'  type='file' label='Image'/>
								</div>

								<div class="form-check">
								  {{-- <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_active">
								  <label class="form-check-label" for="exampleCheck1">Is Active ?</label> --}}
								  <x-form.radio name="is_active" class="form-check-input" type="checkbox" label="Is Active ?" />
								</div>
								<div class="form-group">
									{{-- <label for="description">Description</label>
									<textarea class="form-control" name="description" id="description" cols="30" rows="4"></textarea> --}}
									<x-form.textarea name="description" class="form-control" id="" cols="30" rows="4" label="Description"/>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							  </form>
						</div>
					</div>

				</div>
			</div>
		</div>
</x-master>