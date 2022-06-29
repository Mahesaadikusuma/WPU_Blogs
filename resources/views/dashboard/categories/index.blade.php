@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Category</h1>
     </div> 

     @if (session()->has('Success'))
     <div class="alert alert-success col-lg-6">
      {{ session('Success') }}
     </div>
         
     @endif

     <div class="table-responsive  col-md-6 ">
      <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create New Category</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Category Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
               @foreach ($categories as $category)
               <tr>

                    {{-- FUNGSI INI UNTUK MENAMPILKAN NO 1 SECARA TERURUT DAN TIDAK BERGANTUNG KE DB KARENA KALO DI DB NO ITU AKAN TIDAK TERUTUR --}}
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $category->name }} </td>
                    <td>
                          {{-- untuk link a nya bisa begini /dashboard/posts/{{ $post->slug }} atau 
                          /dashboard/posts/create --}}
                          
                         <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a>
                         
                         <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
                        
                        <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        
                        <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure')" ><span data-feather="trash" class="align-text-bottom "></span></button>
                        </form>

                    </td>
                </tr>
               @endforeach
            
            
          </tbody>
        </table>
      </div>
</main>
@endsection