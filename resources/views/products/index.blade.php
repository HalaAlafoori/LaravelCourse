 @extends('layout')
 @section('content')
 <div class="container-fluid">
 <h1>products</h1>
 <a class="btn btn-success float-right" href="{{route('products.create')}} ">Create</a>
 <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Categories</th>

        <th>Description</th>
        <th>Status</th>
        <th>Brand</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($products as $product )
        <tr>
            <td>{{$product->name}}</td>
            <td><img width='100' src="{{url('storage/'.$product->image)}}" alt=""></td>


            <td>{{$product->price}}</td>
            <td>



                <div class="d-flex justify-content-between">
                    @foreach($product->categories as $category)
                    <span class="mx-1">{{$category->name}}</span>
                    @endforeach
                </div>

        </td>

            <td>{{$product->desc}}</td>
            <td>{{$product['status']}}</td>
            <td>{{$product->brand->name}}</td>
            <td>

                <a href="{{route('products.edit',$product)}}">
                    <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                        <span class="fas fa-wrench "></span> تحكم
                    </span>
                </a>

                <form method="post" action="{{route('products.destroy',$product)}}">
                    @csrf
                    @method('DELETE')
                    <button onclick="var result=confirm('R U sure?'); if(result){} else{event.preventDefault()}" class="btn btn-danger">Delete</button>

                </form>

            </td>
          </tr>
        @empty
        <h1>No data found</h1>

        @endforelse


    </tbody>
  </table>

</div>
  @endsection
