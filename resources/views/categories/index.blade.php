 @extends('layout')
 @section('content')
 <div class="container-fluid">
 <h1>Categories</h1>
 @can('access-categories')
 <a class="btn btn-success float-right" href="{{route('categories.create')}} ">Create</a>
 @endcan
 <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Status</th>
        <th>Type</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category )
        <tr>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>{{$category['status']}}</td>
            <td>{{$category['type']}}</td>
            <td>
                @can('update-categories')
                <a href="{{route('categories.edit',$category)}}">
                    <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                        <span class="fas fa-wrench "></span> edit
                    </span>
                </a>
                @endcan
                @can('delete-categories')


                <form method="post" action="{{route('categories.destroy',$category)}}">
                    @csrf
                    @method('DELETE')
                    <button onclick="var result=confirm('R U sure?'); if(result){} else{event.preventDefault()}" class="btn btn-danger">Delete</button>

                </form>
                @endcan

            </td>
          </tr>
        @empty
        <h1>No data found</h1>

        @endforelse


    </tbody>
  </table>
  {!!!!}
</div>
  @endsection
